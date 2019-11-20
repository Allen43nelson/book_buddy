<?php
// Include config file
include 'upload_bookdetaills.php';
session_start();
if(!(isset($_SESSION["loggedin"])) && !($_SESSION["loggedin"] === true)){
    header("location: login.php");
    exit;
}
else{
require_once "config.php";
 
// Define variables and initialize with empty values
$book_name = $branch = $price = $author_name = $message = $sem = $check = $phone_no = "";
$book_name_err = $branch_name_err = $price_err = $msg_err = $author_name_err = $sem_err = $phone_err = "";
 
// Processing form data when form is submitted
if($_POST["submit"] == "SUBMIT"){
 
    // Validate book_name
    if(empty(trim($_POST["book_name"]))){
        $book_name_err = "Please enter a book_name.";
    } else{
        
                    $book_name = trim($_POST["book_name"]);
            }
    
    // Validate password
    if(empty(trim($_POST["branch"]))){
        $branch_name_err = "Please enter a branch.";     
    } 
    else{
        $branch = trim($_POST["branch"]);
    }
    
    if(empty(trim($_POST["phone_no"]))){
        $phone_err = "Please enter phone number.";     
    } 
    else{
        $phone_no = trim($_POST["phone_no"]);
    }
    
    
    
    if(empty(trim($_POST["sem"]))){
        $sem_err = "Please enter semester.";     
    } 
    else{
        $sem = trim($_POST["sem"]);
    }
    
 
    
    if(empty(trim($_POST["price"]))){
        $price_err = "Please enter price.";     
    } else{
        $price = trim($_POST["price"]);
        }
        
    if(empty(trim($_POST["author_name"]))){
        $author_name_err = "Please enter author's name.";     
    } else{
        $author_name = trim($_POST["author_name"]);
        } 
    
        
    if(empty(trim($_POST["message"]))){
        $msg_err = "Please enter a description.";     
    } elseif(strlen(trim($_POST["message"])) < 15){
        $msg_err = "description must have atleast 15 characters.";
    } else{
        $message = trim($_POST["message"]);
    }    
    //echo $_FILES["image"]["tmp_name"];
    //sleep(3);
    $check = getimagesize($_FILES["image"]["tmp_name"]);
     $tex = fopen("testfile.txt", "w");
     $txt = $_FILES["image"]["tmp_name"];
     fwrite($tex, $txt);   
        
    if($check){
        //$tex = fopen("testfile.txt", "w");
        

        $image = $_FILES['image']['tmp_name'];
        //
        //$imgContent = addslashes(file_get_contents($destination_url));

        /*
         * Insert image data into database
         */
        
        echo 'heloooooooo';
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
    }
   
        if(empty($book_name_err) && empty($price_err) && empty($branch_name_err) && empty($sem_err) && empty($author_name_err) && empty($msg_err) && empty($phone_err) ){
        
        // Prepare an insert statement
        $destination_url = 'photo'.$_SESSION["id"].'.jpeg'; 
        $imgContent = addslashes(file_get_contents($destination_url));
        $sql = "INSERT INTO book_details (user_id , book_name,author_name, branch , semester ,  price ,phone_no , message , image) VALUES (? , ?, ? , ?,?, ? , ?, ?,?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssssssss",$param_id , $param_book_name, $param_author_name ,$param_branch , $param_sem, $param_price , $param_phoneno, $param_message , $param_image);
            
            // Set parameters
            $param_id = $_SESSION ["id"];
            $param_book_name = $book_name;
            $param_author_name = $author_name;
            $param_branch =  $branch;
            $param_sem = $sem;
            $param_price = $price;
            $param_phoneno = $phone_no;
            $param_message = $message;
            $param_image = $imgContent;
           // unlink($destination_url);
            
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
               // header("location: image.php");
               echo "alert('ADD POSTED')";
               header("location: homepage.php");
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}
}
?>