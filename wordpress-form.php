<?php
/**
 * Template Name: WordPress Form
 */
ob_start();
get_header();
$user_id = get_current_user_id();
?>
<form action="" method="post" enctype="multipart/form-data">
	<label for="user-name"><h4>Your Name</h4>
		<input id="user-name" type="text" name="user-name"  required="required" value="">
	</label><br>
	<label for="course-name"><h4>Name of the analytics course you are doing or have done</h4>
		<input list="course-namee" id="course-name" name="course-name" required="required"> 
		<?php $c = $GLOBALS['wpdb']->get_results("SELECT * FROM wp_courses");
		$cc=array();
		for ($i=0, $len=count($c); $i<$len; $i++)
			array_push($cc,$c[$i]->name);
		$cc=array_unique($cc);
		?>
		<datalist id="course-namee" name="course-namee">
		<?php
		foreach($cc as $key => $value){?> 
		    <option data-value=<?php  echo $value; ?>> <?php echo $value; ?> </option> 
		<?php
		}?>
		</datalist> 

	</label>
	<br>
	<label for="course-dept"><h4>Name of the department/school in the institute conducting the course</h4>
		<input list="course-deptt" id="course-dept" name="course-dept" required="required"> 
		<?php $c = $GLOBALS['wpdb']->get_results("SELECT * FROM wp_courses");
		$cc=array();
		for ($i=0, $len=count($c); $i<$len; $i++)
			array_push($cc,$c[$i]->department);
		$cc=array_unique($cc);
		?>
		<datalist id="course-deptt" name="course-deptt">
		<?php
		foreach($cc as $key => $value){?> 
		    <option data-value=<?php  echo $value; ?>> <?php echo $value; ?> </option> 
		<?php
		}?>
		</datalist> 
	</label>
	<br>
	<label for="course-institution"><h4>Institute of your analytics course</h4>
		<input list="course-ins" id="course-institution" name="course-institution" required="required"> 
		<?php $c = $GLOBALS['wpdb']->get_results("SELECT * FROM wp_courses");
		$cc=array();
		for ($i=0, $len=count($c); $i<$len; $i++)
			array_push($cc,$c[$i]->institution);
		$cc=array_unique($cc);
		?>
		<datalist id="course-ins" name="course-ins">
		<?php
		foreach($cc as $key => $value){?> 
		    <option data-value=<?php  echo $value; ?>> <?php echo $value; ?> </option> 
		<?php
		}?>
		</datalist> 
	</label>
	<br>
	<label for="course-mode"><h4>What is the medium of teaching for the course?</h4>
		<input list="course-modee" id="course-mode" name="course-mode" required="required"> 
		<?php $c = $GLOBALS['wpdb']->get_results("SELECT * FROM wp_courses");
		$cc=array();
		for ($i=0, $len=count($c); $i<$len; $i++)
			array_push($cc,$c[$i]->mode);
		$cc=array_unique($cc);
		?>
		<datalist id="course-modee" name="course-modee">
		<?php
		foreach($cc as $key => $value){?> 
		    <option data-value=<?php  echo $value; ?>> <?php echo $value; ?> </option> 
		<?php
		}?>
		</datalist> 

	</label>
	<br>
	<label for="course-location"><h4>City where you attended classes</h4>
		<input list="course-locationn" id="course-location" name="course-location" required="required"> 
		<?php $c = $GLOBALS['wpdb']->get_results("SELECT * FROM wp_courses");
		$cc=array();
		for ($i=0, $len=count($c); $i<$len; $i++)
			array_push($cc,$c[$i]->city);
		$cc=array_unique($cc);
		?>
		<datalist id="course-locationn" name="course-locationn">
		<?php
		foreach($cc as $key => $value){?> 
		    <option data-value=<?php  echo $value; ?>> <?php echo $value; ?> </option> 
		<?php
		}?>
		</datalist> 
	</label>
	<br>
	
	<label for="course-status"><h4>What is your current status of analytics course?</h4>
		<select id="course-status" name="course-status" required="required" >
		    <option value="">Select from the dropdown below</option>
		    <option value="completed">completed</option>
		    <option value="ongoing">ongoing</option>
		    <option value="yet to start">yet to start</option>
		    <option value="started but drop out">started but drop out</option>
	  	</select>
	</label><br>
	
	<label for="course-completion"><h4>What is the year of completion of your course?</h4>
		<select id="course-completion" name="course-completion" required="required" >
		<option value="">Select from the dropdown below</option>
		<option value="not yet completed">not yet completed</option>
		<?php
		$year = date("Y");
		for ($i=0, $len=5; $i<$len; $i++){?> 
		    <option value=<?php  echo "'".$year-$i."'" ; ?>><?php  echo $year-$i;  ?></option>
		<?php } ?>  
	  	</select>
	</label><br>
	
	<label for="course-internship"><h4>Was an internship a part of the course?</h4>
		<select id="course-internship" name="course-internship"  required="required">
		    <option value="">Select from the dropdown below</option>
		    <option value="yes with stipend">yes with stipend</option>
		    <option value="yes without stipend">yes without stipend</option>
		    <option value="no">no internship</option>
	  	</select>
	</label><br><br>
	<label for="objective" ><h4>What was your main objective of joining this course?(Choose all that apply)</h4>
	    <input   type="checkbox" name="objective[]" value="Learn about analytics field for my own interest" />Learn about analytics field for my own interest<br>
	    <input   type="checkbox" name="objective[]" value="Switch role to analytics from non-analytics role" />Switch role to analytics from non-analytics role<br>
	    <input   type="checkbox" name="objective[]" value="Improve salary" />Improve salary<br>
	    <input   type="checkbox" name="objective[]" value="Networking with batchmates" />Networking with batchmates<br>
	    <input   type="checkbox" name="objective[]" value="My current role required me to learn analytics" />My current role required me to learn analytics<br>
	    <input   type="checkbox" name="objective[]" value="Improve my profile for higher studies (PhD, Masters, etc.)" />Improve my profile for higher studies (PhD, Masters, etc.)<br>
	    <input   type="checkbox" name="objective[]" value="Other" />Other<br>
	</label>
	<br>
	<h4>As observed by you, please rate the course on below parameters on a scale of 1-5, 5 being the highest and 1 being the lowest</h4>
	Interaction with industry through guest lectures&emsp;&emsp;&emsp;&emsp;&nbsp;
	<input type="radio" name="guest-lectures" value=1 >1&emsp; <input type="radio" name="guest-lectures" value=2 >2&emsp; <input type="radio" name="guest-lectures" value=3 >3&emsp; <input type="radio" name="guest-lectures" value=4 >4&emsp; <input type="radio" name="guest-lectures" value=5 >5<br><br>
	Amount of project work during the course work&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;
	<input type="radio" name="project-work" value=1 >1&emsp; <input type="radio" name="project-work" value=2 >2&emsp; <input type="radio" name="project-work" value=3 >3&emsp; <input type="radio" name="project-work" value=4 >4&emsp; <input type="radio" name="project-work" value=5 >5<br><br>
	Diversity in terms of gender&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;
	<input type="radio" name="gender-diversity" value=1 >1&emsp; <input type="radio" name="gender-diversity" value=2 >2&emsp; <input type="radio" name="gender-diversity" value=3 >3&emsp; <input type="radio" name="gender-diversity" value=4 >4&emsp; <input type="radio" name="gender-diversity" value=5 >5<br><br>
	Diversity of educational background of the batch&emsp;&emsp;&emsp;&emsp;&nbsp;
	<input type="radio" name="edu-diversity" value=1 >1&emsp; <input type="radio" name="edu-diversity" value=2 >2&emsp; <input type="radio" name="edu-diversity" value=3 >3&emsp; <input type="radio" name="edu-diversity" value=4 >4&emsp; <input type="radio" name="edu-diversity" value=5 >5<br><br>
	Diversity of professional background of the batch&emsp;&emsp;&emsp;&emsp;
	<input type="radio" name="prof-diversity" value=1 >1&emsp; <input type="radio" name="prof-diversity" value=2 >2&emsp; <input type="radio" name="prof-diversity" value=3 >3&emsp; <input type="radio" name="prof-diversity" value=4 >4&emsp; <input type="radio" name="prof-diversity" value=5 >5<br><br>
	
	<label for="tools-technology" ><h4>What are the tools and technologies covered in this course?(Choose all that apply)</h4>
	    <input   type="checkbox" name="tools-technology[]" value="Advanced Excel" />Advanced Excel<br>
	    <input   type="checkbox" name="tools-technology[]" value="VBA" />VBA<br>
	    <input   type="checkbox" name="tools-technology[]" value="R" />R<br>
	    <input   type="checkbox" name="tools-technology[]" value="Python" />Python<br>
	    <input   type="checkbox" name="tools-technology[]" value="SQL" />SQL<br>
	    <input   type="checkbox" name="tools-technology[]" value="SAS" />SAS<br>
	    <input   type="checkbox" name="tools-technology[]" value="SPSS" />SPSS<br>
	    <input   type="checkbox" name="tools-technology[]" value="Tableau" />Tableau<br>
	    <input   type="checkbox" name="tools-technology[]" value="Qlikview" />Qlikview<br>
	    <input   type="checkbox" name="tools-technology[]" value="PowerBI" />PowerBI&emsp;&emsp;<br>
	    <input   type="checkbox" name="tools-technology[]" value="Microstrategy" />Microstrategy<br>
	    <input   type="checkbox" name="tools-technology[]" value="Sisense" />Sisense<br>
	    <input   type="checkbox" name="tools-technology[]" value="Alteryx" />Alteryx<br>
	    <input   type="checkbox" name="tools-technology[]" value="Informatica" />Informatica<br>
	    <input   type="checkbox" name="tools-technology[]" value="Spark" />Spark<br>
	    <input   type="checkbox" name="tools-technology[]" value="Hive" />Hive<br>
	    <input   type="checkbox" name="tools-technology[]" value="Hadoop" />Hadoop<br>
	    <input   type="checkbox" name="tools-technology[]" value="MongoDB" />MongoDB<br>
	    <input   type="checkbox" name="tools-technology[]" value="AWS" />AWS&emsp;&emsp;<br>
	    <input   type="checkbox" name="tools-technology[]" value="Java" />Java<br>
	    <input   type="checkbox" name="tools-technology[]" value="C/C++" />C/C++<br>  
	</label>
	<br>	
	<label for="func-areas" ><h4>What are the different functional areas covered in the course from analytics perspective?(Choose all that apply)</h4>
	    <input   type="checkbox" name="func-areas[]" value="Retail" />Retail<br>
	    <input   type="checkbox" name="func-areas[]" value="Banking and Financial Services" />Banking and Financial Services<br>
	    <input   type="checkbox" name="func-areas[]" value="Healthcare" />Healthcare<br>
	    <input   type="checkbox" name="func-areas[]" value="Credit Risk" />Credit Risk<br>
	    <input   type="checkbox" name="func-areas[]" value="Operations and Supply Chain" />Operations and Supply Chain&emsp;&emsp;<br>
	    <input   type="checkbox" name="func-areas[]" value="Human Resources" />Human Resources<br>
	    <input   type="checkbox" name="func-areas[]" value="Product Analytics" />Product Analytics<br>
	    <input   type="checkbox" name="func-areas[]" value="FinTech" />FinTech<br>
	    <input   type="checkbox" name="func-areas[]" value="EduTech" />EduTech<br>
	    <input   type="checkbox" name="func-areas[]" value="AgriTech" />AgriTech<br>
	    <input   type="checkbox" name="func-areas[]" value="Manufacturing" />Manufacturing<br>
  	    <input   type="checkbox" name="func-areas[]" value="Gaming" />Gaming<br>
	    <input   type="checkbox" name="func-areas[]" value="Sports" />Sports<br>
	</label>
	<br>	
	<h4>As observed by you, please rate the course on below parameters on a scale of 1-5, 5 being the highest and 1 being the lowest</h4>
	How would you rate your overall satisfaction of the course?<br>
	<input type="radio" name="satisfaction" value=1 >1&emsp; <input type="radio" name="satisfaction" value=2 >2&emsp; <input type="radio" name="satisfaction" value=3 >3&emsp; <input type="radio" name="satisfaction" value=4 >4&emsp; <input type="radio" name="satisfaction" value=5 >5<br><br>
	How good was the course in terms of value for money?	<br>
	<input type="radio" name="money-val" value=1 >1&emsp; <input type="radio" name="money-val" value=2 >2&emsp; <input type="radio" name="money-val" value=3 >3&emsp; <input type="radio" name="money-val" value=4 >4&emsp; <input type="radio" name="money-val" value=5 >5<br><br>
	How closely were your objectives of joining the course met?<br>
	<input type="radio" name="obj_met" value=1 >1&emsp; <input type="radio" name="obj_met" value=2 >2&emsp; <input type="radio" name="obj_met" value=3 >3&emsp; <input type="radio" name="obj_met" value=4 >4&emsp; <input type="radio" name="obj_met" value=5 >5<br><br>
	How beneficial was the course in improving your financial compensation at workplace?<br>
	<input type="radio" name="money-out" value=1 >1&emsp; <input type="radio" name="money-out" value=2 >2&emsp; <input type="radio" name="money-out" value=3 >3&emsp; <input type="radio" name="money-out" value=4 >4&emsp; <input type="radio" name="money-out" value=5 >5<br><br>
	How likely are you to recommend this course to others?<br>
	<input type="radio" name="recommend" value=1 >1&emsp; <input type="radio" name="recommend" value=2 >2&emsp; <input type="radio" name="recommend" value=3 >3&emsp; <input type="radio" name="recommend" value=4 >4&emsp; <input type="radio" name="recommend" value=5 >5<br><br>

	

	<label for="college-support"><h4>Did your college provide support for final placement?</h4>
		<select id="college-support" name="college-support"  >
		<option value="">Select from the dropdown below</option>
		<option value="Yes, the college carried out the entire process">Yes, the college carried out the entire process</option>
		    <option value="Ocassional emails were sent">Ocassional emails were sent</option>
		    <option value="No help">No help</option>
	  	</select>
	</label><br>	
	<br>

	
	<label for="average-salary"><h4>As per your knowledge, what was the average salary during the placements of your/previous batch?</h4>
	<select id="average-salary" name="average-salary" require="required" >
		<option value="">Select from the dropdown below</option>
		<option value="Less than 5 INR Lacs"> Less than 5 INR Lacs</option>
		    <option value="INR 5 lacs to INR 8 lacs">INR 5 lacs to INR 8 lacs</option>
		    <option value="INR 8 lacs to INR 10 lacs">INR 8 lacs to INR 10 lacs</option>
		    <option value="INR 10 lacs to INR 15 lacs">INR 10 lacs to INR 15 lacs</option>
		    <option value="INR 15 lacs to INR 20 lacs">INR 15 lacs to INR 20 lacs</option>
		    <option value="INR 20 lacs to INR 25 lacs">INR 20 lacs to INR 25 lacs</option>
		    <option value="More than INR 25 lacs">More than INR 25 lacs </option>
		    <option value="not aware">I am not aware of the numbers</option>
	  	</select>
	</label><br>
	<br>
	<label for="user-review"><h4>Any suggestion for the people who are aspiring for this course?</h4>
		<input id="user-review" type="text" name="user-review"  required="required" value="<?php echo ""; ?>">
	</label><br>
	Your suggestions can be extremely helpful for anyone aspiring to take this course<br>
	
	<label for="user-email"><h4>Email</h4>
		<input type="email" id="user-email" name="user-email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required="required">
	</label>
	<label for="linkedin-url"><h4>Your Linkedin URL or any other verifiable URL so that we know the reviews are submitted by genuine students/alums</h4>
		<input id="linkedin-url" type="url" name="linkedin-url" required="required">
	</label>
	
	<label for="token"><h4>As a token of gratitude for filling this feedback form, we would like to extend you a FREE subscription of our data science courses. Please choose the course you want to enroll for:</h4>
		<select id="token" name="token"  >
		<option value="">Select from the dropdown below</option>
		<option value="Statistics">Statistics</option>
		<option value="Logistic Regression">Logistic Regression</option>
		<option value="Simulation Using Python">Simulation Using Python</option>
	  	</select>
	</label>
	<br><br>
	<input type="submit" name="submit" value="Submit">
