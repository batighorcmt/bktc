 <?php
extract($_REQUEST);
include "db_conn.php";
$password = md5($hr_mobile);
$sql = "INSERT INTO hr (hr_name, hr_designation, hr_mobile) VALUES ('$hr_name', '$hr_designation', '$hr_mobile')";
		 
$result = $conn->query($sql);
$last_id = $conn->insert_id;

$sql2 = "INSERT INTO users (username, password, role, name, user_id) VALUES ('$hr_mobile', '$password', 'manager', '$hr_name', '$last_id')";
		 
$result2 = $conn->query($sql2);


if($result == True AND $result2 == True ){
    echo "<script>window.location.assign('hr_add.php?success=Recorded Successfully.');</script>";
}
else{
    echo "<script>window.location.assign('hr_add.php?error=Something went wrong!');</script>";
}
?>