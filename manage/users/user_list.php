<?php
session_start();
include "../db_conn.php";
include "../header.php";
include "../sidebar.php";

$sql = "SELECT * FROM users WHERE role = 'Manager' ORDER BY id DESC";
$result = mysqli_query($conn, $sql);
?>

<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">

      <div class="card border-0 shadow-lg">
        <div class="card-header bg-gradient-primary text-white d-flex justify-content-between align-items-center">
          <h5 class="mb-0"><i class="fas fa-users"></i> User List</h5>
          <a href="users/user-form.php" class="btn btn-sm btn-light shadow-sm"><i class="fas fa-plus-circle"></i> Add New User</a>
        </div>
        
        <div class="card-body bg-light">
          <?php if (isset($_GET['msg'])): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <?= htmlspecialchars($_GET['msg']) ?>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          <?php endif; ?>

          <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover align-middle text-center" id="example1">
              <thead class="table-dark">
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Username</th>
                  <th>Mobile</th>
                  <th>Email</th>
                  <th>Role</th>
                  <th>Photo</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody class="bg-white">
                <?php
                $serial = 1;
                if(mysqli_num_rows($result) > 0):
                  while($row = mysqli_fetch_assoc($result)):
                ?>
                  <tr>
                    <td><?= $serial++ ?></td>
                    <td><?= htmlspecialchars($row['name']) ?></td>
                    <td><?= htmlspecialchars($row['username']) ?></td>
                    <td><?= htmlspecialchars($row['mobile']) ?></td>
                    <td><?= htmlspecialchars($row['email']) ?></td>
                    <td><span class="badge bg-primary"><?= htmlspecialchars($row['role']) ?></span></td>
                    <td>
                      <?php if ($row['user_photo']): ?>
                        <img src="uploads/<?= htmlspecialchars($row['user_photo']) ?>" width="50" height="50" class="rounded-circle border border-2 border-secondary shadow-sm" alt="User Photo">
                      <?php else: ?>
                        <span class="text-muted">No Photo</span>
                      <?php endif; ?>
                    </td>
                    <td>
                      <a href="users/user-form.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-info text-white"><i class="fas fa-edit"></i></a>
                      <a href="users/user-save.php?delete=<?= $row['id'] ?>" onclick="return confirm('Are you sure you want to delete this user?')" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a>
                    </td>
                  </tr>
                <?php
                  endwhile;
                else:
                ?>
                  <tr>
                    <td colspan="8" class="text-center text-muted">No users found.</td>
                  </tr>
                <?php endif; ?>
              </tbody>
            </table>
          </div>

        </div>
      </div>

    </div>
  </div>
</div>

<?php include "../footer.php"; ?>
