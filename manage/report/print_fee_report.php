<?php
include('../db_conn.php');
session_start();

if (!isset($_SESSION['username']) || !isset($_SESSION['id'])) {
    header("Location: ../login.php");
    exit();
}

// ইনস্টিটিউট তথ্য
$sqlinst = "SELECT * FROM inst_data LIMIT 1";
$resultinst = $conn->query($sqlinst);
$inst = $resultinst->fetch_assoc();
$instname = $inst['inst_name'];
$instadd = $inst['inst_add'];
$instaddress = $inst['inst_address'];

// ফিল্টার ডেটা
$from_date = $_GET['from_date'] ?? '';
$to_date = $_GET['to_date'] ?? '';
$session_id = $_GET['session_id'] ?? '';
$trade_id = $_GET['trade_id'] ?? '';
$course_id = $_GET['course_id'] ?? '';

// নাম রিডেবল করতে কুয়েরি
$session_name = "All";
$trade_name = "All";
$course_name = "All";

if (!empty($session_id)) {
    $res = $conn->query("SELECT session_name FROM session WHERE session_id = '$session_id'");
    if ($row = $res->fetch_assoc()) {
        $session_name = $row['session_name'];
    }
}

if (!empty($trade_id)) {
    $res = $conn->query("SELECT trade_name FROM trade WHERE trade_id = '$trade_id'");
    if ($row = $res->fetch_assoc()) {
        $trade_name = $row['trade_name'];
    }
}

if (!empty($course_id)) {
    $res = $conn->query("SELECT course_name FROM course WHERE course_id = '$course_id'");
    if ($row = $res->fetch_assoc()) {
        $course_name = $row['course_name'];
    }
}

// মূল Query
$sql = "SELECT 
            st.trainee_id, 
            app.studname,
            app.course,
            app.selecttrade,
            app.ssession,
            st.contract,
            IFNULL(SUM(p.payment_amount), 0) AS total_payment
        FROM admited_student AS st
        INNER JOIN application AS app ON st.app_id = app.app_id
        LEFT JOIN trainee_payment AS p ON p.trainee_id = st.trainee_id AND p.payment_purpose = 1
        WHERE 1=1";

$params = [];
$types = "";

if (!empty($from_date)) {
    $sql .= " AND p.payment_date >= ?";
    $types .= "s";
    $params[] = $from_date;
}
if (!empty($to_date)) {
    $sql .= " AND p.payment_date <= ?";
    $types .= "s";
    $params[] = $to_date;
}
if (!empty($session_id)) {
    $sql .= " AND app.ssession = (SELECT session_name FROM session WHERE session_id = ?)";
    $types .= "i";
    $params[] = $session_id;
}
if (!empty($trade_id)) {
    $sql .= " AND app.selecttrade = (SELECT trade_name FROM trade WHERE trade_id = ?)";
    $types .= "i";
    $params[] = $trade_id;
}
if (!empty($course_id)) {
    $sql .= " AND app.course = (SELECT course_name FROM course WHERE course_id = ?)";
    $types .= "i";
    $params[] = $course_id;
}

$sql .= " GROUP BY st.trainee_id ORDER BY st.trainee_id ASC";
$stmt = $conn->prepare($sql);
if (!empty($params)) {
    $stmt->bind_param($types, ...$params);
}
$stmt->execute();
$result = $stmt->get_result();

// টোটাল হিসাব
$total_contract = 0;
$total_paid = 0;
$total_due = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Fee Report Print</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { font-family: 'Siyam Rupali', Arial, sans-serif; }
    .school-logo { height: 80px; }
    .info-line { font-size: 15px; margin-bottom: 15px; }
    table th, table td { vertical-align: middle; }
    @media print { .no-print { display: none; } }
  </style>
</head>
<body class="p-4">

  <div class="text-center mb-4" style="border-bottom: 2px solid #000;">
    <div class="d-flex align-items-center justify-content-center mb-2">
      <img src="../../site_images/bktc_logo.png" alt="logo" class="school-logo me-3">
      <div>
        <h4 class="mb-0 fw-bold"><?= $instname ?></h4>
        <p class="mb-0"><?= $instadd ?></p>
        <p class="mb-0"><?= $instaddress ?></p>
        <h5 class="mt-2">Fee Collection Report</h5>
      </div>
    </div>
  </div>

  <div class="row info-line">
    <div class="col-md-3"><strong>Session:</strong> <?= htmlspecialchars($session_name) ?></div>
    <div class="col-md-3"><strong>Trade:</strong> <?= htmlspecialchars($trade_name) ?></div>
    <div class="col-md-3"><strong>Course:</strong> <?= htmlspecialchars($course_name) ?></div>
    <div class="col-md-3"><strong>Date Range:</strong>
        <?= ($from_date ? $from_date : 'All') . ' - ' . ($to_date ? $to_date : 'All') ?>
    </div>
  </div>

  <div class="table-responsive">
    <table class="table table-bordered text-center align-middle">
      <thead class="table-secondary">
        <tr>
          <th>#SL</th>
          <th>Trainee ID</th>
          <th>Student Name</th>
          <th>Course</th>
          <th>Contract</th>
          <th>Total Payment</th>
          <th>Due Amount</th>
          <th>Payment Status</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sl = 1;
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $contract = $row['contract'];
                $paid = $row['total_payment'];
                $due = $contract - $paid;
                $status = ($paid >= $contract) ? "Paid" : "Due";
                $statusClass = ($status === "Paid") ? "text-success fw-bold" : "text-danger fw-bold";

                $total_contract += $contract;
                $total_paid += $paid;
                $total_due += $due;

                echo "<tr>
                        <td>{$sl}</td>
                        <td>{$row['trainee_id']}</td>
                        <td>{$row['studname']}</td>
                        <td>{$row['course']}</td>
                        <td>{$contract}</td>
                        <td>{$paid}</td>
                        <td>{$due}</td>
                        <td class='{$statusClass}'>{$status}</td>
                      </tr>";
                $sl++;
            }
        } else {
            echo "<tr><td colspan='8'>No Data Found</td></tr>";
        }
        ?>
      </tbody>
      <tfoot class="table-light">
        <tr>
          <th colspan="4" class="text-end">Total</th>
          <th><?= $total_contract ?></th>
          <th><?= $total_paid ?></th>
          <th><?= $total_due ?></th>
          <th></th>
        </tr>
      </tfoot>
    </table>
    <p class="text-right mt-3"><small>Printed on: <?= date('d/m/Y h:i A') ?></small></p>
  </div>

  <div class="text-center no-print mt-4">
    <button onclick="window.print()" class="btn btn-primary"> 🖨️ Print </button> 
  </div>

</body>
</html>
