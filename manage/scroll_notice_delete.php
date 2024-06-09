<?php
extract($_REQUEST);
include("db_conn.php");
$sn_id = $_GET["sn_id"];
$sql = "DELETE from scroll_notice WHERE sn_id='$sn_id'";
		 
$result = $conn->query($sql);
$last_id = $conn->insert_id;


if($result == True){

  echo "<script>window.location.assign('scroll_notice.php?success=Deleted Successfully.');</script>";
}
else{
    echo "<script>window.location.assign('scroll_notice.php?error=Something went wrong!');</script>";
}
?>