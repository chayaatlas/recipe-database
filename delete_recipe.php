<?php
$page_title = 'Delete Recipe';
include ("includes/header.php");
?>
<h1>Delete a Recipe</h1>
<p>Enter the name of the recipe you would like to delete.</p>
<!--insert form-->
<form action="handle_delete_recipe.php" method="post" >
	<label for="search" >Recipe:</label>
	<input type="text" name="search">
	<input type="submit" name="submit" value="Delete" />
</form>
</div>
</div>
<?php
include ("includes/footer.html");
?>