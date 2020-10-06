<?php
/**
 * Template Name: WordPressCourseUpdate Form
 */
ob_start();
get_header();
?>
<form action="http://localhost/blog/index.php/course-update-form/" method="post" enctype="multipart/form-data">
	<label for="course-name"><h4>Course Name</h4>
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
	<label for="course-institution"><h4>Course Institution</h4>
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
	<label for="course-location"><h4>Course City</h4>
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
	<label for="course-mode"><h4>Course Mode</h4>
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
	<input type="submit" name="submit" value="Update">
</form>

<?php  	
get_footer();
?>
