<?php
/**
 * Template Name: WordPressDynamic 
 */
ob_start();
get_header();
$courses = $GLOBALS['wpdb']->get_results("SELECT * FROM wp_courses");
$m=count($courses);
$flag=0;
if (!isset( $_POST['submit'] ) ){
	for($i=1;$i<=$m;$i++)if(isset( $_POST[$i] )){$flag=1;break;}	
}
	//get the static page and reviews
			if($flag==1)
			$coursed   = $GLOBALS['wpdb']->get_row("SELECT * FROM wp_courses WHERE course_id = " .$i );
			else
			$coursed   = $GLOBALS['wpdb']->get_row("SELECT * FROM wp_courses WHERE name = '".$_POST['course-name']."' AND institution = '".$_POST['institution']."'" );
			$reviews_id    = $GLOBALS['wpdb']->get_results("SELECT user_id,rev FROM wp_review WHERE course_id = ".$coursed->course_id." AND valid=1 ");
			$content=$GLOBALS['wpdb']->get_row("SELECT post_content FROM wp_posts WHERE ID = ".$coursed->page_id);
			echo $content->post_content;?>

			<p><h4>Reviews</h4></p>
			<p>Total Review: <?php echo count($reviews_id)."\n";?><p><?php
	for ($j=0, $len=count($reviews_id); $j<$len; $j++){?><p>User:<?php $user_id    = $GLOBALS['wpdb']->get_row("SELECT name FROM wp_reviewers WHERE reviewer_id =".$reviews_id[$j]->user_id);echo $user_id->name;?></p><p>review:<?php echo $reviews_id[$j]->rev;?></p> <?php }
		
	

get_footer();
?>

