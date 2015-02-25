<!-- Including several files into the index file -->
<?php require_once("../includes/connect.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php include_once("../includes/templates/header.php"); ?>  

<?php
//initial defining of variables used on this page
    $titleErr = "";
    $photoErr = "";            
    $cooktimeErr = "";
    $cultureErr = "";
    $allergyErr = "";
    $message = "* required field";

    if(isset($_POST["submit"])) {
        $title = ($_POST["recipe_title"]);
        $photo = (file_get_contents($_FILES['recipe_photo']['tmp_name']));
        $cooktime = ($_POST["recipe_cooktime"]);
        $culture = ($_POST["recipe_culture"]);
        $allergy = ($_POST["recipe_allergy"]);
    } else {
        $title = "";
        $photo = "";
        $cooktime = "";
        $culture = "";
        $allergy = "";
    }
?>

<?php
//testing to see whether the entry fields are empty, if so not allowing them to be submitted to database table
    if(isset($_POST["submit"])) {

        if(empty($title)) {
            $titleErr = "Title is required";
        } else if(empty($photo)) {
            $photoErr = "Photo is required";
        } else if(empty($cooktime)) {
            $cooktimeErr = "Cooktime is required";
        } else if(empty($culture)) {
            $cultureErr = "Culture is required";
        } else if(empty($allergy)) {
            $allergyErr = "Allergy warning is required";
        } else { 
            $query = "INSERT INTO recipe (recipe_tile, recipe_photo, recipe_cooktime, recipe_culture, recipe_allergy) VALUES ('{$title}', '{$photo}', '{$cooktime}', '{$culture}', '{$allergy}')";
            $result = mysqli_query($connection, $query);

            if($result) {
               $message = "Success, your details were registered";
            } else {
               $message = "Sorry, something went wrong";
            }
            $title = "";
            $photo = "";
            $cooktime = "";
            $culture = "";
            $allergy = "";
        }
    }
?>

<div id="wrapper">
    <div id="header">
        <h3>RECIPE</h3>
    </div>
    <div id="box">
       <h1>Submit your own!</h1>
        <hr> 
        
        <!-- displaying whatever the message variable happens to be at the given time -->
                <?php if(isset($message)) { ?>
                <div id="smallbox">
                <p><?php echo $message; ?></p>
                </div>
               <?php } ?>
        
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
                <h2>Title:</h2><input class="formExample" placeholder="e.g Pasta Bake" type="text" value="<?php echo $title;?>" name="recipe_title" />
                <span class="error">* <?php echo $titleErr;?></span>
                <h2>Photo:</h2>          
                <input type="file" class="formExample" name="recipe_photo" id="recipe_photo">
                <span class="error">* <?php echo $photoErr; ?></span>
                <h2>Cook Time:</h2><input class="formExample" placeholder="e.g 30 minutes" type="text" value="<?php echo $cooktime;?>" name="recipe_cooktime" />
                <span class="error">* <?php echo $cooktimeErr; ?></span>
                <h2>Culture:</h2><input class="formExample" placeholder="e.g Italian" type="text" value="<?php echo $culture;?>" name="recipe_culture" />
                <span class="error">* <?php echo $cultureErr; ?></span>
                <h2>Allergy Warning:</h2><input class="formExample" placeholder="yes or no" type="text" value="<?php echo $allergy;?>" name="recipe_allergy" />
                <span class="error">* <?php echo $allergyErr; ?></span>
                <br><br>
                <input class="buttonExample" type="submit" value="Submit" name="submit" />
            </form>
        
        
        
        
    </div>
    <div id="footer">
    </div>
 </div>
<?php include_once("../includes/templates/footer.php"); ?>  