<?php
	error_reporting(0);
        session_start();
	if(!isset($_POST['submit'])){
		echo "Something wrong! Check again!";
		exit;
	}
	require_once "config.php";
	

	$name = trim($_POST['name']);
	$pass = trim($_POST['pass']);

	if($name == "" || $pass == ""){
		echo "Name or Pass is empty!";
		exit;
	}

	$name = mysqli_real_escape_string($link, $name);
	$pass = mysqli_real_escape_string($link, $pass);
	$pass = sha1($pass);

	// get from db
	$query = "SELECT name, pass from admin";
	$result = mysqli_query($link, $query);
	if(!$result){
		echo "Empty data " . mysqli_error($link);
		exit;
	}
	$row = mysqli_fetch_assoc($result);

	if($name != $row['name'] && $pass != $row['pass']){
		echo "Name or pass is wrong. Check again!";
		$_SESSION['admin'] = false;
		exit;
	}

	if(isset($link)) {mysqli_close($link);}
	$_SESSION['admin'] = true;
	header("Location: admin_book.php");
?>