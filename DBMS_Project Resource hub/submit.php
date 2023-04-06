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

if(isset($_POST['save']))
{	
	 $first_name = $_POST['first_name'];
	 $last_name = $_POST['last_name'];
	 $gender = $_POST['gender'];
	 $email = $_POST['email'];
	 $phone = $_POST['phone_number'];
     $user_name = $_POST['user_name'];
     $passw = $_POST['password'];
     $query="SELECT * from details";
	 $row=$conn->query($query);
	 while($res=$row->fetch_assoc()){
		 if($res['email']==$email || $res['username']==$user_name || $res['phonenumber']==$phone) {
			echo '<script>alert("email/username/number already exits!")</script>';
			echo '<script>window.location.href="index.html";</script>';
		 }
		 if($res['email']==$email && $res['username']==$user_name && $res['phonenumber']==$phone) {
			echo '<script>alert("email/username/number already exits!")</script>';
			echo '<script>window.location.href="index.html";</script>';
		 }
		  
	 }
	 $sql_query = "INSERT INTO details(firstname,lastname,gender,email,phonenumber,username,pass)
	 VALUES ('$first_name','$last_name','$gender','$email','$phone','$user_name','$passw')";

	 if (mysqli_query($conn, $sql_query)) 
	 {
		header('Location: http://localhost/project/done.html');
	 } 
	 else
     {
		echo "please enter details properly";
	 }
	 mysqli_close($conn);
}
?>