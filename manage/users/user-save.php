<?php
session_start();
include "../db_conn.php";

// Handle Delete
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);

    // Delete photo
    $res = mysqli_query($conn, "SELECT user_photo FROM users WHERE id = $id");
    if ($row = mysqli_fetch_assoc($res)) {
        if (!empty($row['user_photo']) && file_exists("../uploads/" . $row['user_photo'])) {
            unlink("../uploads/" . $row['user_photo']);
        }
    }

    mysqli_query($conn, "DELETE FROM users WHERE id = $id");
    header("Location: user_list.php?msg=User deleted successfully");
    exit;
}

// Handle Create/Update
if (isset($_POST['save'])) {
    $id = isset($_POST['id']) ? intval($_POST['id']) : '';
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $role = mysqli_real_escape_string($conn, $_POST['role']);
    
    // Photo upload
    $user_photo = '';
    if (isset($_FILES['user_photo']['name']) && $_FILES['user_photo']['name'] != '') {
        $photo_name = time() . '_' . basename($_FILES['user_photo']['name']);
        $target_path = "../uploads/" . $photo_name;
        $file_type = strtolower(pathinfo($target_path, PATHINFO_EXTENSION));

        if (in_array($file_type, ['jpg', 'jpeg', 'png'])) {
            if (move_uploaded_file($_FILES['user_photo']['tmp_name'], $target_path)) {
                $user_photo = $photo_name;

                // If update and already has photo
                if ($id) {
                    $res = mysqli_query($conn, "SELECT user_photo FROM users WHERE id = $id");
                    if ($row = mysqli_fetch_assoc($res)) {
                        if (!empty($row['user_photo']) && file_exists("../uploads/" . $row['user_photo'])) {
                            unlink("../uploads/" . $row['user_photo']);
                        }
                    }
                }
            }
        }
    }

    if ($id) {
        // UPDATE
        $sql = "UPDATE users SET 
                    name='$name', 
                    username='$username', 
                    mobile='$mobile', 
                    email='$email', 
                    role='$role'";
        if ($user_photo != '') {
            $sql .= ", user_photo='$user_photo'";
        }
        $sql .= " WHERE id=$id";

        mysqli_query($conn, $sql);
        header("Location: user_list.php?msg=User updated successfully");
    } else {
        // INSERT
        $password = password_hash('123456', PASSWORD_DEFAULT); // Default password

        $sql = "INSERT INTO users (name, username, mobile, email, role, user_photo, password) 
                VALUES ('$name', '$username', '$mobile', '$email', '$role', '$user_photo', '$password')";
        mysqli_query($conn, $sql);
        header("Location: user_list.php?msg=User added successfully");
    }

    exit;
}

// If nothing matched
header("Location: user-list.php?msg=Invalid action");
exit;
?>
