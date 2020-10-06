<?php
/**
 * Template Name: WordPressAdmin Form
 */
ob_start();
get_header();
if($_POST['max-rev']=='')
$m=0;
else
$m=$_POST['max-rev'];
	for($i=1;$i<=$m;$i++){
		if ( isset( $_POST[$i] ) ) {
			try{
			$GLOBALS['wpdb']->update($wpdb->prefix."review", array('valid'=>$_POST['rev-val']), array( 'review_id' => $i));
			}catch(Exception $ex){
			echo 'Query failed'. $ex->getMessage();
			}
			$location = "http://localhost/blog/index.php/admin-review-validation-form";	
		}
	}
?>	
<h3><?php echo "Course-name: ".$_POST['namee'] ; ?></h3>
<h3><?php echo "institution: ".$_POST['institution'] ; ?></h3>
<?php
	//print_r($_POST);
//Multi-filter
	$allowed  = ['namee', 'institution'];
	$query = "SELECT * FROM wp_courses";
	$_POST= array_filter($_POST);
	$filtered_get = array_filter(
	    $_POST,
	    function ($key) use ($allowed) {
		return in_array($key, $allowed);
	    },
	    ARRAY_FILTER_USE_KEY
	);
	if (count($filtered_get)) {
	    $query .= " WHERE";
	    $keynames = array_keys($filtered_get); 
	    $k=1;
	    foreach($filtered_get as $key => $value){
	       if($key=='namee') $key="name";	
	       $query .= " $key = '$value'";
	       if (count($filtered_get) > 1 && (count($filtered_get) > $k++)){ 
		  $query .= " AND";
	       }
	    }
	}
$query .= ";";
//echo $query;
//end here

	$courses=$GLOBALS['wpdb']->get_results($query);
	foreach($courses as $course){
	//$course=$GLOBALS['wpdb']->get_row("SELECT course_id FROM wp_courses WHERE name = '".$_POST['namee']."'");
	if ( isset( $_POST['edit'] ) ){
	$reviews   = $GLOBALS['wpdb']->get_results("SELECT * FROM wp_review WHERE course_id = ".$course->course_id." AND (valid=1 OR valid=2) ORDER BY time DESC");	
	}
	else
	$reviews   = $GLOBALS['wpdb']->get_results("SELECT * FROM wp_review WHERE course_id = ".$course->course_id." AND valid=0 ORDER BY time ASC");	
	$len_r=0;
	for ($j=0, $len_r=count($reviews); $j<$len_r; $j++){ ?>
		<p>Review <?php echo $j+1; ?></p>
	<?php
		//User details:
		$userd   = $GLOBALS['wpdb']->get_row("SELECT * FROM wp_reviewers WHERE reviewer_id = ".$reviews[$j]->user_id);
		$m=max($m,$reviews[$j]->review_id);?>
		<form action="" method="post" enctype="multipart/form-data">
		<p> <?php //echo $reviews[$j]->review_id."\n";?> </p>		
		<p> <?php echo "User Name: ".$userd->name; ?> </p>
		<p> <?php echo "User Email: ".$userd->email; ?> </p>
		<p> <?php echo "User Linkedin : ".$userd->linkedin; ?> </p>
		<?php $coursed   = $GLOBALS['wpdb']->get_row("SELECT * FROM wp_courses WHERE course_id = ".$reviews[$j]->course_id); ?>
		<p><?php echo "Course Name: ".$coursed->name."\n";?></p>
		<p><?php echo "Course Link: ".$coursed->course_link."\n"?></p>
		<p><?php echo "Review: ".$reviews[$j]->rev."\n";?></p>
		<p><?php echo "Time: ".$reviews[$j]->time."\n";?></p>
		<br>
		<label for="rev-val">Choose Vaild/Invalid<br>
		<select id="rev-val" name="rev-val"  required="required">
		    <option value=1>valid</option>
		    <option value=2>invalid</option>
	  	</select>
		</label><br>
		<label for="course-name">
		<input type="hidden" id="namee" name="namee" value=<?php echo "'".$_POST['namee']."'"; ?> ></label>
		<label for="institution">
		<input type="hidden" id="institution" name="institution" value=<?php echo "'".$_POST['institution']."'"; ?> ></label>
		<label for="max-rev">
		<input type="hidden" id="max-rev" name="max-rev" value=<?php echo $m; ?> ></label>
		<input type="submit" name=<?php echo $reviews[$j]->review_id;?> value="Submit">
		
		</form>
		<hr>
		<?php 
		
		//echo "'".$_POST['course-name']."'";
		//<?php echo $reviews[$j]->review_id; 
	}
}
	if($len_r==0) echo "No more reviews found!";
	?>
	</div>
	
	<br>
<?php  
 	
get_footer();
?>
