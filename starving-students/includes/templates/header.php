<!DOCTYPE html>
<html lang="en-US">
    <head>
        <title>STARVING STUDENTS</title>
        <?php require_once("../includes/session.php"); ?>
        <link href="css/normal.css" type="text/css" rel="stylesheet">
        <link href="css/stylesheet.css" type="text/css" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
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
                    <?php if(isset($_SESSION["user"])) { ?>
                    <li><a href="my_recipes.php">My Recipes</a></li>
                    <?php } else { ?>
                    <?php } ?>
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
            </div><br>
            <div id="message">
            <p><?php echo message(); ?></p>
            </div><br> 