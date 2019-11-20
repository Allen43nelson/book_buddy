<?php
    session_start();
    require_once "config.php";
   if(isset($_POST["submit"])){
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false){
        $image = $_FILES['image']['tmp_name'];
       $result = $link->query("SELECT max(add_id) as add_id FROM book_details");
        if($result->num_rows > 0){
       
       $imgData = $result->fetch_assoc();       
       while ($imgData)
       {
           $add_id = $imgData['add_id']; 
        //echo $imgData['add_id'];
        $imgData = $result->fetch_assoc();      
       }
    }else{
        echo 'AD id not found';
    }
        
        $user_id=$_SESSION["id"];
        $source_url =$image;
        $destination_url='./photos/photo'.$add_id.'.jpeg'; 
        $quality=25;

       $info = getimagesize($source_url);

        if ($info['mime'] == 'image/jpeg')
              $image = imagecreatefromjpeg($source_url);

        elseif ($info['mime'] == 'image/gif')
              $image = imagecreatefromgif($source_url);

      elseif ($info['mime'] == 'image/png')
              $image = imagecreatefrompng($source_url);

        imagejpeg($image, $destination_url, $quality);
        
      
        
        
        $insert = $link->query("INSERT into images (add_id , user_id ,image) VALUES ('$add_id','$user_id', '$destination_url')");
        if($insert){
            echo "File uploaded successfully.";
            header("location: homepage.php");
        }else{
            echo '$add_id'.$add_id;
            echo '$user_id'.$user_id;
            echo '$image'.$destination_url;
            echo "File upload failed, please try again.";
        } 
    }else{
        echo "Please select an image file to upload.";
    }
}
    
   
    
    
    

?>