<?php
include("../manage/db_conn.php"); // adjust path if needed

header('Content-Type: application/json');

$data = [];

// Query to get total payments per month for the last 12 months
$sql = "SELECT 
            DATE_FORMAT(payment_date, '%b %Y') AS month_year,
            SUM(payment_amount) AS total_amount
        FROM trainee_payment
        WHERE payment_status = 'Approved'
        GROUP BY YEAR(payment_date), MONTH(payment_date)
        ORDER BY payment_date DESC
        LIMIT 12";

$result = $conn->query($sql);

$labels = [];
$totals = [];

while ($row = $result->fetch_assoc()) {
    $labels[] = $row['month_year'];
    $totals[] = $row['total_amount'];
}

// Reverse arrays to make chart left-to-right (earliest to latest)
$data['labels'] = array_reverse($labels);
$data['totals'] = array_reverse($totals);

echo json_encode($data);
?>
