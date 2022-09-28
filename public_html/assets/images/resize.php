<?php

$path = './';
$files = scandir($path);
$files = array_diff(scandir($path), array('.', '..'));

foreach ($files as $file) {

    $re = explode(".", $file);

    //if($re[1] == "jpeg" || $re[1] == "jpg" || $re[1] == "png"  ){
       //unlink($file);
  //  }
  
  if (exif_imagetype($file) == 2) { //  jpeg
    $name = $re[0] . ".webp";
    $image = imagecreatefromjpeg($file);
    imagewebp($image, $name);

}


}
