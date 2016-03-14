<!DOCTYPE HTML>
<html>
<head>
<title>Zeiterfassung</title>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
<link rel="stylesheet" href="assets/css/main.css" />
<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
</head>
<body>

	<!-- Nav -->
	<nav id="nav">
		<ul class="container">
		

			<?php 
			if ($login->isUserLoggedIn()==false){
				echo'
					<li><a href="index.php">Home</a></li>
					<li><a href="index.php?site=login">Login</a></li>
					<li><a href="index.php?site=register">Registrieren</a></li>
					';
			}

			if ($login->isUserLoggedIn() == true) {
				echo'<li><a href="konto.php">Konto</a></li>
				<li><a href="zeiten.php">Zeiterfassung</a></li>
				<li><a href="index.php?logout">Logout</a></li>';
			}
			?>

		</ul>
	</nav>