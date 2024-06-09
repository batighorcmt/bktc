 <?php
extract($_REQUEST);
include("db_conn.php");

$sql = "UPDATE scroll_notice SET sn_title='$sn_title', sn_link='$sn_link', sn_status='$sn_status' WHERE sn_id=$sn_id";
		 
$result = $conn->query($sql);
if($result == True ){
    echo "<script>window.location.assign('scroll_notice.php?success=Updated Successfully.');</script>";
}
else{
    echo "<script>window.location.assign('scroll_notice.php?error=Something Went wrong!');</script>";
}
?>