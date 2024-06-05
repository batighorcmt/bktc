<?php
extract($_REQUEST);
include("db_conn.php");
$permited  = array('jpg', 'jpeg', 'png', 'gif', 'pdf', 'docx', 'doc');
$file_name = $_FILES['sly_file']['name'];
$file_size = $_FILES['sly_file']['size'];
$file_temp = $_FILES['sly_file']['tmp_name'];

$div = explode('.', $file_name);
$file_ext = strtolower(end($div));
$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
$uploaded_image = "../syllabus/".$unique_image;

$sql = "INSERT INTO syllabus (sly_title, sly_course, sly_status, sly_file) VALUES ('$sly_title', '$sly_course', '$sly_status', '$unique_image')";
		 
$result = $conn->query($sql);
$last_id = $conn->insert_id;


if($result == True AND move_uploaded_file($file_temp, $uploaded_image) ){

  echo "<script>window.location.assign('syllabus_add.php?success=Recorded Successfully.');</script>";
}
else{
    echo "<script>window.location.assign('syllabus_add.php?error=Something went wrong!');</script>";
}
?>