<?php
	$temp = "User";
	if (isset ($_GET['checkadmin'])){
		$temp = "Admin";
	}
	$pfad = "E:/xampp/htdocs/PictureProject/data/" . $temp . "Users.txt";
	$username = $_GET['username'];
	$password = $_GET['password'];
	
	IF (isset ($_GET['username']) AND isset($_GET['password'])){
		$myfile = fopen($pfad, "a") or die("Unable to open file!");
		fwrite ($myfile, "\r\n" . $username);
		fclose($myfile);
		
		$pfad = "E:/xampp/htdocs/PictureProject/data/" . $temp . "Pw.txt";
		
		$myfile = fopen($pfad, "a") or die("Unable to open file!");
		fwrite ($myfile, "\r\n" . $password);
		fclose($myfile);
	}
?>

<meta http-equiv="refresh" content="0.1; url=index.php#login">