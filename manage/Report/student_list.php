<?php
include('../db_conn.php'); // DB কানেকশন ফাইল
   session_start();
   if (isset($_SESSION['username']) && isset($_SESSION['id'])) {   
	
 $sqlinst = "SELECT * from inst_data limit 1";
  $resultinst = $conn->query($sqlinst);
  while($r = $resultinst->fetch_assoc())
  { 
        $instname = $r['inst_name'];
        $instadd = $r['inst_add'];
        $instaddress = $r['inst_address'];
  }

    $session = $_POST['session'];
    $status = $_POST['status'];
    $selecttrade = $_POST['selecttrade'];
    $course = $_POST['course'];

    // সঠিক JOIN এবং WHERE সহ Query
    $sql = "SELECT app.studname, app.fathername, app.mothername, app.saddress, app.cnumber, st.trainee_id, app.ssession, st.status, app.selecttrade, app.course, app.selecttrade, app.course
            FROM admited_student AS st
            INNER JOIN application AS app ON st.app_id = app.app_id
             WHERE 1=1";
$params = [];
$types = "";

// session ফিল্টার থাকলে
if (!empty($session)) {
    $sql .= " AND app.ssession = ?";
    $types .= "s";
    $params[] = $session;
}

// status ফিল্টার থাকলে
if (!empty($status)) {
    $sql .= " AND st.status = ?";
    $types .= "s";
    $params[] = $status;
}
// selecttrade ফিল্টার থাকলে
if (!empty($selecttrade)) {
    $sql .= " AND app.selecttrade = ?";
    $types .= "s";
    $params[] = $selecttrade;
}       
// course ফিল্টার থাকলে
if (!empty($course)) {
    $sql .= " AND app.course = ?";
    $types .= "s";
    $params[] = $course;
}

$sql .= " ORDER BY st.trainee_id ASC";

$stmt = $conn->prepare($sql);

if (!empty($params)) {
    $stmt->bind_param($types, ...$params);
}

$stmt->execute();
$result = $stmt->get_result();
?>


<!DOCTYPE html>
<html lang="bn">
<head>
  <meta charset="UTF-8">
  <title>Student List Print</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      font-family: 'Siyam Rupali', Arial, sans-serif;
    }
    .school-logo {
      height: 80px;
    }
    .info-line {
      font-size: 15px;
      margin-bottom: 15px;
    }
    table th, table td {
      vertical-align: middle;
    }
    @media print {
      .no-print {
        display: none;
      }
    }
  </style>
</head>
<body class="p-4" style="weight: 100%;">

  <div class="text-center mb-4" style="border-bottom: 2px solid #000; padding-bottom: 10px;">
    <div class="d-flex align-items-center justify-content-center mb-2">
      <img src="../../site_images/bktc_logo.png" alt="logo" class="school-logo me-3">
      <div>
        <h4 class="mb-0 fw-bold"><?php echo $instname; ?></h4>
        <p class="mb-0"><?php echo $instadd; ?> <?php echo $instaddress; ?></p>
        <p class="mb-0"><?php echo $instaddress; ?></p>
        <h5 class="mt-2">Student List</h5>
      </div>
    </div>
  </div>

  <div class="row info-line">
    <div class="col-md-3"><strong>Session : <?= !empty($session) ? htmlspecialchars($session) : 'All' ?> </strong></div>
    <div class="col-md-3"><strong>Trade : <?= !empty($selecttrade) ? htmlspecialchars($selecttrade) : 'All' ?></strong></div>
    <div class="col-md-3"><strong>Course/ Subject : <?= !empty($course) ? htmlspecialchars($course) : 'All' ?></strong></div>
    <div class="col-md-3"><strong>Status : <?= !empty($status) ? htmlspecialchars($status) : 'All' ?></strong></div>
  </div>

  <div class="table-responsive">
    <table class="table table-bordered text-center align-middle">
      <thead class="table-secondary">
        <tr>
          <th>#SL</th>
          <th>Trainee ID</th>
          <th>Student Name</th>
          <th>Father Name</th>
          <th>Mother Name</th>
          <th>Address</th>
          <th>Mobile No</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sl = 1;
        if (isset($result) && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <th style='text-align: center;'>{$sl}</td>
                        <td style='text-align: left;'>{$row['trainee_id']} </td>
                        <td  style='text-align: left;'>{$row['studname']} </td>
                        <td style='text-align: left;'>{$row['fathername']}</td>
                        <td style='text-align: left;'>{$row['mothername']}</td>
                        <td style='text-align: left; width: 150px;'>{$row['saddress']}</td>
                        <td style='text-align: center;'>{$row['cnumber']}</td>
                      </tr>";
                $sl++;
            }
        } else {
            echo "<tr><td colspan='7'>No Student Found</td></tr>";
        }
        ?>
      </tbody>
    </table>
    <p class="text-right mt-3"><small>Printed on: <?= date('d/m/Y h:i A') ?></small></p>
  </div>

  <div class="text-center no-print mt-4">
    <button onclick="window.print()" class="btn btn-primary"> 🖨️ Print </button> 
  </div>

</body>
</html>
<?php
} else {
    header("Location: ../login.php");
    exit();
}