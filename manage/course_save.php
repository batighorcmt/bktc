<?php
extract($_REQUEST);
include("db_conn.php");

$sql = "INSERT INTO course (course_name, course_code, course_status) VALUES ('$course_name', '$course_code', 'Active')";
		 
$result = $conn->query($sql);
$last_id = $conn->insert_id;

if($result == True){

  echo "<script>window.location.assign('course_add.php?success=Recorded Successfully.');</script>";
}
else{
    echo "<script>window.location.assign('course_add.php?error=Something went wrong!');</script>";
}
?>