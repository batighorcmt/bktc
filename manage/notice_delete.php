 <?php
extract($_REQUEST);
include("db_conn.php");

$sql = "DELETE FROM notice WHERE notice_id=$notice_id";
		 
$result = $conn->query($sql);
if($result == True ){
    echo "<script>window.location.assign('notice_list.php?success=Deleted Successfully.');</script>";
}
else{
    echo "<script>window.location.assign('notice_list.php?error=Something Went wrong!');</script>";
}
?>