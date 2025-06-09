<?php 
include("db_conn.php"); 
include("header.php"); 
include("sidebar.php");?>

<div class="content-wrapper">
  <section class="content pt-4">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-md-10">
          <div class="card shadow-lg">
            <div class="card-header bg-danger text-white">
              <h5 class="mb-0">📊 Fee Collection Report Filter</h5>
            </div>
            <div class="card-body">
              <form action="report/print_fee_report.php" method="GET" target="_blank">
                <div class="form-row">

                  <!-- Date From (optional) -->
                  <div class="form-group col-md-6">
                    <label><strong>From Date</strong></label>
                    <input type="date" name="from_date" class="form-control">
                  </div>

                  <!-- Date To (optional) -->
                  <div class="form-group col-md-6">
                    <label><strong>To Date</strong></label>
                    <input type="date" name="to_date" class="form-control">
                  </div>

                  <!-- Session -->
                  <div class="form-group col-md-4">
                    <label><strong>Session</strong></label>
                    <select name="session_id" class="form-control">
                      <option value="">All</option>
                      <?php
                      $res = $conn->query("SELECT * FROM session WHERE session_status='Active'");
                      while($row = $res->fetch_assoc()) {
                          echo "<option value='{$row['session_id']}'>{$row['session_name']}</option>";
                      }
                      ?>
                    </select>
                  </div>

                  <!-- Trade -->
                  <div class="form-group col-md-4">
                    <label><strong>Trade</strong></label>
                    <select name="trade_id" class="form-control">
                      <option value="">All</option>
                      <?php
                      $res = $conn->query("SELECT * FROM trade WHERE trade_status='Active'");
                      while($row = $res->fetch_assoc()) {
                          echo "<option value='{$row['trade_id']}'>{$row['trade_name']}</option>";
                      }
                      ?>
                    </select>
                  </div>

                  <!-- Course -->
                  <div class="form-group col-md-4">
                    <label><strong>Course</strong></label>
                    <select name="course_id" class="form-control">
                      <option value="">All</option>
                      <?php
                      $res = $conn->query("SELECT * FROM course WHERE course_status='Active'");
                      while($row = $res->fetch_assoc()) {
                          echo "<option value='{$row['course_id']}'>{$row['course_name']}</option>";
                      }
                      ?>
                    </select>
                  </div>

                  <!-- Removed Payment Purpose -->

                  <div class="form-group col-md-12 text-center mt-3">
                    <button type="submit" class="btn btn-success btn-lg">
                      🔍 Search Report
                    </button> 
                     <button type="reset" class="btn btn-danger btn-lg"> ♻️ Reset </button>
                  </div>

                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<?php include("footer.php"); ?>