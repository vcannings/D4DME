<?php
    require_once("../includes/session.php");
    require_once("../includes/connect.php");
    require_once("../includes/functions.php");
 ?>
    
  <?php 
    if(isset($_POST["submit"])){
        $username = $_POST["username"];
        $password = $_POST["password"];
        
        $query = "SELECT * FROM user WHERE usermane='{$username}' AND password='{$password}' LIMIT 1";
        
        $result = mysqli_query($connection, $query);
        
        if($result){
            $_SESSION["message"] = "Success, Welcome back {$user["username"]}";
            $_SESSION["username"] = $user["username"];
            $_SESSION["user_id"] = $user["id"];
            redirectTo("index.php");
        } else{
            $_SESSION["message"] = "Wrong username/password";
        }
        
        echo "<br/><a href='logout.php>Logout</a>";
       
    } 
 ?>


<!doctype html>
<html>
    <head>
        <title>Format Code</title>
        <link href="css/styles.css" rel="stylesheet" >
    </head>
    
    <body>
        <div class="container">  
            
            <div class="box">
                <?php 
                    if(isset($message)) {
                        echo $message;
                    }
                ?>
            </div>
            
            <form action="login.php" method="post">
                username: <input type="text" name="username" value="" />
                password: <input type="text" name="password" value="" />
                    <input type="submit" name="submit" value="Submit" />
            </form>
        </div>
    </body>
</html>            
