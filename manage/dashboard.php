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
        <?php if ($_SESSION['role'] == 'admin') { include('sidebar.php'); ?>

        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <h1>Admin Dashboard</h1>
                </div>
            </section>

            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <?php
                        $std = "SELECT * FROM admited_student as ads, application as app WHERE ads.app_id = app.app_id AND ads.status = 'Admited'";
                        $stdcount = $conn->query($std)->num_rows;

                        $hrcount = $conn->query("SELECT * FROM hr")->num_rows;

                        $appcount = $conn->query("SELECT * FROM application WHERE app_status = 'Applied'")->num_rows;

                        $scount = $conn->query("SELECT * FROM admited_student WHERE status = 'Completed'")->num_rows;
                        ?>

                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3><?= $stdcount; ?></h3>
                                    <p>Running Students</p>
                                </div>
                                <div class="icon"><i class="ion ion-bag"></i></div>
                                <a href="std_list.php" class="small-box-footer">Student List <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3><?= $hrcount; ?></h3>
                                    <p>Employees</p>
                                </div>
                                <div class="icon"><i class="ion ion-stats-bars"></i></div>
                                <a href="hr_list.php" class="small-box-footer">Employees <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3><?= $appcount; ?></h3>
                                    <p>Applied Students</p>
                                </div>
                                <div class="icon"><i class="ion ion-person-add"></i></div>
                                <a href="#" class="small-box-footer">More Info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3><?= $scount; ?></h3>
                                    <p>Course Completed</p>
                                </div>
                                <div class="icon"><i class="ion ion-pie-graph"></i></div>
                                <a href="#" class="small-box-footer">More Info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <?php } else {
            echo "<div class='content-wrapper'><h2>Unauthorized Access</h2></div>";
        } ?>
    </div>

    <?php include('footer.php'); ?>
    </body>

    <?php
} else {
    header("Location: index.php");
    exit();
}
?>