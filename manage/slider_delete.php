<?php
extract($_REQUEST);
include("db_conn.php");
$id = $_GET["id"];
$sql = "DELETE from slider WHERE id='$id'";
		 
$result = $conn->query($sql);
$last_id = $conn->insert_id;


if($result == True){

  echo "<script>window.location.assign('slider_list.php?success=Recorded Successfully.');</script>";
}
else{
    echo "<script>window.location.assign('slider_list.php?error=Something went wrong!');</script>";
}
?>