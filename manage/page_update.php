 <?php
extract($_REQUEST);
include("db_conn.php");
$page_content = $_POST['editor'];

$sql = "UPDATE pages SET page_title='$page_title', page_meta='$page_meta', page_content='$page_content', page_tag='$page_tag' WHERE page_id=$page_id";
		 
$result = $conn->query($sql);
if($result == True ){
    echo "<script>window.location.assign('page_list.php?success=Page Update Successfully.');</script>";
}
else{
    echo "<script>window.location.assign('page_list.php?error=Something Went wrong!');</script>";
}
?>