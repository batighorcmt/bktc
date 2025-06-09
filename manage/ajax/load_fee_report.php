<?php
include "../../db_conn.php";

$session = $_POST['session'] ?? 'All';
$trade = $_POST['trade'] ?? 'All';
$course = $_POST['course'] ?? 'All';
$from_date = $_POST['from_date'] ?? '';
$to_date = $_POST['to_date'] ?? '';
$status = $_POST['payment_status'] ?? '';


$query = "
    SELECT p.*, a.studname AS studname, a.fathername, a.mothername, a.cnumber, a.saddress,
           ads.trainee_id, ads.contract, a.ssession, a.selecttrade, a.course
    FROM trainee_payment p
    JOIN admited_student ads ON p.trainee_id = ads.trainee_id
    JOIN application a ON a.app_id = ads.app_id
    WHERE 1
";

// Apply filters
if ($session !== 'All') {
    $query .= " AND a.ssession = '$session'";
}
if ($trade !== 'All') {
    $query .= " AND a.selecttrade = '$trade'";
}
if ($course !== 'All') {
    $query .= " AND a.course = '$course'";
}
if (!empty($from_date)) {
    $query .= " AND DATE(p.payment_date) >= '$from_date'";
}
if (!empty($to_date)) {
    $query .= " AND DATE(p.payment_date) <= '$to_date'";
}
if ($status != "" && $status != "All") {
    $query .= " AND p.payment_status = '$status'";
}

$query .= " ORDER BY p.payment_date DESC";

$result = $conn->query($query);

if ($result->num_rows > 0) {
    echo "<div class='table-responsive'>";
    echo "<table class='table table-bordered table-striped'>";
    echo "<thead class='table-dark'>
        <tr>
            <th>#SL</th>
            <th>Receipt ID</th>
            <th>Trainee ID</th>
            <th>Student Name</th>
            <th>Father Name</th>
            <th>Mobile</th>
            <th>Payment Date</th>
            <th>Amount</th>
        </tr>
    </thead><tbody>";

    $sl = 1;
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>{$sl}</td>
            <td>{$row['receipt_id']}</td>
            <td>{$row['trainee_id']}</td>
            <td>{$row['studname']}</td>
            <td>{$row['fathername']}</td>
            <td>{$row['cnumber']}</td>
            <td>" . date('d-m-Y', strtotime($row['payment_date'])) . "</td>
            <td>{$row['payment_amount']}</td>            
        </tr>";
        $sl++;
    }

    echo "</tbody></table>";
    echo "</div>";
} else {
    echo "<div class='alert alert-info'>No records found for the selected filters.</div>";
}
?>
