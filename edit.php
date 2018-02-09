<html>


<script>

    function user_name(){

        var a = document.getElementById("name1").value;
        var b = document.getElementById("name2").value;
        var c = a + "_" + b;
        document.myform.username.value = c;
        //document.getElementById("username").value = c;
        return true;
    }

    function validate(){

        var a = document.getElementById("password").value;
        var b = document.getElementById("conpass").value;
        if (a!=b) {
            alert("Passwords do no match");
            return false;
        }
    }

    //    function choose_file(){
    //
    //        var a = document.getElementById("img").value;
    //        var b = document.getElementById("cv").value;
    //        if(a = '\0')
    //        {alert("Please choose file");}
    //
    //        return false;
    //    }

</script>

<head>

    <title> Employee Form </title>

    <div id="divnav">
        <ul>
            <li><a href="http://localhost/employee/list.php">Employee List</a></li>
            <li><a href="http://localhost/employee/info.php">Add Employee</a></li>
            <li><a href="http://localhost/employee/logout.php">Log Out</a></li>
        </ul>
    </div>

</head>




<body>
<!--/* if(isset($_POST['name1'])&&isset($_POST['name2'])&&isset($_POST['email'])&&isset($_POST['phn']))-->
<!--{-->
<!--	$FirstName = $_POST['name1'];-->
<!--	$LastName = $_POST['name2'];-->
<!--	$Email = $_POST['email'];-->
<!--	$PhnNo = $_POST['phn'];-->
<!--	-->
<!--	//echo $FirstName;-->
<!--	-->
<!--	if(!empty($FirstName)&&!empty($LastName)&&!empty($Email)&&!empty($PhnNo))-->
<!--	{-->
<!--		echo 'Ok';-->
<!--	}-->
<!--	-->
<!--	else-->
<!--	{-->
<!--		echo 'Fill in all field';-->
<!--	}-->
<!--} */-->


<?php
session_start();

require("connect_db.inc.php");

$con = mysqli_connect($mysql_host, $mysql_user, $mysql_pass, $mysql_db);

if(isset($_GET['id'])){
    $id =  $_GET['id'];
}

else{
    header('Location: list.php');
}

$query = "SELECT * FROM `employee_info` WHERE `id`= $id";
$result = mysqli_query($con,$query);
while($row = mysqli_fetch_array($result)){

    $name1 = $row['first_name'];
    $name2 = $row['last_name'];
    $sex = $row['sex'];
    $username = $row['user_name'];
    $pass = $row['password'];
    $email = $row['email'];
    $phone = $row['phone_no'];
    $birth = $row['date_birth'];
    $state = $row['states'];
    $dept = $row['dept'];
    $join = $row['join_date'];
    $skill = $row['skillset'];
    $exp = $row['exp'];
}


?>






<div align=center>
    <h1>Employee Information</h1><br>

    <form name="myform" action="r.php" method="post" enctype="multipart/form-data" onsubmit="validate()">
        First Name: <input type="text" name="name1" id="name1" value="<?php echo $name1;?>"><br><br>

        Last Name: <input type="text" name="name2" id="name2" value="<?php echo $name2;?>"><br><br>

        Sex:
        <label for="male">Male</label>
        <input type="radio" name="gender" id="male" value="male">
        <label for="female">Female</label>
        <input type="radio" name="gender" id="female" value="female"><br><br>

        Username: <input name="username" onclick="return user_name()" value="<?php echo $username;?>"><br><br>

        Password: <input type="password" name="password" id="password" value="<?php echo $pass;?>"><br><br>

        Confirm Password: <input type="password" name="conpass" id="conpass" value="<?php echo $pass;?>"><br><br>



        Email Address: <input type="text" name="email" value="<?php echo $email;?>"><br><br>

        Phone Number: <input type="text" name="phn" value="<?php echo $phone;?>"><br><br>

        Date of Birth: <input type="date" name="bd" value="<?php echo $birth;?>"/><br><br>

        States:
        <select name="state">
            <?php
            if(!empty($state)){
                echo "<option value='.$state.'>"; echo $state; echo "</option>";
            }
            ?>
            <option value="intern">Intern</option>
            <option value="permanent">Permanent</option>
            <option value="contractual">Contractual</option>
        </select><br><br>

        Department:
        <select name="dept">
            <?php
            if(!empty($dept)){
                echo "<option value='.$dept.'>"; echo $dept; echo "</option>";
            }
            ?>
            <option value="market">Marketing</option>
            <option value="frontend">Frontend</option>
            <option value="backend">Backend</option>
            <option value="admin">Admin</option>
            <option value="hr">HR</option>
            <option value="manager">Manager</option>
        </select><br><br>

        Joining Date: <input type="date" name="joindate" value="<?php echo $join;?>"/><br><br>

        Skillset:
        <input type="checkbox" name="skill[]" value="php">PHP
        <input type="checkbox" name="skill[]" value=".net">.NET
        <input type="checkbox" name="skill[]" value="java">Java
        <input type="checkbox" name="skill[]" value="html">HTML
        <input type="checkbox" name="skill[]" value="css">CSS
        <input type="checkbox" name="skill[]" value="xml">XML
        <input type="checkbox" name="skill[]" value="wordpress">Wordpress
        <input type="checkbox" name="skill[]" value="laravel">Laravel<br><br>

        Experience:
        <select name="exp">
            <?php
            if(!empty($exp)){
                echo "<option value='.$exp.'>"; echo $exp; echo "</option>";
            }
            ?>
            <option value="0-1">0-1</option>
            <option value="1-2">1-2</option>
            <option value="2-3">2-3</option>
            <option value="3-4">3-4</</option>
            <option value="4-5">4-5</option>
            <option value="5+">5+</option>
        </select><br><br>

        <input type="hidden" name="id" value="<?php echo $id; ?>">

        Photo:
        <input type="file" name="img" id="img"><br><br>


        CV:
        <input type="file" name="cv" id="cv"><br><br>

        <?php $_SESSION["message"] = "Employee data has been edited"; ?>

        <input type="submit" value="Submit" >
    </form>

</div>

</body>

</html>









