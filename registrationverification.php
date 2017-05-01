<?php 
require_once('Database.php');

session_start();

if(isset($_GET['userName']) && isset($_GET['token'])){
$userName = $_GET['userName'];
$token = $_GET['token'];

$verified = Database::validate_token($userName, $token);
if ($verified){
	$_SESSION['newUser'] = true;
	//echo "Thank you for registering! Please <a href='login.php'>login</a>";
	header('Location: http://localhost/finalProject/login.php');
	}

else {
	
	echo "Access denied";
	
	}	

}

else {
	
	echo "oops! This page is not available. Please <a href='testRegistrationPage.php'>register </a>";
	
	
	}

?>