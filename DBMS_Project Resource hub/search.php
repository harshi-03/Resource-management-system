<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://use.fontawesome.com/be1ba39dfe.js"></script>
    <style>
    .drop{
        margin-top: 100px;
        margin-left: 400px;
        width: 200px;
        height: 60px;
    }
    .drop1{
        margin-left: 60px;
        width:300px;
        height:60px;
    }
    .drop2{
        margin-left: 500px;
        margin-top:20px;
        width:300px;
        height:60px;
        background-color:#379237;
    }
    .drop3{
        margin-left: 900px;
        width:200px;
    }
    body{
        background-image: url("https://imgs.search.brave.com/mKrPqTZI56qBVDJH8GcRbjBF9Ey0XrLhJOiwa3mgbF0/rs:fit:844:225:1/g:ce/aHR0cHM6Ly90c2Ux/Lm1tLmJpbmcubmV0/L3RoP2lkPU9JUC42/RmRKUWZ6UW0yRndw/NjV4bF9BbzRnSGFF/SyZwaWQ9QXBp");
        background-repeat: no-repeat;
        background-size: 1920px;  
   } </style>
</head>
<body>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="study.html"><img src="https://media.giphy.com/media/BS4pv5OYGjujrrjVJ9/giphy.gif" alt="hello" style="width:100px; height: 70px; padding-left: px;"></a>
      </nav>
    <form action="./search.php" method="post">
    <select class="drop" name="course" >
        <option  disabled hidden selected>Select One</option>
        <option name="course" >GATE</option>
        <option name="course" >CAT</option>
    </select>
    <input name="subject" type=”text” placeholder="Type subject name" class="drop1">
    <br>
    <br>
    <button class="drop2" name="search">Search</button>

    <br>
    <img src="https://media.giphy.com/media/eYaHNLXTOo1hKJu9gu/giphy.gif" alt="search your book" class="drop3"></img>
<?php
$server_name="localhost";
$username="root";
$password="pradeep02";
$database_name="resource";

$conn=mysqli_connect($server_name,$username,$password,$database_name);
//now check the connection
if(!$conn)
{
	die("Connection Failed:" . mysqli_connect_error());

}

if(isset($_POST['search']))
{	
	 $course = $_POST['course'];
	 $subject= $_POST['subject'];
     $x=strtolower($course);
     $s=preg_replace('/[^A-Za-z]/','',$subject);
     $y=strtolower($s); }
     $flag=true;
     $query="SELECT short_form,book_name from $x";
     $z=$conn->query($query);
     if($z->num_rows >0){
        while($row = $z->fetch_assoc()){
            // echo $row['short_form']. "." .$row['book_name'];
             if($row['short_form'] == $y || $row['book_name'] == $y){
                     $flag=false;
                     echo  "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'> </script>";
                     echo  "<script>swal({
                         title: 'hurrah notes is available!',
                         text: 'please login to get the book!',
                         icon: 'success',
                         button: 'Done!',
                              }); </script>";
                    

               }
        }
    }
    if($flag){
        echo  "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'> </script>";
                     echo  "<script>swal({
                         title: 'sorry book is unavailable!',
                         text: 'we will update it soon!',
                         icon: 'error',
                         button: 'Done!',
                              }); </script>";
        
    } ?>
    </form>
    </body>
    </html>


