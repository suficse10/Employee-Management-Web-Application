
<html>

<head>

    <title>Login</title>

<!--    <link rel="stylesheet" type="text/css" href="Design.css" />-->


</head>


<body>

<?php
session_start();
require 'connect_db.inc.php';

$con = mysqli_connect($mysql_host, $mysql_user, $mysql_pass, $mysql_db);

//function mysqli_result($res, $row, $field=0) {
//    $res->data_seek($row);
//    $datarow = $res->fetch_array();
//    return $datarow[$field];
//}

if(isset($_POST['username']) && isset($_POST['password'])){

    $_SESSION["username"] = $_POST['username'];
    $username = $_SESSION["username"];

    $_SESSION["password"] = $_POST['password'];
    $password = $_SESSION["password"];

    $password_hash = md5($password);

    if(!empty($username) && !empty($password)){

        $query = "SELECT `id` FROM `employee_info` WHERE `user_name`= '$username' AND `password` = '$password_hash'";
        if($query_run = mysqli_query($con,$query)){
            $query_row = mysqli_fetch_row($query_run);
            $row=mysqli_num_rows($query_run);


            if($row === 1){
				
                $id = $query_row[0];
                header("location: view.php?id=$id");

            }
            else{
                echo "Invalid Username or Password";

            }
        }
    }
    else{
        echo "You must provide an Username and Password";
    }

}

?>


<div class="container" align="center">
    <div class="row" >
        <div class="span12">
            <form class="form-horizontal" action='' method="POST">
                <fieldset>
                    <div id="legend">
                        <legend class="">Login</legend>
                    </div>
                    <div class="control-group">
                        <!-- Username -->
                        <label class="control-label"  for="username">Username</label>
                        <div class="controls">
                            <input type="text" id="username" name="username" placeholder="" class="input-xlarge">
                        </div>
                    </div>
                    <div class="control-group">
                        <!-- Password-->
                        <label class="control-label" for="password">Password</label>
                        <div class="controls">
                            <input type="password" id="password" name="password" placeholder="" class="input-xlarge">
                        </div>
                    </div>
                    <div class="control-group">
                        <!-- Button -->
                        <div class="controls">
                            <button class="btn btn-success">Login</button>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>


</body>

</html>