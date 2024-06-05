<?php
extract($_REQUEST);
include("db_conn.php");

$sql = "INSERT INTO trade (trade_name, trade_code, trade_status) VALUES ('$trade_name', '$trade_code', 'Active')";
		 
$result = $conn->query($sql);
$last_id = $conn->insert_id;

if($result == True){

  echo "<script>window.location.assign('trade_add.php?success=Recorded Successfully.');</script>";
}
else{
    echo "<script>window.location.assign('trade_add.php?error=Something went wrong!');</script>";
}
?>