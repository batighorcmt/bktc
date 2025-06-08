<?php  
session_start();
include "db_conn.php";

if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['role'])) {

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $username = test_input($_POST['username']);
    $password = test_input($_POST['password']);
    $role = test_input($_POST['role']);

    if (empty($username)) {
        header("Location: index.php?error=User Name is Required");
        exit;
    }
    if (empty($password)) {
        header("Location: index.php?error=Password is Required");
        exit;
    }

    // DB থেকে ইউজার খোঁজা
    $sql = "SELECT * FROM users WHERE username='$username' AND role='$role'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);

        // পাসওয়ার্ড যাচাই (Check hashed password)
        if (password_verify($password, $row['password'])) {
            // Login success
            $_SESSION['id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['role'] = $row['role'];
            $_SESSION['user_photo'] = $row['user_photo'];

            header("Location: dashboard.php");
            exit;
        } else {
            header("Location: index.php?error=Incorrect password");
            exit;
        }
    } else {
        header("Location: index.php?error=Incorrect username or role");
        exit;
    }

} else {
    header("Location: index.php");
    exit;
}
