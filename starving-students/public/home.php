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
            </div><br><br>
            <center>
           <div class="welcome">
            <h1>Welcome to Starving Students!</h1>
               <p>Welcome to Starving Students, an easy to use web application created by students for students.</p>
<p>SS aims to keep recipe hunting to as little effort as possible, yet still offers a wide variety of choice and taste. </p>
<p>If you simply want to browse through our recipes then jump over to the menu tab in the navigation, or if you’d like to contribute to our recipe database, feel free to sign up and create your own account! 
</p>
            </div>
            <div class="welcome">
            <h1>External Destinations</h1>
               <a href="https://github.com/vcannings/D4DME">GitHub Repository</a>
                <a href="http://dakar.bournemouth.ac.uk/~vcannings/wiki/dokuwiki/doku.php">Wiki Page</a>
                <a href="http://dakar.bournemouth.ac.uk/~vcannings/meet-the-team/">Meet the Team</a>
            
            </div>
            </center>
            </div>
        <div class="footer"></div>
<?php include_once("../includes/templates/footer.php"); ?> 