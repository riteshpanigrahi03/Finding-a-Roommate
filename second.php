<?php
session_start();
if (!(isset($_SESSION['user']) ))
{
  header('location:login.html');

}
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Easy Roommates</title>
    <link href="homepage.css" rel="stylesheet" type="text/css">
    <link href="second.css" rel="stylesheet" type="text/css">
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
      font-size: 24px;
      border: 1px solid white;
    }
    table td {
      color: red;
      background-color: lightblue;
      transition: all .5s;
    }
.container1 {
    display: block;
    position: relative;
    padding-left: 35px;
    margin-bottom: 12px;
    cursor: pointer;
    font-size: 20px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}

/* Hide the browser's default radio button */
.container1 input {
    position: absolute;
    opacity: 0;
    cursor: pointer;
}

/* Create a custom radio button */
.checkmark {
    position: absolute;
    top: 0;
    left: 0;
    height: 25px;
    width: 25px;
    background-color: #eee;
    border-radius: 50%;
}

/* On mouse-over, add a grey background color */
.container1:hover input ~ .checkmark {
    background-color: #ccc;
}

/* When the radio button is checked, add a blue background */
.container1 input:checked ~ .checkmark {
    background-color: #2196F3;
}

/* Create the indicator (the dot/circle - hidden when not checked) */
.checkmark:after {
    content: "";
    position: absolute;
    display: none;
}

/* Show the indicator (dot/circle) when checked */
.container1 input:checked ~ .checkmark:after {
    display: block;
}

/* Style the indicator (dot/circle) */
.container1 .checkmark:after {
  top: 9px;
  left: 9px;
  width: 8px;
  height: 8px;
  border-radius: 50%;
  background: white;
}
#search {
    background-color: crimson; /* Green */
    border: none;
    color: white;
    padding: 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 20px;
    margin: 4px 2px;
    cursor: pointer;
    border-radius: 12px;
    height: 60px;
    width: 150px
}

  </style>
         
    </head>
<body bgcolor="lightblue">
            
        <div id="topbar">
            <a href="main.html"><img src="logo.png"></a>

            
            <a href="delete.php"><button style="float: right;" class="button button1">Delete Post</button></a>
            <a href="logout.php"><button style="float: right;" class="button button1">Logout</button></a>

            <h2 style="float: right;margin-top: 60px;margin-right: 20px;">Hello, <?php
             echo $_SESSION['user'];
             ?> </h2>  
       
             


        </div>


    <br>
    <br>
    
    <div>
      <form method="post">
        <label class="container1">I need a Male roommate.
      <input type="radio" checked="checked" name="selgender" style="float: left;" value="Male">
      <span class="checkmark"></span>
    </label>
    <label class="container1">I need a Female roommate.
      <input type="radio" name="selgender" style="float: left;" value="Female">
      <span class="checkmark"></span>
    </label>
    <label style="float: left; font-size: 24px;">Budget--</label>
    <input type="number" style="float: left; width: 25%; height: 30px;" name="selbudget"><br><br><br>
    <input type="submit" style="float: left;" id="search" name="search" value="search">
      </form>
    </div>
    <br>
    <br>
    <br>

    <?php
$servername = "localhost";
$username = "root";
$password = "";
$db="easyroom";
//Check Connection
$conn = new mysqli($servername, $username, $password, $db);
if(!$conn){
 die ("Error on the Connection" . $conn->connect_error);
}
    $numrows=0;
    ?>
    <style type="text/css">
      #t1{
        display:none;
      }

         #t2{
        display:none;
      }
    </style>
    <?php
    if(isset($_POST['selgender']))
    {
    
    $gender=$_POST['selgender'];
    
    $budget=$_POST['selbudget'];
    $q = mysqli_query($conn,"SELECT room_details FROM roommies WHERE email='".$_SESSION['user']."'");
    $row = mysqli_fetch_array($q);
    if($row['room_details'] == "I need a room"){
$details="I have a room";
$query = mysqli_query($conn, "SELECT name,age,gender,mobile,budget FROM roommies WHERE gender='".$gender."' AND budget='".$budget."' AND room_details='".$details."' AND email !='".$_SESSION['user']."'");
 $numrows= mysqli_num_rows($query);

    }
elseif($row['room_details'] == "I have a room"){
  $details="I need a room";
$query = mysqli_query($conn, "SELECT name,age,gender,mobile,budget FROM roommies WHERE gender='".$gender."' AND budget='".$budget."' AND room_details='".$details."' AND email !='".$_SESSION['user']."'");
 $numrows= mysqli_num_rows($query);


}
    

  }

  
    ?>
    <div id="t1">
    <table class="data-table" border="1">
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
    <?php
    if($numrows>=1)
    {?>
<style type="text/css">
      #t1{
        display:block;
      }
    </style>
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

    }}
    ?>
    </tbody>


</div>


    


    </body>
</html>