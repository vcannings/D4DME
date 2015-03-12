<!-- V: Including several files into the index file using a php function -->
<?php require_once("../includes/connect.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php include_once("../includes/templates/header.php"); ?>    

<?php
// V: initial defining of variables used on this page, all set to equal nothing unless the submit button has been hit and the user has input data
// V: x is a boolean that I have introduced to make both the form validation and empty field check work together. It initially equals one and has to equal one in order to be successful. If something goes wrong, it is set to equal 0 further down the page.
    $x = 1;
    $nameErr = ""; // V: Individual error messages for each variable (Err is just short for error)
    $surnameErr = "";            
    $usernameErr = "";
    $passwordErr = "";
    $emailErr = "";
    $message = "* required field";

    if(isset($_POST["submit"])) { // V: This is basically saying if the submit button has been pressed, make whatever has been put into the relevent fields equal these variables
        $username = ($_POST["username"]);
        $password = ($_POST["password"]);
        $name = ($_POST["name"]);
        $surname = ($_POST["surname"]);
        $email = ($_POST["email"]);
    } else {  // V: otherwise it will set the variables to equal nothing
        $username = "";
        $password = "";
        $name = "";
        $surname = "";
        $email = "";
    }

// V: validating the inputted data using a custom function and a few php functions
    if ($_SERVER["REQUEST_METHOD"] == "POST") { // V: this line is saying if the method of inputting data is post, initiae this function
        $name = refine_input($_POST["name"]); // V: Refine input is the custom function I created. See functions.php for more details
        $name = ucfirst($name); // V: ucfirst will edit the inputted data variable in the brackets to have a capital letter at the start
        if (!preg_match("/^[a-zA-Z ]*$/",$name)) { // V: this line is asking the function to check if the inputted data contains only letters
            $nameErr = "Only letters and white space allowed"; // V: if it doesn't, the nameErr variable will be given a value
            $x = 0; // V: and x will be set to 0, which stops the SQL query from working further down the page
        }
        $surname = refine_input($_POST["surname"]); // V: these lines do the same thing as above except for the surname variable
        $surname = ucfirst($surname);
         if (!preg_match("/^[a-zA-Z ]*$/",$surname)) {
            $surnameErr = "Only letters and white space allowed";
             $x = 0;
        }
        $username = refine_input($_POST["username"]);
        $password = refine_input($_POST["password"]);
        $email = refine_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { // V: this line is asked to check whether the inputted email contains an @ and . 
            $emailErr = "Invalid email format"; 
            $x = 0;
        }
    }
?>
    
<?php
//testing to see whether the entry fields are empty, if so not allowing them to be submitted to database table
    if(isset($_POST["submit"])) {

        if(empty($name)) { // V: if a field in the form is left blank, the error variables are given a value
            $nameErr = "Name is required";
        } else if(empty($surname)) {
            $surnameErr = "Surname is required";
        } else if(empty($username)) {
            $usernameErr = "Username is required";
        } else if(empty($password)) {
            $passwordErr = "Password is required";
        } else if(empty($email)) {
            $emailErr = "Email is required";
        } else if($x == 1) { // V: This is where our boolean becomes relevant. If there have been no problems, the x will still equal 1. If there have been problems with the inputted data above, the x will equal 0, which stops this query from working.
            $query = "INSERT INTO user (user_username, user_password, user_name, user_surname, user_email) VALUES ('{$username}', '{$password}', '{$name}', '{$surname}', '{$email}')"; // V: This SQL query is asked to insert our variables (created by the user) into the relevent collums in our 'user' table if all of the above requirements have been met
            $result = mysqli_query($connection, $query); // V: here we have set a result variable to be created if the connection variable and query variable have both been successful

            if($result) { // V: If the result is successful/unsuccessful, feedback to the user
               $message = "Success, your details were registered";
            } else {
               $message = "Sorry, something went wrong";
            }
            $username = ""; // V: The variables are set back to equal nothing if the data has been successfully sent to the table in the database
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
            
<!-- V: displaying whatever the message variable happens to be at the given time -->
                <?php if(isset($message)) { ?> 
                <div id="smallbox">
                <p><?php echo $message; ?></p>
                </div>
               <?php } ?>
           
<!-- V: The php below in the form is a security check to make sure that hackers cannot inject SQL into our website via the URL by removing any special characters such as HTML tags by turning them into other things  -->           
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post"> 
<!-- V: If the user have input data into the fields, but something has gone wrong, the data will still be there when the page refreshes because of the php in the value atributes -->
                <h2>Name:</h2><input class="formExample" placeholder="Name" type="text" value="<?php echo $name;?>" name="name" />
                <span class="error">* <?php echo $nameErr;?></span>
<!-- V: The error variables have been set to echo if they have a value -->
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