<?php
session_start();
<<<<<<< HEAD
include("db_conn.php");
if (!isset($_SESSION['username']) || !isset($_SESSION['id'])) {
  header("Location: index.php");
  exit();
}

include("header.php");
include("sidebar.php");
?>

<!-- Content Wrapper -->
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">📊 Dashboard Overview</h1>
        </div>
      </div>

      <div class="row">
        <!-- Total Admitted Students -->
        <div class="col-lg-3 col-6">
          <div class="small-box bg-info">
            <?php
              $totalAdmitted = $conn->query("SELECT COUNT(*) AS total FROM admited_student")->fetch_assoc()['total'];
            ?>
            <div class="inner">
              <h3><?= $totalAdmitted ?></h3>
              <p>Total Admitted Students</p>
            </div>
            <div class="icon"><i class="fas fa-user-graduate"></i></div>
          </div>
        </div>

        <!-- Total Applications -->
        <div class="col-lg-3 col-6">
          <div class="small-box bg-success">
            <?php
              $totalApp = $conn->query("SELECT COUNT(*) AS total FROM application")->fetch_assoc()['total'];
            ?>
            <div class="inner">
              <h3><?= $totalApp ?></h3>
              <p>Total Pending Applications</p>
            </div>
            <div class="icon"><i class="fas fa-file-alt"></i></div>
          </div>
        </div>

        <!-- Total Contract Amount -->
        <div class="col-lg-3 col-6">
          <div class="small-box bg-warning">
            <?php
              $contractAmount = $conn->query("SELECT SUM(contract) AS total FROM admited_student")->fetch_assoc()['total'];
            ?>
            <div class="inner">
              <h3>৳ <?= $contractAmount ?></h3>
              <p>Total Contract Amount</p>
            </div>
            <div class="icon"><i class="fas fa-handshake"></i></div>
          </div>
        </div>

        <!-- Total Payments -->
        <div class="col-lg-3 col-6">
          <div class="small-box bg-danger">
            <?php
              $totalPay = $conn->query("SELECT SUM(payment_amount) AS total FROM trainee_payment")->fetch_assoc()['total'];
              $due = $contractAmount - $totalPay;
            ?>
            <div class="inner">
              <h3>৳ <?= $totalPay ?></h3>
              <p>Total Received Payments</p>
            </div>
            <div class="icon"><i class="fas fa-money-bill-wave"></i></div>
          </div>
        </div>

        <!-- Due -->
        <div class="col-lg-3 col-6">
          <div class="small-box bg-secondary">
            <div class="inner">
              <h3>৳ <?= $due ?></h3>
              <p>Total Due</p>
            </div>
            <div class="icon"><i class="fas fa-exclamation-circle"></i></div>
          </div>
        </div>
      </div>

      <!-- Recent Applicants -->
      <div class="card mb-4">
        <div class="card-header bg-primary text-white">
          <h5>🧾 Last 5 Applicants</h5>
        </div>
        <div class="card-body p-2">
          <table class="table table-sm table-bordered">
            <thead class="table-light">
              <tr><th>Application ID</th><th>Name</th><th>Mobile</th><th>Trade</th><th>Applied On</th></tr>
            </thead>
            <tbody>
              <?php
                $lastApps = $conn->query("SELECT studname, app_id, cnumber, selecttrade, app_date FROM application ORDER BY app_id DESC LIMIT 5");
                while ($row = $lastApps->fetch_assoc()) {
                  echo "<tr align='center'><td>{$row['app_id']}</td><td>{$row['studname']}</td><td>{$row['cnumber']}</td><td>{$row['selecttrade']}</td><td>{$row['app_date']}</td></tr>";
                }
              ?>
            </tbody>
          </table>
        </div>
      </div>

      <!-- Recent Payments -->
      <div class="card mb-4">
        <div class="card-header bg-success text-white">
          <h5>💵 Last 10 Payments</h5>
        </div>
        <div class="card-body p-2">
          <table class="table table-sm table-bordered">
            <thead class="table-light">
              <tr><th>Receipt No</th><th>Trainee ID</th><th>Amount</th><th>Method</th><th>Date</th><th>Status</th></tr>
            </thead>
            <tbody>
              <?php
                $payments = $conn->query("SELECT trainee_id, payment_amount, payment_sys_id, payment_method, payment_date, payment_status FROM trainee_payment ORDER BY payment_sys_id DESC LIMIT 10");
                while ($p = $payments->fetch_assoc()) {
                  echo "<tr align='center'><td>{$p['payment_sys_id']}</td><td>{$p['trainee_id']}</td><td>৳ {$p['payment_amount']}</td><td>{$p['payment_method']}</td><td>{$p['payment_date']}</td><td>{$p['payment_status']}</td></tr>";
                }
              ?>
            </tbody>
          </table>
        </div>
      </div>

      <!-- Latest Admitted Student -->
      <div class="card mb-4">
        <div class="card-header bg-warning text-dark">
          <h5>🎓 Latest Admitted Student</h5>
        </div>
        <div class="card-body">
          <?php
            $last = $conn->query("SELECT ads.trainee_id, app.studname, app.selecttrade, app.course FROM admited_student ads JOIN application app ON ads.app_id = app.app_id ORDER BY ads.row_id DESC LIMIT 1");
            $d = $last->fetch_assoc();
          ?>
          <p><strong>Name:</strong> <?= $d['studname'] ?></p>
          <p><strong>Trainee ID:</strong> <?= $d['trainee_id'] ?></p>
          <p><strong>Trade:</strong> <?= $d['selecttrade'] ?></p>
          <p><strong>Course:</strong> <?= $d['course'] ?></p>
        </div>
      </div>

      <!-- Payment Graph -->
      <div class="card">
        <div class="card-header bg-dark text-white">
          <h5>📈 Monthly Payment Chart</h5>
        </div>
        <div class="card-body">
          <canvas id="paymentChart" height="100"></canvas>
        </div>
      </div>

    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
