
<?php
	session_start();
       error_reporting(0); 
	//require_once "admin.php";
        //sset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true)
        if(!isset($_SESSION["admin"]) && !$_SESSION["admin"] === true){
        header("location: admin.php");
        exit;
        }

	require_once "header.html";
	require_once "config.php";
	$query = "SELECT * from users ORDER BY created_at ";
        $result = mysqli_query($link, $query);
        if(!$result){
                echo "Can't retrieve data " . mysqli_error($link);
                exit;
        }
		
	
?>
 <?php require_once "css.html";?>

	
	<a href="admin_signout.php" class="btn btn-primary">Sign out!</a>
	<table class="table" style="margin-top: 20px">
		<tr>
			<th>USER ID</th>
			<th>USER NAME</th>
			<th>UID</th>
			<th>ADD ID</th>			
			<th>&nbsp;</th>
		</tr>
		<?php while($row = mysqli_fetch_assoc($result)){ ?>
		<tr>
			<td><?php echo $row['id']; ?></td>
			<td><?php echo $row['username']; ?></td>
			<td><?php echo $row['uid']; ?></td>
                        <td>
			<?php
                        $query = "SELECT add_id from book_details where user_id ='".$row['id']."'";
                        $result1 = mysqli_query($link, $query);
                        while($row1 = mysqli_fetch_assoc($result1)){
                            echo $row1['add_id']." , ";
                        }
                        
                        ?>
                        </td>			
			<td><a href="admin_delete.php?id=<?php echo $row['id']; ?>">Delete</a></td>
		</tr>
		<?php } ?>
	</table>

<?php
	if(isset($link)) {mysqli_close($link);}
	
?>