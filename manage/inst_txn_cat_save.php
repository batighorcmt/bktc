<?php
extract($_REQUEST);
include("db_conn.php");

$sql = "INSERT INTO txn_cat (txn_type_id, txn_cat_name) VALUES ('$txn_type_id', '$txn_cat_name')";
		 
$result = $conn->query($sql);
$last_id = $conn->insert_id;

if($result == True){

  echo "<script>window.location.assign('inst_txn_setup.php?success=Recorded Successfully.');</script>";
}
else{
    echo "<script>window.location.assign('inst_txn_setup.php?error=Something went wrong!');</script>";
}
?>