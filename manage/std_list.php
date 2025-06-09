<?php 
session_start();
include "db_conn.php";
if (isset($_SESSION['username']) && isset($_SESSION['id'])) {
    include('header.php');
?>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
<?php if ($_SESSION['role'] == 'admin') { ?>
    
    <?php include('sidebar.php'); ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">

                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h3 class="text-center mb-3">Admitted Student List</h3>

                        <?php if (isset($_GET['update'])) { ?>
                            <div class="alert alert-success"><?= $_GET['update'] ?></div>
                        <?php } elseif (isset($_GET['error'])) { ?>
                            <div class="alert alert-danger"><?= $_GET['error'] ?></div>
                        <?php } ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h5 class="card-title">Student List</h5>
                            </div>
                            <div class="card-body table-responsive">
                                <table class="table table-bordered table-striped" id="example1">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>SL</th>
                                            <th>Student Name<br><small>Trainee ID</small></th>
                                            <th>Mobile<br><small>Email</small></th>
                                            <th>Trade</th>
                                            <th>Course</th>
                                            <th>Session</th>
                                            <th>Shift</th>
                                            <th>Status</th>
                                            <th>Address</th>
                                            <th>Course Type</th>
                                            <th>Photo</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $i = 1;
                                    $sql = "SELECT * FROM application AS app 
                                            JOIN admited_student AS ads ON app.app_id = ads.app_id 
                                            WHERE ads.status = 'admited'
                                            ORDER BY trainee_id ASC";
                                    $result = $conn->query($sql);
                                    while ($row = $result->fetch_array()) {
                                    ?>
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td>
                                                <strong><a href="student_profile.php?trainee_id=<?= $row['trainee_id']; ?>"><?= $row['studname']; ?></a></strong><br>
                                                <small><?= $row['trainee_id']; ?></small>
                                            </td>
                                            <td>
                                                <a href="tel:<?= $row['cnumber']; ?>"><?= $row['cnumber']; ?></a><br>
                                                <small><?= $row['studemail']; ?></small>
                                            </td>
                                            <td><?= $row['selecttrade']; ?></td>
                                            <td><?= $row['course']; ?></td>
                                            <td><?= $row['ssession']; ?></td>
                                            <td><?= $row['shift']; ?></td>
                                            <td><?= ucfirst($row['status']); ?></td>
                                            <td><?= $row['saddress']; ?></td>
                                            <td><?= ucfirst($row['course_type']); ?></td>
                                            <td>
                                                <img src="../img/appliedstd/<?= $row['pic_file']; ?>" alt="Photo" height="80" width="60" class="img-thumbnail">
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown">
                                                        Action
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" target="_blank" href="trainee_edit.php?trainee_id=<?= $row['trainee_id']; ?>">Edit</a>
                                                        <a class="dropdown-item" target="_blank" href="student_profile.php?trainee_id=<?= $row['trainee_id']; ?>">Print Profile</a>
                                                        <a class="dropdown-item" target="_blank" href="std_payslip.php?trainee_id=<?= $row['trainee_id']; ?>">Payment History</a>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item" href="std_delete.php?trainee_id=<?=$row['trainee_id'];?>&photo=<?=$row['pic_file'];?>"
     onclick="return confirm('Are you sure you want to delete this student?');">
     Delete
  </a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>SL</th>
                                            <th>Student Name<br><small>Trainee ID</small></th>
                                            <th>Mobile<br><small>Email</small></th>
                                            <th>Trade</th>
                                            <th>Course</th>
                                            <th>Session</th>
                                            <th>Shift</th>
                                            <th>Status</th>
                                            <th>Address</th>
                                            <th>Course Type</th>
                                            <th>Photo</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div> <!-- card-body -->
                        </div> <!-- card -->
                    </div> <!-- col -->
                </div> <!-- row -->

            </div> <!-- container-fluid -->
        </div> <!-- content-header -->
    </div> <!-- content-wrapper -->

    <?php } else {
        header("Location: dashboard.php");
    } ?>

    <?php include('footer.php'); ?>

</div> <!-- wrapper -->
</body>
</html>
<?php 
} else {
    header("Location: index.php");
} 
?>
