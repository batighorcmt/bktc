<?php 
session_start();
include "db_conn.php";
if (isset($_SESSION['username']) && isset($_SESSION['id'])) {   

include("header.php");
?>
<!-- Select2 -->
<link rel="stylesheet" href="plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

<?php include("sidebar.php"); ?>

<!-- Content Wrapper -->
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">

      <div class="row mb-2">
        <div class="col-sm-12 text-center">
          <h3 class="mb-4">💳 Collect Student Fees</h3>
        </div>
      </div>

      <!-- Alert -->
      <div class="row">
        <div class="col-md-12">
          <?php if (isset($_GET['msg'])): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>Success!</strong> <?=htmlspecialchars($_GET['msg'])?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <?php endif; ?>
          <?php if (isset($_GET['error'])): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong>Error!</strong> <?=htmlspecialchars($_GET['error'])?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <?php endif; ?>
        </div>
      </div>

      <!-- Card Form -->
      <div class="row justify-content-center">
        <div class="col-md-10">
          <div class="card shadow-lg">
            <div class="card-header bg-primary text-white">
              <h5 class="mb-0">📝 Student Payment Entry</h5>
            </div>
            <div class="card-body">
              <form method="post" action="std_fees_save.php" enctype="multipart/form-data">
                <div class="row">

                  <!-- Trainee -->
                  <div class="col-md-6 mb-3">
                    <label><strong>Trainee Name</strong></label>
                    <select name="trainee_id" class="form-control select2" required>
                      <option value="">Select Trainee</option>
                      <?php
                        $sql = "SELECT * FROM admited_student ads JOIN application app ON ads.app_id=app.app_id WHERE ads.status='Admited'";
                        $result = $conn->query($sql);
                        while($row = $result->fetch_array()) {
                      ?>
                        <option value="<?=$row['trainee_id'];?>"><?=$row['trainee_id'];?> - <?=$row['studname'];?></option>
                      <?php } ?>
                    </select>
                  </div>

                  <!-- Purpose -->
                  <div class="col-md-6 mb-3">
                    <label><strong>Purpose</strong></label>
                    <select name="payment_purpose" class="form-control select2" required>
                      <option value="">Select Purpose</option>
                      <?php
                        $sql = "SELECT * FROM txn_cat WHERE txn_type_id=1";
                        $result = $conn->query($sql);
                        while($row = $result->fetch_array()) {
                      ?>
                        <option value="<?=$row['txn_cat_id'];?>"><?=$row['txn_cat_name'];?></option>
                      <?php } ?>
                    </select>
                  </div>

                  <!-- Payment Date -->
                  <div class="col-md-6 mb-3">
                    <label><strong>Payment Date</strong></label>
                    <input type="date" name="payment_date" class="form-control" value="<?=date('Y-m-d')?>" required>
                  </div>

                  <!-- Payment Method -->
                  <div class="col-md-6 mb-3">
                    <label><strong>Payment Method</strong></label>
                    <select name="payment_method" class="form-control" required>
                      <option value="">Select Method</option>
                      <option value="Cash">Cash</option>
                      <option value="Bkash">Bkash</option>
                      <option value="Rocket">Rocket</option>
                      <option value="Nagad">Nagad</option>
                      <option value="Bank">Bank</option>
                    </select>
                  </div>

                  <!-- Transaction ID -->
                  <div class="col-md-6 mb-3">
                    <label><strong>Transaction ID</strong></label>
                    <input type="text" name="payment_txn" class="form-control">
                  </div>

                  <!-- Amount -->
                  <div class="col-md-6 mb-3">
                    <label><strong>Amount</strong></label>
                    <input type="number" name="payment_amount" class="form-control" required>
                  </div>

                  <!-- Remarks -->
                  <div class="col-md-12 mb-3">
                    <label><strong>Remarks</strong></label>
                    <textarea name="remarks" class="form-control" rows="3"></textarea>
                  </div>
<input type="hidden" name="payment_status" value="Pending">
                  <!-- Submit -->
                  <div class="col-md-12 text-center">
                    <button type="submit" name="submit" class="btn btn-success btn-lg">💾 Save Payment</button>
                  </div>

                </div>
              </form>
            </div> <!-- /.card-body -->
          </div> <!-- /.card -->
        </div>
      </div>

    </div><!-- /.container-fluid -->
  </div><!-- /.content-header -->
</div><!-- /.content-wrapper -->

<?php include("footer.php"); ?>

<!-- Select2 Scripts -->
<script src="plugins/select2/js/select2.full.min.js"></script>
<script>
  $(function () {
    $('.select2').select2({ theme: 'bootstrap4' });
  });
</script>

<?php 
} else {
  header("Location: index.php");
} 
?>
