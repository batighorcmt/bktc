 <?php
extract($_REQUEST);
include("db_conn.php");
$notice_id = $_POST['notice_id'];
$notice_title = $_POST['notice_title'];
$notice_text = $_POST['notice_text'];
$notice_status = $_POST['notice_status'];
$notice_date = $_POST['notice_date'];

$permited  = array('jpg', 'jpeg', 'png', 'gif', 'pdf', 'docx', 'doc');
$file_name = $_FILES['notice_file']['name'];
$file_size = $_FILES['notice_file']['size'];
$file_temp = $_FILES['notice_file']['tmp_name'];

$div = explode('.', $file_name);
$file_ext = strtolower(end($div));
$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
$uploaded_image = "../notice/".$unique_image;


$sql = "UPDATE notice SET notice_title='$notice_title', notice_text='$notice_text', notice_status='$notice_status', notice_date='$notice_date', notice_file='$uploaded_image' WHERE notice_id=$notice_id";
		 
$result = $conn->query($sql);
if($result == True AND move_uploaded_file($file_temp, $uploaded_image) ){
    echo "<script>window.location.assign('notice_list.php?success=Updated Successfully.');</script>";
}
else{
    echo "<script>window.location.assign('notice_list.php?error=Something Went wrong!');</script>";
}
?>