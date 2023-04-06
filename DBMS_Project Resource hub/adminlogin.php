<?php
$server_name="localhost";
$user_name="root";
$password="pradeep02";
$database_name="resource";
$conn = mysqli_connect($server_name,$user_name,$password,$database_name);
if(!$conn){
    die("Connection Failed" . mysqli_connect_error());
}
if(isset($_POST['submit1'])){
    $user_name=$_POST["user"];
    $passcode=$_POST['pass1'];
}
$flag=true;
$query ="SELECT admin_id,admin_pass FROM admin_login";
$result = $conn->query($query);

if($result->num_rows >0){
    while($row = $result->fetch_assoc()){
        if($row['admin_id'] == $user_name){
            if($row['admin_pass'] == $passcode){
                header('Location: http://localhost/project/adminhome.html');
            }
            else{
                $flag=false;
                header('Location:http://localhost/project/adminlogin.html');
            }
        }
    }
}
?>