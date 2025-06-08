<?php 
session_start();
include "db_conn.php";

if (isset($_SESSION['username']) && isset($_SESSION['id'])) {
    include('header.php');
?>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

<?php 
$role = $_SESSION['role'];

if ($role === 'admin') {
    include('sidebar.php');
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Page Header -->
    <div class="content-header">
      <div class="container-fluid">
        <h3 class="mb-2">Student List (Short Course)</h3>

        <?php if (isset($_GET['update'])) { ?>
          <div class="alert alert-success"><?= $_GET['update'] ?></div>
        <?php } elseif (isset($_GET['error'])) { ?>
          <div class="alert alert-danger"><?= $_GET['error'] ?></div>
        <?php } ?>

        <!-- Student Table -->
        <div class="card">
          <div class="card-body">
            <table class="table table-bordered table-striped" id="example1">
              <thead>
                <tr>
                  <th>SL NO</th>
                  <th>Student Name / ID</th>
                  <th>Mobile / Email</th>
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
              $sql = "SELECT * 
                      FROM application AS app 
                      JOIN admited_student AS ads 
                      ON app.app_id = ads.app_id 
                      WHERE ads.status='admited' AND app.course_type='short'
                      ORDER BY trainee_id ASC";
              $result = $conn->query($sql);
              while ($row = $result->fetch_assoc()) {
              ?>
                <tr>
                  <td><?= $i++; ?></td>
                  <td>
                    <strong><a href="trainee_profile.php?trainee_id=<?= $row['trainee_id']; ?>"><?= $row['studname']; ?></a></strong><br>
                    <?= $row['trainee_id']; ?>
                  </td>
                  <td>
                    <a href="tel:<?= $row['cnumber']; ?>"><?= $row['cnumber']; ?></a><br>
                    <?= $row['studemail']; ?>
                  </td>
                  <td><?= $row['course']; ?></td>
                  <td><?= $row['ssession']; ?></td>
                  <td><?= $row['shift']; ?></td>
                  <td><?= $row['status']; ?></td>
                  <td><?= $row['saddress']; ?></td>
                  <td><?= $row['course_type']; ?></td>
                  <td><img src="../img/appliedstd/<?= $row['pic_file']; ?>" height="80" width="60"></td>
                  <td>
                    <div class="btn-group">
                      <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">Action</button>
                      <ul class="dropdown-menu">
                        <li><a href="trainee_edit.php?trainee_id=<?= $row['trainee_id']; ?>">Edit</a></li>
                        <li><a href="#">Profile View</a></li>
                        <li><a href="applicant_profile.php?trainee_id=<?= $row['trainee_id']; ?>" target="_blank">Print Profile</a></li>
                        <li><a href="std_payslip.php?trainee_id=<?= $row['trainee_id']; ?>" target="_blank">Payment History</a></li>
                        <li><a href="std_delete.php?trainee_id=<?= $row['trainee_id']; ?>">Delete</a></li>
                      </ul>
                    </div>
                  </td>
                </tr>
              <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div> <!-- /.content-wrapper -->

<?php 
    include('footer.php');
} else {
    // If not admin (manager/user/etc.)
    include('mangerfiles/managersidebar.php'); 
?>
  <!-- Content Wrapper -->
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="alert alert-danger text-center" role="alert">
          <h4 class="mb-0">আপনার এই পৃষ্ঠায় প্রবেশের অনুমতি নেই।</h4>
        </div>
      </div>
    </div>
  </div>
  <?php include('footer.php'); ?>
<?php 
} // end of role check
} else {
  header("Location: index.php");
  exit;
}
?>
