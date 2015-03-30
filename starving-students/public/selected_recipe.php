<!-- V: Including several files into the index file using a php function -->
<?php require_once("../includes/connect.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php include_once("../includes/templates/header.php"); ?> 
<?php
    if(isset($_GET["recipe_id"])) {
    $recipeID = $_GET["recipe_id"];
    } else {
        redirectTo("index.php");
    
    }
?>


<div id="wrapper">
    <div id="header">
        <h3>WEBSITE</h3>
        <?php if(isset($_SESSION["user"])) { ?>
        	<a href="logout.php" class="buttonExample" style="float: right;">Logout</a>
        <?php } else { ?>
		<a href="signup.php" class="buttonExample" style="float: right;">Sign Up</a>
	        <a href="login.php" class="buttonExample" style="float: right"> Log In</a>
	<?php } ?>
		
    </div><br><br><br><br>
    <p><?php echo message(); ?></p>    
    
    <div id="container">
      
        <?php 
            $result = GetSingleRecipe($recipeID);
            
            while($row = mysqli_fetch_assoc($result)) {
                include 'recipe_large.php';
            }
        ?>
   
    </div>
    
<div id="search-bar">
    <h2>Find a recipe</h2>
    <hr>
    <form method="get" name="cooktime" action="index.php">
      <label>Cook Time</label><br>
      <input type="text" name="cooktime" placeholder="e.g 30 minutes" size="12" maxlength="120">
      <input type="submit" value="Search">
    </form>
    <br>
  <form method="get" name="cuisine" action="index.php">
      <label>Cuisine</label><br>
      <input type="text" name="cuisine" placeholder="e.g Italian" size="12" maxlength="120">
      <input type="submit" value="Search">
    </form>
    <br>
<form method="get" name="ingredient" action="index.php">
      <label>Ingredients</label><br>
      <input type="text" name="ingredient" placeholder="e.g Chicken" size="12" maxlength="120">
      <input type="submit" value="Search">
    </form>
    <br>
<form method="get" name="allergy" action="index.php">
      <label>Allergy Warning?</label><br>
      <input type="text" name="allergy" placeholder="Yes/No" size="12" maxlength="120">
      <input type="submit" value="Search">
    </form>
    <br>
    <?php if(isset($_SESSION["user"])) { ?>
<a href="submit.php" class="buttonExample">Submit your own!</a>
    <?php } else { ?>
    <?php } ?>
</div>

    <div id="footer">
    </div>
</div>

<?php include_once("../includes/templates/footer.php"); ?> 
