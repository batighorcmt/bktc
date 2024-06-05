 <?php
extract($_REQUEST);
include "db_conn.php";
$sql = "UPDATE inst_data SET inst_name='$inst_name', inst_estd='$inst_estd', inst_add='$inst_add', inst_address='$inst_address' WHERE inst_id=1";
		 
$result = $conn->query($sql);

if($result == True ){
    echo "<script>window.location.assign('inst_setup.php?update=Institute Data Updated Successfully.');</script>";
}
else{
    echo "<script>window.location.assign('inst_setup.php?error=Institute Data Update Error!');</script>";
}
?>