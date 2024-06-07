<?php
extract($_REQUEST);
include("db_conn.php");

$sql = "INSERT INTO scroll_notice (sn_title, sn_link, sn_status) VALUES ('$sn_title', '$sn_link', 'Active')";
		 
$result = $conn->query($sql);
$last_id = $conn->insert_id;


if($result == True ){

  echo "<script>window.location.assign('scroll_notice.php?success=Recorded Successfully.');</script>";
}
else{
    echo "<script>window.location.assign('scroll_notice.php?error=Something went wrong!');</script>";
}
?>