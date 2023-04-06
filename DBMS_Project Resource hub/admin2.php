<?php
$db_connect = mysqli_connect('localhost','root','pradeep02','resource') or die('connection failed');

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Panel</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <link rel="stylesheet" href="admin_style.css">
  <style>
    body{
        background-image:url("https://imgs.search.brave.com/plubUdeYIVh6jDtyRgZN3YkK9n2SjG-Dpz0OCXFD8jE/rs:fit:759:225:1/g:ce/aHR0cHM6Ly90c2Uz/Lm1tLmJpbmcubmV0/L3RoP2lkPU9JUC5p/Y08tM2ZQSU51bXdS/REFDRFp6ekt3SGFF/byZwaWQ9QXBp");
    }
    </style>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="adminhome.html"><img src="https://media.giphy.com/media/BS4pv5OYGjujrrjVJ9/giphy.gif" alt="hello" style="width:100px; height: 70px; padding-left: px;"></a>
    </nav>


  <section class="dashboard">

    <h1 class="title" style="color:#fff">ADMIN VIEW</h1>

    <div class="box-container">

      
      <div class="box">
          <?php $select_orders = mysqli_query($db_connect,"SELECT * FROM details") ?>
          <h3><?php echo mysqli_num_rows($select_orders); ?></h3>
        <p>Total Registrations</p>
      </div>

  
      <div class="box">
          <?php $normal_users = mysqli_query($db_connect,"SELECT * FROM login_details") ?>
        <h3><?= mysqli_num_rows($normal_users)?></h3>
        <p>Total logins</p>
      </div>
      <div class="box">
          <?php $normal_users = mysqli_query($db_connect,"SELECT * FROM admin_login") ?>
        <h3><?= mysqli_num_rows($normal_users)?></h3>
        <p>Total Admins</p>
      </div>
      
      <div class="box">
      <?php $logins = mysqli_query($db_connect,"SELECT * FROM gate ") ?>
        <h3><?= mysqli_num_rows($logins)?></h3>
        <p>Total gate books</p>
      </div>

      <div class="box">
      <?php $admin_users = mysqli_query($db_connect,"SELECT * FROM cat ") ?>
        <h3><?= mysqli_num_rows($admin_users)?></h3>
        <p>total cat books</p>
      </div>

     

      <div class="box">
      <?php $messages = mysqli_query($db_connect,"SELECT * FROM feedback ") ?>
        <h3><?= mysqli_num_rows($messages)?></h3>
        <p>Total feedbacks</p>
      </div>

    </div>
  </section>
  <script src="js/admin_script.js"></script>

</body>

</html>