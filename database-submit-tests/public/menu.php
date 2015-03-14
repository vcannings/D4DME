<!-- V: Including several files into the index file using a php function -->
<?php require_once("../includes/connect.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php include_once("../includes/templates/header.php"); ?> 

<div id="wrapper">
    <div id="header">
        <h3>WEBSITE</h3>
    </div>
    
    <?php
    $query = "SELECT * FROM recipe";
    $result = mysqli_query($connection, $query);
                
                while($row = mysqli_fetch_assoc($result)) {
                    
                    include 'recipe.php'; 
                    
                }

            ?>
    <div id="footer">
    </div>
</div>

<?php include_once("../includes/templates/footer.php"); ?>    