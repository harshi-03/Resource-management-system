<?php
$db_connect = mysqli_connect('localhost','root','pradeep02','resource') or die('connection failed');
if(isset($_GET["delete"])){
  mysqli_query($db_connect,"DELETE FROM `admin_login` WHERE admin_id = '$_GET[delete]' ");
  echo '<script>alert("Requested admin is deleted!")</script>';
  echo '<script>window.location.href="admins.php";</script>';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>users</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <link rel="stylesheet" href="admin_style.css">
  <style>
    body{
        background-image:url("https://imgs.search.brave.com/plubUdeYIVh6jDtyRgZN3YkK9n2SjG-Dpz0OCXFD8jE/rs:fit:759:225:1/g:ce/aHR0cHM6Ly90c2Uz/Lm1tLmJpbmcubmV0/L3RoP2lkPU9JUC5p/Y08tM2ZQSU51bXdS/REFDRFp6ekt3SGFF/byZwaWQ9QXBp");
    }
    .title{
        color:#fff;
    }
    </style>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="adminhome.html"><img src="https://media.giphy.com/media/BS4pv5OYGjujrrjVJ9/giphy.gif" alt="hello" style="width:100px; height: 70px; padding-left: px;"></a>

    </nav>

  <section class="users">

    <h1 class="title">ALL ADMINS</h1>


    <div class="box-container">
      <?php
      $r= mysqli_query($db_connect, "SELECT * FROM `admin_login`");

      if (mysqli_num_rows($r) > 0) {
        while ($row = mysqli_fetch_assoc($r)) {
      ?>
 
          <div class="box">
            <p> user id : <span><?= $row['admin_id'] ?></span> </p>
            <!-- <p> password : <span><?= $row['b'] ?></span> </p> -->
            <form action="" method="post">
            <a href="admins.php?delete=<?= $row["admin_id"] ?>" onclick="return confirm('delete the admin?');" class="delete-btn">delete</a>
        </form>
          </div>
      <?php
        }
      } else {
        echo '<p class="empty">Admins are nill!</p>';
      }
      ?>

    </div>

  </section>

 

</body>

</html>