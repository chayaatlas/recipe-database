<?php

$page_title = 'View All Recipes';
include("includes/header.php");

//create function to transform underscores into spaces
function space($astring) {
	$newstring = str_replace('_', ' ', $astring);
	return $newstring;
}

require("connect_to_database.php");

// Determine the sort...
// Default is by id
$sort = (isset($_GET['sort'])) ? $_GET['sort'] : 'recipe_name';

// Determine the sorting order:
switch ($sort) {
	case 'recipe_name':
		$order_by = 'recipe_name ASC';
		break;
	case 'creator':
		$order_by = 'creator ASC';
		break;
	case 'date':
		$order_by = 'date_submitted ASC';
		break;
	default:
		$order_by = 'recipe_name ASC';
		$sort = 'recipe_name';
		break;
}

//count records
$q = "SELECT COUNT(recipe_id) FROM all_recipes";
$r = @mysqli_query($dbc, $q);
$num = @mysqli_fetch_array($r, MYSQLI_NUM)[0];

//paginate
$display = 10;

//how many pages are there?
if (isset($_GET['p']) and is_numeric($_GET['p'])) {
	//if you have it already, use it
	$pages = $_GET['p'];
} else {
	if ($num > $display) { //more records than space on a page
		$pages = ceil ($num/$display);
	} else {
		$pages = 1;
	}
}

//where to start
if (isset($_GET['s']) and is_numeric($_GET['p'])) {
	//if you have it already, use it
	$start = $_GET['s'];
} else {
	$start = 0;
}

//make sure there is data in the database
if ($num < 1) {
	echo "<p>There are no recipes.</p>";
} else {
	if ($num == 1) {
		echo "<p>There is one recipe.</p>";
	} else {
		echo "<p>There are $num recipes.</p>";
	}
	echo "<p style='margin-top:1%'>Click on any recipe name to view the full recipe.</p>";
	
	$q2 = "SELECT recipe_id, recipe_name, creator, ingredients, directions, date_submitted FROM all_recipes WHERE 1 ORDER BY ". $order_by ." LIMIT ". $start.", ".$display;
	$r2 = @mysqli_query($dbc, $q2);
	
	//print a table of the recipes
	echo "<table><tr>
	<th class='tabled' ><a href='view_recipes.php?sort=recipe_name'>Recipe Name</a></th>
	<th class='tabled' ><a href='view_recipes.php?sort=creator'>Creator</a></th>
	<th class='tabled' ><a href='view_recipes.php?sort=date'>Date Created</a></th>";
	while ($row = mysqli_fetch_array($r2, MYSQLI_ASSOC)) {
		echo "<tr>
		<td class='tabled' align='left' ><a href='view_recipes2.php?recipe_id=". $row['recipe_id'] ."' >". space($row['recipe_name']) ."</a></td>
		<td class='tabled'  align='left' >". space($row['creator']) ."</td>
		<td class='tabled'  align='left' >". space($row['date_submitted']) ."</td>
		</tr>";
	}
	echo "</table>";
	mysqli_free_result($r);
}

mysqli_close($dbc);

//open up new div to contain page numbers
echo "<div id='page' >";

//make links to other pages, if necessary
if ($pages > 1) {
	
	//determine current page
	$current_page = ($start/$display) + 1;
	
	// If it's not the first page, make a Previous button:
	if ($current_page != 1) {
		echo '<p><a href="view_recipes.php?s=' . ($start - $display) . '&p=' . $pages . '&sort=' . $sort . '">Previous</a></p> ';
	}
	
	// Make all the numbered pages:
	for ($i = 1; $i <= $pages; $i++) {
		if ($i != $current_page) {
			echo '<p><a href="view_recipes.php?s=' . (($display * ($i - 1))) . '&p=' . $pages . '&sort=' . $sort . '">' . $i . '</a></p>';
		} else {
			echo '<p>'. $i . ' </p>';
		}
	} // End of FOR loop.
	
	// If it's not the last page, make a Next button:
	if ($current_page != $pages) {
		echo '<p><a href="view_recipes.php?s=' . ($start + $display) . '&p=' . $pages . '&sort=' . $sort . '">Next</a></p>';
	}
}
echo "</div></div></div>";

include("includes/footer.html");

?>