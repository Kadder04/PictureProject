<?php
	session_start();
	if(isset($_COOKIE['login'])){
		setcookie("login", $_COOKIE['login'], time()+0);
	}
	if(isset($_COOKIE['admin'])){
		setcookie("admin", $_COOKIE['admin'], time()+0);
	}
	
	if (isset($_POST['username']) And (isset($_POST['username']))){
		$AdminOrUser = "Admin";
		$loop = 0;
		while ($loop <= 1){
			$username = $_POST['username'];
			$password = $_POST['password'];
			$count = 0;
			
			$path = "data/" . $AdminOrUser . "Users.txt";
			$myFileP = fopen($path, "r");
			if ($myFileP) {
				while (($buffer = fgets($myFileP, 4096)) !== false) {
					if ($buffer == $username){
					$usernr = $count;
					}
				$count = $count + 1;
				}
			}
			fclose($myFileP);
		
			if (isset ($usernr)){
				$count = 0;
				
				$path = "data/" . $AdminOrUser . "Pw.txt";
				$myFileP = fopen($path, "r");
				if ($myFileP) {
					while (($buffer = fgets($myFileP, 4096)) !== false) {
						if (($buffer == $password) And ($usernr == $count)){setcookie("login", $username, time()+600);
						$_SESSION['username'] = $username;
							
							if ($loop == 0){
								setcookie("admin", $username, time()+600);
							}
							?>
							<meta http-equiv="refresh" content="0; url=index.php#login"><?php
							
						}
						$count = $count + 1;
					}
				}
			fclose($myFileP);
			}
		$AdminOrUser = "User";
		$loop = $loop + 1;
		}
	}
?>
<meta http-equiv="refresh" content="0.1; url=LoginFailed.php">