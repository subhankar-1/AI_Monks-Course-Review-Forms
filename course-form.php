<?php
/**
 * Template Name: WordPress CourseForm
 */
ob_start();
get_header();
require_once("./wp-load.php"); //check for path in actual deployement

?>
<form action="" method="post" enctype="multipart/form-data">
	<label for="course-name">Course Name<br>
		<input id="course-name" type="text" name="course-name"  required="required" value="">
	</label>
	<br>
	<label for="institution-name">Name of the University
		<input id="institution-name" type="text" name="institution-name"  required="required" value="">
	</label>
	<label for="dept-name">Name of the Department/School conducting the Course
		<input id="dept-name" type="text" name="dept-name"  required="required" value="">
	</label>
	<label for="location-country">Location - Country (one country at a time)
		<input id="location-country" type="text" name="location-country"  required="required" value="">
	</label>
	<label for="location-city">Location - City (can enter multiple cities seperated by ',')
		<input id="location-city" type="text" name="location-city"  required="required" value="">
	</label>
	<label for="course-level">Type of course<br>
		<select id="course-level" name="course-level"  required="required">
		    <option value="Bachelors">Bachelors</option>
		    <option value="Masters">Masters</option>
		    <option value="N/A">N/A</option>
	  	</select>
	</label><br>
	<label for="course-mode">Mode of teching<br>
		<select id="course-mode" name="course-mode" required="required" >
		<option value="full time regular classroom">full time regular classroom</option>
		    <option value="weekend classroom">weekend classroom</option>
		    <option value="completely online">completely online</option>
		    <option value="online+ocassional classroom interaction">online+ocassional classroom interaction</option>
	  	</select>
	</label><br>
	<label for="course-degree">Type of degree awarded at the completion of course<br>
		<select id="course-degree" name="course-degree"  required="required">
		    <option value="Certificate">Certificate</option>
		    <option value="Degree">Degree</option>
		    <option value="Diploma">Diploma</option>
	  	</select>
	</label><br>
	<label for="duration">Duration (in months)<br>
		<select id="duration" name="duration"  required="required">
		<?php
		for ($i=1, $len=48; $i<=$len; $i++){?> 
		    <option value=<?php  echo "'".$i."'";  ?>><?php  echo $i;  ?></option>
		<?php } ?>  
		</select>
	</label><br>
	<label for="fee-currency">Course Fee - Choose Currency<br>
		<select id="fee-currency" name="fee-currency"  required="required">
		    <option value="INR">INR</option>
		    <option value="USD">USD</option>
		    <option value="EUR">EUR</option>
		    <option value="CAD">CAD</option>
		    <option value="SGD">SGD</option>
		    <option value="GBP">GBP</option>
		    <option value="AUD">AUD</option>
		    <option value="Other">Other</option>
	  	</select>
	</label><br>
	<label for="fee">Fee
		<input id="fee" type="number" name="fee" value="">
	</label>

	<label for="selection-process" ><h4>Selection Process</h4>
	    <input   type="checkbox" name="selection-process[]" value="Applications/SOPs" />Applications/SOPs<br>
	    <input   type="checkbox" name="selection-process[]" value="Exam - CAT" />Exam - CAT<br>
	    <input   type="checkbox" name="selection-process[]" value="Exam - GMAT" />Exam - GMAT<br>
	    <input   type="checkbox" name="selection-process[]" value="Exam - GRE" />Exam - GRE<br>
	    <input   type="checkbox" name="selection-process[]" value="Exam - IELTS" />Exam - IELTS<br>
	    <input   type="checkbox" name="selection-process[]" value="Exam - TOEFL" />Exam - TOEFL<br>
	    <input   type="checkbox" name="selection-process[]" value="Conduct separate written exam" />Conduct separate written exam<br>
	    <input   type="checkbox" name="selection-process[]" value="Interview" />Interview<br>
	    <input   type="checkbox" name="selection-process[]" value="Case Study or Group Discussion" />Case Study or Group Discussion<br>
	</label>
	<br>		

	<h4>Focus Area </h4>
	<input type="checkbox" name="focus-area[]" value="Business Intelligence/Visualization">Business Intelligence/Visualization<br>
	<input type="checkbox" name="focus-area[]" value="Business Analytics" >Business Analytics<br>
	<input type="checkbox" name="focus-area[]" value="Data Science">Data Science<br>
	<input type="checkbox" name="focus-area[]" value="Machine Learning" >Machine Learning<br>
	<input type="checkbox" name="focus-area[]" value="Artificial Intelligence">Artificial Intelligence<br>
	<input type="checkbox" name="focus-area[]" value="Big Data" >Big Data<br>
	<input type="checkbox" name="focus-area[]" value="Deep Learning" >Deep Learning<br>
	<br>
	
	<label for="intake-month" ><h4>Usually, when does the intake for the batch happen? </h4>
	    <input  type="checkbox" name="intake-month[]" value="January" />January<br>
	    <input  type="checkbox" name="intake-month[]" value="February" />February<br>
	    <input  type="checkbox" name="intake-month[]" value="March" />March<br>
	    <input  type="checkbox" name="intake-month[]" value="April" />April<br>
	    <input  type="checkbox" name="intake-month[]" value="May" />May<br>
	    <input  type="checkbox" name="intake-month[]" value="June" />June<br>
	    <input  type="checkbox" name="intake-month[]" value="July" />July<br>
	    <input  type="checkbox" name="intake-month[]" value="August" />August<br>
	    <input  type="checkbox" name="intake-month[]" value="September" />September<br>
	    <input  type="checkbox" name="intake-month[]" value="October" />October<br>
	    <input  type="checkbox" name="intake-month[]" value="November" />November<br>
	    <input  type="checkbox" name="intake-month[]" value="December" />December<br>
	</label>
	<br>		
	

	<label for="course-url">Link to the course website
		<input id="course-url" type="url" name="course-url" required="required" value="">
	</label>	
	<label for="page-title">Create page with title
		<input id="page-title" type="text" name="page-title" value="">
	</label>
	<label for="page-content">Create page with content:
		<input id="page-content" type="text" name="page-content" value="">
	</label>
	<label for="pageid">Page_ID(Optional)
		<input id="pageid" type="number" name="pageid"  value="">
	</label>
	<label for="instructor">Instructor
		<input id="instructor" type="text" name="instructor" value="">
	</label>

	<label for="specialization">Instructor Specialization
		<input id="specialization" type="text" name="specialization" value="">
	</label>
	
	<label for="schedule">Upcoming Schedule<br>
		<input id="schedule" type="date" date-format="YYYY MM DD" name="schedule" value="">
	</label><br><br>
	<input type="submit" name="submit" value="Submit">
