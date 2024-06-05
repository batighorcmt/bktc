<?php  

$sname = "localhost";
$uname = "bktcedu_user";
$password = "@Bktc112233";
$db_name = "bktcedu_web";

$conn = mysqli_connect($sname, $uname, $password, $db_name);

if (!$conn) {
	echo "Connection Failed!";
	exit();
}