 <?php
extract($_REQUEST);
include("db_conn.php");
$sql = "INSERT INTO trainee_payment (trainee_id, payment_date, payment_method, payment_txn, payment_amount, remarks) VALUES ('$trainee_id', '$payment_date', '$payment_method', '$payment_txn', '$payment_amount', '$remarks')";
		 
$result = $conn->query($sql);
$last_id = $con->insert_id;
if($result == True ){
    echo "<script>window.location.assign('std_fees_add.php?success=Payment Saved.');</script>";
}
else{
    echo "<script>window.location.assign('std_fees_add.php?error=Something Went wrong!');</script>";
}
?>