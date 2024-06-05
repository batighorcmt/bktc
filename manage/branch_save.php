<?php
extract($_REQUEST);
include("db_conn.php");

$sql = "INSERT INTO branch (br_id, br_name, br_address, br_dirname, br_dirmob, br_status) VALUES ('$br_id', '$br_name', '$br_address', '$br_dirname', '$br_dirmob', 'Active')";
		 
$result = $conn->query($sql);
$last_id = $conn->insert_id;

if($result == True){

  echo "<script>window.location.assign('branch_add.php?success=Recorded Successfully.');</script>";
}
else{
    echo "<script>window.location.assign('branch_add.php?error=Something went wrong!');</script>";
}
?>