<?php
session_start();
include "db_conn.php";

if (isset($_SESSION['username']) && isset($_SESSION['id']) && $_SESSION['role'] == 'admin') {

    if (isset($_GET['trainee_id']) && isset($_GET['photo']) && !empty($_GET['trainee_id'])) {
        $trainee_id = mysqli_real_escape_string($conn, $_GET['trainee_id']);
        $photo = basename($_GET['photo']); // Prevent path traversal
        $photo_path = "../img/appliedstd/" . $photo;

        // Check if student exists
        $check_sql = "SELECT * FROM admited_student WHERE trainee_id = '$trainee_id'";
        $check_result = mysqli_query($conn, $check_sql);

        if (mysqli_num_rows($check_result) > 0) {
            // Delete from admited_student
            $delete_sql = "DELETE FROM admited_student WHERE trainee_id = '$trainee_id'";
            $delete_result = mysqli_query($conn, $delete_sql);

            if ($delete_result) {
                // Delete the photo if exists
                if (file_exists($photo_path)) {
                    unlink($photo_path);
                }

                header("Location: std_list.php?update=Student and photo deleted successfully.");
                exit();
            } else {
                header("Location: std_list.php?error=Failed to delete student.");
                exit();
            }
        } else {
            header("Location: std_list.php?error=Student not found.");
            exit();
        }
    } else {
        header("Location: std_list.php?error=Invalid request.");
        exit();
    }
} else {
    header("Location: index.php");
    exit();
}
?>
