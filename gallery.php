<?php
session_start();     
if (isset($_COOKIE['login'])){
$itemsPerPage = '20';       
$thumb_width  = '89';       
$thumb_height = '50';        
$src_folder   = './images/gallery';           
$src_files    = scandir($src_folder);
$extensions   = array(".jpg", ".jpeg", ".png",".gif",".JPG", ".JPEG", ".PNG",".GIF");

error_reporting(0); //Delete asap when fixed

function make_thumb($folder,$src,$dest,$thumb_width) {

	$source_image = imagecreatefromjpeg($folder.'/'.$src);
	$width = imagesx($source_image);
	$height = imagesy($source_image);
	
	$thumb_height = floor($height*($thumb_width/$width));
	
	$virtual_image = imagecreatetruecolor($thumb_width,$thumb_height);
	
	imagecopyresampled($virtual_image,$source_image,0,0,0,0,$thumb_width,$thumb_height,$width,$height);
	
	imagejpeg($virtual_image,$dest,100);
	
}

function print_pagination($numPages,$currentPage) {
     
   echo 'Seite '. $currentPage .' von '. $numPages;
   
   if ($numPages > 1) {
      
	   echo '&nbsp;&nbsp;';
   
       if ($currentPage > 1) {
	       $prevPage = $currentPage - 1;
	       echo '<a href="'. $_SERVER['PHP_SELF'] .'?p='. $prevPage.'">&laquo;&laquo;</a>';
	   }	   
	   
	   for( $e=0; $e < $numPages; $e++ ) {
           $p = $e + 1;
       
	       if ($p == $currentPage) {	    
		       $class = 'current-paginate';
	       } else {
	           $class = 'paginate';
	       } 
		       echo '<a class="'. $class .'" href="'. $_SERVER['PHP_SELF'] .'?p='. $p .'">'. $p .'</a>';  	  
	   }
	   
	   if ($currentPage != $numPages) {
           $nextPage = $currentPage + 1;	
		   echo '<a href="'. $_SERVER['PHP_SELF'] .'?p='. $nextPage.'">&raquo;&raquo;</a>';
	   }	  	 
   
   }

}
?>
<html>
	<head>
		<?php include('head.php'); ?>
	</head>
	<body>
		<?php include('navigation.php'); ?>

	<div class="gallery"> 
	<div class="container guestbook background">
	<?php 
	$files = array();
	foreach($src_files as $file) {
		
	$ext = strrchr($file, '.');
	if(in_array($ext, $extensions)) {
			
		array_push( $files, $file );
			
			
		if (!is_dir($src_folder.'/thumbnails')) {
			mkdir($src_folder.'/thumbnails');
			chmod($src_folder.'/thumbnails', 0777);
			//chown($src_folder.'/thumbnails', 'apache'); 
		}
			
		$thumb = $src_folder.'/thumbnails/'.$file;
		if (!file_exists($thumb)) {
			make_thumb($src_folder,$file,$thumb,$thumb_width); 
			
		}
		
	}
		
	}


	if ( count($files) == 0 ) {

	echo 'In dieser Galerie sind keine Bilder vorhanden';

	} else {
	echo '<p class="centerText subtitle first_panel_padding">Willkommen, '. $_SESSION['username'] .'!</p>'; 
	$numPages = ceil( count($files) / $itemsPerPage );

	if(isset($_GET['p'])) {
		
		$currentPage = $_GET['p'];
		if($currentPage > $numPages) {
			$currentPage = $numPages;
		}

	} else {
		$currentPage=1;
	} 

	$start = ( $currentPage * $itemsPerPage ) - $itemsPerPage;

	echo '<div class="thumbnails">';
	
	for( $i=$start; $i<$start + $itemsPerPage; $i++ ) {
			
		if( isset($files[$i]) && is_file( $src_folder .'/'. $files[$i] ) ) { 
		
			echo '<a href="'. $src_folder .'/'. $files[$i] .'">
					<img src="'. $src_folder .'/thumbnails/'. $files[$i] .'" width="'.$thumb_width.'" height="'.$thumb_height.'"/>
				</a>'; 
		
		} else {
			
			if( isset($files[$i]) ) {
			echo $files[$i];
			}
			
		}
		
	}

	echo '</div>'; //Closes div thumbnails
	echo '<div class="centerText">
			<div><br><br><br>Total ' .count($files).' Bilder</div>';			
		print_pagination($numPages,$currentPage);
	}
	?>

	</div>   
	<div class="centerText">
	</br><a href="upload.php" class="button_style">Hochladen</a><br><br><br>
	</div>
	<?php include('footer.php'); ?>
	<?php }else{ ?>
	<?php include('head.php'); ?>
	<?php include('navigation.php'); ?>
	<p class="title centerText navbar_padding">Sie sind zurzeit nicht Eingelogt.<br><br><br></p>
	<?php include('footer.php'); ?>
	<?php } ?>
	</body>
</html>