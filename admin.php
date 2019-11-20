<?php
	
	require_once "header.html";
?>

<html>
    <head>
        <title>TODO supply a title</title>
        <?php require_once "css.html";?>
    </head>
    <body>
        <br>
        <br>
        <form class="form-horizontal" method="post" action="admin_verify.php">
		<div class="form-group">
			<label for="name" class="control-label col-md-4">Name</label>
			<div class="col-md-4">
				<input type="text" name="name" class="form-control">
			</div>
		</div>
		<div class="form-group">
			<label for="pass" class="control-label col-md-4">Pass</label>
			<div class="col-md-4">
				<input type="password" name="pass" class="form-control">
			</div>
		</div>
		<input type="submit" name="submit" class="btn btn-primary">
	</form>
    </body>
</html>
