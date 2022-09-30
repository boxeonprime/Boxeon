<?php

$path = './';
$files = scandir($path);
$files = array_diff(scandir($path), array('.', '..'));

foreach ($files as $file) {

  
      $name =  $file;

     $info = getimagesize($file);

      if (exif_imagetype($file) == 3) { // png

        // $image = imagecreatefrompng($file);
        //$imgResized = imagescale($image, 320, 466);
        // imagewebp($image, $name);
       // unlink($file);
    } else if (exif_imagetype($file) == 2) { //  jpeg
       // unlink($file);
        // $image = imagecreatefromjpeg($file);
        //$imgResized = imagescale($image, 320, 466);
        //imagewebp($image, $name);

    } elseif (exif_imagetype($file) == 18 && (int)$info[0] > 1600) { // webp

        $image = imagecreatefromwebp($file);
         $imgResized = imagescale($image, 494, 721);
       // imagewebp($imgResized, $name); 

    }

}
