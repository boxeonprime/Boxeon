<?php

//$path = './';
//$files = scandir($path);
//$files = array_diff(scandir($path), array('.', '..'));

//foreach ($files as $file) {

  
      $name =  "./medium/ogbono-soup.webp";

     //$info = getimagesize($file);

      //if (exif_imagetype($file) == 3) { // png

        // $image = imagecreatefrompng($file);
        //$imgResized = imagescale($image, 320, 466);
        // imagewebp($image, $name);
       // unlink($file);
   // } else if (exif_imagetype($file) == 2) { //  jpeg
       // unlink($file);
        // $image = imagecreatefromjpeg($file);
        //$imgResized = imagescale($image, 320, 466);
        //imagewebp($image, $name);

   // } elseif (exif_imagetype($file) == 18 && (int)$info[0] > 320) { // webp

        $image = imagecreatefromwebp("./medium/ogbono-soup.webp");
         $imgResized = imagescale($image, 320, 466);
       imagewebp($imgResized, $name); 

   // }

//}
