<html>
	<header>
		<?php include('head.php'); ?>
	</header>
	<body>
		<!-- navigation bar -->
		<div class="navbar">
			<div class="navbar_content"><a href="#home" class="page-scroll link_animation">PictureProject</a></div>
			<div class="navbar_content"><a href="#gb" class="page-scroll link_animation">Gästebuch</a></div>
			<div class="navbar_content"><a href="#login" class="page-scroll link_animation">Einloggen</a></div>
			<div class="navbar_content"><a href="#register" class="page-scroll link_animation">Registrieren</a></div>
			<div class="navbar_content"><a href="#upload" class="page-scroll link_animation">Bildergallerie</a></div>
		</div>

		<!-- Home panel -->
		<div class="section first_panel_padding">
			<div id="home" class="section_panel navbar_padding">
				<img src="images/index/street.jpg"/>
			</div>
			<div class="section_panel centerText">
				<h2>PictureProject</h2>
				<h3>Willkommen bei der PictureProject-community!</h3>
			</div>
		</div>

		<!-- Guestbook panel -->
		<div class="section">
			<div id="gb" class="section_panel navbar_padding centerText">
				<h2>Gästebuch</h2>
				<p>Teilen Sie uns und andern Benutzern Ihre Erfahrung mit unserer Webseite mit!<br>
				   Des weiteren können Sie auch Vorschläge und Verbesserungsmöglichkeiten für die Seite posten! <br>
				   Wir freuen und über jeden Beitrag der Community!</p>
				<a href="guestbook.php" class="button_style">zum Gästebuch</a>
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
			<div class="section_panel centerText">
				<h2>Willkommen zurück!</h2>
				<p>Loggen Sie sich hier mit Ihren Anmelde-Daten ein, um danach die Bildergalerie besuchen zu können!</p>
				<form action="login.php" method="POST">
					<p>Username: </br><input type="text" name="username"></p>
					<p>Passwort: </br><input type="password" name="password"></p>
					<p><input type="submit" value="Login">
					<input type="reset" value="Clear"></p>
				</form>

				<!-- PHP that checks if the user is logged in -->
				<?php
				if (isset($_COOKIE['login'])){
				?>
				<form action="logout.php" method="GET">
					<input type="hidden" class="button_style" name="logout">
					<input type="submit" class="button_style" value="Ausloggen">
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
			<div id="register" class="section_panel navbar_padding centerText">
				<h2>Werden Sie heute noch ein Teil unserer Community!</h2>
				<p>Registrieren Sie sich noch heute!</p>
				<form action="register.php" method="GET">
					<p>Username: </br><input type="text" name="username"></p>
					<p>Passwort: </br><input type="password" name="password"></p>
					<p><input type="submit" value="Registrieren">
					<input type="reset" value="Clear"></p>
				</form>
			</div>
			<div class="section_panel">
				<img src="images/index/join.jpg"/>
			</div>
		</div>

		<!-- Bildergalerie panel -->
		<div class="section">
			<div id="upload" class="section_panel">
				<img src="images/index/nootnoot.jpg"/>
			</div>
			<div class="section_panel centerText">
				<h2>Bildergalerie</h2>
				<p>Greife hier auf deine Fotos zu oder lade Sie von überall auf der Welt herauf!</p>
				<!-- PHP that checks if the user is logged in -->
				<?php
					if (isset($_COOKIE['login'])){
				?>
				<a href="gallery.php" class="button_style">zur Bildergallerie</a>
				<?php
					}else{
						
				?>
				<a href="" class="button_style">zur Bildergallerie (deaktiviert)</a>
				<p class="small_text">Sie müssen sich zuerst einloggen bevor Sie die Bildergallerie betreten können.</p>
				<?php
					}
				?>
			</div>
		</div>
		<?php include('footer.php'); ?>
	</body>
</html>