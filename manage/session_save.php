<?php
extract($_REQUEST);
include("db_conn.php");

$sql = "INSERT INTO session (session_name, session_year, session_dura, session_status, session_form) VALUES ('$session_name', '$session_year', '$session_dura', 'Active', '$session_form')";
		 
$result = $conn->query($sql);
$last_id = $conn->insert_id;

if($result == True){

  echo "<script>window.location.assign('session_add.php?success=Recorded Successfully.');</script>";
}
else{
    echo "<script>window.location.assign('session_add.php?error=Something went wrong!');</script>";
}
?>