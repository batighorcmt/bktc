<?php
extract($_REQUEST);
include("db_conn.php");
$permited  = array('jpg', 'jpeg', 'png', 'gif', 'pdf', 'docx', 'doc');
$file_name = $_FILES['notice_file']['name'];
$file_size = $_FILES['notice_file']['size'];
$file_temp = $_FILES['notice_file']['tmp_name'];

$div = explode('.', $file_name);
$file_ext = strtolower(end($div));
$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
$uploaded_image = "../notice/".$unique_image;

$sql = "INSERT INTO notice (notice_title, notice_text, notice_status, notice_file, notice_date) VALUES ('$notice_title', '$notice_text', '$notice_status', '$unique_image', '$notice_date')";
		 
$result = $conn->query($sql);
$last_id = $conn->insert_id;


if($result == True AND move_uploaded_file($file_temp, $uploaded_image) ){

  echo "<script>window.location.assign('notice_add.php?success=Recorded Successfully.');</script>";
}
else{
    echo "<script>window.location.assign('notice_add.php?error=Something went wrong!');</script>";
}
?>