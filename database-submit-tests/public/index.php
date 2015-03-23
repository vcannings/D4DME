<!-- V: Including several files into the index file using a php function -->
<?php require_once("../includes/connect.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php include_once("../includes/templates/header.php"); ?> 

<div id="wrapper">
    <div id="header">
        <h3>WEBSITE</h3>
        <a href="signup.php" class="buttonExample" style="float: right;">Sign Up</a>
        <br>
        <a href="login.php" class="buttonExample" style="float: right"> Log In</a>
    </div><br><br><br><br>
    <div id="container">
    <?php
	        if(isset($_GET["cuisine"])) { // V: If the cusine search has been pressed, select all that match the search for the cuisine column
		        $query = "SELECT * FROM recipe WHERE recipe_culture LIKE '%{$_GET["cuisine"]}%'"; 
	        } else if(isset($_GET["ingredient"])) { // V: If the ingredients search has been pressed, select all that match the search for the ingredients column
				$query = "SELECT * FROM recipe WHERE recipe_ingredients LIKE '%{$_GET["ingredient"]}%'";
            } else if(isset($_GET["allergy"])) { // V: If the allergy search has been pressed, select all that match the search for the allergy column
				$query = "SELECT * FROM recipe WHERE recipe_allergy LIKE '%{$_GET["allergy"]}%'";
            } else if(isset($_GET["cooktime"])) { // V: If the cooktime search has been pressed, select all that match the search for the cooktime column
				$query = "SELECT * FROM recipe WHERE recipe_cooktime LIKE '%{$_GET["cooktime"]}%'";
	        } else { // V: Otherwise display all recipes
		        $query = "SELECT * FROM recipe"; // V: The query is selecting all the data from the recipe table
	        }

			$result = mysqli_query($connection, $query);// V: defining the variable result by putting our connection variable and our query variable through a function
			if(!$result) { // V: If the query doesn't work, kill the connection and feedback to user
				die("Database query failed.");
			}

		    while($row = mysqli_fetch_assoc($result)) { // V: whilst our query works, include recipe.php to display data
		    	include 'recipe.php';
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
    
<a href="submit.php" class="buttonExample">Submit your own!</a>
    
</div>

    <div id="footer">
    </div>
</div>

<?php include_once("../includes/templates/footer.php"); ?>    
