<?php
$page_title = 'Add Recipe';
include ("includes/header.php");
?>
<h1>Add a Recipe</h1>
<!--form-->
<form action="handle_add_recipe.php" method="post" >
	<table>
	<tr>
		<!--insert labels and input feilds-->
		<th>Name:</th>
		<td></td>
		<td colspan="4"><input type="text" name="name"></td>
		<td></td>
		<th>Creator:</th>
		<td></td>
		<td colspan="4"><input type="text" name="creator"></td>
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
		<!--insert labels and textarea-->
		<th colspan="4">Ingredients:</th>
		<td></td>
		<th colspan="8">Directions:</th>
	</tr>
	<tr>
		<td colspan="4" rowspan="4"><textarea name="ingredients" rows="7" ></textarea></td>
		<td></td>
		<td colspan="8" rowspan="4"><textarea name="directions" rows="7" cols="40"></textarea></td>
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
	<input type="submit" name="submit" class="submit" value="Add" />
</form>
</div>
</div>
<?php
include ("includes/footer.html");
?>