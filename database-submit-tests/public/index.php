<?php require_once("../includes/connect.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php include_once("../includes/templates/header.php"); ?>
 
    <?php
        if(isset($_POST["submit"])) {
            $username = ($_POST["username"]);
            $password = ($_POST["password"]);
        } else {
            $username = "";
            $password = "";
        }
           
    ?>

<?php
         $message = "Welcome to this generic site";
    ?>
    
    <?php
    if(isset($_POST["submit"])) {

        if(empty($username)) {
            $message = "Please enter a username";
        } else if(empty($password)) {
            $message = "Please enter a password";
        } else { 
            $query = "INSERT INTO users (username, password) VALUES ('{$username}', '{$password}')";
            $result = mysqli_query($connection, $query);

            if($result) {
               $message = "Success, your details were registered";
            } else {
               $message = "Sorry, something went wrong";
            }

            $username = "";
            $password = "";

        }
    }
           
        ?>
            
<div id="wrapper">
    <div id="header">
        <h3>WEBSITE</h3>
        </div>
        <div id="box">
            <h1>Sign Up</h1>
            <hr>
            
                <?php if(isset($message)) { ?>
            <div id="smallbox">
                <p><?php echo $message; ?></p>
            </div>
                <?php } ?>
            
            <form action="index.php" method="post">
                <h2>Username:</h2>&nbsp;<input class="formExample" type="text" value="" name="username" />
                <br><br>
                <h2>Password:</h2>&nbsp;<input class="formExample" type="text" value="" name="password" />
                <br><br>
                <input class="buttonExample" type="submit" value="Submit" name="submit" />
            </form>
        </div>
            <div id="footer">
            </div>
 </div>


<?php include_once("../includes/templates/footer.php"); ?>        