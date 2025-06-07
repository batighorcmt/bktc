<?php
// Session বা অন্য কোন লজিক প্রয়োজনে এখানে যুক্ত করা যাবে
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Forgot Password | Bamundi Karigori Training Center</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Bootstrap CSS & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    
    <style>
        body {
            background: linear-gradient(to right, #6a11cb, #2575fc);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', sans-serif;
        }
        .reset-box {
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
            padding: 30px;
            width: 100%;
            max-width: 450px;
        }
        .logo {
            width: 70px;
            height: 70px;
            object-fit: contain;
        }
    </style>
</head>
<body>
    <div class="container px-3">
        <form class="reset-box mx-auto" action="process-reset-request.php" method="post">
            <div class="text-center mb-3">
                <img src="logo.png" alt="Logo" class="logo">
                <h4 class="mt-2">Forgot Password</h4>
                <p class="text-muted small">Enter your email or username to reset your password.</p>
            </div>

            <?php if (isset($_GET['error'])) { ?>
            <div class="alert alert-danger text-center" role="alert">
                <?= $_GET['error'] ?>
            </div>
            <?php } elseif (isset($_GET['success'])) { ?>
            <div class="alert alert-success text-center" role="alert">
                <?= $_GET['success'] ?>
            </div>
            <?php } ?>

            <div class="mb-3">
                <label for="email" class="form-label">📧 Email or Username</label>
                <input type="text" name="email_or_username" class="form-control" id="email" required placeholder="Enter your email or username">
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-primary">🔐 Send Reset Link</button>
            </div>

            <div class="text-center mt-3">
                <a href="index.php" class="small text-decoration-none">← Back to Login</a>
            </div>
        </form>
    </div>
</body>
</html>
