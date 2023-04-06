<?php

$db_connect = mysqli_connect('localhost','root','pradeep02','resource') or die('connection failed');

session_start();
if (isset($_SESSION["user_id"])) {
  $user_id = $_SESSION["user_id"];
}

if (isset($_POST["send_message"])) {

  $name = mysqli_real_escape_string($db_connect, $_POST["name"]);
  $email = mysqli_real_escape_string($db_connect, $_POST["email"]);
  $number = $_POST["number"];
  $user_message = mysqli_real_escape_string($db_connect, $_POST["message"]);
  $id = $_POST["id"];
  mysqli_query($db_connect, "INSERT INTO feedback (name,user_name,number,message) VALUES ('$name','$email','$number','$user_message') ");
  echo '<script>alert("Feedback sent succesfully!")</script>';
  echo '<script>window.location.href="feedback.php";</script>';
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>contact</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <style>
    .contact{
     padding-left:180px;
     padding-right:230px;
     background-color: rgba(0,0,0,0.7);
     width: 1000px;
     font-size: 10px;
     border-radius: 10px;
     border: 1px solid(255,255,255,0.3);
     box-shadow: 2px 2px 15px
     rgba(0,0,0,0.3);
     color:#fff;
    }
body{
  background-image:url("https://imgs.search.brave.com/plubUdeYIVh6jDtyRgZN3YkK9n2SjG-Dpz0OCXFD8jE/rs:fit:759:225:1/g:ce/aHR0cHM6Ly90c2Uz/Lm1tLmJpbmcubmV0/L3RoP2lkPU9JUC5p/Y08tM2ZQSU51bXdS/REFDRFp6ekt3SGFF/byZwaWQ9QXBp");
}

.contact form{
   margin:0 auto;
   background-color: var(--light-bg);
   border-radius: .5rem;
   border:var(--border);
   padding:2rem;
   max-width: 50rem;
   margin:0 auto;
   text-align: center;
}

.contact form h3{
   font-size: 2.5rem;
   text-transform: uppercase;
   margin-bottom: 1rem;
   color:var(--black);
}

.contact form .box{
   margin:1rem 0;
   width: 100%;
   border:#EFF5F5;
   background-color:;
   padding:1.2rem 1.4rem;
   font-size: 1rem;
   color:#000000;
   border-radius: .5rem;
}

.contact form textarea{
   height: 15rem;
   resize: none;
}
.box{
  height:20px;
}



    </style>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="study.html"><img src="https://media.giphy.com/media/BS4pv5OYGjujrrjVJ9/giphy.gif" alt="hello" style="width:100px; height: 70px; padding-left: px;"></a>
  </nav>

  <section class="contact">
    <div class="feed">

    <form action="feedback.php" method="post">
      <h3>say something!</h3>
      <input type="text" name="name" required placeholder="name" class="box">
      <input type="text" name="email" required placeholder="username" class="box">
      <input type="text" title="enter a valid phone number[10-digits]" name="number" required placeholder="Contact number" pattern="[1-9]{1}[0-9]{9}" maxlength="12" class="box">
      <input type="hidden" name="id" value="<?= isset($user_id) ? $user_id : 0  ?>">
      <input type="number" name="message" class="box" placeholder="ENTER RATING OUT OF 10" id="" cols="30" rows="10" max="10" min="0"></textarea>
      <input type="submit" value="send message" name="send_message" class="btn">
    </form>
</div>

  </section>

  <script src="js/script.js"></script>

</body>

</html>