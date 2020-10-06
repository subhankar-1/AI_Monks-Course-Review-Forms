s<?php
/**
 * Template Name: WordPressCourseCatalog Form
 */
ob_start();
get_header();

//$c = $GLOBALS['wpdb']->get_results("SELECT * FROM wp_courses");
//for ($i=0, $len=count($c); $i<$len; $i++) echo $c[$i]->name; 
//Here we make the course search option->we will use it at multiple places  http://localhost/blog/index.php/dynamic-page 
?>
<form action="http://localhost/blog/index.php/dynamic-page" method="post" enctype="multipart/form-data"> 
        <label for="course-name">Course Name<br>
        <input  list="course-namee" id="course-name" name="course-name" required> 
        <datalist id="course-namee" name="course-namee">
	<?php 
	$c = $GLOBALS['wpdb']->get_results("SELECT * FROM wp_courses");
	for ($i=0, $len=count($c); $i<$len; $i++){?> 
            <option data-value=<?php  echo $c[$i]->course_id; ?>> <?php echo $c[$i]->name; ?> </option> 
	<?php
	}?>
        </datalist> 
	</label>
	<br>
	<label for="institution">Institution Name<br>
        <input list="institution-namee" id="institution" name="institution" required> 
        <datalist id="institution-namee" name="institution-namee">
	<?php 
	$c = $GLOBALS['wpdb']->get_results("SELECT * FROM wp_courses");
	for ($i=0, $len=count($c); $i<$len; $i++){?> 
            <option data-value=<?php  echo $c[$i]->course_id; ?>> <?php echo $c[$i]->institution; ?> </option> 
	<?php
	}?>
        </datalist> 
	</label>
	<br>
	<input type="submit" name="submit" value="Details">
</form> 
<hr><hr>
<form action="http://localhost/blog/index.php/dynamic-page" method="post" enctype="multipart/form-data"> 
<?php
	$coursed = $GLOBALS['wpdb']->get_results("SELECT * FROM wp_courses");
	for ($i=0, $len=count($coursed); $i<$len; $i++){?> 
			<table border = "1">
			<tr> <td>Course Name: </td><td><?php echo $coursed[$i]->name; ?></td> </tr>
			<tr> <td>Course institution: </td><td><?php echo $coursed[$i]->institution; ?></td>  </tr>
			<tr> <td>Course duration: </td><td><?php echo $coursed[$i]->duration; ?></td>  </tr>
			<tr> <td>Course fee: </td><td><?php echo $coursed[$i]->fee; ?></td>  </tr>
			<tr> <td>Course mode: </td><td><?php echo $coursed[$i]->mode; ?></td>  </tr>
			<tr> <td>Course location: </td><td><?php echo $coursed[$i]->location; ?></td>  </tr>
			<tr> <td>Course level: </td><td><?php echo $coursed[$i]->Level; ?></td> </tr>
			</table>
	<button type="submit" name=<?php echo $coursed[$i]->course_id;?> value=<?php echo $coursed[$i]->course_id;?>>Details</button>
	<hr><hr>
	<?php
	}?>
</form> 
<?php
get_footer();
?>
