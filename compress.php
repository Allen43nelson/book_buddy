<?php

        $source_url ='C:\development\XAMPP\htdocs\image\20190910_214656.jpg';
        $destination_url='C:\development\XAMPP\htdocs\image\new11.jpg'; 
        $quality=25;

       $info = getimagesize($source_url);

        if ($info['mime'] == 'image/jpeg')
              $image = imagecreatefromjpeg($source_url);

        elseif ($info['mime'] == 'image/gif')
              $image = imagecreatefromgif($source_url);

      elseif ($info['mime'] == 'image/png')
              $image = imagecreatefrompng($source_url);

        imagejpeg($image, $destination_url, $quality);
    //return $destination_url;
    

?>