</form>





<?php
	
if ( isset( $_POST['submit'] ) ) {

	/*$name = test_input($_POST["user-name"]);
	if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
	  $nameErr = "Only letters and white space allowed";
	  echo $nameErr;
	}*/ //Name credentials
	$review_id    = 1;
	$user_id    = $GLOBALS['wpdb']->get_row("SELECT reviewer_id FROM wp_reviewers WHERE email = '".$_POST['user-email']."'");
	
	$course_id    = 1;
	$posts = $GLOBALS['wpdb']->get_row("SELECT course_id FROM wp_courses WHERE name = '".$_POST['course-name']."' AND institution= '".$_POST['course-institution']."' AND city= '".$_POST['course-location']."' AND mode= '".$_POST['course-mode']."' AND department= '".$_POST['course-dept']."'"); 
	$name = ( ! empty( $_POST['user-name'] ) ) ? sanitize_text_field( $_POST['user-name'] ) : '';
	$rev = ( ! empty( $_POST['user-review'] ) ) ? sanitize_text_field( $_POST['user-review'] ) : '';
	if($user_id ->reviewer_id==0){
		$GLOBALS['wpdb']->insert($wpdb->prefix."reviewers",
            array('name' => $name,
		'email' =>  $_POST['user-email'],
		'linkedin' =>$_POST['linkedin-url'],
		'token' =>$_POST['token']  
            )
        );
	}
	if($_POST["flag"]=='')
		$_POST["flag"]=0;
	$user_id    = $GLOBALS['wpdb']->get_row("SELECT reviewer_id FROM wp_reviewers WHERE email = '".$_POST['user-email']."'");
	date_default_timezone_set('Asia/Kolkata');
	$objective="";
	if(!empty($_POST['objective']))
        {
            foreach($_POST['objective'] as $chkval)
            {
                $objective.=($chkval.".");
            }
        }
	$funcareas="";
	if(!empty($_POST['func-areas']))
        {
            foreach($_POST['func-areas'] as $chkval)
            {
                $funcareas.=($chkval.".");
            }
        }
	$toolstechnology="";
	if(!empty($_POST['tools-technology']))
        {
            foreach($_POST['tools-technology'] as $chkval)
            {
                $toolstechnology.=($chkval.".");
            }
        }
	try{
	$GLOBALS['wpdb']->insert(
            $wpdb->prefix."review",
            array('course_id'   =>$posts->course_id,
                'user_id' => $user_id->reviewer_id,
		'rev' => $rev,
		'time' => date("Y-m-d H:i:s",time ()),
		'status' =>$_POST["course-status"],
		'completion_year' =>$_POST["course-completion"],
		'mode' =>$_POST["course-mode"],
		'internship' =>$_POST["course-internship"],
		'objective' =>$objective,
		'guest_lecture' =>$_POST["guest-lectures"],
		'projects' =>$_POST["project-work"],
		'gender_diversity' =>$_POST["gender-diversity"],
		'edu_diversity' =>$_POST["edu-diversity"],
		'prof_diversity' =>$_POST["prof-diversity"],
		'tools_tech' =>$toolstechnology,
		'satisfaction' =>$_POST["satisfaction"],
		'money_value' =>$_POST["money-val"],
		'objectives_met' =>$_POST["obj_met"],
		'financial_improvement' =>$_POST["money-out"],
		'functional_areas' =>$funcareas,
		'clg_support_placement' =>$_POST["college-support"],
		'avg_salary' =>$_POST["average-salary"],
		'reccomend_others' =>$_POST['recommend']
            )
        ); 
	}catch(Exception $ex){
		echo 'Query failed', $ex->getMessage();
	}
	require 'PHPMailerAutoload.php';
	require 'credentials.php';

			$mail = new PHPMailer;

		        $mail->SMTPDebug = 4;                               // Enable verbose debug output

			$mail->isSMTP();                                      // Set mailer to use SMTP
			$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
			$mail->SMTPAuth = true;                               // Enable SMTP authentication
			$mail->Username = EMAIL;                 // SMTP username
			$mail->Password = PASS;                           // SMTP password
			$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
			$mail->Port = 587;                                    // TCP port to connect to

			$mail->setFrom(EMAIL, 'Shuvo Paul');
			$mail->addAddress('subh123paul@gmail.com');     // Add a recipient

			$mail->addReplyTo(EMAIL);
			$mail->isHTML(true);                                  // Set email format to HTML
			$mail->Subject ="New Review submitted by ".$_POST['user-name'];
			$mail->Body    = "Review: ".$rev;
			$mail->AltBody = "Hey there";

			if(!$mail->send()) {
			    echo 'Message could not be sent.';
			    echo 'Mailer Error: ' . $mail->ErrorInfo;
			} else {
			    echo 'Message has been sent';
			}
			$mail->ClearAddresses();
			$mail->addReplyTo(EMAIL);
			$mail->addAddress($_POST['user-email']);                                // Receipent address
			$mail->Subject ="Thanks! for submitting review";
			$mail->Body    =  "Best wishes for your future endeavour";
			$mail->AltBody = "Hey there";

			if(!$mail->send()) {
			    echo 'Message could not be sent.';
			    echo 'Mailer Error: ' . $mail->ErrorInfo;
			} else {
			    echo 'Message has been sent';
			}


	$location = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
	wp_safe_redirect( $location );
	exit; 
} 
	

	get_footer();
?>
