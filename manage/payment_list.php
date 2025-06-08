<?php 
session_start();
include "db_conn.php";

if (!isset($_SESSION['username']) || $_SESSION['role'] != 'admin') {
    header("Location: index.php");
    exit();
}

include('header.php'); 
include('sidebar.php'); 

// Trade dropdown data
$tradeQuery = "SELECT * FROM trade WHERE trade_status = 'Active'";
$tradeResult = $conn->query($tradeQuery);

// Course dropdown data
$courseQuery = "SELECT * FROM course WHERE course_status = 'Active'";
$courseResult = $conn->query($courseQuery);

// Session dropdown data
$sessionQuery = "SELECT * FROM session WHERE session_status = 'Active'";
$sessionResult = $conn->query($sessionQuery);

?>

<div class="content-wrapper">
  <section class="content-header">
    <h1>Payment List</h1>
  </section>

  <section class="content">
    <div class="container-fluid">

<div class="card mb-3 shadow-sm border-primary">
  <div class="card-body">
    <form id="filterForm" class="row g-2">
      <div class="col-md-2">
        <label for="from_date" class="form-label">From Date</label>
        <input type="date" name="from_date" class="form-control">
      </div>
      <div class="col-md-2">
        <label for="to_date" class="form-label">To Date</label>
        <input type="date" name="to_date" class="form-control">
      </div>
      <div class="col-md-2">
        <label for="selecttrade" class="form-label">Trade</label>
        <select name="selecttrade" class="form-control">
          <option value="">All</option>
          <?php while($row = $tradeResult->fetch_assoc()): ?>
            <option value="<?= htmlspecialchars($row['trade_name']) ?>"><?= htmlspecialchars($row['trade_name']) ?></option>
          <?php endwhile; ?>
        </select>
      </div>
      <div class="col-md-2">
        <label for="course" class="form-label">Course</label>
        <select name="course" class="form-control">
          <option value="">All</option>
          <?php while($row = $courseResult->fetch_assoc()): ?>
            <option value="<?= htmlspecialchars($row['course_name']) ?>"><?= htmlspecialchars($row['course_name']) ?></option>
          <?php endwhile; ?>
        </select>
      </div>
      <div class="col-md-2">
        <label for="session" class="form-label">Session</label>
        <select name="session" class="form-control">
          <option value="">All</option>
          <?php while($row = $sessionResult->fetch_assoc()): ?>
            <option value="<?= htmlspecialchars($row['session_name']) ?>"><?= htmlspecialchars($row['session_name']) ?></option>
          <?php endwhile; ?>
        </select>
      </div>
      <div class="col-md-1 d-flex align-items-end">
  <button type="submit" class="btn btn-primary w-100">Search</button>
</div>
      <div class="col-md-1 d-flex align-items-end">
  <button type="button" id="resetBtn" class="btn btn-secondary w-100 btn-danger">Reset</button>
</div>


    </form>
  </div>
</div>

      <!-- Table Results -->
      <div id="paymentTable"></div>

    </div>
  </section>
</div>

<?php include('footer.php'); ?>
 
<!-- AJAX Script -->
<script>
$(document).ready(function () {
  // ফর্ম সাবমিটে AJAX চালাও
  $('#filterForm').on('submit', function (e) {
    e.preventDefault(); // ফর্ম সাবমিট করে রিফ্রেশ বন্ধ
    loadPayments();
  });

  // রিসেট বাটন ক্লিক করলে ইনপুট ক্লিয়ার করে ডেটা রিলোড করাও
  $('#resetBtn').click(function () {
    $('#filterForm')[0].reset();
    loadPayments();
  });

  // পেজ লোডেই সব ডেটা লোড করাও
  loadPayments();
});

function loadPayments() {
  $.ajax({
    url: 'ajax/filter_payments.php',
    method: 'POST',
    data: $('#filterForm').serialize(),
    success: function (data) {
      $('#paymentTable').html(data);
      $('#paymentTableData').DataTable(); // টেবিল রেন্ডার করার পর ডেটাটেবল চালাও
    },
    error: function (xhr) {
      alert('AJAX error: ' + xhr.responseText);
    }
  });
}
</script>


<!-- jQuery UI CSS + JS -->
<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>

<script>
$(function () {
  $(".datepicker").datepicker({
    dateFormat: 'dd/mm/yy'
  });
});
</script>