<?php

$page_title = 'Delete Recipe';
include("includes/header.php");

//connect
require('connect_to_database.php');

//if requested delete, delete
if ($_POST['delete'] == 'Yes') {
	
	$name = $_POST['name'];
	
	$q = "DELETE FROM all_recipes WHERE recipe_name = '$name' LIMIT 1";
	$r = @mysqli_query($dbc, $q);
	echo "<p class='feedback' >The recipe was deleted.</p>";

//if not, go back	
} else {
	echo "<script>window.history.go(-2)</script>";
}

include("includes/footer.html");

?>