<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/connect.php"); ?>
<?php require_once("../includes/functions.php"); ?>

<?php
    if(isset($_GET["recipe_id"])) {
        $postID = $_GET["recipe_id"]; 
        $userID = $_SESSION["user_id"];
        
        $query = "DELETE FROM recipe WHERE recipe_id = '{$postID}' and recipe_user_id = '{$_SESSION['user_id']}'";
        $result = mysqli_query($connection, $query);
        $_SESSION["message"] = "Your recipe has been deleted.";
    } else {
        $_SESSION["message"] = "Woops! Something went wrong.";
    }
    header('Location: index.php');
    exit;
?>