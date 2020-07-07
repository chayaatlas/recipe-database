<?php

$page_title = 'Add Recipe';
include("includes/header.php");

//enable connection with database
require('connect_to_database.php');

//make sure all fields were filled out
if (empty($_POST['name']) or empty($_POST['ingredients']) or empty($_POST['creator']) or empty($_POST['directions'])) {
	echo "<p class='feedback' >You did not enter the required data.  Please try again.</p>";
	echo "<p><a href='add_recipe.php' >go back</a></p>";
} else {
	//declare input as variables
	$name = $_POST['name'];
	$creator = $_POST['creator'];
	$ingredients = $_POST['ingredients'];
	$directions = $_POST['directions'];
	
	//what is the last recipe_id?
	$highest_query = "SELECT recipe_id AS id FROM all_recipes ORDER BY recipe_id DESC LIMIT 1";
	$run_highest = @mysqli_query($dbc, $highest_query);
	$the_query = mysqli_fetch_array($run_highest, MYSQLI_ASSOC);
	$id = $the_query['id']+1;
	
	//add submission to database
	$q = "INSERT INTO all_recipes (recipe_id, recipe_name, creator, ingredients, directions, date_submitted) 
	VALUES ('$id', '$name', '$creator', '$ingredients', '$directions', DATE_FORMAT(NOW(), '%b %e, %Y %h:%i' ))";
	$r = @mysqli_query($dbc, $q);
	echo "<p class='feedback' >This recipe has been added successfully.  You can view it in the \"View Recipes\" tab.</p>";
}

mysqli_close($dbc);

include("includes/footer.html");

?>