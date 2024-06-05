 <?php
extract($_REQUEST);
include "db_conn.php";
$sql = "INSERT INTO inst_data (inst_name, inst_estd, inst_add, inst_address) VALUES ('$inst_name', '$inst_estd', '$inst_add', '$inst_address')";
		 
$result = $conn->query($sql);
$last_id = $conn->insert_id;
if($result == True ){
    echo "<script>window.location.assign('inst_setup.php?update=Institute Data Updated Successfully.');</script>";
}
else{
    echo "<script>window.location.assign('inst_setup.php?error=Institute Data Update Error!');</script>";
}
?>