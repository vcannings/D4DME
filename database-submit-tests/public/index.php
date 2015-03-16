<!-- V: Including several files into the index file using a php function -->
<?php require_once("../includes/connect.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php include_once("../includes/templates/header.php"); ?> 

<div id="wrapper">
    <div id="header">
        <h3>WEBSITE</h3>
    </div><br><br><br><br>
    <div id="container">
    <?php
    $query = "SELECT * FROM recipe"; // V: The query is selecting all the data from the recipe table
    $result = mysqli_query($connection, $query); // V: defining the variable result by putting our connection variable and our query variable through a function
                
                while($row = mysqli_fetch_assoc($result)) { // V: whilst our data is stored in the result variable, the function is splitting it up into arrays in thr $row variable
                    
                    include 'recipe.php'; // V: the $row variable is being used in the recipe.php file, which is being included to display this data
                    
                }

            ?>
    </div>
    
<div id="search-bar">

</div>

    <div id="footer">
    </div>
</div>

<?php include_once("../includes/templates/footer.php"); ?>    