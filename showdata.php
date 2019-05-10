<?php
session_start();
if (!(isset($_SESSION['user']) ))
{
  header('location:login.html');

}
$servername = "localhost";
$username = "root";
$password = "";
$db="easyroom";
//Check Connection
$conn = new mysqli($servername, $username, $password, $db);
if(!$conn){
 die ("Error on the Connection" . $conn->connect_error);
}
if(isset($_POST["gen"]))
{
$gender = $_POST["gen"];
echo $gender;
}
echo $gender;
if(isset($_POST["bud"]))
{
 $budget = $_POST["bud"];
}

$details="I have a room";
$query = mysqli_query($conn, "SELECT name,age,gender,mobile,budget FROM roommies WHERE gender='".$gender."' AND budget='".$budget."' AND room_details='".$details."'");
 $numrows= mysqli_num_rows($query);

echo $numrows;
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
		/* Table Header */
		.data-table thead th {
			background-color: #5035bb;
			color: #FFFFFF;
			border-color: #6ea1cc !important;
			text-transform: uppercase;
		}
		table {
			margin: auto;
			font-family: "Lucida Sans Unicode", "Lucida Grande", "Segoe Ui";
			font-size: 12px;
			border: 1px solid red;
		}
		table td {
			color: red;
			background-color: blue;
			transition: all .5s;
		}

	</style>s
</head>
<body>
<table class="data-table">
		<caption class="title">Roommates Deatils</caption>
		<thead>
			<tr>
				<th>Name</th>
				<th>Age</th>
				<th>Gender</th>
				<th>Mobile</th>
				<th>Budget</th>
		
			</tr>
		</thead>
		<tbody>
		<?php
		
		while ($row = mysqli_fetch_array($query))
		{
				echo '<tr>
					<td>'.$row['name'].'</td>
					<td>'.$row['age'].'</td>
					<td>'.$row['gender'].'</td>
					<td>'.$row['mobile'].'</td>
					<td>'.$row['budget'].'</td>			
				</tr>';

		}?>
		</tbody>
	
</body>
</html>