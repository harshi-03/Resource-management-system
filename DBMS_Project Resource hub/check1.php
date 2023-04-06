<?php
$server_name="localhost";
$user_name="root";
$password="pradeep02";
$database_name="resource";
$conn = mysqli_connect($server_name,$user_name,$password,$database_name);
if(!$conn){
    die("Connection Failed" . mysqli_connect_error());
}
if(isset($_POST['submit'])){
    $user_name=$_POST["user"];
    $passcode=$_POST['pass1'];
}
$flag=true;
$query ="SELECT username,pass FROM details";
$result = $conn->query($query);
$sql_query="SELECT admin_id from admin_login";
$ans = $conn->query($sql_query);
$col=$ans->fetch_assoc();
if($col['admin_id']==$user_name)
{
   $user_type="admin";  
}
else{
    $user_type="user"; 
}
if($result->num_rows >0){
    while($row = $result->fetch_assoc()){
        // echo $row['username']. "." .$row['pass'];
        if($row['username'] == $user_name){
            if($row['pass'] == $passcode){
                $flag=false;
                $sql_query="SELECT user_id FROM login_details";
                $res=$conn->query($sql_query);
                $row1=$res->fetch_assoc();
                if($row1['user_id']!=$user_name)
                {
                $conn->query("INSERT INTO login_details values('$user_name','$passcode','$user_type')");}
                echo '<script>alert("hurray....login succesful")</script>';
                echo '<script>window.location.href="first.html";</script>';
            }
             else{
                 $flag=false;
                 echo '<script>alert("please enter correct details!")</script>';
                 echo '<script>window.location.href="login.html";</script>';
                //  header('Location:http://localhost/project/login.html');
             }
        }
    } }
    if($flag){
        echo '<script>alert("User doesnt exist..please register!")</script>';
        echo '<script>window.location.href="index.html";</script>';
        // header("Location: http://localhost/project/index.html");
    }

?>