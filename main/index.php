<?php 
// checking for minimum PHP version
if (version_compare(PHP_VERSION, '5.3.7', '<')) {
	exit("Sorry, Simple PHP Login does not run on a PHP version smaller than 5.3.7 !");
} else if (version_compare(PHP_VERSION, '5.5.0', '<')) {
	// if you are using PHP 5.3 or PHP 5.4 you have to include the password_api_compatibility_library.php
	// (this library adds the PHP 5.5 password hashing functions to older versions of PHP)
	require_once("/login-classes/libraries/password_compatibility_library.php");
}

// include the configs / constants for the database connection
require_once '/login-classes/config/db.php';



// load the login class
require_once("/login-classes/classes/Login.php");

// create a login object. when this object is created, it will do all login/logout stuff automatically
// so this single line handles the entire login process. in consequence, you can simply ...
$login = new Login();

$site = $_GET['site'];



include 'views/header.php';

switch ($site) {
	case 'main':
		include 'views/main.php';
	break;
	
	case 'register':
		include 'views/register.php';
	break;
	
	case 'login':
		include 'views/login.php';
	break;
		
	default:
		include 'views/main.php';
	break;
}



include 'views/footer.php';

?>