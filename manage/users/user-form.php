<?php
session_start();
include "../db_conn.php";
include "../header.php";
include "../sidebar.php";

// Initialize variables
$id = '';
$name = '';
$username = '';
$mobile = '';
$email = '';
$role = '';
$user_photo = '';

// If editing
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = mysqli_query($conn, "SELECT * FROM users WHERE id='$id'");
    if ($data = mysqli_fetch_assoc($result)) {
        extract($data);
    }
}
?>

<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="card shadow-lg border-0">
        <div class="card-header bg-primary text-white">
          <h5 class="mb-0">
            <?= $id ? '<i class="fas fa-user-edit"></i> Edit User' : '<i class="fas fa-user-plus"></i> Add New User' ?>
          </h5>
        </div>

        <div class="card-body">
          <?php if (isset($_GET['error'])): ?>
            <div class="alert alert-danger"><?= htmlspecialchars($_GET['error']) ?></div>
          <?php endif; ?>

          <form action="users/user-save.php" method="post" enctype="multipart/form-data">
            <?php if ($id): ?>
              <input type="hidden" name="id" value="<?= $id ?>">
            <?php endif; ?>

            <div class="form-group">
              <label for="name">Full Name <span class="text-danger">*</span></label>
              <input type="text" name="name" id="name" class="form-control" value="<?= htmlspecialchars($name) ?>" required>
            </div>

            <div class="form-group">
              <label for="username">Username <span class="text-danger">*</span></label>
              <input type="text" name="username" id="username" class="form-control" value="<?= htmlspecialchars($username) ?>" required>
            </div>

            <div class="form-group">
              <label for="mobile">Mobile</label>
              <input type="text" name="mobile" id="mobile" class="form-control" value="<?= htmlspecialchars($mobile) ?>">
            </div>

            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" name="email" id="email" class="form-control" value="<?= htmlspecialchars($email) ?>">
            </div>

            <div class="form-group">
              <label for="role">Role <span class="text-danger">*</span></label>
              <select name="role" id="role" class="form-control" required>
                <option value="">Select Role</option>
                <option value="Manager" <?= $role == 'Manager' ? 'selected' : '' ?>>Manager</option>
              </select>
            </div>

            <div class="form-group">
              <label for="user_photo">Photo (jpg/png)</label>
              <input type="file" name="user_photo" id="user_photo" class="form-control-file">
              <?php if ($user_photo): ?>
                <div class="mt-2">
                  <img src="../uploads/<?= $user_photo ?>" width="100" class="img-thumbnail rounded">
                </div>
              <?php endif; ?>
            </div>

            <div class="form-group mt-4">
              <button type="submit" name="save" class="btn btn-success">
                <i class="fas fa-save"></i> Save
              </button>
              <a href="users/user_list.php" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Cancel
              </a>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include "../footer.php"; ?>
