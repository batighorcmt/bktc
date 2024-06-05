 <?php
extract($_REQUEST);
include("db_conn.php");

$sql = "DELETE FROM pages WHERE page_id=$page_id";
		 
$result = $conn->query($sql);
if($result == True ){
    echo "<script>window.location.assign('page_list.php?success=Page Deleted Successfully.');</script>";
}
else{
    echo "<script>window.location.assign('page_list.php?error=Something Went wrong!');</script>";
}
?>