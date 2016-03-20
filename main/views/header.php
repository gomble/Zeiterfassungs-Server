<!DOCTYPE HTML>
<html>
<head>
<title>Zeiterfassung</title>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<?php 
if ($site == 'buchungen'){
	echo '<link rel="stylesheet" href="assets/css/table.css" />';
}
?>
<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
<link rel="stylesheet" href="assets/css/main.css" />
<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
</head>
<body>

	<!-- Nav -->
	<nav id="nav">
		<ul class="container">

				<li><a href="index.php">Home</a></li>
			<?php 
			if ($login->isUserLoggedIn() == false) {
				echo'
					<li><a href="index.php?site=login">Login</a></li>
					<li><a href="index.php?site=register">Registrieren</a></li>
					';
			}

			?>
			<?php
			if ($login->isUserLoggedIn() == true) {
				echo'<li><a href="index.php?site=konto">Konto</a></li>
				<li><a href="index.php?site=zeiterfassung">Zeiterfassung</a></li>
				<li><a href="index.php?site=logout">Logout</a></li>';
			}
			?>

		</ul>
	</nav>