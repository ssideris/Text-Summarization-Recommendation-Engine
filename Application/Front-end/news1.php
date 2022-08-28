<!-- PHP connection to the MySQL Database -->
<?php
$servername = "localhost";
$database = "news";
$username = "root";
$password = "****";

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
    <link rel="stylesheet" type="text/css" href="style1.css" />
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
      <div>
        <button id="menu_button" type="button" onclick="window.location.href='main.php'">
          <img src="pics/menu_button.png" alt="menu Pic 1" />
        </button>
      </div>
    </div>
    <div class='container1'>
      <div id="title"> NEWS TITLE 1</div>
      <div id="article">
        <?php $sql = "SELECT * FROM articles LIMIT 1"; 
              $result = $conn->query($sql);
              $row = $result->fetch_assoc();  
              echo $row['description']; 
              $publication_number = $row['publication_number'];

              $sql1 = "SELECT * FROM recommendations WHERE publication_number = '{$publication_number}' ";
              $result1 = $conn->query($sql1);
              $row1 = $result1->fetch_assoc();
              $recommendation_1 = $row1['recommendation_1'];

              $sql2 = "SELECT * FROM recommendations WHERE publication_number = '{$publication_number}'";
              $result2 = $conn->query($sql2);
              $row2 = $result2->fetch_assoc();
              $recommendation_2 = $row2['recommendation_2'];

              $sql3 = "SELECT * FROM recommendations WHERE publication_number = '{$publication_number}'";
              $result3 = $conn->query($sql3);
              $row3 = $result3->fetch_assoc();
              $recommendation_3 = $row3['recommendation_3'];
        ?>
      </div>
    </div>
    <div id="recommend">We also recommend:</div>
    <div class='container2'>
      <div id="box1">
        <button type="button" onclick="window.location.href='error.html'">
          <img src="pics/news1.png" alt="news Pic 1" />
          <div id="box1_text1">NEWS TITLE 1</div>
          <div id="box1_text2">
            <?php $sql4 = "SELECT * FROM articles WHERE publication_number = '{$recommendation_1}'";
              $result4 = $conn->query($sql4);
              $row4 = $result4->fetch_assoc();
              echo $row4['summary'];
            ?>
          </div>
        </button>
      </div>  
      <div id="box2">
        <button type="button" onclick="window.location.href='error.html'">
          <img src="pics/news2.png" alt="news Pic 2" />
          <div id="box2_text1">NEWS TITLE 2</div>
          <div id="box2_text2">
            <?php $sql5 = "SELECT * FROM articles WHERE publication_number = '{$recommendation_2}'";
              $result5 = $conn->query($sql5);
              $row5 = $result5->fetch_assoc();
              echo $row5['summary'];
            ?>
          </div>
        </button>
      </div>
      <div id="box3">
        <button type="button" onclick="window.location.href='error.html'">
          <img src="pics/news3.png" alt="news Pic 3" />
          <div id="box3_text1">NEWS TITLE 3</div>
          <div id="box3_text2">
            <?php $sql6 = "SELECT * FROM articles WHERE publication_number = '{$recommendation_3}'";
              $result6 = $conn->query($sql6);
              $row6 = $result6->fetch_assoc();
              echo $row6['summary'];
            ?>
          </div>
        </button>
      </div>
    </div>
  </body>
</html>
