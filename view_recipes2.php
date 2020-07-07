<?php

$page_title = 'View All Recipes';
include("includes/header.php");

require('connect_to_database.php');

//determine the correct recipe and retrieve from databas
$id = $_GET['recipe_id'];

$q = "SELECT recipe_id, recipe_name, creator, ingredients, directions, date_submitted FROM all_recipes WHERE recipe_id=".$id."  LIMIT 1";
$r = @mysqli_query($dbc, $q);

$f = mysqli_fetch_array($r, MYSQLI_ASSOC);

//print the recipe name, creator, ingredients, and directions
echo '<h1>'. $f["recipe_name"] . '</h1>
	<p style="margin-top: 1%;" >From: ' . $f["creator"] . '</p>
	<div id="ingdir">
	<h2 style="margin: 1% 0% 0% 15%; width: 20%; text-align: center" >Ingredients</h2>
	<h2 style="margin: 1% 0% 0% 10%; width: 40%; text-align: center" >Directions</h2>
	<p style="margin: 1% 0% 0% 15%; width: 20%; text-align: left" >' . $f["ingredients"] . '</p>
	<p style="margin: 1% 0% 0% 10%; width: 40%; text-align: justify" >' . $f["directions"] . '</p>
	</div>
	<p style="margin-top: 15%; float: left"><a href="javascript:history.go(-1)" >back</a></p>
	</div>';
	
mysqli_close($dbc);

include("includes/footer.html");

?>
