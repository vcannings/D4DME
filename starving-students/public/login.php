<!-- V: Including several files into the index file using a php function -->
<?php require_once("../includes/connect.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php include_once("../includes/templates/header.php"); ?> 
        

  <?php
    if(isset($_POST["submit"])){/*K: if the post is told to submit then..*/
        $username = $_POST["username"]; /* the username and password given in the*/
    	$password = $_POST["password"]; /* form will become varibles to check the database*/
    	$query = "SELECT * FROM user WHERE user_username='{$username}' AND user_password='{$password}' LIMIT 1";/*K: this is querying the database to see if the given data matches any on the database and to limit the amount that come back to one */
    	$result = mysqli_query($connection, $query);
		if($user = mysqli_fetch_assoc($result)) { /*K: if the given username and */
            $_SESSION["user"] = $user["user_username"];/*password start a session*/
            $_SESSION["user_id"] = $user["user_id"];/*that uses the username an id*/
            $_SESSION["message"] = "Successfully logged in. Welcome back, {$user["user_name"]}!";
            redirectTo("index.php");
            /*and show a message so the user knows that they are logged in*/
        } else { /*however if the username and password dont match let the user know they there havent logged in*/
            $_SESSION["message"] = "Sorry, wrong username/password.";
        }
	
	}
 ?>

<center>
<div class="welcome">
    <h1>Log In</h1>
            <hr>
            <form action="login.php" method="post">
                <h2>Username:</h2> <input type="text" name="username" value="" /><br><br>
                <h2>Password:</h2> <input type="text" name="password" value="" /><br><br>
                <input type="submit" name="submit" value="Submit" />
            </form>
    </div>
    </center>
    
        
    </body>
</html>