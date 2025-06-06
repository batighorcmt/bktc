<?php
session_start();
include "../db_conn.php";

// 🔴 DELETE USER
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);

    // Get photo to delete from server
    $getPhoto = mysqli_query($conn, "SELECT user_photo FROM users WHERE id = '$id'");
    $row = mysqli_fetch_assoc($getPhoto);
    if ($row && !empty($row['user_photo'])) {
        $photoPath = "../uploads/" . $row['user_photo'];
        if (file_exists($photoPath)) {
            unlink($photoPath);
        }
    }

    // Delete the user
    $sql = "DELETE FROM users WHERE id = '$id'";
    mysqli_query($conn, $sql);
    header("Location: user_list.php?msg=User deleted successfully.");
    exit;
}

// 🔵 CREATE / UPDATE USER
if (isset($_POST['save'])) {
    $id = isset($_POST['id']) ? intval($_POST['id']) : 0;
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $role = mysqli_real_escape_string($conn, $_POST['role']);
    $photoName = '';

    // ✅ Handle file upload
    if (isset($_FILES['user_photo']) && $_FILES['user_photo']['error'] == 0) {
        $allowedTypes = ['jpg', 'jpeg', 'png'];
        $fileInfo = pathinfo($_FILES['user_photo']['name']);
        $ext = strtolower($fileInfo['extension']);

        if (!in_array($ext, $allowedTypes)) {
            header("Location: user-form.php" . ($id ? "?id=$id" : "") . "&error=Invalid file type. Only JPG/PNG allowed.");
            exit;
        }

        $photoName = time() . '_' . rand(1000, 9999) . '.' . $ext;
        move_uploaded_file($_FILES['user_photo']['tmp_name'], "../uploads/" . $photoName);

        // If updating, remove old photo
        if ($id) {
            $getOld = mysqli_query($conn, "SELECT user_photo FROM users WHERE id='$id'");
            $old = mysqli_fetch_assoc($getOld);
            if ($old && $old['user_photo'] && file_exists("../uploads/" . $old['user_photo'])) {
                unlink("../uploads/" . $old['user_photo']);
            }
        }
    }

    // 🔄 UPDATE
    if ($id) {
        $updateSQL = "UPDATE users SET 
            name = '$name', 
            username = '$username', 
            mobile = '$mobile', 
            email = '$email', 
            role = '$role'";

        if ($photoName) {
            $updateSQL .= ", user_photo = '$photoName'";
        }

        $updateSQL .= " WHERE id = '$id'";
        mysqli_query($conn, $updateSQL);

        header("Location: user_list.php?msg=User updated successfully.");
        exit;
    }

    // 🆕 INSERT NEW USER
    $checkUsername = mysqli_query($conn, "SELECT id FROM users WHERE username='$username'");
    if (mysqli_num_rows($checkUsername) > 0) {
        header("Location: user-form.php?error=Username already exists.");
        exit;
    }

    // Default password (hashed): 123456
    $defaultPassword = password_hash("123456", PASSWORD_DEFAULT);

    $insertSQL = "INSERT INTO users (name, username, mobile, email, role, user_photo, password) 
                  VALUES ('$name', '$username', '$mobile', '$email', '$role', '$photoName', '$defaultPassword')";

    mysqli_query($conn, $insertSQL);

    header("Location: user_list.php?msg=New user created successfully.");
    exit;
}

header("Location: user_list.php");
exit;
