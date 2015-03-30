<!-- V: This div is included in the index.php page to display each recipe seperately -->
 
<div class="content">
        
    <h1><a href="selected_recipe.php?recipe_id=<?php echo ($row["recipe_id"]); ?>"><?php echo ($row["recipe_title"]); ?></a></h1>
<!-- V: our $row variable was introduced in index.php and is an array of all our table data -->
	<?php
        if (!empty($row["recipe_image"])) { 
            $imageName = $row["recipe_image"];
        } else {
            $imageName = "images/Untitled.png";
        }
  	?>
    
<!-- V: The php block above is saying that if the recipe_image column is not empty then to use the URL in it, but if it is empty then use a default image -->
    <img src="<?php echo $imageName; ?>" />
<!-- Asign either result as a variable and echo in imsge tags -->
    <h2>Description:</h2>
    <p><?php echo ($row["recipe_description"]); ?></p>
    
    <?php if(isset($_SESSION["user"])) { ?>
    <?php if ($_SESSION["user_id"]==$row["recipe_user_id"]) {?>
        <div class="delete"><a href="delete_recipe.php?recipe_id=<?php echo $row["recipe_id"]; ?>" class="buttonExample">Delete?</a></div>
    <?php } ?>
    <?php } else { ?>
    <?php } ?>
</div>


                   