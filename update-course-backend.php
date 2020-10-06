<?php
/**
 * Template Name: WordPressCourseUpdateBackend Form
 */
ob_start();
get_header();
$course = $GLOBALS['wpdb']->get_row("SELECT * FROM wp_courses WHERE name = '".$_POST['course-name']."' AND institution= '".$_POST['course-institution']."' AND city= '".$_POST['course-location']."' AND mode= '".$_POST['course-mode']."'");
$select_pr = explode ("|", $course->selection_process);
$f_a= explode ("|", $course->focus_area);
$i_m= explode ("|", $course->intake_month);
//print_r($select_pr);
?>
<form action="" method="post" enctype="multipart/form-data">
	<label for="course-name">Course Name<br>
		<input id="course-name" type="text" name="course-name"  required="required" value=<?php echo "'".$course->name."'"; ?>>
	</label>
	<br>
	<label for="institution-name">Name of the University
		<input id="institution-name" type="text" name="institution-name"  required="required" value=<?php echo "'".$course->institution."'"; ?>>
	</label>
	<label for="dept-name">Name of the Department/School conducting the Course
		<input id="dept-name" type="text" name="dept-name"  required="required" value=<?php echo "'".$course->department."'"; ?>>
	</label>
	<label for="location-country">Location - Country 
		<input id="location-country" type="text" name="location-country"  required="required" value=<?php echo "'".$course->location."'"; ?>>
	</label>
	<label for="location-city">Location - City 
		<input id="location-city" type="text" name="location-city"  required="required" value=<?php echo "'".$course->city."'"; ?>>
	</label>
	<label for="course-level">Type of course<br>
		<select id="course-level" name="course-level"  required="required">
		    <option value="Bachelors" <?php echo ( $course->Level=="Bachelors"? 'selected' : '');?>>Bachelors</option>
		    <option value="Masters" <?php echo ( $course->Level=="Masters"? 'selected' : '');?>>Masters</option>
		    <option value="N/A" <?php echo ( $course->Level=="N/A"? 'selected' : '');?>>N/A</option>
	  	</select>
	</label><br>
	<label for="course-mode">Mode of teching<br>
		<select id="course-mode" name="course-mode" required="required" >
		<option value="full time regular classroom" <?php echo ( $course->mode=="full time regular classroom"? 'selected' : '');?>>full time regular classroom</option>
		    <option value="weekend classroom" <?php echo ( $course->mode=="weekend classroom"? 'selected' : '');?>>weekend classroom</option>
		    <option value="completely online" <?php echo ( $course->mode=="completely online"? 'selected' : '');?>>completely online</option>
		    <option value="online+ocassional classroom interaction" <?php echo ( $course->mode=="online+ocassional classroom interaction"? 'selected' : '');?>>online+ocassional classroom interaction</option>
	  	</select>
	<br>
	<label for="course-degree">Type of degree awarded at the completion of course<br>
		<select id="course-degree" name="course-degree"  required="required">
		    <option value="Certificate" <?php echo ( $course->degree=="Certificate"? 'selected' : '');?>>Certificate</option>
		    <option value="Degree" <?php echo ( $course->degree=="Degree"? 'selected' : '');?>>Degree</option>
		    <option value="Diploma" <?php echo ( $course->degree=="Diploma"? 'selected' : '');?>>Diploma</option>
	  	</select>
	</label><br>
	<label for="duration">Duration (in months)<br>
		<select id="duration" name="duration"  required="required">
		<?php
		for ($i=1, $len=48; $i<=$len; $i++){?> 
		    <option value=<?php  echo "'".$i."'";  ?> <?php echo ( $course->duration==$i? 'selected' : '');?>><?php  echo "'".$i."'";  ?> </option>
		<?php } ?>  
		</select>
	</label><br>
	<label for="fee-currency">Course Fee - Choose Currency<br>
		<select id="fee-currency" name="fee-currency"  required="required">
		    <option value="INR" <?php echo ( $course->currency=="INR"? 'selected' : '');?>>INR</option>
		    <option value="USD" <?php echo ( $course->currency=="USD"? 'selected' : '');?>>USD</option>
		    <option value="EUR" <?php echo ( $course->currency=="EUR"? 'selected' : '');?>>EUR</option>
		    <option value="CAD" <?php echo ( $course->currency=="CAD"? 'selected' : '');?>>CAD</option>
		    <option value="SGD" <?php echo ( $course->currency=="SGD"? 'selected' : '');?>>SGD</option>
		    <option value="GBP" <?php echo ( $course->currency=="GBP"? 'selected' : '');?>>GBP</option>
		    <option value="AUD" <?php echo ( $course->currency=="AUD"? 'selected' : '');?>>AUD</option>
		    <option value="Other" <?php echo ( $course->currency=="Other"? 'selected' : '');?>>Other</option>
	  	</select>
	</label><br>
	<label for="fee">Fee
		<input id="fee" type="number" name="fee" value=<?php echo $course->fee; ?>>
	</label>

	<label for="selection-process" ><h4>Selection Process</h4>
	    <input   type="checkbox" name="selection-process[]" value="Applications/SOPs" <?php echo (in_array("Applications/SOPs",$select_pr) ? 'checked' : '');?>/>Applications/SOPs<br>
	    <input   type="checkbox" name="selection-process[]" value="Exam - CAT" <?php echo (in_array("Exam - CAT",$select_pr) ? 'checked' : '');?>/>Exam - CAT<br>
	    <input   type="checkbox" name="selection-process[]" value="Exam - GMAT" <?php echo (in_array("Exam - GMAT",$select_pr) ? 'checked' : '');?>/>Exam - GMAT<br>
	    <input   type="checkbox" name="selection-process[]" value="Exam - GRE" <?php echo (in_array("Exam - GRE",$select_pr) ? 'checked' : '');?>/>Exam - GRE<br>
	    <input   type="checkbox" name="selection-process[]" value="Exam - IELTS" <?php echo (in_array("Exam - IELTS",$select_pr) ? 'checked' : '');?>/>Exam - IELTS<br>
	    <input   type="checkbox" name="selection-process[]" value="Exam - TOEFL" <?php echo (in_array("Exam - TOEFL",$select_pr) ? 'checked' : '');?>/>Exam - TOEFL<br>
	    <input   type="checkbox" name="selection-process[]" value="Conduct separate written exam" <?php echo (in_array("Conduct separate written exam",$select_pr) ? 'checked' : '');?> />Conduct separate written exam<br>
	    <input   type="checkbox" name="selection-process[]" value="Interview" <?php echo (in_array("Interview",$select_pr) ? 'checked' : '');?>/>Interview<br>
	    <input   type="checkbox" name="selection-process[]" value="Case Study or Group Discussion" <?php echo (in_array("Case Study or Group Discussion" ,$select_pr) ? 'checked' : '');?>/>Case Study or Group Discussion<br>
	</label>
	<br>		

	<h4>Focus Area </h4>
	<input type="checkbox" name="focus-area[]" value="Business Intelligence/Visualization" <?php echo (in_array("Business Intelligence/Visualization",$f_a) ? 'checked' : '');?>/>Business Intelligence/Visualization<br>
	<input type="checkbox" name="focus-area[]" value="Business Analytics" <?php echo (in_array("Business Analytics",$f_a) ? 'checked' : '');?>/>Business Analytics<br>
	<input type="checkbox" name="focus-area[]" value="Data Science" <?php echo (in_array("Data Science",$f_a) ? 'checked' : '');?>/>Data Science<br>
	<input type="checkbox" name="focus-area[]" value="Machine Learning" <?php echo (in_array("Machine Learning",$f_a) ? 'checked' : '');?>/>Machine Learning<br>
	<input type="checkbox" name="focus-area[]" value="Artificial Intelligence" <?php echo (in_array("Artificial Intelligence",$f_a) ? 'checked' : '');?>/>Artificial Intelligence<br>
	<input type="checkbox" name="focus-area[]" value="Big Data" <?php echo (in_array("Big Data",$f_a) ? 'checked' : '');?>/>Big Data<br>
	<input type="checkbox" name="focus-area[]" value="Deep Learning" <?php echo (in_array("Deep Learning",$f_a) ? 'checked' : '');?>/>Deep Learning<br>
	<br>
	
	<label for="intake-month" ><h4>Usually, when does the intake for the batch happen? </h4>
	    <input  type="checkbox" name="intake-month[]" value="January" <?php echo (in_array("January",$i_m) ? 'checked' : '');?>/>January<br>
	    <input  type="checkbox" name="intake-month[]" value="February" <?php echo (in_array("February",$i_m) ? 'checked' :'');?>/>February<br>
	    <input  type="checkbox" name="intake-month[]" value="March" <?php echo (in_array("March",$i_m) ? 'checked' : '');?>/>March<br>
	    <input  type="checkbox" name="intake-month[]" value="April" <?php echo (in_array("April",$i_m) ? 'checked' : '');?>/>April<br>
	    <input  type="checkbox" name="intake-month[]" value="May" <?php echo (in_array("May",$i_m) ? 'checked' : '');?>/>May<br>
	    <input  type="checkbox" name="intake-month[]" value="June" <?php echo (in_array("June",$i_m) ? 'checked' : '');?>/>June<br>
	    <input  type="checkbox" name="intake-month[]" value="July" <?php echo (in_array("July",$i_m) ? 'checked' : '');?>/>July<br>
	    <input  type="checkbox" name="intake-month[]" value="August" <?php echo (in_array("August",$i_m) ? 'checked' : '');?>/>August<br>
	    <input  type="checkbox" name="intake-month[]" value="September"<?php echo (in_array("September",$i_m) ?'checked':'');?>/>September<br>
	    <input  type="checkbox" name="intake-month[]" value="October" <?php echo (in_array("October",$i_m) ? 'checked' : '');?>/>October<br>
	    <input  type="checkbox" name="intake-month[]" value="November" <?php echo (in_array("November",$i_m) ?'checked' : '');?>/>November<br>
	    <input  type="checkbox" name="intake-month[]" value="December" <?php echo (in_array("December",$i_m) ?'checked' : '');?>/>December<br>
	</label>
	<br>		
	

	<label for="course-url">Link to the course website
		<input id="course-url" type="url" name="course-url" required="required" value=<?php echo $course->course_link; ?>>
	</label>	
	
	<label for="pageid">Page_ID
		<input id="pageid" type="number" name="pageid"  value=<?php echo $course->page_id; ?>>
	</label>
	<label for="instructor">Instructor
		<input id="instructor" type="text" name="instructor" value=<?php echo "'".$course->instructor."'"; ?>>
	</label>

	<label for="specialization">Instructor Specialization
		<input id="specialization" type="text" name="specialization" value=<?php echo "'".$course->instructor_specialisation."'"; ?>>
	</label>
	<label for="schedule">Upcoming Schedule<br>
		<input id="schedule" type="date" date-format="YYYY MM DD" name="schedule" value=<?php echo $course->schedule; ?>>
	</label><br><br>
	<input type="hidden" id="c_id" name="c_id" value=<?php echo $course->course_id; ?> ></label>
	<input type="submit" name="submitt" value="Submit">