fetch('payment_graph_data.php')
  .then(res => res.json())
  .then(data => {
    const ctx = document.getElementById('paymentChart').getContext('2d');
    new Chart(ctx, {
      type: 'bar',
      data: {
        labels: data.labels,
        datasets: [{
          label: 'Monthly Payment (৳)',
          data: data.amounts,
          backgroundColor: 'rgba(54, 162, 235, 0.7)',
        }]
      }
    });
  });
</script>

<?php include("footer.php"); ?>
=======
include "db_conn.php";
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_SESSION['username']) && isset($_SESSION['id'])) {
    include('header.php');
?>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    <?php include('sidebar.php'); ?>

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <h1 class="text-center font-weight-bold">Super Admin Dashboard</h1>
                <p class="text-center text-muted">Welcome, <?= $_SESSION['username']; ?>!</p>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">

                <?php
                $std = "SELECT * FROM admited_student as ads, application as app WHERE ads.app_id = app.app_id AND ads.status = 'Admited'";
                $stdcount = $conn->query($std)->num_rows;

                $hrcount = $conn->query("SELECT * FROM hr")->num_rows;

                $appcount = $conn->query("SELECT * FROM application WHERE app_status = 'Applied'")->num_rows;

                $scount = $conn->query("SELECT * FROM admited_student WHERE status = 'Completed'")->num_rows;
                ?>

                <div class="row">
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-gradient-info shadow-lg">
                            <div class="inner">
                                <h3 class="counter"><?= $stdcount; ?></h3>
                                <p>Running Students</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-user-graduate"></i>
                            </div>
                            <a href="std_list.php" class="small-box-footer">Student List <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-gradient-success shadow-lg">
                            <div class="inner">
                                <h3 class="counter"><?= $hrcount; ?></h3>
                                <p>Total Employees</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-users-cog"></i>
                            </div>
                            <a href="hr_list.php" class="small-box-footer">Employees <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-gradient-warning shadow-lg">
                            <div class="inner">
                                <h3 class="counter"><?= $appcount; ?></h3>
                                <p>Applied Students</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-user-plus"></i>
                            </div>
                            <a href="#" class="small-box-footer">More Info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-gradient-danger shadow-lg">
                            <div class="inner">
                                <h3 class="counter"><?= $scount; ?></h3>
                                <p>Course Completed</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-check-circle"></i>
                            </div>
                            <a href="#" class="small-box-footer">More Info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Future Chart Placeholder -->
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card card-primary card-outline shadow">
                            <div class="card-header">
                                <h3 class="card-title">Overview (Coming Soon)</h3>
                            </div>
                            <div class="card-body">
                                <canvas id="overviewChart" height="100"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </div>

    <?php include('footer.php'); ?>
</div>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js"></script>
<script>
    $(document).ready(function () {
        $('.counter').counterUp({
            delay: 10,
            time: 1000
        });
    });

    // Chart.js placeholder (future use)
    const ctx = document.getElementById('overviewChart').getContext('2d');
    const overviewChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Running', 'Employees', 'Applied', 'Completed'],
            datasets: [{
                label: 'Statistics',
                data: [<?= $stdcount ?>, <?= $hrcount ?>, <?= $appcount ?>, <?= $scount ?>],
                backgroundColor: ['#17a2b8', '#28a745', '#ffc107', '#dc3545']
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: { beginAtZero: true }
            }
        }
    });
</script>

</body>

<?php
} else {
    header("Location: index.php");
    exit();
}
?>
>>>>>>> 1ebedf3b608ef9253a39cb1f3bd5ed3ca5ca024b
