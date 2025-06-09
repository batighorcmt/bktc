<?php
include "../db_conn.php";

$where = [];

if (!empty($_POST['from_date'])) {
    $from = $_POST['from_date'];
    $where[] = "tp.payment_date >= '$from'";
}
if (!empty($_POST['to_date'])) {
    $to = $_POST['to_date'];
    $where[] = "tp.payment_date <= '$to'";
}
if (!empty($_POST['selecttrade'])) {
    $trade = $conn->real_escape_string($_POST['selecttrade']);
    $where[] = "app.selecttrade = '$trade'";
}
if (!empty($_POST['course'])) {
    $course = $conn->real_escape_string($_POST['course']);
    $where[] = "app.course = '$course'";
}
if (!empty($_POST['session'])) {
    $session = $conn->real_escape_string($_POST['session']);
    $where[] = "app.ssession = '$session'";
}

$filterSql = implode(" AND ", $where);
$sql = "SELECT tp.*, app.studname, app.cnumber, app.course, app.ssession, app.selecttrade, txn.txn_cat_name, tp.receipt_id 
        FROM trainee_payment tp 
        JOIN admited_student ads ON tp.trainee_id = ads.trainee_id 
        JOIN application app ON ads.app_id = app.app_id 
        LEFT JOIN txn_cat txn ON tp.payment_purpose = txn.txn_cat_id";

if (!empty($filterSql)) {
    $sql .= " WHERE $filterSql";
}
$sql .= " ORDER BY tp.payment_sys_id DESC";

$result = $conn->query($sql);
$i = 1;
?>
<style>
    .status-pending {
        color: blue;
        font-weight: bold;
    }
    .status-approved {
        color: green;
        font-weight: bold;
    }
    .status-rejected {
        color: red;
        font-weight: bold;
    }
</style>

<div class="card shadow">
  <div class="card-body p-0">
    <table class="table table-bordered table-striped mb-0 table-responsive" id="example1">
      <thead class="bg-gradient-light text-dark">
        <tr>
          <th>SL</th>
          <th>Payment ID</th>
          <th>Student Name</th>
          <th>Trainee ID</th>
          <th>Mobile</th>
          <th>Course</th>
          <th>Session</th>
          <th>Payment Purpose</th>
          <th>Status</th>
          <th>Amount</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php if ($result && $result->num_rows > 0): ?>
          <?php while ($row = $result->fetch_assoc()): ?>
          <tr>
            <td><?=$i++?></td>
            <td><?=$row['payment_sys_id']?></td>
            <td><?=$row['studname']?></td>
            <td><?=$row['trainee_id']?></td>
            <td><a href="tel:<?=$row['cnumber']?>"><?=$row['cnumber']?></a></td>
            <td><?=$row['course']?></td>
            <td><?=$row['ssession']?></td>
            <td><?=$row['txn_cat_name'] ?? 'N/A'?></td>
            <td>
                <?php
                $status = $row['payment_status'];
                $class = '';
                if ($status == 'Pending') {
                    $class = 'status-pending';
                } elseif ($status == 'Approved') {
                    $class = 'status-approved';
                } elseif ($status == 'Rejected') {
                    $class = 'status-rejected';
                }
                echo "<span class='$class'>$status</span>";
                ?>
            </td>
            <td><?=$row['payment_amount']?></td>
            <td>
              <div class="btn-group">
                <button class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown">Action</button>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="std_fees_edit.php?payment_id=<?=$row['payment_sys_id']?>">Edit</a></li>
                  <li><a href="payment_receipt.php?payment_id=<?=$row['receipt_id']?>" target="_blank">Receipt</a></li>
                </ul>
              </div>
            </td>
          </tr>
          <?php endwhile; ?>
        <?php else: ?>
          <tr><td colspan="11" class="text-center text-danger">No data found</td></tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</div>

 

<script>
function convertToMySQLDate($date) {
    $d = DateTime::createFromFormat('dd/mm/Y', $date);
    return $d ? $d->format('Y-m-d') : null;
}

$from_date = !empty($_POST['from_date']) ? convertToMySQLDate($_POST['from_date']) : null;
$to_date = !empty($_POST['to_date']) ? convertToMySQLDate($_POST['to_date']) : null;
</script>