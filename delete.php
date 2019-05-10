<?php
session_start();
echo $_SESSION['user'];

$servername = "localhost";
$username = "root";
$password = "";
$db="easyroom";
//Check Connection
$conn = new mysqli($servername, $username, $password, $db);
if(!$conn){
 die ("Error on the Connection" . $conn->connect_error);
}
$query = mysqli_query($conn, "DELETE  FROM roommies WHERE email ='".$_SESSION['user']."'");

 header('location:signup.html');
?>
