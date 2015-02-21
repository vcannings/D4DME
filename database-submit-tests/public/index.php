<?php require_once("../includes/connect.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php include_once("../includes/templates/header.php"); ?>
 
    <?php
        if(isset($_POST["submit"])) {
            $username = ($_POST["username"]);
            $password = ($_POST["password"]);
            $name = ($_POST["name"]);
            $surname = ($_POST["surname"]);
            $email = ($_POST["email"]);
        } else {
            $username = "";
            $password = "";
            $name = "";
            $surname = "";
            $email = "";
        }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $username = refine_input($_POST["username"]);
      $password = refine_input($_POST["password"]);
      $name = refine_input($_POST["name"]);
      $name = ucfirst($name);
      $surname = refine_input($_POST["surname"]);
      $surname = ucfirst($surname);
      $email = refine_input($_POST["email"]);
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
        } else if(empty($name)) {
            $message = "Please enter your name";
        } else if(empty($surname)) {
            $message = "Please enter your surname";
        } else if(empty($email)) {
            $message = "Please enter your email";
        } else { 
            $query = "INSERT INTO user (user_username, user_password, user_name, user_surname, user_email) VALUES ('{$username}', '{$password}', '{$name}', '{$surname}', '{$email}')";
            $result = mysqli_query($connection, $query);

            if($result) {
               $message = "Success, your details were registered";
            } else {
               $message = "Sorry, something went wrong";
            }
            $username = "";
            $password = "";
            $name = "";
            $surname = "";
            $email = "";
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
            
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                <h2>Name:</h2><br><input class="formExample" placeholder="Name" type="text" value="" name="name" />
                <br><br>
                <h2>Surname:</h2><br><input class="formExample" placeholder="Surame" type="text" value="" name="surname" />
                <br><br>
                <h2>Username:</h2><br><input class="formExample" placeholder="Username" type="text" value="" name="username" />
                <br><br>
                <h2>Password:</h2><br><input class="formExample" placeholder="Password" type="text" value="" name="password" />
                <br><br>
                <h2>Email Address:</h2><br><input class="formExample" placeholder="Email" type="text" value="" name="email" />
                <br><br>
                <input class="buttonExample" type="submit" value="Submit" name="submit" />
            </form>
        </div>
            <div id="footer">
            </div>
 </div>


<?php include_once("../includes/templates/footer.php"); ?>        