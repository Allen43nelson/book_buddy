<?php
session_start();
if(isset($_POST["submit"])){
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false){
        $image = $_FILES['image']['tmp_name'];
        //
        //$imgContent = addslashes(file_get_contents($destination_url));

        /*
         * Insert image data into database
         */
        
        echo 'heloooooooo';
        sleep(5);
         $source_url = $image;
        $destination_url='photo'.$_SESSION["id"].'.jpeg'; 
        $quality=10;
        
        
        
        
       $info = getimagesize($source_url);

        if ($info['mime'] == 'image/jpeg')
              $image = imagecreatefromjpeg($source_url);

        elseif ($info['mime'] == 'image/gif')
              $image = imagecreatefromgif($source_url);

      elseif ($info['mime'] == 'image/png')
              $image = imagecreatefrompng($source_url);

        imagejpeg($image, $destination_url, $quality);
        
        
        
    //return $destination_url;
        $imgContent = addslashes(file_get_contents($destination_url));
        
       
        
        if($imgContent){
            echo "File uploaded successfully.";
            
        }else{
            echo "File upload failed, please try again.";
        } 
    }else{
        echo "Please select an image file to upload.";
    }
}
?>