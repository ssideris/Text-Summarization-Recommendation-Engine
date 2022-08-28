<!-- PHP connection to the MySQL Database -->
<?php
$servername = "localhost";
$database = "news";
$username = "root";
$password = "STam1996!";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }
//mysqli_close($conn); 
?>

<!-- HTML Code Starts here-->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>News Site</title>
    <link rel="stylesheet" type="text/css" href="style_main.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300&family=Noticia+Text&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>
    <div class="menu">
      <div id="title">
        News Of The Day <br />
        <div id="date">
          as of:
          <?php echo date('d/m/Y'); ?>
        </div>
      </div>
    </div>
    <div class="container1">
      <div id="box1">
        <button type="button" onclick="window.location.href='news1.php'">
          <img src="pics/news1.png" alt="news Pic 1" />
          <div id="box1_text1">NEWS TITLE 1</div>
          <div id="box1_text2">
            <?php $sql1 = "SELECT summary FROM articles LIMIT 1"; 
              $result1 = $conn->query($sql1);
              $row1 = $result1->fetch_assoc();  
              echo $row1['summary']; 
            ?>
          </div>
        </button>
      </div>  
      <div id="box2">
        <button type="button" onclick="window.location.href='news2.php'">
          <img src="pics/news2.png" alt="news Pic 2" />
          <div id="box2_text1">NEWS TITLE 2</div>
          <div id="box2_text2">
            <?php $sql2 = "SELECT * FROM articles LIMIT 1 OFFSET 1"; 
              $result2 = $conn->query($sql2);
              $row2 = $result2->fetch_assoc();  
              echo $row2['summary']; 
            ?>
          </div>
        </button>
      </div>
      <div id="box3">
        <button type="button" onclick="window.location.href='news3.php'">
          <img src="pics/news3.png" alt="news Pic 3" />
          <div id="box3_text1">NEWS TITLE 3</div>
          <div id="box3_text2">
            <?php $sql3 = "SELECT summary FROM articles LIMIT 1 OFFSET 2"; 
              $result3 = $conn->query($sql3);
              $row3 = $result3->fetch_assoc();  
              echo $row3['summary']; 
            ?>
          </div>
        </button>
      </div>
    </div>
    <div id="button2">
      <button type="button"> Click for More News...</button>
    </div>
  </body>
</html>
