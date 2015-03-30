<!-- V: Including several files into the index file using a php function -->
<?php require_once("../includes/connect.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php include_once("../includes/templates/header.php"); ?> 
        <div class="container">
            <div class="header">
                <div class="logo">
                      <img src="images/Logo.png">
                </div>
                <div class="title">
                    <h1>STARVING STUDENTS</h1>
                    <img src="images/chalk-boarder.png">
                </div>
                <div class="menu-glyph">
                    <img src="images/chalk-boarder.png"/>
                </div>
            </div>
            <div class="nav-bar-left">
                <ul>
                    <li><a href="home.php">About</a></li>
                    <li><a href="index.php">Menu</a></li>
                </ul>
            </div>
            <div class="nav-bar-right">
                <ul>
                   <?php if(isset($_SESSION["user"])) { ?>
                    <li><a href="logout.php">Logout</a></li>
                    <?php } else { ?>
                    <li><a href="login.php">Log in</a></li>
                    <li><a href="signup.php">Sign Up</a></li>
                    <?php } ?>
                </ul>
            </div>
            <div id="message">
            <p><?php echo message(); ?></p>
            </div>
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
            
            <div class="content-container">
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
        <div class="footer"></div>
<?php include_once("../includes/templates/footer.php"); ?> 