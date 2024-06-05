 <?php
extract($_REQUEST);
include("db_conn.php");
$page_content = $_POST['editor'];
$sql = "INSERT INTO pages (page_id, page_title, page_meta, page_content, page_tag) VALUES ('$page_id', '$page_title', '$page_meta', '$page_content', '$page_tag')";
		 
$result = $conn->query($sql);
$last_id = $con->insert_id;
if($result == True ){
    echo "<script>window.location.assign('page_add.php?success=Page Added Successfully.');</script>";
}
else{
    echo "<script>window.location.assign('page_add.php?error=Something Went wrong!');</script>";
}
?>