<?php
// Initialize the session
session_start();?>
<html>
        <head>
            <meta charset="UTF-8">
            <title></title>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
            <style>
* {box-sizing: border-box;}

body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
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

<?php 

 if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    include("header.html");
    }
    else {
        include("header_1.html");
    }


          
            require_once "config.php";
            
            $query = "SELECT * FROM book_details"; 
        //SQL select query 

            $result = mysqli_query($link, $query) 
                    or die('Error querying database.');

            $rows = mysqli_num_rows($result); 
            $ct = 0 ;
                    // get number of rows returned 
             echo "<ol>";
            if ($rows) {     

            while ($row = mysqli_fetch_array($result)) 
            {       if($ct==0){
                        echo '<div class="row">';
                      }else {
                       $ct=($ct+1)%4;   
                    }

                    echo '<div class="column">';
                    echo 'Book name: ' . $row['book_name'] . '<br>';         
                    echo 'Author\'s name: ' . $row['author_name'] . '<br>';        
                    echo 'Price: ' . $row['price'] . '<br>';         
                    echo 'Branch: ' . $row['branch'] . '<br>';         
                    echo 'semester: ' . $row['semester'] . '<br><br>';         

                    echo '</div>';

            } 

            }
            else{
            echo 'No books to sell';   
            }

            echo "</ol>";
            mysqli_close($link); 
            ?>
        </body>
    </html>


