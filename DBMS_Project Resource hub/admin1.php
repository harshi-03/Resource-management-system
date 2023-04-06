<?php
$db_connect = mysqli_connect('localhost','root','pradeep02','resource') or die('connection failed');


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Orders</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <link rel="stylesheet" href="admin_style.css">
  <style>
    body{
        background-image:url("https://imgs.search.brave.com/plubUdeYIVh6jDtyRgZN3YkK9n2SjG-Dpz0OCXFD8jE/rs:fit:759:225:1/g:ce/aHR0cHM6Ly90c2Uz/Lm1tLmJpbmcubmV0/L3RoP2lkPU9JUC5p/Y08tM2ZQSU51bXdS/REFDRFp6ekt3SGFF/byZwaWQ9QXBp");
    }
    .title{
        color:#fff;
    }
    .box{
        width:300px;
    }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="adminhome.html"><img src="https://media.giphy.com/media/BS4pv5OYGjujrrjVJ9/giphy.gif" alt="hello" style="width:100px; height: 70px; padding-left: px;"></a>
    </nav>

  <section class="orders">

    <h1 class="title">FEEDBACK</h1>

    <div class="box-container">
      <?php
      $result= mysqli_query($db_connect, "SELECT * FROM feedback");

      if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
      ?>
  <div class="box">
            <p> name : <span><?= $row['name'] ?></span> </p>
            <p > username : <span><?= $row['user_name'] ?></span> </p>
            <p> number : <span><?= $row['number'] ?></span> </p>
            <p> Feedback : <span><?= $row['message'] ?></span> </p>
          </div>
      <?php
        }
      } else {
        echo '<p class="empty">no feedbacks placed yet!</p>';
      }
      ?>

    </div>

  </section>

 

</body>

</html>