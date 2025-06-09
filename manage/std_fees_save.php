<?php
   session_start();
   include "db_conn.php";
   if (isset($_SESSION['username']) && isset($_SESSION['id'])) {   
    extract($_REQUEST);		
    $received_by = $_SESSION['id']; // Received by user ID from session


// তারিখ সেটিং
$date = date('Y-m-d', strtotime($payment_date));
$year = date('y', strtotime($date)); // Last two digits of year
$month = date('m', strtotime($date)); // 2 digit month

// ঐ মাসে কতটি পেমেন্ট ইতিমধ্যে হয়েছে তা বের করা
$sql_count = "SELECT COUNT(*) as count FROM trainee_payment WHERE MONTH(payment_date) = '$month' AND YEAR(payment_date) = '20$year'";
$result_count = $conn->query($sql_count);
$row_count = $result_count->fetch_assoc();
$count = $row_count['count'] + 1;

// তিন ডিজিটের ক্রমিক সিরিয়াল
$serial = str_pad($count, 3, '0', STR_PAD_LEFT);

// receipt_id গঠন
$receipt_id = $year . $month . $serial;

$sql = "INSERT INTO trainee_payment (
            trainee_id, 
            payment_date, 
            payment_method, 
            payment_txn, 
            payment_amount, 
            payment_purpose, 
            payment_status, 
            remarks,
            receipt_id,
            received_by,
        ) VALUES (
            '$trainee_id', 
            '$payment_date', 
            '$payment_method', 
            '$payment_txn', 
            '$payment_amount', 
            '$payment_purpose', 
            '$payment_status', 
            '$remarks',
            '$receipt_id', 
            '$received_by'
        )";

$result = $conn->query($sql);
$last_id = $conn->insert_id;

if ($result == true) {
    echo "<script>window.location.assign('payment_receipt.php?payment_id=$receipt_id');</script>";
} else {
    echo "<script>window.location.assign('std_fees_add.php?error=Something Went wrong!');</script>";
}
} else {
    echo "<script>window.location.assign('index.php');</script>";
}
?>
