<?php
include "../db_conn.php";
include "header.php";
include "sidebar.php";
?>

<div class="content-wrapper">
  <section class="content-header">
    <h1>Fee Collection Report</h1>
  </section>

  <section class="content">
    <div class="card card-primary">
      <div class="card-header"><h3 class="card-title">Filter Report</h3></div>
      <div class="card-body">
        <form id="filterForm" class="row g-3">
          <div class="col-md-3">
            <label>Session</label>
            <select name="session" class="form-control">
              <option value="All">All</option>
              <?php
              $res = $conn->query("SELECT * FROM session WHERE session_status = 'Active'");
              while ($row = $res->fetch_assoc()) {
                echo "<option value='{$row['session_name']}'>{$row['session_name']}</option>";
              }
              ?>
            </select>
          </div>

          <div class="col-md-3">
            <label>Trade</label>
            <select name="trade" class="form-control">
              <option value="All">All</option>
              <?php
              $res = $conn->query("SELECT * FROM trade WHERE trade_status = 'Active'");
              while ($row = $res->fetch_assoc()) {
                echo "<option value='{$row['trade_name']}'>{$row['trade_name']}</option>";
              }
              ?>
            </select>
          </div>

          <div class="col-md-3">
            <label>Course</label>
            <select name="course" class="form-control">
              <option value="All">All</option>
              <?php
              $res = $conn->query("SELECT * FROM course WHERE course_status = 'Active'");
              while ($row = $res->fetch_assoc()) {
                echo "<option value='{$row['course_name']}'>{$row['course_name']}</option>";
              }
              ?>
            </select>
          </div>

          <div class="col-md-3">
            <label>Payment Status</label>
            <select name="payment_status" class="form-control">
              <option value="All">All</option>
              <option value="Approved">Approved</option>
              <option value="Pending">Pending</option>
              <option value="Rejected">Rejected</option>
            </select>
          </div>

          <div class="col-md-3">
            <label>From Date</label>
            <input type="date" name="from_date" class="form-control">
          </div>

          <div class="col-md-3">
            <label>To Date</label>
            <input type="date" name="to_date" class="form-control">
          </div>

          <div class="col-md-6 d-flex align-items-end mt-2">
            <button type="button" class="btn btn-primary me-2" onclick="loadReport()">Search</button>
            <button type="button" class="btn btn-success me-2" onclick="printReport()">Print</button>
            <button type="button" class="btn btn-danger" onclick="resetForm()">Reset</button>
          </div>
        </form>
      </div>
    </div>

    <div class="card card-secondary">
      <div class="card-header"><h3 class="card-title">Report Result</h3></div>
      <div class="card-body" id="reportResult">
        <p class="text-muted">Please use the filter above to view results.</p>
      </div>
    </div>
  </section>
</div>

<script>
function loadReport() {
  const form = document.querySelector('#filterForm');
  const formData = new FormData(form);
  fetch('ajax/load_fee_report.php', {
    method: 'POST',
    body: formData
  })
  .then(res => res.text())
  .then(data => {
    document.querySelector('#reportResult').innerHTML = data;
  });
}

function printReport() {
  const form = document.querySelector('#filterForm');
  const params = new URLSearchParams(new FormData(form)).toString();
  window.open('report/fee_collection_report_print.php?' + params, '_blank');
}

function resetForm() {
  document.getElementById("filterForm").reset();
  document.getElementById("reportResult").innerHTML = `<p class="text-muted">Please use the filter above to view results.</p>`;
}
</script>

<?php include "footer.php"; ?>
