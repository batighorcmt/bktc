<?php
session_start();
include "db_conn.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['payment_id']) && $_SESSION['role'] === 'admin') {
    $payment_id = $_POST['payment_id'];
    $stmt = $conn->prepare("DELETE FROM trainee_payment WHERE payment_sys_id = ?");
    $stmt->bind_param("i", $payment_id);
    if ($stmt->execute()) {
        echo "success";
    } else {
        echo "fail";
    }
} else {
    echo "unauthorized";
}
?>
