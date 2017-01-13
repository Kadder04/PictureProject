<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>PictureProject | Gästebuch</title>
</head>

<body bgcolor="#006699">
	<?php include('navigation.php'); ?>
    <div class="container guestbook background">
    <h2>Wilkommen zum G&aumlstebuch</h2>
    <span class="byline">Sch&oumln dass Sie da sind, lassen Sie doch eine kleine Nachricht da.</span>
    <p>&nbsp; &nbsp;</p>
	
      <div class="row">
        <div class="col-md-6">
          <form action="" method="POST" role="form" class="contact-form">
            <div class="form-group">
              <input class="form-control" type="text" name="user" placeholder="Name..." />
            </div>
            <div class="form-group">
              <textarea class="form-control" cols="40" rows="5" name="note" placeholder="Kommentar..." wrap="virtual"></textarea>
            </div>

            <input class="btn btn-primary" type="submit" name="submit" value="Senden" />
          </form>
        </div>
      </div>
      <?php

      if (isset($_POST['submit'])){

      $user = $_POST['user'];
      $note = $_POST['note'];

      if(!empty($user) && !empty($note)) {
      $msg = $user . ' : ' . "\n" . $note . "\n\n";
      //öffnet file
      $fp = fopen("data/guestbook.txt","a") or die("File kann nicht geöffnet werden!");
      //schreibt im file
      fwrite($fp, $msg."\n");
      fclose($fp);
      }
      }
      ?>

      <h2>Alle Einträge:</h2>
      <?php
      $file = fopen("data/guestbook.txt", "r") or exit("File kann nicht geöffnet werden!");
      while(!feof($file))
        {
        echo fgets($file). '<br />';
        }
      fclose($file);
      ?>
    </div>
    <div class="text-center footer">
    	<center><div class="container">
    		Copyright @ 2016 PictureProject
        </div></center>
    </div>
</body>
</html>
