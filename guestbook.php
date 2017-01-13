<html>
<head>
	<?php include('head.php'); ?>
</head>

<body>
	<?php include('navigation.php'); ?>
  <div class="header">
    <h2>Willkommen zum G&aumlstebuch</h2>
    <p>Sch&oumln dass Sie hier sind, hinterlassen Sie uns doch eine kleine Nachricht!</p>
  </div>
	<div class="content">
    <form method="POST" role="form" class="contact-form">
      <div>
        <input type="text" name="user" placeholder="Name..." />
      </div>
      <div class="form-group">
        <textarea cols="40" rows="5" name="note" placeholder="Kommentar..." wrap="virtual"></textarea>
      </div>
        <input type="submit" name="submit" value="Senden" />
    </form>
  </div>

    <?php
      if (isset($_POST['submit']))
      {
        $user = $_POST['user'];
        $note = $_POST['note'];

        if(!empty($user) && !empty($note)) 
        {
          $msg = 'Benutzer: ' . $user . "\n" . 'Kommentar: ' . $note . "\n\n"; //öffnet file
          $fp = fopen("data/guestbook.txt","a") or die("File kann nicht geöffnet werden!"); //schreibt im file
          fwrite($fp, $msg."\n");
          fclose($fp);
        }
      }
    ?>
  
  <div class="title">
    <h2>Alle Einträge:</h2>
      <hr>
  </div>
  <div class="beitrag">
    <?php
      $file = fopen("data/guestbook.txt", "r") or exit("File kann nicht geöffnet werden!");
        while(!feof($file))
        {
          echo fgets($file). '<br />';
        }
        fclose($file);
    ?>
  </div>
  <div class="title">
    <hr>
  </div>
    <?php include('footer.php'); ?>
</body>
</html>
