	<?php
	session_start();
	if(isset($_COOKIE['login'])){
		setcookie("login", $_COOKIE['login'], time()+0);
	}
	if(isset($_COOKIE['admin'])){
		setcookie("admin", $_COOKIE['admin'], time()+0);
	}
	unset($_SESSION['username']);
	?>
	<meta http-equiv="refresh" content="0; url=index.php">