
<html>

<head>

    <title>Employee List</title>
    <div id="divnav">
        <ul>
            <li><a href="http://localhost/employee/list.php">Employee List</a></li>
            <li><a href="http://localhost/employee/info.php">Add Employee</a></li>
            <li><a href="http://localhost/employee/logout.php">Log Out</a></li>
        </ul>
    </div>

</head>



<body>


<h1 align="center">List of Employee</h1>

<?php

require("connect_db.inc.php");

$con = mysqli_connect($mysql_host, $mysql_user, $mysql_pass, $mysql_db);


$query = "SELECT `id`, `first_name`, `last_name`, `sex`, `user_name`, `email`, `phone_no`, `date_birth`, `states`, `dept`, 
          `join_date`, `skillset`, `exp` FROM `employee_info` ORDER BY `id`";
$result = mysqli_query($con,$query);

echo "<table align='center' cellpadding='5' cellspacing='3' border=1>";
echo "<tr><th width='20'>Serial No</th><th width='70'>First Name</th><th>Last Name</th><th>Sex</th><th>User Name</th>
      <th>Email</th><th>Phone No.</th><th>Date of Birth</th><th>State</th><th>Department</th><th>Joining Date</th><th>Skills</th>
      <th align='center'>Experience</th><th align='center'>Action</th></tr>";

while($row = mysqli_fetch_array($result))
{
    echo '<tr height="60"><td align="center">';
    echo $row['id'];
    echo '</td><td>';
    echo $row['first_name'];
    echo '</td><td>';
    echo $row['last_name'];
    echo '</td><td>';
    echo $row['sex'];
    echo '</td><td align="center">';
    echo $row['user_name'];
    echo '</td><td>';
//    echo $row['password'];
//    echo '</td><td>';
    echo $row['email'];
    echo '</td><td>';
    echo $row['phone_no'];
    echo '</td><td>';
    echo $row['date_birth'];
    echo '</td><td>';
    echo $row['states'];
    echo '</td><td>';
    echo $row['dept'];
    echo '</td><td>';
    echo $row['join_date'];
    echo '</td><td width="80">';
    echo $row['skillset'];
    echo '</td><td align="center">';
    echo $row['exp'];
    echo '</td>'; //</tr>';
  //  <tr>
//    echo    '<td  width="40"><a href="view.php" methods="POST"> View </a></td>';
//    echo '</tr>';

    echo    '<td>
             
             <a href="view.php?id='.$row['id'].'"><font color="green">View</font></a>
             
             <a href="edit.php?id='.$row['id'].'">|<font color="#00008b">Edit</font></a>
             
             <a href="delete.php?id='.$row['id'].'" class="deleteEmployee" role="'.$row['id'].'">|<font color="#dc143c">Delete</font></a>
      
             </td>';
    echo '</tr>';

}
echo "</table>";


?>

<!--<button type="button"><a href="view.php"> View </a></button>-->
<!--<button type="button"><a href="view.php"> View </a></button>-->


<!--<form action="view.php" method="get">-->
<!--    <input type="hidden" name="id" value='.$row['id'].'>-->
<!--    <input type="submit" value="View">-->
<!--</form>-->

</body>

<script>
    function deleteEmployee(){
        var deleteLink = document.getElementsByClassName('deleteEmployee');
        for(var i = 0; i < deleteLink.length; i++) {
//            alert(deleteLink[i]);
            deleteLink[i].onclick = function () {
                var id = this.getAttribute('role');

                return confirm("Employee " + id + " will be deleted from database.");

               // return false;
            }
        }

        return false;
    }
    deleteEmployee();
</script>

</html>