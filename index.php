<html>
<header>
<title>PictureProject | Willkommen</title>
<meta http-equiv="Content-Type" content="text/plain; charset="utf-8"/>
<link rel="stylesheet" type="text/css" href="style.css">
</header>
<body bgcolor="#006699">
<div class="fixed-header">
            <nav class="main-menu" style="width:981; margin: auto;">
                <ul>
					<li><a><b>PictureProject</b></a></li>
                    <li><a href="#home">Home</a></li>
                    <li><a href="#gb">Gästebuch</a></li>
                    <li><a href="#login">Einloggen</a></li>
                    <li><a href="#register">Registrieren</a></li>
                    <li><a href="#upload">Bildergallerie</a></li>
                </ul>
            </nav>
        </div>
    </div>
<div class="table">
<center>
<table bgcolor="#ffffff" border="0">
	<tr>
		<td id="home" width="570" height="570" ><img src="images/index/street.jpg"/></td>
		<td width="570" height="570" align="center" valign="top"></br></br></br></br></br></br></br></br></br></br></br>
		<h2>PictureProject</h2></br></br>
		<h3>Willkommen zu der nach Bilder verrückten Community!</h3></br></br>
		</td>
	</tr>
	
	<tr>
		<td id="gb" width="570" height="570" align="center" valign="top"></br>
		</br></br></br><h2>Gästebuch</h2></br></br></br>
		<p>Teilen Sie mit anderen Nutzern Ihre Erfahrungen. Weiterhin können Sie uns Ihre Erfahrungen mitteilen
             und Vorschläge vermitteln. Wir erfreuen uns auf jeden Beitrag von unserer Community.</p>
		<div>
               <a href="guestbook.php"><button type="button" class="btn dark-blue-bordered-btn normal-btn">zum Gästebuch</button></a>
           </div></td>
		<td width="570" height="570"><img src="images/index/gb.jpg"/></td>
	</tr>
	
	<tr>
		<td id="login" width="570" height="570"><img src="images/index/blume.jpg"/></td>
		<td width="570" height="570" align="center" valign="top"></br>
		</br></br><h2>Willkommen zurück!</h2></br>
		<p>Wir haben Sie vermisst.</p></br></br>
		<div>
		
        <form action="login.php" method="POST">
		
		<p>
		Username: </br><input type="text" name="username" class="btn dark-blue-bordered-btn normal-btn">
		</p>
		<p>
		Passwort: </br><input type="password" name="password" class="btn dark-blue-bordered-btn normal-btn">
		</p>
		<p>
		<input type="submit" value="Login" class="btn dark-blue-bordered-btn normal-btn">
		<input type="reset" value="Löschen" class="btn dark-blue-bordered-btn normal-btn">
		</p>
	</form>
		
	<?php
	
	
	if (isset($_COOKIE['login'])){
	?>
		<form action="logout.php" method="GET">
			<input type="hidden" name="logout">
			<input type="submit" value="Ausloggen" class="btn dark-blue-bordered-btn normal-btn">
		</form>
	<?php
		}
		else{
	?>
		
		<!--<form action="registrate.php" method="GET">
			<input type="hidden" name="Registrate">
			<input type="submit" value="Registrate">
		</form>-->
	<?php
		}
	?>
           </div>
		</td>
	</tr>
	
	<tr>
		<td id="register" width="570" height="570" align="center" valign="top"></br>
		</br></br></br><h2>Werden Sie heute noch ein Teil unserer Community!</h2></br></br></br>
		<div>
        <form action="register.php" method="GET">
		<p>Username: </br><input type="text" name="username" class="btn dark-blue-bordered-btn normal-btn"> </p>
		<p>Passwort: </br><input type="password" name="password" class="btn dark-blue-bordered-btn normal-btn"> </p>
		<p><input type="submit" value="Registrieren" class="btn dark-blue-bordered-btn normal-btn">
		<input type="reset" value="Löschen" class="btn dark-blue-bordered-btn normal-btn"></p>
	</form>
           </div></td>
		<td width="570" height="570"><img src="images/index/join.jpg"/></td>
	</tr>
	
	<tr>
		<td id="upload" width="570" height="570"><img src="images/index/nootnoot.jpg"/></td>
		<td width="570" height="570" align="center" valign="top"></br>
		</br></br></br><h2>Willkommen zu der nach Bilder verrückten Community!</h2></br></br></br>
		<p>Lade deine Fotos hoch, greife auf sie zu, sortiere, bearbeite und teile sie über jedes Gerät und von überall auf der Welt aus.</p>
		<?php
			if (isset($_COOKIE['login'])){
		?>
		
		<a href="gallery.php"><button type="button" class="btn dark-blue-bordered-btn normal-btn">Bildergallerie</button></a>
		
		<?php
			}else{
				
		?>
		<button type="button" disabled class="btn dark-blue-bordered-btn normal-btn">Bildergallerie(Sie müssen sich zuerst einloggen)</button>
		<?php
			}
		?>
		</td>
	</tr>
</table>
</center>
</div>
<div class="text-center footer">
    	<center><div class="container">
    		Copyright @ 2016 PictureProject
        </div></center>
    </div>
</body>
</html>