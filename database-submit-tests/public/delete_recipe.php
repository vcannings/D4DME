<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/connect.php"); ?>
<?php require_once("../includes/functions.php"); ?>

<?php
    if(isset($_GET["recipe_id"])) {
        $postID = $_GET["recipe_id"]; 
        $userID = $_SESSION["user_id"];
        
        $query = "DELETE FROM recipe WHERE recipe_id = '{$postID}' and recipe_user_id = '{$_SESSION['user_id']}'";
        $result = mysqli_query($connection, $query); 
    } else {
        echo "Problem, your post can currently not be deleted!";
    }
    header('Location: index.php');
    exit;
?>
