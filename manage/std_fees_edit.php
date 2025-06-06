<?php
session_start();
include "db_conn.php";

if (isset($_SESSION['username']) && isset($_SESSION['id']) && $_SESSION['role'] == 'admin') {

    if (!isset($_GET['payment_id'])) {
        header("Location: dashboard.php");
        exit();
    }

    $payment_id = $_GET['payment_id'];

    // Load payment + trainee name + txn_cat name
    $sql = "SELECT tp.*, app.studname, tc.txn_cat_name 
        FROM trainee_payment tp 
        JOIN admited_student ads ON tp.trainee_id = ads.trainee_id 
        JOIN application app ON ads.app_id = app.app_id 
        LEFT JOIN txn_cat tc ON tp.payment_purpose = tc.txn_cat_id 
        WHERE tc.txn_type_id='1' AND tp.payment_sys_id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $payment_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows != 1) {
        echo "Invalid Payment ID!";
        exit();
    }

    $data = $result->fetch_assoc();

    // Handle form submit
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $payment_date = $_POST['payment_date'];
        $payment_purpose = $_POST['payment_purpose'];
        $payment_method = $_POST['payment_method'];
        $payment_txn = $_POST['payment_txn'];
        $payment_amount = $_POST['payment_amount'];
        $remarks = $_POST['remarks'];
        $payment_status = $_POST['payment_status'];
        $updated = date('Y-m-d');

        $update_sql = "UPDATE trainee_payment SET 
                        payment_date=?, 
                        payment_purpose=?, 
                        payment_method=?, 
                        payment_txn=?, 
                        payment_amount=?, 
                        remarks=?, 
                        updated=?, 
                        payment_status=? 
                       WHERE payment_sys_id=?";
        $stmt = $conn->prepare($update_sql);
        $stmt->bind_param("ssssisssi", $payment_date, $payment_purpose, $payment_method, $payment_txn, $payment_amount, $remarks, $updated, $payment_status, $payment_id);

        if ($stmt->execute()) {
            echo "<script>alert('Payment details updated successfully!'); window.location.href='std_fees_list.php';</script>";
        } else {
            echo "<script>alert('Failed to update payment details. Please try again.');</script>";
        }
    }

    include('header.php');
    include('sidebar.php');
?>

<div class="content-wrapper">
  <section class="content-header">
   
  </section>

  <section class="content">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card shadow border-primary">
            <div class="card-header bg-primary text-white">
              <h4 class="mb-0">Edit Payment Details</h4>
            </div>
            <div class="card-body">
              <form method="POST">
                <div class="form-group">
                  <label>Trainee Name</label>
                  <input type="text" class="form-control" value="<?=$data['studname']?> - <?=$data['trainee_id']?>" readonly>
                </div>

                <div class="form-group">
                  <label>Payment Date</label>
                  <input type="date" name="payment_date" class="form-control" value="<?=$data['payment_date']?>" required>
                </div>

                <div class="form-group">
                  <label>Payment Purpose</label>
                  <select name="payment_purpose" class="form-control" required>
                    <option value="">-- Select Purpose --</option>
                    <?php
                      $cat_q = $conn->query("SELECT txn_cat_id, txn_cat_name FROM txn_cat");
                      while($cat = $cat_q->fetch_assoc()) {
                          $selected = ($data['payment_purpose'] == $cat['txn_cat_id']) ? 'selected' : '';
                          echo "<option value='{$cat['txn_cat_id']}' $selected>{$cat['txn_cat_name']}</option>";
                      }
                    ?>
                  </select>
                </div>

                <div class="form-group">
                  <label>Payment Method</label>
                                <select name="payment_method" class="form-control" data-placeholder="Select a Trainee" style="width: 100%;" required>
                                  <option value="Cash"> Cash </option>
                                  <option value="Bkash"> Bkash </option>
                                  <option value="Rocket"> Rocket </option>
                                  <option value="Nagad"> Nagad </option>
                                  <option value="Bank"> Bank </option>
                                </select>
                </div>

                <div class="form-group">
                  <label>Transaction ID</label>
                  <input type="text" name="payment_txn" class="form-control" value="<?=$data['payment_txn']?>">
                </div>

                <div class="form-group">
                  <label>Amount</label>
                  <input type="number" name="payment_amount" class="form-control" value="<?=$data['payment_amount']?>" required>
                </div>

                <div class="form-group">
                  <label>Remarks</label>
                  <textarea name="remarks" class="form-control"><?=$data['remarks']?></textarea>
                </div>

                <div class="form-group">
                  <label>Status</label>
                  <select name="payment_status" class="form-control" required>
                    <option value="Approved" <?=($data['payment_status']=='Approved')?'selected':''?>>Approved</option>
                    <option value="Pending" <?=($data['payment_status']=='Pending')?'selected':''?>>Pending</option>
                    <option value="Rejected" <?=($data['payment_status']=='Rejected')?'selected':''?>>Rejected</option>
                  </select>
                </div>

                <div class="text-right">
                  <button type="submit" class="btn btn-success">Update Payment</button>
                  <a href="payment_list.php" class="btn btn-secondary">Back</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<?php 
include('footer.php');
} else {
  header("Location: index.php");
  exit();
}
?>
