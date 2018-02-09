


<html>



<?php

require("connect_db.inc.php");

$con = mysqli_connect($mysql_host, $mysql_user, $mysql_pass, $mysql_db);

if(isset($_GET['id'])){
    $id = (int) $_GET['id'];
}else{
    header('Location: list.php');
}
//$query = "SELECT * FROM `employee_info` ORDER BY `ID` LIMIT 1";
$query = "DELETE FROM `employee_info` WHERE `id`= $id";
$result = mysqli_query($con,$query);

header('location: list.php');

?>



</html>
