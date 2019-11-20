<?php
	$user_id = $_GET['id'];

	require_once "config.php";
        
	

	$query = "DELETE FROM users WHERE id = '$user_id'";
	$result = mysqli_query($link, $query);
	if(!$result){
		echo "delete data unsuccessfully " . mysqli_error($link);
		exit;
	}
	header("Location: admin_book.php");
?>