<!-- V: Including several files into the index file using a php function -->
<?php require_once("../includes/connect.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php include_once("../includes/templates/header.php"); ?> 
<?php
    if(isset($_GET["recipe_id"])) {
    $recipeID = $_GET["recipe_id"];
    } else {
        redirectTo("index.php");
    
    }
?>


    <br>
    <p><?php echo message(); ?></p>    
    
    
      
        <?php 
            $result = GetSingleRecipe($recipeID);
            
            while($row = mysqli_fetch_assoc($result)) {
                include 'recipe_large.php';
            }
        ?>
   


    <div id="footer">
    </div>


<?php include_once("../includes/templates/footer.php"); ?> 