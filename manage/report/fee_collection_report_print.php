<?php
include "../db_conn.php";

$session = $_GET['session'] ?? 'All';
$trade   = $_GET['trade'] ?? 'All';
$course  = $_GET['course'] ?? 'All';
$from_date = $_GET['from_date'] ?? '';
$to_date   = $_GET['to_date'] ?? '';
$status = $_GET['payment_status'] ?? '';


// Build SQL with joins
$sql = "
  SELECT p.*, a.studname AS studname, a.fathername, a.mothername, a.cnumber, a.saddress,
           ads.trainee_id, ads.contract, a.ssession, a.selecttrade, a.course
    FROM trainee_payment p
    JOIN admited_student ads ON p.trainee_id = ads.trainee_id
    JOIN application a ON a.app_id = ads.app_id
    WHERE 1
";
if ($session != 'All')  $sql .= " AND a.ssession = '$session'";
if ($trade != 'All')    $sql .= " AND a.selecttrade = '$trade'";
if ($course != 'All')   $sql .= " AND a.course = '$course'";
if ($from_date)         $sql .= " AND p.payment_date >= '$from_date'";
if ($to_date)           $sql .= " AND p.payment_date <= '$to_date'";
if ($status != "" && $status != "All") {
    $sql .= " AND p.payment_status = '$status' ORDER BY p.payment_date DESC";
}



$result = $conn->query($sql);
$print_time = date("d/m/Y h:i A");

 $sqlinst = "SELECT * from inst_data limit 1";
  $resultinst = $conn->query($sqlinst);
  while($r = $resultinst->fetch_assoc())
  { 
        $instname = $r['inst_name'];
        $instadd = $r['inst_add'];
        $instaddress = $r['inst_address'];
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Fee Collection Report</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { font-family: sans-serif; font-size: 14px; }
    .header { text-align: center; margin-bottom: 10px; }
    .header img { height: 80px; }
    .title { font-size: 20px; font-weight: bold; margin-top: 5px; }
    table { width: 100%; border-collapse: collapse; margin-top: 10px; }
    table, th, td { border: 1px solid #000; }
    th, td { padding: 6px; text-align: left; }
    .meta { margin: 10px 0; font-weight: bold; }
    .footer { margin-top: 15px; font-size: 12px; }
    @media print {
      .no-print { display: none; }
    }
    .school-logo {
      height: 80px;
    }
    .info-line {
      font-size: 15px;
      margin-bottom: 15px;
    }
    table th, table td {
      vertical-align: middle;
    }
    @media print {
      .no-print {
        display: none;
      }
    }
  </style>
</head>
<body>
  <div class="text-center mb-4" style="border-bottom: 2px solid #000; padding-bottom: 10px;">
    <div class="d-flex align-items-center justify-content-center mb-2">
      <img src="../../site_images/bktc_logo.png" alt="logo" class="school-logo me-3">
      <div>
        <h4 class="mb-0 fw-bold"><?php echo $instname; ?></h4>
        <p class="mb-0"><?php echo $instadd; ?></p>
        <p class="mb-0"><?php echo $instaddress; ?></p>
        <h5 class="mt-2">Fees Collection Report</h5>
      </div>
    </div>
  </div>

  <div class="row info-line">
    <div class="col-md-3"><strong>Session : <?= !empty($session) ? htmlspecialchars($session) : 'All' ?> </strong></div>
    <div class="col-md-3"><strong>Trade : <?= !empty($selecttrade) ? htmlspecialchars($selecttrade) : 'All' ?></strong></div>
    <div class="col-md-3"><strong>Course/ Subject : <?= !empty($course) ? htmlspecialchars($course) : 'All' ?></strong></div>
    <div class="col-md-3"><strong>Status : <?= !empty($status) ? htmlspecialchars($status) : 'All' ?></strong></div>
    <div class="col-md-3"><strong><?php if ($from_date || $to_date): ?>
      Date Range: <?= $from_date ? date("d/m/Y", strtotime($from_date)) : '...' ?> to <?= $to_date ? date("d/m/Y", strtotime($to_date)) : '...' ?>
    <?php endif; ?>
  </strong></div>
  </div>


  <table>
    <thead>
      <tr>
        <th>#SL</th>
        <th>Trainee ID</th>
        <th>Student Name</th>
        <th>Father Name</th>
        <th>Mother Name</th>
        <th>Payment Date</th>
        <th>Amount</th>
      </tr>
    </thead>
    <tbody>
      <?php if ($result->num_rows > 0): $i = 1; $total = 0; ?>
        <?php while($row = $result->fetch_assoc()): ?>
          <tr>
            <td><?= $i++ ?></td>
            <td><?= htmlspecialchars($row['trainee_id']) ?></td>
            <td><?= htmlspecialchars($row['studname']) ?></td>
            <td><?= htmlspecialchars($row['fathername']) ?></td>
            <td><?= htmlspecialchars($row['mothername']) ?></td>
            <td><?= date("d/m/Y", strtotime($row['payment_date'])) ?></td>
            <td><?= number_format($row['payment_amount'], 2) ?></td>
          </tr>
          <?php $total += $row['payment_amount']; ?>
        <?php endwhile; ?>
        <tr>
          <td colspan="6" style="text-align: right;"><strong>Total Amount</strong></td>
          <td><strong><?= number_format($total, 2) ?></strong></td>
        </tr>
      <?php else: ?>
        <tr><td colspan="7">No records found.</td></tr>
      <?php endif; ?>
    </tbody>
  </table>

  <div class="footer">
    Printed on: <?= $print_time ?>
  </div>

  <div class="no-print">
    <button onclick="window.print()">🖨️ Print</button>
  </div>
</body>
</html>

