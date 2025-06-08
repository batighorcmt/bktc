<?php
session_start();
include "../db_conn.php";

// Helper function
function sanitize($data) {
    return htmlspecialchars(trim($data));
}

// ==========================
// DELETE Operation
// ==========================
if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
    $id = $_GET['id'];

    // Get and delete photo
    $result = mysqli_query($conn, "SELECT user_photo FROM users WHERE id='$id'");
    $user = mysqli_fetch_assoc($result);
    if ($user && $user['user_photo']) {
        $photo_path = "../uploads/" . $user['user_photo'];
        if (file_exists($photo_path)) {
            unlink($photo_path);
        }
    }

    // Delete user
    $sql = "DELETE FROM users WHERE id='$id'";
    if (mysqli_query($conn, $sql)) {
        header("Location: user_list.php?success=User deleted successfully.");
    } else {
        header("Location: user_list.php?error=Failed to delete user.");
    }
    exit;
}

// ==========================
// INSERT or UPDATE Operation
// ==========================
$id           = $_POST['id'] ?? '';
$name         = sanitize($_POST['name'] ?? '');
$username     = sanitize($_POST['username'] ?? '');
$mobile       = sanitize($_POST['mobile'] ?? '');
$email        = sanitize($_POST['email'] ?? '');
$role         = sanitize($_POST['role'] ?? '');
$password     = $_POST['password'] ?? '';
$confirm_pass = $_POST['confirm_password'] ?? '';

$user_photo = '';

// Handle file upload
if (!empty($_FILES['user_photo']['name'])) {
    $upload_dir = "../uploads/";
    $file_name = time() . "_" . basename($_FILES['user_photo']['name']);
    $target_file = $upload_dir . $file_name;
    $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    if (in_array($file_type, ['jpg', 'jpeg', 'png'])) {
        if (move_uploaded_file($_FILES['user_photo']['tmp_name'], $target_file)) {
            $user_photo = $file_name;
        } else {
            header("Location: user_form.php" . ($id ? "?id=$id" : "") . "&error=Photo upload failed");
            exit;
        }
    } else {
        header("Location: user_form.php" . ($id ? "?id=$id" : "") . "&error=Only JPG, JPEG, PNG allowed.");
        exit;
    }
}

if (!empty($id)) {
    // UPDATE operation
    $sql_parts = [];

    $sql_parts[] = "name='$name'";
    $sql_parts[] = "username='$username'";
    $sql_parts[] = "mobile='$mobile'";
    $sql_parts[] = "email='$email'";
    $sql_parts[] = "role='$role'";

    // Update password if provided
    if (!empty($password)) {
        if ($password !== $confirm_pass) {
            header("Location: user_form.php?id=$id&error=Password and Confirm Password do not match.");
            exit;
        }
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $sql_parts[] = "password='$hashed_password'";
    }

    // Update photo if uploaded
    if (!empty($user_photo)) {
        $sql_parts[] = "user_photo='$user_photo'";
    }

    $update_sql = "UPDATE users SET " . implode(", ", $sql_parts) . " WHERE id='$id'";
    $result = mysqli_query($conn, $update_sql);

    if ($result) {
        header("Location: user_list.php?success=User updated successfully.");
    } else {
        header("Location: user_form.php?id=$id&error=Failed to update user.");
    }
} else {
    // INSERT operation
    if (empty($password) || $password !== $confirm_pass) {
        header("Location: user_form.php?error=Password mismatch or empty.");
        exit;
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (name, username, password, mobile, email, role, user_photo)
            VALUES ('$name', '$username', '$hashed_password', '$mobile', '$email', '$role', '$user_photo')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: user_list.php?success=User added successfully.");
    } else {
        $err = mysqli_error($conn);
        header("Location: user_form.php?error=" . urlencode("Database error: $err"));
    }
}
?>
