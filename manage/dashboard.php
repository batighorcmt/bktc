<?php
include("../manage/db_conn.php");
include("header.php");
include("sidebar.php");

// Data Fetch
$total_students = $conn->query("SELECT COUNT(*) AS cnt FROM admitted_student")->fetch_assoc()['cnt'];
$total_apps = $conn->query("SELECT COUNT(*) AS cnt FROM application")->fetch_assoc()['cnt'];
$total_paid = $conn->query("SELECT SUM(payment_amount) AS amt FROM trainee_payment")->fetch_assoc()['amt'];
$total_due = $conn->query("SELECT SUM(a.contract - IFNULL(p.paid, 0)) AS due
  FROM admitted_student a
  LEFT JOIN (
    SELECT trainee_id, SUM(payment_amount) AS paid
    FROM trainee_payment GROUP BY trainee_id
  ) p ON a.trainee_id = p.trainee_id")->fetch_assoc()['due'];

// Chart data (last 6 months)
$months = $conn->query("
  SELECT DATE_FORMAT(payment_date, '%Y-%m') AS mon,
    COUNT(*) AS pay_count, SUM(payment_amount) AS pay_sum
  FROM trainee_payment
  WHERE payment_date >= DATE_SUB(CURDATE(), INTERVAL 5 MONTH)
  GROUP BY mon
  ORDER BY mon
")->fetch_all(MYSQLI_ASSOC);

// Recent entries
$recent_students = $conn->query("SELECT trainee_id, studname, shift FROM admitted_student ORDER BY row_id DESC LIMIT 5");
$recent_payments = $conn->query("SELECT trainee_id, payment_amount, payment_date FROM trainee_payment ORDER BY payment_sys_id DESC LIMIT 5");
$recent_apps = $conn->query("SELECT app_id, studname, app_status FROM application ORDER BY app_id DESC LIMIT 5");
?>

<div class="content-wrapper">
  <section class="content-header">
    <h1>📊 Dashboard</h1>
  </section>

  <section class="content">
    <!-- Info boxes -->
    <div class="row">
      <?php
      $boxes = [
        ['bg'=>'bg-info','icon'=>'fas fa-user-graduate','title'=>'Students','value'=>$total_students],
        ['bg'=>'bg-primary','icon'=>'fas fa-file-alt','title'=>'Applications','value'=>$total_apps],
        ['bg'=>'bg-success','icon'=>'fas fa-money-bill-wave','title'=>'Paid Amount','value'=>'৳ ' . number_format($total_paid,2)],
        ['bg'=>'bg-danger','icon'=>'fas fa-exclamation-circle','title'=>'Due Amount','value'=>'৳ ' . number_format($total_due,2)],
      ];
      foreach ($boxes as $b): ?>
      <div class="col-lg-3 col-6">
        <div class="small-box <?= $b['bg'] ?>">
          <div class="inner"><h3><?= $b['value'] ?></h3><p><?= $b['title'] ?></p></div>
          <div class="icon"><i class="<?= $b['icon'] ?>"></i></div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>

    <!-- Charts -->
    <div class="row">
      <div class="col-md-6">
        <div class="card card-outline card-info">
          <div class="card-header"><h3 class="card-title">Monthly Payments</h3></div>
          <div class="card-body">
            <canvas id="paymentsChart" style="min-height:250px;"></canvas>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card card-outline card-danger">
          <div class="card-header"><h3 class="card-title">Recent Activities</h3></div>
          <div class="card-body">
            <strong>New Students</strong>
            <ul class="list-group mb-3">
              <?php while($r=$recent_students->fetch_assoc()): ?>
                <li class="list-group-item"><?= $r['trainee_id'] ?> – <?= $r['studname'] ?> <span class="badge badge-info float-right"><?= $r['shift'] ?></span></li>
              <?php endwhile; ?>
            </ul>
            <strong>Recent Payments</strong>
            <ul class="list-group mb-3">
              <?php while($r=$recent_payments->fetch_assoc()): ?>
                <li class="list-group-item"><?= $r['trainee_id'] ?> – ৳ <?= number_format($r['payment_amount'],2) ?> <span class="badge badge-success float-right"><?= $r['payment_date'] ?></span></li>
              <?php endwhile; ?>
            </ul>
            <strong>Recent Applications</strong>
            <ul class="list-group">
              <?php while($r=$recent_apps->fetch_assoc()): ?>
                <li class="list-group-item"><?= $r['studname'] ?> <span class="badge badge-secondary float-right"><?= $r['app_status'] ?></span></li>
              <?php endwhile; ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const ctx = document.getElementById('paymentsChart').getContext('2d');
  new Chart(ctx, {
    type: 'line',
    data: {
      labels: [ <?= implode(',', array_map(fn($m)=>"'".$m['mon']."'", $months)) ?> ],
      datasets: [{
        label: 'Payments (৳)',
        data: [ <?= implode(',', array_column($months,'pay_sum')) ?> ],
        backgroundColor: 'rgba(60,141,188,0.2)',
        borderColor: 'rgba(60,141,188,1)',
        tension: 0.3
      }]
    },
    options: { responsive: true, maintainAspectRatio: false }
  });
</script>

<?php include("footer.php"); ?>