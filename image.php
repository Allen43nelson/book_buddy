<!DOCTYPE html>
<html lang="en">
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px;
        float: center;
        }
        .wrapper input{
           float: center;
    display: block;
    text-align: center;
    width: 100%;
    margin: 0;
    padding: 14px;
        }
    </style>
<body>
    <form class="wrapper " action="upload.php" method="post" enctype="multipart/form-data">
        <label>Select image to upload:</label>
        <input type="file" name="image"/>
        <input type="submit" name="submit" value="UPLOAD"/>
    </form>
</body>
</html>