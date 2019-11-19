
<!DOCTYPE html>

<?php
// Include config file
if(0){
    header("location: login.php");
    exit;
}
else{
require_once "config.php";
 
// Define variables and initialize with empty values
$book_name = $branch = $price = $author_name = $message = $sem = "";
$book_name_err = $branch_name_err = $price_err = $msg_err = $author_name_err = $sem_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
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
    
    
    
    
    
    if(empty($book_name_err) && empty($price_err) && empty($branch_name_err) && empty($sem_err) && empty($author_name_err) && empty($msg_err) ){
        
        // Prepare an insert statement
        $destination_url = 'photo'.$_SESSION["id"].'.jpeg'; 
        $imgContent = addslashes(file_get_contents($destination_url));
        $sql = "INSERT INTO book_details (user_id , book_name,author_name, branch , semester ,  price , message , image) VALUES (? , ?, ? , ?, ? , ?, ?,?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssssss",$param_id , $param_book_name, $param_author_name ,$param_branch , $param_sem, $param_price , $param_message , $param_image);
            
            // Set parameters
            $param_id = 1;
            $param_book_name = $book_name;
            $param_author_name = $author_name;
            $param_branch =  $branch;
            $param_sem = $sem;
            $param_price = $price;
            $param_message = $message;
            $param_image = $imgContent;
            unlink($destination_url);
            
            
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
 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Enter Book Details</h2>
        <p>Please fill this form to submit your Add.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($book_name_err)) ? 'has-error' : ''; ?>">
                <label>Book Name</label>
                <input type="text" name="book_name" class="form-control" value="<?php echo $book_name; ?>">
                <span class="help-block"><?php echo $book_name_err; ?></span>
            </div>  
            <div class="form-group <?php echo (!empty($author_name_err)) ? 'has-error' : ''; ?>">
                <label>Author's Name</label>
                <input type="text" name="author_name" class="form-control" value="<?php echo $author_name; ?>">
                <span class="help-block"><?php echo $author_name_err; ?></span>
            </div>
            <div cclass="form-group <?php echo (!empty($branch_name_err)) ? 'has-error' : ''; ?>">
                <label>Branch</label>
		<div>
		<select class="form-control"  name="branch" >
                    <option value="<?php echo $branch; ?>">Select Branch</option>
                    <option Value="CSE">CSE</option>
                    <option value="MECH">MECH</option>
                    <option value="CIVI">CIVIL</option>
                    <option value="ECE">ECE</option>
                    <option value="EEE">EEE</option>
                    <option value="IT">IT</option>
                </select>
                <span class="help-block"><?php echo $branch_name_err; ?></span>    
                </div>
                
            </div>
            
            
            
            <div cclass="form-group <?php echo (!empty($sem_err)) ? 'has-error' : ''; ?>">
                <label>Semester</label>
		<div>
		<select class="form-control"  name="sem" >
                    <option value="<?php echo $sem; ?>">Select Semester</option>
                    <option value="s1">S1</option>
                    <option value="s2">S2</option>
                    <option value="s3">S3</option>
                    <option value="s4">S4</option>
                    <option value="s5">S5</option>
                    <option value="s6">S6</option>
                    <option value="s7">S7</option>
                    <option value="s8">S8</option>
                </select>
                <span class="help-block"><?php echo $sem_err; ?></span>    
                </div>
                
            </div>
            
            
            
            <div class="form-group <?php echo (!empty($price_err)) ? 'has-error' : ''; ?>">
                <label>Price</label>
                <input type="text" name="price" class="form-control" value="<?php echo $price; ?>">
                <span class="help-block"><?php echo $price_err; ?></span>
            </div>
            
            <div class="form-group <?php echo (!empty($msg_err)) ? 'has-error' : ''; ?>">
                <label>Description</lable><br>
                <textarea rows="10" cols="55" class="input100" class="form-control" name="message" placeholder="<?php echo $message; ?>please include a description"></textarea>
                <span class="help-block"><?php echo $msg_err; ?></span>
            </div>    
            
        <form class="form-group " action="upload.php" method="post" enctype="multipart/form-data">
            <label>Select image to upload:</label>
            <input type="file" name="image"/><br><br>
            <input type="submit" class="btn btn-primary" name="upload" value="SUBMIT"/>
            <button onclick="location.href='homepage.php'" class="btn btn-default" type="button">
            BACK
            </button>
            
       
                                        
            
            
     
 
        </form> 
         </form>
        
            
            
    </div>    
</body>
</html>