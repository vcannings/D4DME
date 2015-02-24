<?php require_once("../includes/connect.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php include_once("../includes/templates/header.php"); ?>    

<?php
            $nameErr = "";
            $surnameErr = "";            
            $usernameErr = "";
            $passwordErr = "";
            $emailErr = "";

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
      $name = refine_input($_POST["name"]);
      $name = ucfirst($name);
        if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
        $nameErr = "Only letters and white space allowed";
        }
      $surname = refine_input($_POST["surname"]);
      $surname = ucfirst($surname);
         if (!preg_match("/^[a-zA-Z ]*$/",$surname)) {
        $surnameErr = "Only letters and white space allowed";
        }
      $username = refine_input($_POST["username"]);
      $password = refine_input($_POST["password"]);
      $email = refine_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $emailErr = "Invalid email format"; 
        }
    }
    ?>
    
<?php

    if(isset($_POST["submit"])) {

        if(empty($name)) {
            $nameErr = "Name is required";
        } else if(empty($surname)) {
            $surnameErr = "Surname is required";
        } else if(empty($username)) {
            $usernameErr = "Username is required";
        } else if(empty($password)) {
            $passwordErr = "Password is required";
        } else if(empty($email)) {
            $emailErr = "Email is required";
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
            
            <div id="smallbox">
                <p>* required field</p>
            </div>
            
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                <h2>Name:</h2><input class="formExample" placeholder="Name" type="text" value="<?php echo $name;?>" name="name" />
                <span class="error">* <?php echo $nameErr;?></span>
                <h2>Surname:</h2><input class="formExample" placeholder="Surname" type="text" value="<?php echo $surname;?>" name="surname" />
                <span class="error">* <?php echo $surnameErr; ?></span>
                <h2>Username:</h2><input class="formExample" placeholder="Username" type="text" value="<?php echo $username;?>" name="username" />
                <span class="error">* <?php echo $usernameErr; ?></span>
                <h2>Password:</h2><input class="formExample" placeholder="Password" type="text" value="<?php echo $password;?>" name="password" />
                <span class="error">* <?php echo $passwordErr; ?></span>
                <h2>Email Address:</h2><input class="formExample" placeholder="Email" type="text" value="<?php echo $email;?>" name="email" />
                <span class="error">* <?php echo $emailErr; ?></span>
                <br><br>
                <input class="buttonExample" type="submit" value="Submit" name="submit" />
            </form>
        </div>
            <div id="footer">
            </div>
 </div>


<?php include_once("../includes/templates/footer.php"); ?>        