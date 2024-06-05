<?php
extract($_REQUEST);
include("db_conn.php");
$permited  = array('jpg', 'jpeg', 'png', 'gif');
$file_name = $_FILES['img']['name'];
$file_size = $_FILES['img']['size'];
$file_temp = $_FILES['img']['tmp_name'];

$div = explode('.', $file_name);
$file_ext = strtolower(end($div));
$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
$uploaded_image = "img/student/".$unique_image;

$password = md5($mobile);
$sql = "INSERT INTO std_list (trainee_id, s_name, f_name, m_name, hw_name, present_add, permanent_add, study_label, mobile, file_submit, course_name, batch, shift, status, year, contract, admission_month, note, img) VALUES ('$trainee_id', '$s_name', '$f_name', '$m_name', '$hw_name', '$present_add', '$permanent_add', '$study_label', '$mobile', '$file_submit', '$course_name', '$batch', '$shift', '$status', '$year', '$contract', '$admission_month', '$note', '$unique_image')";
		 
$result = $conn->query($sql);
$last_id = $conn->insert_id;

$sql2 = "INSERT INTO users (username, password, role, user_id) VALUES ('$mobile', '$password', 'user', '$trainee_id')";
		 
$result2 = $conn->query($sql2);

if($result == True AND $result2 == True AND move_uploaded_file($file_temp, $uploaded_image) ){

  echo "<script>window.location.assign('std_add.php?success=Recorded Successfully.');</script>";
}
else{
    echo "<script>window.location.assign('std_add.php?error=Something went wrong!');</script>";
}
?>