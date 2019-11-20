<?php
	error_reporting(0);
	require_once "header.html";
?>

<html>
    <head>
        <title>ADMIN LOGIN</title>
        <?php require_once "css.html";?>
    </head>
    <body>
	<style>
	h1{
			text-align: center;
			font-family: Arial, Helvetica, sans-serif;
		}
		body{
			background-color: #f4f0f7;
                }
		</style>
        <br>
        <br>
		<h1>Admin Sign In:</h1>
                <form class="form-horizontal" method="post" action="admin_verify.php">
		<div class="form-group">
			<label for="name" class="control-label col-md-4">Name:   </label>
			<div class="col-md-4">
			<input type="text" name="name" class="form-control">
			</div>
		</div>
		<div class="form-group">
			<label for="pass" class="control-label col-md-4">Password:</label>
			<div class="col-md-4">
			<input type="password" name="pass" class="form-control">
                        </div><br>
			<input type="submit" name="submit" class="btn btn-primary">
		</div>
		
	</form>
    </body>
</html>