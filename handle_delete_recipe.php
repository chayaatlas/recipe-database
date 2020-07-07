<?php

$page_title = 'Delete Recipe';
include("includes/header.php");

//enable connection with database
require('connect_to_database.php');

//make sure the user entered an id or name
if (isset($_POST['search'])) {

	$search = $_POST['search'];
	
	//find the correct record
	$q = "SELECT recipe_name, ingredients, directions FROM all_recipes WHERE recipe_name = '$search' LIMIT 1";
	$r = @mysqli_query($dbc, $q);
	$num = @mysqli_num_rows($r);
	$the_query = mysqli_fetch_array($r, MYSQLI_ASSOC);
	
	//ask user if he really wants to delete
	if ($num == 1) {
		echo '<p class="feedback" >Are you sure you want to PERMENANTLY delete this recipe?</p>';
		echo '<form action="handle_delete_recipe2.php" method="post" >
			<input type="hidden" name="name" value = '.$search.' />
			<input type="submit" name="delete" value="Yes" style="margin: 0% 5%; width: 4%; padding: 5px" />
			<input type="submit" name="delete" value="No" style="margin: 0% 5%; width: 4%; padding: 5px" />
			</form>';
	} else {
		echo "<p class='feedback' >You did not enter a valid recipe name.  Please try again.</p>";
		echo "<p><a href='delete_recipe.php' >go back</a></p>";
	}
	
} else {
	echo "<p class='feedback' >You did not enter a recipe name.  Please try again.</p>";
		echo "<p><a href='delete_recipe.php' >go back</a></p>";
}

include("includes/footer.html");

?>