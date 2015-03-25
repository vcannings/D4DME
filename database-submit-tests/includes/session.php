<?php
	session_start();

	function message() {
		if(isset($_SESSION["message"])){
			$output = "<div class=\"message\"><p>";
			$output .= htmlentities($_SESSION["message"]);
			$output .= "</p></div>";

			$_SESSION["message"] = null;

			return $output;
		}
	}
?>
