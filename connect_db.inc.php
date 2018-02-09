<?php


$mysql_host = 'localhost';
$mysql_user = 'root';
$mysql_pass = '';

$mysql_db = 'employee_db';

@mysqli_connect($mysql_host, $mysql_user, $mysql_pass, $mysql_db) or die('Could not connect');

//@mysqli_select_db($mysql_db) or die('Could not find database');



?>