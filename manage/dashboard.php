<?php
session_start();
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