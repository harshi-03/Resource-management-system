<?php

$db_connect = mysqli_connect('localhost','root','pradeep02','resource') or die('connection failed');


if (isset($_GET["delete"])) {
  $get_users = mysqli_query($db_connect, "DELETE FROM details WHERE username= '$_GET[delete]' ");
  echo '<script>alert("user deleted succesfully!")</script>';
	echo '<script>window.location.href="adminorusers1.php";</script>';
}
if(isset($_POST["make_admin"])){
  $user_id = $_POST["user_id"];
  $sql="SELECT count(*) from admin_login";
  $result=mysqli_query($db_connect,$sql);
  while($row=mysqli_fetch_array($result)){
    $r=$row['count(*)'];
  }
  if ($r < 10) 
  {
  mysqli_query($db_connect,"UPDATE login_details SET `user_type` = 'admin' WHERE user_id = '$user_id' ")or die("Query failed");
  $sql=mysqli_query($db_connect,"SELECT pass from login_details WHERE user_id = '$user_id' ")or die("Query failed");
  $res=$sql->fetch_assoc();
  $y=$res['pass'];
  mysqli_query($db_connect,"INSERT INTO admin_login values('$user_id','$y')")or die("Query failed");
  echo '<script>alert("gave him an admin access!")</script>';
	echo '<script>window.location.href="adminorusers1.php";</script>'; }
  else{
    echo '<script>alert("Only 10 admins are allowed!")</script>';
	  echo '<script>window.location.href="adminorusers1.php";</script>';
  }
};
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
      <br>
      <li CLASS="BOX">
      <a class="navbar-brand" href="newadmin.html" STYLE="COLOR:#FFF";>ADD NEW ADMIN </a></li>
      <br>
      <br>
      <li CLASS="BOX">
      <a class="navbar-brand" href="admins.php" STYLE="COLOR:#FFF";>DELETE ADMIN </a></li>

    </nav>

  <section class="users">

    <h1 class="title"> User accounts </h1>

    <div class="box-container">
      <?php
      $users = mysqli_query($db_connect, "SELECT * FROM login_details");
      if (mysqli_num_rows($users) > 0) {
        while ($row = mysqli_fetch_assoc($users)) {
      ?>
          <div class="box">
            <p> username : <span><?= $row["user_id"] ?></span> </p>
            <p> password: <span><?= $row["pass"] ?></span> </p>
            <p> user type : <span style="color: <?= $row["user_type"] == "admin" ? "var(--orange)" : "" ?> ;"><?= $row["user_type"] ?></span> </p>
            <div>

              <?php
              if ($row["user_type"] == "user") {
                echo "<a href='adminorusers1.php?delete=" . $row["user_id"]."' onclick='return confirm('delete this user?');' class='delete-btn disabled'>
              delete user</a>";
              ?>
                <form action="adminorusers1.php" method="post">
                  <input type="hidden" name="user_id" value="<?=$row["user_id"]?>">
                  <input type="submit" name="make_admin" value="Make Admin" class="option-btn">
                </form>
              <?php
              }
              ?>

            </div>
          </div>
      <?php
        };
      };
      ?>
    </div>

  </section>
  <!-- custom admin js file link  -->
  <script src="js/admin_script.js"></script>

</body>

</html>