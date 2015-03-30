<!-- V: The php on this page is virtually the same as the index php, it's just a slightly different form -->
<!-- V: Including several files into the index file -->
<?php include_once("../includes/session.php"); ?>
<?php require_once("../includes/connect.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php include_once("../includes/templates/header.php"); ?>    

<?php
// V: initial defining of variables used on this page, all set to equal nothing unless the submit button has been hit and the user has input data
    $x = 1;
    $titleErr = ""; // V: Individual error messages for each variable (Err is just short for error)
    $cooktimeErr = "";            
    $cultureErr = "";
    $allergyErr = "";
    $descriptionErr = "";
    $ingredientsErr = "";
    $instructionsErr = "";
    $imageErr = "";
    if(isset($_POST["submit"])) { // V: This is basically saying if the submit button has been pressed, make whatever has been put into the relevent fields equal these variables
        $title = ($_POST["recipe_title"]);
        $cooktime = ($_POST["recipe_cooktime"]);
        $culture = ($_POST["recipe_culture"]);
        $allergy = ($_POST["recipe_allergy"]);
        $description = ($_POST["recipe_description"]);
        $ingredients = ($_POST["recipe_ingredients"]);
        $instructions = ($_POST["recipe_instructions"]);
        $image = ($_POST["recipe_image"]);
    } else { // V: otherwise it will set the variables to equal nothing
        $title = "";
        $cooktime = "";
        $culture = "";
        $allergy = "";
        $description = "";
        $ingredients = "";
        $instructions = "";
        $image = "";
    }
// V: validating the inputted data using a custom function and a few php functions
    if ($_SERVER["REQUEST_METHOD"] == "POST") { // V: this line is saying if the method of inputting data is post, initiae this function
        $title = ucfirst($title); // V: ucfirst will edit the inputted data variable in the brackets to have a capital letter at the start
        }
        $culture = refine_input($_POST["recipe_culture"]); // V: Refine input is the custom function I created. See functions.php for more details
        $culture = ucfirst($culture);   
?>
    
<?php
// V: testing to see whether the entry fields are empty, if so not allowing them to be submitted to database table
    if(isset($_POST["submit"])) {
        if(empty($title)) {
            $titleErr = "Title is required"; // V: if a field in the form is left blank, the error variables are given a value
        } else if(empty($cooktime)) {
            $cooktimeErr = "Cook time is required";
        } else if(empty($culture)) {
            $cultureErr = "Culture is required";
        } else if(empty($allergy)) {
            $allergyErr = "Allergy warning is required";
        } else if(empty($description)) {
            $descriptionErr = "Description is required";
        } else if(empty($ingredients)) {
            $ingredientsErr = "Ingredients are required";
        } else if(empty($instructions)) {
            $instructionsErr = "Instructions are required";
        } else if($x == 1) { 
            $query = "INSERT INTO recipe (recipe_user_id, recipe_title, recipe_cooktime, recipe_culture, recipe_allergy, recipe_description, recipe_ingredients, recipe_instructions, recipe_image) VALUES ('{$_SESSION["user_id"]}', '{$title}', '{$cooktime}', '{$culture}', '{$allergy}', '{$description}', '{$ingredients}', '{$instructions}', '{$image}')";
            $result = mysqli_query($connection, $query); // V: This SQL query is asked to insert our variables (created by the user) into the relevent collums in our 'user' table if all of the above requirements have been met
            if($result) { // V: If the result is successful/unsuccessful, feedback to the user
               $message = "Thank you, your recipe has been added!";
                redirectTo("index.php");
            } else {
               $message = "Sorry, something went wrong";
            }
            $title = ""; // V: The variables are set back to equal nothing if the data has been successfully sent to the table in the database
            $cooktime = "";
            $culture = "";
            $allergy = "";
            $ingredients = "";
            $instructions = "";
            $description = "";
            $image = "";
        }
    }
?>
            
<div id="wrapper">
    <div id="header">
        <h3>WEBSITE</h3>
    </div><br><br><br><br>
    <div id="box">
            <h1>Submit</h1>
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
                <h2>Title:</h2><input class="formExample" placeholder="e.g Pasta Bake" type="text" value="<?php echo $title;?>" name="recipe_title" />
                <span class="error">* <?php echo $titleErr;?></span>
                <!-- V: The error variables have been set to echo if they have a value -->
                <h2>Cook Time:</h2><select name="recipe_cooktime">
                <option value="5 minutes">5 minutes</option>
                <option value="10 minutes">10 minutes</option>
                <option value="15 minutes">15 minutes</option>
                <option value="20 minutes">20 minutes</option>
                <option value="25 minutes">25 minutes</option>
                <option value="30 minutes">30 minutes</option>
                <option value="35 minutes">35 minutes</option>
                <option value="40 minutes">40 minutes</option>
                <option value="45 minutes">45 minutes</option>
                <option value="50 minutes">50 minutes</option>
                <option value="55 minutes">55 minutes</option>
                <option value="60 minutes">60 minutes</option>
                <option value="60 minutes +">60 minutes +</option>
                </select>
                <span class="error">* <?php echo $cooktimeErr; ?></span>
                <h2>Cuisine:</h2><select name="recipe_culture">
                <option value="American">American</option>
                <option value="British">British</option>
                <option value="Chinese">Chinese</option>
                <option value="German">German</option>
                <option value="Italian">Italian</option>
                <option value="Indian">Indian</option>
                <option value="Japanese">Japanese</option>
                <option value="Other">Other</option>
                </select>
                <span class="error">* <?php echo $cultureErr; ?></span>
                <h2>Allergy Warning:</h2><select name="recipe_allergy">
                <option value="yes">Yes</option>
                <option value="no">No</option>
                </select>
                <span class="error">* <?php echo $allergyErr; ?></span>
                <h2>Description:</h2><textarea rows="3" cols="40" class="formExample" placeholder="This creamy pasta bake takes no time at all to cook with very few ingredients!" value="<?php echo $description;?>" name="recipe_description"></textarea>
                <span class="error">* <?php echo $descriptionErr; ?></span>
                <h2>Ingredients:</h2><textarea rows="3" cols="40" class="formExample" placeholder="Ingredient one, ingredient two..." value="<?php echo $ingredients;?>" name="recipe_ingredients"></textarea>
                <span class="error">* <?php echo $ingredientsErr; ?></span>
                <h2>Instructions:</h2><textarea rows="8" cols="40" class="formExample" placeholder="1) instruction,  2) instruction..." value="<?php echo $instructions;?>" name="recipe_instructions"></textarea>
                <span class="error">* <?php echo $instructionsErr; ?></span>
                <h2>Image:</h2><textarea rows="1" cols="40" class="formExample" placeholder="Insert URL here" value="<?php echo $image;?>" name="recipe_image"></textarea>
                <span class="error">* <?php echo $imageErr; ?></span>
                
                <br><br>
                <input class="buttonExample" type="submit" value="Submit" name="submit" />
            </form>
    </div>
    <br><br><br><br><br>
    <div id="footer">
    </div>
 </div>


<?php include_once("../includes/templates/footer.php"); ?>  
