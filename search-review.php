<?php
/**
 * Template Name: SearchReview Form
 */
ob_start();
get_header();
?>
<form action="http://localhost/blog/index.php/admin-review-validation-form/" method="post" enctype="multipart/form-data"> 
	<input type="submit" name="submit" value="Show all pending reviews">
</form>
<br>
<br><hr>
<form action="http://localhost/blog/index.php/admin-review-validation-form/" method="post" enctype="multipart/form-data"> 
        <label for="namee">Search Review by Course Name<br>
        <input list="course-namee" id="namee" name="namee"> 
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
	<label for="institution">Search Review by Institution Name<br>
        <input list="institution-namee" id="institution" name="institution"> 
        <?php $c = $GLOBALS['wpdb']->get_results("SELECT * FROM wp_courses");
		$cc=array();
		for ($i=0, $len=count($c); $i<$len; $i++)
			array_push($cc,$c[$i]->institution);
		$cc=array_unique($cc);
		?>
		<datalist id="institution-namee" name="institution-namee">
		<?php
		foreach($cc as $key => $value){?> 
		    <option data-value=<?php  echo $value; ?>> <?php echo $value; ?> </option> 
		<?php
		}?>
        </datalist> 
	</label>
	<br>
	<input type="submit" name="submit" value="Show review"><br><hr><hr>
	<input type="submit" name="edit" value="Edit review">
</form> 
<hr><hr>

<?php
get_footer();
?>
