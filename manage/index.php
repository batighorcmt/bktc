<?php 
   session_start();
   if (!isset($_SESSION['username']) && !isset($_SESSION['id'])) {   ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin Panel | Bamundi Karigori Training Center</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
	<style>
		body {
			background: linear-gradient(to right, #6a11cb, #2575fc);
			min-height: 100vh;
			display: flex;
			align-items: center;
			justify-content: center;
			font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
		}
		.login-box {
			background: #fff;
			border-radius: 15px;
			box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
			padding: 30px;
			width: 100%;
			max-width: 450px;
		}
		.logo {
			width: 80px;
			height: 80px;
			object-fit: contain;
		}
		.title-text {
			font-size: 1.2rem;
			font-weight: 600;
			color: #444;
			margin-top: 10px;
		}
		.password-toggle {
			position: absolute;
			right: 15px;
			top: 38px;
			cursor: pointer;
		}
	</style>
</head>
<body>
	<div class="container px-3">
		<form class="login-box mx-auto" action="check-login.php" method="post">
			<div class="text-center mb-3">
				<img src="../site_images/logo.png" alt="Logo" class="logo">
				<div class="title-text">Bamundi Karigori Training Center</div>
				<small class="text-muted">Login Panel</small>
			</div>

			<?php if (isset($_GET['error'])) { ?>
			<div class="alert alert-danger text-center" role="alert">
				<?= $_GET['error'] ?>
			</div>
			<?php } ?>

			<div class="mb-3">
				<label for="username" class="form-label">👤 Username</label>
				<input type="text" class="form-control" name="username" id="username" placeholder="Enter your username">
			</div>

			<div class="mb-3 position-relative">
				<label for="password" class="form-label">🔒 Password</label>
				<input type="password" name="password" class="form-control" id="password" placeholder="Enter your password">
				<i class="bi bi-eye-slash password-toggle" id="togglePassword"></i>
			</div>

			<div class="d-flex justify-content-end mb-3">
				<a href="forgot-password.php" class="text-decoration-none small text-primary">Forgot Password?</a>
			</div>

			<div class="mb-2">
				<label class="form-label">🧑‍💼 Select User Type</label>
			</div>
			<select class="form-select mb-4" name="role" required>
				<option selected value="">Select Login Role</option>
				<option value="admin">Admin</option>
				<option value="manager">Manager</option>
				<option value="user">User</option>
			</select>

			<div class="d-grid">
				<button type="submit" class="btn btn-primary btn-lg">🚀 LOGIN</button>
			</div>
		</form>
	</div>

	<script>
		const togglePassword = document.querySelector('#togglePassword');
		const password = document.querySelector('#password');

		togglePassword.addEventListener('click', function () {
			// Toggle type
			const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
			password.setAttribute('type', type);
			// Toggle icon
			this.classList.toggle('bi-eye');
			this.classList.toggle('bi-eye-slash');
		});
	</script>
</body>
</html>
<?php } else {
	header("Location: dashboard.php");
} ?>
