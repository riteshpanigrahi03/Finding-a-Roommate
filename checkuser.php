<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$db="easyroom";
//Check Connection
$conn = new mysqli($servername, $username, $password, $db);
if(!$conn){
 die ("Error on the Connection" . $conn->connect_error);
}

$user = $_POST['email'];
 $pass = $_POST['psw'];

$query = mysqli_query($conn, "SELECT * FROM roommies WHERE email='".$user."' AND password='".$pass."'");

 $numrows= mysqli_num_rows($query);
//$numrows=1;
 if($numrows ==1)
 {
 while($row = mysqli_fetch_assoc($query))
 {
 $username=$row['email'];
 $password=$row['password'];
 }
 if($user == $username && $pass == $password)
 {
 //Redirect Browser
 $_SESSION['user']=$user;
 $_SESSION['name']=$_POST['name'];
 header('Location:second.php');
 }
 }
 else
 {
 	header('Location:login.html');

}
?>