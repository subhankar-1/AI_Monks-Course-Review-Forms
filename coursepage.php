<?php
/**
 * Template Name: WordPress Page
 */

ob_start();
get_header();
?>
<h3 data-border-width="3">About PGDBA</h3>
<p id="comp-jdxyra6s" class="style-jx4drdd7" data-border-width="3">Post Graduate Diploma in Business Analytics (PGDBA) is one-of-its-kind course started by three top institutes in India – Indian Institute of Management Calcutta, Indian Statistical Institute Kolkata and Indian Institute of Technology Kharagpur. The entire course spans 22 months with four semesters.</p>

<div id="comp-ipwksqhe" class="c1">
<div id="comp-ipwksqheinlineContent" class="c1inlineContent">
<div id="comp-ipwksqheinlineContent-gridWrapper" data-mesh-internal="true">
<div id="comp-ipwksqheinlineContent-gridContainer" data-mesh-internal="true">
<div class="style-jx4drdd7" data-border-width="3">

The course starts with a pre-semester module at IIM Calcutta, followed by the first semester at ISI Kolkata. The pre-semester is a primer to give students the flavour of analytics and make them understand how their entire journey is going to unfold. The first-semester focus on statistical and mathematical aspects of analytics. The second semester begins at IIT Kharagpur. The institute being the pioneer in technology focuses on machine learning and algorithms aspect of the analytics field. The third semester at IIM Calcutta amalgamates the entire learning of prior semesters, and build application and management orientation of students. The fourth semester is the internship semester where students go to various organizations and work on live projects. The course completes the entire spectrum of analytics and provides students with a holistic and comprehensive package.
<h3>Admission Process</h3>
The admission process consists of three stages – the application stage, followed by a written round, followed by the final interview round. Each of the stages is a shortlist stage except for the application stage. Approximately, 1500 aspirants applied for the course in 2015, 2100 in 2016, 3000 aspirants in 2017 and 4000 aspirants in 2018 and 4500 in 2019 for a total of 60 available seats in the course.

For more details on entrance examination statistics, refer <a href="http://aimonks.com/counsel/pgdba-cut-off/">here</a>.

Aspirants first need to fill application form which costs INR 2,000/- (INR 1,000/- for candidates belonging to SC/ST/PwD categories).
<p>
<a href="http://localhost/blog/index.php/custom-form/">Submit review </a></p>
<?php
$course_id    = $GLOBALS['wpdb']->get_row("SELECT course_id FROM wp_courses WHERE name ='PGDBA'");
$reviews_id    = $GLOBALS['wpdb']->get_results("SELECT user_id,rev FROM wp_review WHERE course_id = ".$course_id->course_id);
?>
<p>
<h4>Reviews</h4></p>
<?php 
echo count($reviews_id)."\n";
for ($i=0, $len=count($reviews_id); $i<$len; $i++){?><p>User:<?php $user_id    = $GLOBALS['wpdb']->get_row("SELECT name FROM wp_reviewers WHERE reviewer_id =".$reviews_id[$i]->user_id);echo $user_id->name;?></p><p>review:<?php echo $reviews_id[$i]->rev;?></p> <?php }?> 
</div>
</div>
</div>
</div>
</div>
<?php
get_footer();
?>
