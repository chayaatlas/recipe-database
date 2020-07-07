<html>
<head>
	<title><?php echo $page_title; ?></title>
	<link rel="stylesheet" href="includes/style.css" />
</head>

<body>
	<!--create header-->
	<div id="header_and_content">
	<div id="header">
		<h1>My Recipe Collection</h1>
	</div>
	<!--create navigation pane-->
	<div id="nav">
		<ul>
			<li><a href="add_recipe.php">Add a Recipe</a></li>
			<li><a href="edit_recipe.php">Edit a Recipe</a></li>
			<li><a href="delete_recipe.php">Delete a Recipe</a></li>
			<li><a href="view_recipes.php">View all</a></li>
		</ul>
	</div>
	<!--put all future content in a div called "content"-->
	<div id="content">