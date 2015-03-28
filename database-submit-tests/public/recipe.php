<!-- V: This div is included in the index.php page to display each recipe seperately -->
<div class="recipe-box">
    <h1><a href="selected_recipe.php?recipe_id=<?php echo ($row["recipe_id"]); ?>"><?php echo ($row["recipe_title"]); ?></a></h1>
        <hr>
<!-- V: our $row variable was introduced in index.php and is an array of all our table data -->
	<?php
        if (!empty($row["recipe_image"])) { 
            $imageName = $row["recipe_image"];
        } else {
            $imageName = "images/Untitled.png";
        }
  	?>
    
<!-- V: The php block above is saying that if the recipe_image column is not empty then to use the URL in it, but if it is empty then use a default image -->
    <img src="<?php echo $imageName; ?>" /><br>
<!-- Asign either result as a variable and echo in imsge tags -->
    <h2>Cook time</h2><br><p><?php echo ($row["recipe_cooktime"]); ?></p><br><br>
    <h2>Cuisine</h2><br><p><?php echo ($row["recipe_culture"]); ?></p><br><br>
    <h2>Allergy warning</h2><br><p><?php echo ($row["recipe_allergy"]); ?></p><br><br><br><br>
    <h2>Description:</h2><br>
    <p><?php echo ($row["recipe_description"]); ?></p>
</div>
