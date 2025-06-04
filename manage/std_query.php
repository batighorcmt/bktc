<?php 
   session_start();
   include "db_conn.php";
   if (isset($_SESSION['username']) && isset($_SESSION['id'])) {   

    include("header.php");
    include("sidebar.php");

    $txntype = "select * from course order by course_id asc";
    $results = mysqli_query($conn,$txntype);
    $row = mysqli_fetch_array($results);
    $last_id = $row['course_id'];
    $course_name = $row['course_name'];
    if ($last_id == "")
    {
        $course_id = "1";
    }
    else
    {
        $course_id = substr($last_id,0, 5);
        $course_id = intval($course_id);
        $course_id = ($course_id + 1);
    }
        
    ?>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .custom-card {
      border: 2px solid #0d6efd;
      border-radius: 15px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
      transition: transform 0.3s ease;
    }
    .custom-card:hover {
      transform: scale(1.01);
      box-shadow: 0 6px 12px rgba(0,0,0,0.15);
    }
    .blink_text {
      animation:1s blinker linear infinite;
      -webkit-animation:1s blinker linear infinite;
      -moz-animation:1s blinker linear infinite;
      color: red;
    }
    @-moz-keyframes blinker {
      0% { opacity: 1.0; }
      50% { opacity: 0.0; }
      100% { opacity: 1.0; }
    }
    @-webkit-keyframes blinker {
      0% { opacity: 1.0; }
      50% { opacity: 0.0; }
      100% { opacity: 1.0; }
    }
    @keyframes blinker {
      0% { opacity: 1.0; }
      50% { opacity: 0.0; }
      100% { opacity: 1.0; }
    }
    .form-section {
      margin-bottom: 20px;
      padding: 15px;
      background-color: #f8f9fa;
      border-radius: 5px;
    }
    .form-section-title {
      border-bottom: 1px solid #ddd;
      margin-bottom: 15px;
      padding-bottom: 5px;
      font-weight: bold;
    }
    .required:after {
      content: " *";
      color: red;
    }
    .preview-img {
      border: 1px solid #ddd;
      border-radius: 4px;
      padding: 5px;
      background-color: white;
    }
  </style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">

<div class="container mt-4">
  <div class="row g-4">
    
    <!-- প্রথম কার্ড -->
    <div class="col-md-4">
      <div class="card custom-card p-3">
        <h5 class="card-title mb-3">Student List Print</h5>
        <form action="report/student_list.php" method="post" target="_blank">
          <div class="form-section">
            <div class="form-section-title">Select Session and Admission Type</div>
          <div class="mb-3">
            <label for="dropdown1" class="form-label">Session</label>
            <select name="session" class="form-control" id="dropdown1">
              <option value="">Select Session</option>
                  <?php 
                  $sql = "SELECT * from session WHERE session_form='Open'";
                  $result = $conn->query($sql);
                  while($session = $result->fetch_array()) {
                    echo "<option value='" . $session['session_name'] . "'>" . $session['session_name'] . "</option>";
                  }
                  ?>
            </select>
          </div>
          <div class="mb-3">
            <label for="dropdown2" class="form-label">Student Admission Type</label>
            <select name="status" class="form-control" >
                <option value="">Select one</option>
                <option value="Applied">Applied</option>
                <option value="Admited">Admited</option>
                <option value="Rejected">Rejected</option>
                <option value="Inactive">Inactive</option>
                <option value="Completed">Completed</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="dropdown1" class="form-label">Session</label>
            <select name="selecttrade" class="form-control" id="dropdown2">
              <option value="">Select Trade</option>
                  <?php 
                  $sql = "SELECT * from trade";
                  $result = $conn->query($sql);
                  while($session = $result->fetch_array()) {
                    echo "<option value='" . $session['trade_name'] . "'>" . $session['trade_name'] . "</option>";
                  }
                  ?>
            </select>
          </div>
          <div class="mb-3">
            <label for="dropdown1" class="form-label">Session</label>
            <select name="course" class="form-control" id="dropdown3">
              <option value="">Select Subject</option>
                  <?php 
                  $sql = "SELECT * from course";
                  $result = $conn->query($sql);
                  while($session = $result->fetch_array()) {
                    echo "<option value='" . $session['course_name'] . "'>" . $session['course_name'] . "</option>";
                  }
                  ?>
            </select>
          </div>
          <button type="submit" class="btn btn-primary w-100">Submit</button>
        </form>
      </div>
    </div>
    </div>


  </div>
</div>
          
        </div><!-- /.container-fluid -->
        </div><!-- /.content-header --> 
      </div><!-- /.container-fluid -->
        </section><!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php include('footer.php'); ?>

<?php }else{
	header("Location: index.php");
} ?>