<?php
session_start();
$destination_url='photo'. $_SESSION["id"].'.'.'jpeg'; 
if(isset($_POST["submit"])){
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false){
        $image = $_FILES['image']['tmp_name'];
        //
        //$imgContent = addslashes(file_get_contents($destination_url));

        /*
         * Insert image data into database
         */
         $source_url = $image;
        
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
        
        //DB details
        require_once "config.php";
        
        //Create connection and select DB
        //$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
        
        // Check connection
        
        }
        
        
        
        //Insert image content into database
        $insert = $link->query("INSERT into book_details (image) VALUES ('$imgContent') where add_id = 6");
        //unlink($destination_url);
        if($insert){
            echo "File uploaded successfully.";
            header("location: homepage.php");
            
        }else{
            echo "File upload failed, please try again.";
        } 
    }else{
        echo "Please select an image file to upload.";
    }

?>