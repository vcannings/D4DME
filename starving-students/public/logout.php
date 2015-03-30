<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/functions.php"); ?>

<?php
    session_destroy();
    redirectTo('index.php');
?>