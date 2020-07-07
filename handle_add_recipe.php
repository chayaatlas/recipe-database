<?php

$page_title = 'Add Recipe';
include("includes/header.php");

//enable connection with database
require('connect_to_database.php');

//make sure all fields were filled out
//if a field is empty or too long, give the option of going back
if (empty($_POST['name']) or empty($_POST['ingredients']) or empty($_POST['creator']) or empty($_POST['directions'])) {
	echo "<p class='feedback' >You did not enter the required data.  Please try again.</p>";
	echo "<p><a href='javascript:history.go(-1)' >go back</a></p>";
} else if (strlen($_POST['name']) > 50) {
	echo "<p class='feedback' >The name you entered exceeded the maximum length.  
		<br/>Please enter a name that is a maximum of 50 characters long.</p>";
	echo "<p><a href='javascript:history.go(-1)' >go back</a></p>";
} else if (strlen($_POST['creator']) > 25) {
	echo "<p class='feedback' >The creator you entered exceeded the maximum length.  
		<br/>Please enter a name that is a maximum of 25 characters long.</p>";
	echo "<p><a href='javascript:history.go(-1)' >go back</a></p>";
} else if (strlen($_POST['ingredients']) > 400) {
	echo "<p class='feedback' >The ingredients you entered exceeded the maximum length of 400 characters.</p>";
	echo "<p><a href='javascript:history.go(-1)' >go back</a></p>";
} else if (strlen($_POST['directions']) > 3000) {
	echo "<p class='feedback' >The directions you entered exceeded the maximum length of 3000 characters.</p>";
	echo "<p><a href='javascript:history.go(-1)' >go back</a></p>";
} else {
	//declare input as variables
	$name = $_POST['name'];
	$creator = $_POST['creator'];
	$ingredients = nl2br($_POST['ingredients']);
	$directions = nl2br($_POST['directions']);
	
	//does all_recipes exist?
	$exists = mysqli_query($dbc, "SELECT 1 FROM all_recipes");
	if (!$exists) { //if doesn't exist, create it
		$create_table = "CREATE TABLE `all_recipes` ( 
			`recipe_id` INT NOT NULL AUTO_INCREMENT , 
			`recipe_name` VARCHAR(50) NOT NULL , 
			`creator` VARCHAR(25) NOT NULL , 
			`ingredients` VARCHAR(400) NOT NULL , 
			`directions` VARCHAR(3000) NOT NULL , 
			`date_submitted` DATE NOT NULL , 
			PRIMARY KEY (`recipe_id`))";
		@mysqli_query($dbc, $create_table);
	}
	
	//what is the previous recipe_id?
	$highest_query = "SELECT recipe_id AS id FROM all_recipes ORDER BY recipe_id DESC LIMIT 1";
	$run_highest = @mysqli_query($dbc, $highest_query);
	$the_query = mysqli_fetch_array($run_highest, MYSQLI_ASSOC);
	$id = $the_query['id']+1;
	
	//add submission to database
	$q = "INSERT INTO all_recipes (recipe_id, recipe_name, creator, ingredients, directions, date_submitted) 
	VALUES ('$id', '$name', '$creator', '$ingredients', '$directions', NOW())";
	$r = @mysqli_query($dbc, $q);
	echo "<p class='feedback' >This recipe has been added successfully.  You can view it in the \"View All\" tab.</p>";
}

mysqli_close($dbc);

include("includes/footer.html");

?>
