<?php
$servername= "localhost";
$username= "root";
$password= "";
$dbname= "form";
    
$conn= new mysqli($servername,$username,$password,$dbname);

if($conn->connect_error){
    die("Connection Failed".$conn->connect_error);
}

$email=$_POST['email'];
$password=$_POST['psw'];
$address=$_POST['add'];
$age=$_POST['age'];
$mobile=$_POST['mobile'];

$sql="INSERT INTO user2(email,password,mobile,age,address)
VALUES ('$email','$password','$mobile','$age','$address')";


if($conn->query($sql)===TRUE){
    echo "New record created successfully";
}
else{
    echo "Error".$sql."<br>". $conn->error;
}
$conn->close();

?>