</form>
<?php
//
	/*		
*/
if ( isset( $_POST['submit'] ) ) {
	
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
	$city_arr = explode (",", $_POST['location-city']);
	$my_post = array(
          'post_title'    => $_POST['page-title'],
          'post_content'  => $_POST['page-content'],
          'post_status'   => 'publish',
          'post_author'   => 1,
          'post_category' => array(1),
          'post_type'     => 'page'
          );
          $id=wp_insert_post( $my_post );
	$id!=0?$_POST['pageid']=$id:$_POST['pageid']=$_POST['pageid'];
	  //echo $id;
	try {
		if(!empty($city_arr))
		{
		    foreach($city_arr as $city)
		    {
			$GLOBALS['wpdb']->insert(
			    $wpdb->prefix."courses",
			    array('name' => $_POST['course-name'],
				'institution' => $_POST['institution-name'],
				'duration' => $_POST['duration'],
				'Level' => $_POST['course-level'],
				'location' => $_POST['location-country'],
				'fee' => $_POST['fee'],
				'mode' => $_POST['course-mode'],
				'page_id' => $_POST['pageid'],
				'instructor' => $_POST['instructor'],
				'instructor_specialisation' => $_POST['specialization'],
				'schedule'  => $_POST['schedule'],
				'selection_process' => $selection_process,
				'intake_month' => $intake_month,
				'degree' => $_POST['course-degree'],
				'currency' => $_POST['fee-currency'],
				'focus_area' => $focus_area,
				'course_link' => $_POST['course-url'],
				'department' => $_POST['dept-name'],
				'city' => $city	
			    )
			);
		     }
		}
	} catch (Exception $ex) {
	    echo 'Query failed'. $ex->getMessage();
	}
	//print_r($_POST);

}
get_footer();
?>

