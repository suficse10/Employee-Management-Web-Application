<html>

<title> Employee Info. </title>

<div id="divnav">
    <ul>
        <li><a href="http://localhost/employee/list.php">Employee List</a></li>
        <li><a href="http://localhost/employee/info.php">Add Employee</a></li>
        <li><a href="http://localhost/employee/logout.php">Log Out</a></li>
    </ul>
</div>

<div align="justify">

    <h1> Employee Information </h1> <br>


    <?php
    session_start();
    require 'connect_db.inc.php';

	
	echo "<pre>";
	
	$FirstName = $_POST['name1'];
	$LastName = $_POST['name2'];
	$sex = $_POST['gender'];
	$user = $_POST['username'];
    $pass = md5($_POST['password']);
	$Email = $_POST['email'];
	$PhnNo = $_POST['phn'];
	$birth = $_POST['bd'];
	$state = $_POST['state'];
	$dept = $_POST['dept'];
	$joindate = $_POST['joindate'];
    $skill = $_POST['skill'];
    $skill_str = implode(" ", $skill);
    $expr = $_POST['exp'];

//    $id = (int) $_POST['id'];
//    print_r($_POST);
//    die();

    $con = mysqli_connect($mysql_host, $mysql_user, $mysql_pass, $mysql_db);

  //SQL selection
    if(isset($_POST['id'])){

        $id = (int) $_POST['id'];

        $query = "UPDATE `employee_db`.`employee_info` SET `first_name`='$FirstName',`last_name`='$LastName',`sex`='$sex',`user_name`='$user',
                  `password`='$pass',`email`='$Email',`phone_no`='$PhnNo',`date_birth`='$birth',`states`='$state',`dept`='$dept',
                  `join_date`='$joindate',`skillset`='$skill_str',`exp`='$expr' WHERE `employee_info`.`id`= $id";
    }

    else {
        $query = "INSERT INTO `employee_db`.`employee_info` (`id`, `first_name`, `last_name`, `sex`, `user_name`, `password`, `email`, 
              `phone_no`, `date_birth`, `states`, `dept`, `join_date`, `skillset`, `exp`) 
              VALUES (NULL, '$FirstName', '$LastName', '$sex', '$user', '$pass', '$Email', '$PhnNo', '$birth', '$state', 
              '$dept', '$joindate', '$skill_str', '$expr')";
    }

   // INSERT INTO `employee_info` (`id`, `first_name`, `last_name`, `sex`, `user_name`, `password`, `email`, `phone_no`, `date_birth`, `states`, `dept`, `join_date`, `skillset`, `exp`)
   // VALUES (NULL, 'qq', 'ww', 'male', 'qq ww', 'p', 'asd', '123', '12', 'intern', 'backend', '23', 'php', '0-1');

   // mysqli_query($con,"SELECT * FROM 'employee_info'");
    mysqli_query($con,$query);

//if($query_run = mysqli_query($con,$query)) {
    //print_r ($_POST);
    //echo 'Employee Name:' .$FirstName."\t".$LastName.'<br>';
    echo '<img src="uploads/hand-light.jpg" style="width:304px;height:228px";><br>';

    echo 'Employee Name:' . $user . '<br>';
    echo 'User Name:' . $user . '<br>';
    echo 'Sex:' . $sex . '<br>';
    echo 'Email:' . $Email . '<br>';
    echo 'Phone Number:' . $PhnNo . '<br>';
    echo 'Date of Birth:' . $birth . '<br>';
    echo 'State:' . $state . '<br>';
    echo 'Department:' . $dept . '<br>';
    echo 'Joining Date:' . $joindate . '<br>';
    echo 'Skills:';
    foreach ($skill as $value) {
        echo $value . ",";
    }
    echo '<br>';
    echo 'Experience:' . $expr . '</br>';


    //upload file



   $name_img = $_FILES['img']['name'];

   $tmp_name_img = $_FILES['img']['tmp_name'];

   $location = 'uploads/';

   move_uploaded_file($tmp_name_img, $location.$name_img);


    $name_cv = $_FILES['cv']['name'];

    $tmp_name_cv = $_FILES['cv']['tmp_name'];

    $location = 'uploads/';

    move_uploaded_file($tmp_name_cv, $location.$name_cv);



    echo '<h3>' .$_SESSION['message']. '</h3>' ;

//       $target_dir = "uploads/";
//       $target_file = $target_dir . basename($_FILES["img"]["name"]);
//       $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
//
//    if(isset($_POST["submit"])) {
//        $check = getimagesize($_FILES["img"]["tmp_name"]);
//        if($check !== false) {
//            echo "File is an image - " . $check["mime"] . ".";
//            $uploadOk = 1;
//        } else {
//            echo "File is not an image.";
//            $uploadOk = 0;
//        }
//    }
//    // Check if file already exists
//    if (file_exists($target_file)) {
//        echo "Sorry, file already exists.";
//        $uploadOk = 0;
//    }
//
//    if ($uploadOk == 1) {
//        move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);}



    mysqli_close($con);

//}

//else{
//
//    echo 'ERROR!!!';
//}
	//if(!empty($skill))
	//{
       // Loop to store and display values of individual checked checkbox.
      /* foreach($skill as $value)
       {
           echo $value ."\t";
	   }  */
	//}
	
	
	/* if(!empty($FirstName)&&!empty($LastName)&&!empty($Email)&&!empty($PhnNo))
	{
		echo 'Ok';
	}
	
	else
	{
		echo 'Fill in all field';
	} */ 
//}
?>

</div>
</html>