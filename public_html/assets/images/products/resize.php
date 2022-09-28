<?php

$path = './medium';
$files = scandir($path);
$files = array_diff(scandir($path), array('.', '..'));

foreach ($files as $file) {

    $re = explode(".", $file);

    if($re[1] == "jpeg" || $re[1] == "jpg" || $re[1] == "png"  ){
       // unlink("medium/" . $file);
    }
  
      //$name = "medium/" . $re[0] . ".webp";

      if (exif_imagetype($file) == 3) { // png

        // $image = imagecreatefrompng($file);
        //$imgResized = imagescale($image, 320, 466);
        // imagewebp($image, $name);
        unlink($file);
    } else if (exif_imagetype($file) == 2) { //  jpeg
        unlink($file);
        // $image = imagecreatefromjpeg($file);
        //$imgResized = imagescale($image, 320, 466);
        //imagewebp($image, $name);

    } elseif (exif_imagetype($file) == 18) { // webp

        // $image = imagecreatefromwebp($file);
        // $imgResized = imagescale($image, 320, 466);
        //imagewebp($image, $name);

    }

}
