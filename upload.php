<html>
<head>
	<?php include('head.php'); ?>
</head>

<body>
	<?php include('navigation.php'); ?>

		<div class="upload centerText first_panel_padding">

			<?php if(isset($_FILES['bild'])){if(is_uploaded_file ($_FILES['bild']['tmp_name'])){
				echo 'Erfolgreich!';
				$tmp_name = $_FILES['bild']['tmp_name'];
				$dateiname = $_FILES['bild']['name'];
				move_uploaded_file($tmp_name, 'images/gallery/'. $dateiname);
			}} ?>

			<form method="POST" action="upload.php" accept-charset="utf-8" enctype="multipart/form-data">
				<input type="file" size="50" name="bild" /><br>
				<input type="submit" name="hochladen" value="Senden"/>
			</form>
			<form method="POST" action="gallery.php" accept-charset="utf-8" enctype="multipart/form-data">
				<input type="submit" name="gallery" value="Zurück"/>
			</form>
		</div>
</body>
</html>
