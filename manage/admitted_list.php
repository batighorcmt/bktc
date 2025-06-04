<?php include 'db_conn.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Admitted Students List</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    @media print {
      .no-print { display: none; }
    }
    .header {
      text-align: center;
      margin-bottom: 20px;
    }
    .logo {
      width: 80px;
      height: auto;
    }
  </style>
</head>
<body class="container py-4">

<?php
if (!isset($_GET['session']) || empty($_GET['session'])) {
    echo "<div class='alert alert-danger'>No session selected. <a href='search_form.php'>Go back</a></div>";
    exit;
}

$session = mysqli_real_escape_string($conn, $_GET['session']);
$result = mysqli_query($conn, "SELECT * FROM application WHERE session='$session' AND status='admitted'");
?>

  <div class="header">
    <img src="assets/logo.png" alt="Logo" class="logo">
    <h4>Bangladesh Krira Shikkha Protishtan</h4>
    <p>Savar, Dhaka</p>
    <hr>
    <h5>Admitted Students - Session: <?= htmlspecialchars($session) ?></h5>
  </div>

  <div class="text-end no-print mb-3">
    <a href="search_form.php" class="btn btn-secondary">⬅ Back</a>
    <button onclick="window.print()" class="btn btn-success">🖨️ Print</button>
  </div>

  <table class="table table-bordered table-striped">
    <thead class="table-dark">
      <tr>
        <th>#</th>
        <th>Name</th>
        <th>Father</th>
        <th>Mother</th>
        <th>Class</th>
        <th>Gender</th>
      </tr>
    </thead>
    <tbody>
      <?php
      if (mysqli_num_rows($result) > 0):
        $i = 1;
        while ($row = mysqli_fetch_assoc($result)):
      ?>
        <tr>
          <td><?= $i++ ?></td>
          <td><?= htmlspecialchars($row['name']) ?></td>
          <td><?= htmlspecialchars($row['father']) ?></td>
          <td><?= htmlspecialchars($row['mother']) ?></td>
          <td><?= htmlspecialchars($row['class']) ?></td>
          <td><?= htmlspecialchars($row['gender']) ?></td>
        </tr>
      <?php endwhile; else: ?>
        <tr><td colspan="6" class="text-center text-danger">No admitted students found for this session.</td></tr>
      <?php endif; ?>
    </tbody>
  </table>

</body>
</html>
