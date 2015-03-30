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
            
            <div id="message">
            <p><?php echo message(); ?></p>
            </div>

  <?php
    if(isset($_POST["submit"])){/*K: if the post is told to submit then..*/
        $username = $_POST["username"]; /* the username and password given in the*/
    	$password = $_POST["password"]; /* form will become varibles to check the database*/
    	$query = "SELECT * FROM user WHERE user_username='{$username}' AND user_password='{$password}' LIMIT 1";/*K: this is querying the database to see if the given data matches any on the database and to limit the amount that come back to one */
    	$result = mysqli_query($connection, $query);
		if($user = mysqli_fetch_assoc($result)) { /*K: if the given username and */
            $_SESSION["user"] = $user["user_username"];/*password start a session*/
            $_SESSION["user_id"] = $user["user_id"];/*that uses the username an id*/
            $_SESSION["message"] = "Successfully logged in. Welcome back, {$user["user_username"]}!";
            redirectTo("index.php");
            /*and show a message so the user knows that they are logged in*/
        } else { /*however if the username and password dont match let the user know they there havent logged in*/
            $_SESSION["message"] = "Sorry, wrong username/password.";
        }
	
	}
 ?>
<br><br><br><br>
<center>
<div class="welcome">
            <form action="login.php" method="post">
                <strong>Username:</strong> <input type="text" name="username" value="" /><br><br>
                <strong>Password:</strong> <input type="text" name="password" value="" /><br><br>
                <input type="submit" name="submit" value="Submit" />
            </form>
    </div>
    </center>
    
        </div>
    </body>
</html>