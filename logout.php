<?php
session_start();
?>

<?php //ob_start() ?>

<?php
	$redirect_page = 'index.php';
	//header('Location: '.$redirect_page);
?>

<?php 
session_destroy();
//unset($_SESSION['user']);
unset($_SESSION['username']);
?>
<?php //ob_end_clear(); //to clear the buffer ?>
<?php 
include_once("index.php");
//echo "<font color='red' size='+1' >You have successfully logged out!</font>";
?>
