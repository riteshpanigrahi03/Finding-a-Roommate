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
$name = $_POST['name'];
 $pho = $_POST['mobile'];
 $email=$_POST['email'];
  $address=$_POST['add'];
   $age=$_POST['age'];
    $room_details=$_POST['radio'];
$password=$_POST['psw'];
$gender=$_POST['gender'];
$budget=$_POST['budget'];
 echo $pho;

$query = mysqli_query($conn, "Insert INTO roommies VALUES('$name','$email','$age','$gender','$pho','$address','$password','$room_details','$budget')");

echo "hello";
$_SESSION['user']=$email;
$_SESSION['name']=$name;
header('Location:second.php'); 
mysqli_close($conn);
?>
