<?php
$page_title = 'Edit Recipe';
include ("includes/header.php");
?>

<h1>Edit a Recipe</h1>
<p>Enter the name of the recipe you would like to edit.</p>
<!--insert form-->
<form action="handle_edit_recipe.php" method="post" >
	<label for="search" >Recipe:</label>
	<input type="text" name="search">
	<input type="submit" name="submit" value="Edit" />
</form>
</div>
</div>

<?php
include ("includes/footer.html");
?>