<?php

$page_title = 'Edit Recipe';
include("includes/header.php");

//connect
require('connect_to_database.php');

//define information from form as variables
$oldname = $_POST['oldname'];
$newname = $_POST['newname'];

if (empty($_POST['newcreator'])) {
	$newcreator = $_POST['oldcreator'];
} else {
	$newcreator = $_POST['newcreator'];
}
if (empty($_POST['newingredients'])) {
	$newingredients = $_POST['oldingredients'];
} else {
	$newingredients = $_POST['newingredients'];
}
if (empty($_POST['newdirections'])) {
	$newdirections = $_POST['olddirections'];
} else {
	$newdirections = $_POST['newdirections'];
}

//update with users input
if (isset($newname) or isset($newingredients) or isset($newdirections)){
	$qu = "UPDATE all_recipes 
	SET recipe_name = '$newname', creator = '$newcreator', ingredients = '$newingredients', directions = '$newdirections' 
	WHERE recipe_name = '$oldname'
	LIMIT 1";
	$re = @mysqli_query($dbc, $qu);
	echo "<p class='feedback' >This change was executed successfully.  You can view the changes in the \"View All\" tab.</p>";
} else {
	echo "<p class='feedback' >You did not make any changes.</p>";
}


mysqli_close($dbc);

include("includes/footer.html");

?>