</form>

<?php  	
if ( isset( $_POST['submitt'] ) ) {
	//print_r($_POST);
	$selection_process="";
	if(!empty($_POST['selection-process']))
        {
            foreach($_POST['selection-process'] as $chkval)
            {
                $selection_process.=($chkval."|");
            }
        }
	$intake_month="";
	if(!empty($_POST['intake-month']))
        {
            foreach($_POST['intake-month'] as $chkval)
            {
                $intake_month.=($chkval."|");
            }
        }
	$focus_area="";
	if(!empty($_POST['focus-area']))
        {
            foreach($_POST['focus-area'] as $chkval)
            {
                $focus_area.=($chkval."|");
            }
        }
	//echo $_POST['c_id'];
	try{
	$GLOBALS['wpdb']->update($wpdb->prefix."courses", array('name' => $_POST['course-name'],'department' => $_POST['dept-name'],'location' => $_POST['location-country'],'city' => $_POST['location-city'],'mode' => $_POST['course-mode'],'Level' => $_POST['course-level'],'degree' => $_POST['course-degree'],'currency' => $_POST['fee-currency'],'fee' => $_POST['fee'],'selection_process' => $selection_process,'focus_area' => $focus_area,'intake_month' => $intake_month,'course_link' => $_POST['course-url'],'page_id' => $_POST['pageid'],'instructor' => $_POST['instructor'],'instructor_specialisation' => $_POST['specialization'],'schedule'  => $_POST['schedule'],'duration' => $_POST['duration']), array( 'course_id' => $_POST['c_id']));}catch(Exception $ex){echo 'Query failed'.$ex->getMessage();}
}
get_footer();
//
?>
