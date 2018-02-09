<?php session_start(); ?>
<html>

<?php //echo 'username: '. $_SESSION["username"]; ?>
<div id="divnav">
    <ul>
        <li><a href="http://localhost/employee/list.php">Employee List</a></li>
        <li><a href="http://localhost/employee/info.php">Add Employee</a></li>
        <li><a href="http://localhost/employee/logout.php">Log Out</a></li>
    </ul>
</div>

<h3>Welcome!!! <br></h3>

<?php echo 'username: '. $_SESSION["username"]; ?>

<div id="main" align="left-justify">

<?php

require("connect_db.inc.php");

$con = mysqli_connect($mysql_host, $mysql_user, $mysql_pass, $mysql_db);


if(isset($_GET['id'])){
    $id = (int) $_GET['id'];
}else{
    header('Location: list.php');
}
//$query = "SELECT * FROM `employee_info` ORDER BY `ID` LIMIT 1";
$query = "SELECT * FROM `employee_info` WHERE `id`= $id";
$result = mysqli_query($con,$query);

echo '<img src="uploads/hand-light.jpg" style="width:304px;height:228px";>';

while($row = mysqli_fetch_array($result))
{
    echo '<p ><b><font size="5px"> First Name:</font></b><font color="green" size="5px"> '.$row['first_name'].'</font></p>';
   // echo '<br>';
    echo '<p><b><font size="5px"> Last Name:</font></b><font color="green" size="5px"> ' .$row['last_name'].'</font></p>';
   // echo '<br>';
    echo '<p><b><font size="5px"> Sex:</font></b><font color="green" size="5px"> ' .$row['sex'].'</font></p>';
  //  echo '<br>';
    echo '<p><b><font size="5px"> User Name:</font></b><font color="green" size="5px"> ' .$row['user_name'].'</font></p>';
   // echo '<br>';
    echo '<p><b><font size="5px"> Email:</font></b><font color="green" size="5px"> ' .$row['email'].'</font></p>';
   // echo '<br>';
    echo '<p><b><font size="5px"> Phone No:</font></b><font color="green" size="5px"> ' .$row['phone_no'].'</font></p>';
  //  echo '<br>';
    echo '<p><b><font size="5px"> Date of Birth:</font></b><font color="green" size="5px"> ' .$row['date_birth'].'</font></p>';
  //  echo '<br>';
    echo '<p><b><font size="5px"> State:</font></b><font color="green" size="5px"> ' .$row['states'].'</font></p>';
  //  echo '<br>';
    echo '<p><b><font size="5px"> Department:</font></b><font color="green" size="5px"> ' .$row['dept'].'</font></p>';
  //  echo '<br>';
    echo '<p><b><font size="5px"> Joining Date:</font></b><font color="green" size="5px"> ' .$row['join_date'].'</font></p>';
  //  echo '<br>';
    echo '<p><b><font size="5px"> Skills:</font></b><font color="green" size="5px"> ' .$row['skillset'].'</font></p>';
  //  echo '<br>';
    echo '<p><b><font size="5px"> Experience:</font></b><font color="green" size="5px"> ' .$row['exp'].'</font></p>';
  //  echo '<br>';


}

?>

</div>


</html>



