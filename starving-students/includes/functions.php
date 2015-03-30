<!-- creating a function that validates inputted data -->
<?php
	function redirectTo($newLocation) {
	  header("Location: " . $newLocation);
	  exit;
	}
    
    function refine_input($data) {
          $data = trim($data);
          $data = stripslashes($data);
          $data = htmlspecialchars($data);
          return $data;
    }
    
    function GetSingleRecipe($recipeID) {
        global $connection;
        $query = "SELECT * FROM recipe WHERE recipe_id='{$recipeID}'";
        $result = mysqli_query($connection, $query);
        return $result;
    }
?>