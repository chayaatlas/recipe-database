<?php

$page_title = 'Edit Recipe';
include("includes/header.php");

//enable connection with database
require('connect_to_database.php');

//make sure the user entered an id or name
if (isset($_POST['search'])) {

	$search = $_POST['search'];
	
	//find the correct record
	$q = "SELECT recipe_name, creator, ingredients, directions FROM all_recipes WHERE recipe_name = '$search' LIMIT 1";
	$r = @mysqli_query($dbc, $q);
	$num = @mysqli_num_rows($r);
	$the_query = mysqli_fetch_array($r, MYSQLI_ASSOC);
	
	//print a new form to submit old information into, and make the old information hidden input
	if ($num == 1) {
		echo '<form action="handle_edit_recipe2.php" method="post" >
		<input type = hidden name="oldname" value = '.$search.' />
		<input type = hidden name="oldcreator" value = '.$the_query['creator'].' />
		<input type = hidden name="oldingredients" value = '.$the_query['ingredients'].' />
		<input type = hidden name="olddirections" value = '.$the_query['directions'].' />
		<table>
		<tr>
			<!--labels and input feilds-->
		<tr>
			<td height="20"></td>
			<td height="20"></td>
			<td height="20"></td>
			<td height="20"></td>
			<td height="20"></td>
			<td height="20"></td>
			<td height="20"></td>
			<td height="20"></td>
			<td height="20"></td>
			<td height="20"></td>
			<td height="20"></td>
			<td height="20"></td>
			<td height="20"></td>
		</tr>
			<th>Name:</th>
			<td></td>
			<td colspan="4"><input type="text" name="newname" value = '.$the_query['recipe_name'].' ></td>
			<td></td>
			<th>Creator:</th>
			<td></td>
			<td colspan="4"><input type="text" name="newcreator" value ='.$the_query['creator'].' ></td>
		</tr>
		<tr>
			<td height="10"></td>
			<td height="10"></td>
			<td height="10"></td>
			<td height="10"></td>
			<td height="10"></td>
			<td height="10"></td>
			<td height="10"></td>
			<td height="10"></td>
			<td height="10"></td>
			<td height="10"></td>
			<td height="10"></td>
			<td height="10"></td>
			<td height="10"></td>
		</tr>
		<tr>
			<!--labels and textarea-->
			<th colspan="4">Ingredients:</th>
			<td></td>
			<th colspan="8">Directions:</th>
		</tr>
		<tr>
			<td colspan="4" rowspan="6">
		<textarea name="newingredients" rows="10" >'.$the_query["ingredients"].'</textarea></textarea></td>
			<td></td>
			<td colspan="8" rowspan="6">
		<textarea name="newdirections" cols="40" rows = "10" >'.$the_query["directions"].'</textarea></td>
		</tr>
		<tr>
			<td></td>
		</tr>
		<tr>
			<td></td>
		</tr>
		<tr>
			<td></td>
		</tr>
		<tr>
			<td></td>
		</tr>
		<tr>
			<td></td>
		</tr>
		<tr>
			<td></td>
		</tr>
		</table>
		<input type="submit" name="submit" value="Edit" />
		</form>';
	} else {
		//if didn't input (existing) name, return error message
		echo "<p class='feedback' >You did not enter a valid recipe name.  Please try again.</p>";
		echo "<p><a href='edit_recipe.php' >go back</a></p>";
	}
	
} else {
	echo "<p class='feedback' >You did not enter a recipe name.  Please try again.</p>";
	echo "<p><a href='edit_recipe.php' >go back</a></p>";
}

include("includes/footer.html");

?>