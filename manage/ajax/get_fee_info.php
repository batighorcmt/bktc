<?php
include("../db_conn.php");

if (isset($_POST['trainee_id'])) {
    $trainee_id = $_POST['trainee_id'];

    // Get contract amount
    $contract_sql = "SELECT contract FROM admited_student WHERE trainee_id = '$trainee_id'";
    $contract_res = mysqli_query($conn, $contract_sql);
    $contract_row = mysqli_fetch_assoc($contract_res);
    $contract_amount = $contract_row['contract'] ?? 0;

    // Get total paid amount
    $paid_sql = "SELECT SUM(payment_amount) as total_paid FROM trainee_payment WHERE trainee_id = '$trainee_id' AND payment_status != 'Rejected' AND payment_purpose = 1";
    $paid_res = mysqli_query($conn, $paid_sql);
    $paid_row = mysqli_fetch_assoc($paid_res);
    $paid_amount = $paid_row['total_paid'] ?? 0;

    $due_amount = $contract_amount - $paid_amount;
    if ($due_amount < 0) $due_amount = 0;

    echo json_encode([
        'contract_amount' => $contract_amount,
        'paid_amount' => $paid_amount,
        'due_amount' => $due_amount
    ]);
}
