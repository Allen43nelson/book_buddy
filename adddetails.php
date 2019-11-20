<?php
  session_start();
  require_once "config.php";
  if(empty($_GET['add_id']))
  {
    header("location: login.php");
    exit;  
  } else {
      

  $book_isbn = $_GET['add_id'];
  
 
 

  $query = "SELECT * FROM book_details WHERE add_id = '$book_isbn'";
  $result = mysqli_query($link, $query);
  if(!$result){
    echo "Can't retrieve data " . mysqli_error($link);
    exit;
  }

  $row = mysqli_fetch_assoc($result);
  if(!$row){
    echo "Empty book";
    exit;
  }
  }
  //$title = $row['book_title'];
  //require "./template/header.php";
  require "./header_1.html";
?>
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">  
       <link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet">
        
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
                    <style>
* {box-sizing: border-box;}

body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}
    div.gallery {
      border: 1px solid #ccc;
    }

    div.gallery:hover {
      border: 1px solid #777;
    }

    div.gallery img {
      width: 185px;
      height: 185px;	
    }

    div.desc {
      padding: 5px;
      text-align: center;
    }

    * {
      box-sizing: border-box;
    }

    .responsive {
      padding: 0 6px;
      float: left;
      width: 200px;
    }
* {
              box-sizing: border-box;
    }

    /* Create two equal columns that floats next to each other */
    .column {
      float: left;
      width: 25%;
      padding: 10px;
    }

    /* Clear floats after the columns */
    .row:after {
      content: "";
      display: table;
      clear: both;
    }
    /* Style the buttons */
        

.topnav {
  overflow: hidden;
  background-color: #e9e9e9;
}

.topnav a {
  float: left;
  display: block;
  color: black;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #2196F3;
  color: white;
}
.topnav a.left {
  float: right;  
  
  color: black;
}
.topnav input[type=text] {
  float: center;
  padding: 6px;
  margin-top: 8px;
  margin-left: 16px;
  margin-right: 16px;
  border: none;
  width: 50%;
  font-size: 17px;
}

@media screen and (max-width: 600px) {
  .topnav a, .topnav input[type=text] , topnav i {
    float: none;
    display: block;
    text-align: left;
    width: 100%;
    margin: 0;
    padding: 14px;
  }
  
  .topnav input[type=text] , .topnav i{
    border: 10px solid #ccc;  
  }
  .topnav i{
      background-color: white
  }
  
  }
</style>
    </head>
    <body>
        <p class="lead" style="margin: 25px 0"><a href="homepage.php">HOME</a> > <?php echo $row['book_name']; ?></p>
      <div class="row">
        <div class="col-md-3 text-center">
          <img class="img-responsive img-thumbnail" alt="not available" src="<?php echo $row['image'] ; ?>">
        </div>
        <div class="col-md-6">
          <h4>Book Description</h4>
          <p><?php echo $row['message']; ?></p>
          <h4>Book Details</h4>
          <table class="table">
          	<?php foreach($row as $key => $value){
              if($key == "add_id" || $key == "user_id" || $key == "image" || $key == "created" || $key == "message" ){
                continue;
              }
              switch($key){
                case "book_name":
                  $key = "Title";
                  break;
                case "branch":
                  $key = "Branch";
                  break;
                case "semester":
                  $key = "Semester";
                  break;
                case "book_name":
                  $key = "Author";
                  break;
                case "price":
                  $key = "Price";
                  break;
                case "phone_no":
                  $key = "Contact me";
                  break;
              }
              
            ?>
            <tr>
              <td><?php echo $key; ?></td>
              <td><?php echo $value; ?></td>
            </tr>
            <?php 
              } 
              if(isset($link)) {mysqli_close($link); }
            ?>
          </table>
          <form method="post" action="homepage.php">
            
            <input type="submit" value="back home" name="cart" class="btn btn-primary">
          </form>
       	</div>
      </div>
    </body>
</html>

