<?php
extract($_REQUEST);
include("db_conn.php");
$permited  = array('jpg', 'jpeg', 'png', 'gif');
$file_name = $_FILES['photo']['name'];
$file_size = $_FILES['photo']['size'];
$file_temp = $_FILES['photo']['tmp_name'];

$div = explode('.', $file_name);
$file_ext = strtolower(end($div));
$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
$uploaded_image = "../slider/".$unique_image;

$sql = "INSERT INTO slider (title, text, status, photo) VALUES ('$title', '$text', '$status', '$unique_image')";
		 
$result = $conn->query($sql);
$last_id = $conn->insert_id;


if($result == True AND move_uploaded_file($file_temp, $uploaded_image) ){

  echo "<script>window.location.assign('slider_add.php?success=Recorded Successfully.');</script>";
}
else{
    echo "<script>window.location.assign('slider_add.php?error=Something went wrong!');</script>";
}
?>