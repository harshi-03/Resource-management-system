
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

if(isset($_POST['submit']))
{	
	 $user= $_POST['user2'];
	 $pass = $_POST['pass2'];
     $query="SELECT * from admin_login";
	 $row=$conn->query($query);
	 while($res=$row->fetch_assoc()){
		 if($res['admin_id']==$user || $res['admin_pass']==$pass) {
			echo '<script>alert("adminname/pass already exits!")</script>';
			echo '<script>window.location.href="newadmin.html";</script>';
		 }
		 if($res['admin_id']==$user && $res['admin_pass']==$pass) {
			echo '<script>alert("username and pass already exits!")</script>';
			echo '<script>window.location.href="newadmin.html";</script>';
		 }
		  
	 }
	 $sql="SELECT count(*) from admin_login";
	 $result=$conn->query($sql);
	 while($row=mysqli_fetch_array($result)){
		 $r=$row['count(*)'];
	 }
	 if ($r < 10) 
	 {
		$sql_query = "INSERT INTO admin_login
	 VALUES ('$user','$pass')";
     $res=$conn->query($sql_query);
        echo '<script>alert("access is granted to new admin!")</script>';
	    echo '<script>window.location.href="adminorusers1.php";</script>';
	
	 } 
	 else
     {
		echo '<script>alert("Only 5 admins are allowed!")</script>';
	    echo '<script>window.location.href="adminorusers1.php";</script>';
	 }
	 mysqli_close($conn);
}
?>