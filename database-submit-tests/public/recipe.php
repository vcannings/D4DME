<div class="recipe-box">
    <h1><?php echo ($row["recipe_title"]); ?></h1><hr> 
    <!-- V: our $row variable was introduced in index.php and is an array of all our table data -->
    <img src="images/Untitled.png" /><br>
    <h2>Cook time</h2><br><p><?php echo ($row["recipe_cooktime"]); ?></p><br><br>
    <h2>Cuisine</h2><br><p><?php echo ($row["recipe_culture"]); ?></p><br><br>
    <h2>Allergy warning</h2><br><p><?php echo ($row["recipe_allergy"]); ?></p><br><br><br><br>
    <h2>Description:</h2><br>
    <p><?php echo ($row["recipe_description"]); ?></p>
</div>
