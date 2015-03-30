<!-- V: Including several files into the index file using a php function -->
<?php require_once("../includes/connect.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php include_once("../includes/templates/header.php"); ?> 
        
            <div class="side-nav">
                <div class="side-nav-header">
                    <h2>FIND A RECIPE</h2>
                </div><br>
                <form method="get" name="cooktime" action="index.php">
      <label><strong>COOK TIME</strong></label><br>
      <input type="text" name="cooktime" placeholder="e.g 30 minutes" size="10" maxlength="120">
      <input type="submit" value="Search">
    </form>
    <br>
  <form method="get" name="cuisine" action="index.php">
      <label><strong>CUISINE</strong></label><br>
      <input type="text" name="cuisine" placeholder="e.g Italian" size="10" maxlength="120">
      <input type="submit" value="Search">
    </form>
    <br>
<form method="get" name="ingredient" action="index.php">
      <label><strong>INGREDIENTS</strong></label><br>
      <input type="text" name="ingredient" placeholder="e.g Chicken" size="10" maxlength="120">
      <input type="submit" value="Search">
    </form>
    <br>
<form method="get" name="allergy" action="index.php">
      <label><strong>ALLERGY WARNING?</strong></label><br>
      <input type="text" name="allergy" placeholder="Yes/No" size="10" maxlength="120">
      <input type="submit" value="Search">
    </form>
    <br><br>
    <?php if(isset($_SESSION["user"])) { ?>
<a href="submit.php">CREATE YOUR OWN</a>
    <?php } else { ?>
    <?php } ?>               
      <br><br><br>          
    </div>

<!-- V: This div is included in the index.php page to display each recipe seperately -->
<div class="content-container">
<div class="contentLarge">
    <h1><?php echo ($row["recipe_title"]); ?></a></h1>
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
    <img src="<?php echo $imageName; ?>" />
<!-- Asign either result as a variable and echo in imsge tags -->
    <h2>Cook time</h2><br><p><?php echo ($row["recipe_cooktime"]); ?></p><br><br>
    <h2>Cuisine</h2><br><p><?php echo ($row["recipe_culture"]); ?></p><br><br>
    <h2>Allergy warning</h2><br><p><?php echo ($row["recipe_allergy"]); ?></p><br><br>
    <h2>Description:</h2><br>
    <p><?php echo ($row["recipe_description"]); ?></p>
    <br><br>
    <h2>Ingredients:</h2><br>
    <p><?php echo ($row["recipe_ingredients"]); ?></p>
    <br><br><br><br>
    <h2>Instructions:</h2><br>
    <p><?php echo ($row["recipe_instructions"]); ?></p>
</div>
<br><br><br><br><br><br>
</div>
<br><br><br><br><br><br>
<?php include_once("../includes/templates/footer.php"); ?>