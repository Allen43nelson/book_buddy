<?php
	error_reporting(0);
        $user_id = $_GET['id'];

	require_once "config.php";
        $query = "DELETE FROM images WHERE user_id = '$user_id'";
	$result = mysqli_query($link, $query);
	if(!$result){
		echo "delete data unsuccessfully " . mysqli_error($link);
		exit;
        }else{
            
       $filename="./photos/photo".$user_id.".jpeg";
        unlink($filename);
	$query = "DELETE FROM book_details WHERE user_id = '$user_id'";
	$result = mysqli_query($link, $query);
	if(!$result){
		echo "delete data unsuccessfully " . mysqli_error($link);
		exit;
        } else {
            

	
        
	$query = "DELETE FROM users WHERE id = '$user_id'";
	$result = mysqli_query($link, $query);
	if(!$result){
		echo "delete data unsuccessfully " . mysqli_error($link);
		exit;
	}
        }
        }
	header("Location: admin_book.php");
?>