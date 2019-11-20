
<?php
error_reporting(0);
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
  
?>
<html>
    <head>
        <title>AD details</title>
        <meta charset="UTF-8">
        
     
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
       <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
       <style>

        

        

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
    padding: 5px;
  }
  
  .topnav input[type=text] , .topnav i{
    border: 1px solid #ccc;  
    
  }
  .topnav i{
      background-color: white
  }
  
  }
</style>
    </head>
    <body>
        <?php
        if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    include("header.html");
    }
    else {
        include("header_1.html");
    }?>
        <p class="lead" style="margin: 25px 0"><a href="homepage.php">HOME</a> > <?php echo $row['book_name']; ?></p>
      <div class="row">
        <div class="col-md-3 text-center">
          <img class="img-responsive img-thumbnail" alt="not available" src="./photos/photo<?php echo $row['add_id']; ?>.jpeg" style="width:250px;height:450px">
        </div>
        <div class="col-md-6">
          <h4>Book Description</h4>
          <p><h6></h6><?php echo $row['message']; ?></h6></p>
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

