<html>
	<header>
		<title>PictureProject</title>		
		<link rel="stylesheet" type="text/css" href="stylesheet.css">
		<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
		<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.1.1.min.js"></script>
		<script type="text/javascript" src="javascript/javascript.js"></script>
		<script type="text/javascript" src="javascript/jquery.easing.min.js"></script>
	</header>
	<body>

		<!-- navigation bar -->
		<div class="navbar">
			<div class="navbar_content"><a href="#home" class="page-scroll">PictureProject</a></div>
			<div class="navbar_content"><a href="#gb" class="page-scroll">Gästebuch</a></div>
			<div class="navbar_content"><a href="#login" class="page-scroll">Einloggen</a></div>
			<div class="navbar_content"><a href="#register" class="page-scroll">Registrieren</a></div>
			<div class="navbar_content"><a href="#upload" class="page-scroll">Bildergallerie</a></div>
		</div>

		<!-- Home panel -->
		<div class="section first_panel_padding">
			<div id="home" class="section_panel navbar_padding">
				<img src="images/index/street.jpg"/>
			</div>
			<div class="section_panel">
				<h2>PictureProject</h2>
				<h3>Willkommen bei der PictureProject-community!</h3>
			</div>
		</div>

		<!-- Guestbook panel -->
		<div class="section">
			<div id="gb" class="section_panel navbar_padding">
				<h2>Gästebuch</h2>
				<p>Teilen Sie uns und andern Benutzern Ihre Erfahrung mit unserer Webseite mit! 
				   Des weiteren können Sie auch Vorschläge und Verbesserungsmöglichkeiten für die Seite posten! 
				   Wir freuen und über jeden Beitrag der Community!</p>
				<a href="guestbook.php"><button type="button">zum Gästebuch</button></a>
			</div>
			<div class="section_panel">
				<img src="images/index/gb.jpg"/>
			</div>
		</div>

		<!-- Login panel -->
		<div class="section">
			<div id="login" class="section_panel navbar_padding">
				<img src="images/index/blume.jpg"/>
			</div>
			<div class="section_panel">
				<h2>Willkommen zurück!</h2>
				<p>Loggen Sie sich hier mit Ihren Anmelde-Daten ein, um danach die Bildergalerie besuchen zu können!</p>
				<form action="login.php" method="POST">
					<p>Username:<input type="text" name="username"></p>
					<p>Passwort:<input type="password" name="password"></p>
					<p><input type="submit" value="Login">
					<input type="reset" value="Löschen"></p>
				</form>

				<!-- PHP that checks if the user is logged in -->
				<?php
				if (isset($_COOKIE['login'])){
				?>
				<form action="logout.php" method="GET">
					<input type="hidden" name="logout">
					<input type="submit" value="Ausloggen">
				</form>
				<?php
					}
					else{
				?>
				<?php	}	
				?>

			</div>
		</div>

		<!-- Register panel -->
		<div class="section">
			<div id="register" class="section_panel navbar_padding">
				<h2>Werden Sie heute noch ein Teil unserer Community!</h2>
				<form action="register.php" method="GET">
					<p>Username: </br><input type="text" name="username"</p>
					<p>Passwort: </br><input type="password" name="password"</p>
					<p><input type="submit" value="Registrieren">
					<input type="reset" value="Löschen"></p>
				</form>
			</div>
			<div class="section_panel">
				<img src="images/index/join.jpg"/>
			</div>
		</div>

		<!-- Bildergalerie panel -->
		<div class="section">
			<div id="upload">
				<img src="images/index/nootnoot.jpg"/>
			</div>
			<div class="section_panel">
				<h2>Bildergalerie</h2>
				<p>Greife hier auf deine Fotos zu oder lade Sie von überall auf der Welt herauf!</p>
				<!-- PHP that checks if the user is logged in -->
				<?php
					if (isset($_COOKIE['login'])){
				?>
				<a href="gallery.php"><button type="button">Bildergallerie</button></a>
				<?php
					}else{
						
				?>
				<p>Sie müssen sich zuerst einloggen bevor Sie die Bildergallerie betreten können.</p>
				<button type="button" disabled>Bildergallerie</button>
				<?php
					}
				?>
			</div>
		</div>

		<div>
			<div class="section centerText">
				Copyright @ 2017 PictureProject
			</div>
		</div>
	</body>
</html>