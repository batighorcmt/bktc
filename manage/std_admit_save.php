<?php
extract($_REQUEST);
include("db_conn.php");


$password = md5($password);

$sql = "INSERT INTO admited_student (app_id, trainee_id, shift, status, contract, file_submit) VALUES ('$app_id', '$trainee_id', '$shift', '$status', '$contract', '$file_submit')";
$result = $conn->query($sql);
$last_id = $conn->insert_id;

$sql2 = "INSERT INTO users (username, password, role, user_id) VALUES ('$trainee_id', '$password', 'user', '$trainee_id')";
		 
$result2 = $conn->query($sql2);

$sql3 = "UPDATE application SET app_status='$status' WHERE app_id=$app_id"; 
$result3 = $conn->query($sql3);

if($result == True AND $result2 == True AND $result3 == True ){

  echo "<script>window.location.assign('std_list.php?success=Recorded Successfully.');</script>";
}
else{
    echo "<script>window.location.assign('std_list.php?error=Something went wrong!');</script>";
}
?>