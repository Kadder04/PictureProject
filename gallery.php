<?php
session_start();     
if (isset($_COOKIE['login'])){
$itemsPerPage = '20';       
$thumb_width  = '89';       
$thumb_height = '50';        
$src_folder   = './images/gallery';           
$src_files    = scandir($src_folder);
$extensions   = array(".jpg",".png",".gif",".JPG",".PNG",".GIF");

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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Photo Gallerie</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php include('navigation.php'); ?>
<div align="center" style="font-size:13px;font-weight:bold;">
</div>

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

    echo 'In diesem Album sind keine Bilder vorhanden';
   
} else {
	echo 'Willkommen, '. $_SESSION['username']; 
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

    for( $i=$start; $i<$start + $itemsPerPage; $i++ ) {
		  
	   if( isset($files[$i]) && is_file( $src_folder .'/'. $files[$i] ) ) { 
	   
	      echo '<div class="thumb">
	            <a href="'. $src_folder .'/'. $files[$i] .'" class="albumpix" rel="albumpix">
			       <img src="'. $src_folder .'/thumbnails/'. $files[$i] .'" width="'.$thumb_width.'" height="'.$thumb_height.'" alt="" />
				</a>  
			    </div>'; 
      
	    } else {
		  
		  if( isset($files[$i]) ) {
		    echo $files[$i];
		  }
		  
		}
     
    }
	   

     echo '<div class="clear"></div>';
  
     echo '<div class="p5-sides">
	         <div class="float-left" >'.count($files).' Bilder</div>
	 
	         <div class="float-right" class="paginate-wrapper">';
        	 
              print_pagination($numPages,$currentPage);
  
       echo '</div>
	 
	         <div class="clearb10">
		   </div>';

}
?>
  
</div>   
<div>
	</br><a href="upload.php" class="btn dark-blue-bordered-btn normal-btn">Hochladen</a>
</div>
<div class="text-center footer">
    	<center><div class="container">
    		<font color="#006699">Copyright @ 2016 PictureProject</font>
        </div></center>
    </div>
<?php }else{ ?>
<link rel="stylesheet" type="text/css" href="style.css">
<?php include('navigation.php'); ?>
<center><h1>Sie sind zurzeit nicht Eingelogt.</h1></center>

<?php } ?>
</body>
</html>