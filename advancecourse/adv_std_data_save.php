<?php
extract($_REQUEST);
include("manage/db_conn.php");
$dob = $_POST['brdateday'].'/'.$_POST['brdatemonth'].'/'.$_POST['brdateyear'];
$permited  = array('jpg', 'jpeg', 'png', 'gif');
$file_name = $_FILES['pic_file']['name'];
$file_size = $_FILES['pic_file']['size'];
$file_temp = $_FILES['pic_file']['tmp_name'];

$div = explode('.', $file_name);
$file_ext = strtolower(end($div));
$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
$uploaded_image = "img/appliedstd/".$unique_image;

$sql = "INSERT INTO application (insname, ssession, pic_file, studname, cnumber, fathername, mothername, gnumber, studemail, brdateday, brdatemonth, brdateyear, dob, selecttrade, course, religion, gender, saddress, selnation, bg, nid, sscboard, sscyear, sscroll, sscresult, sscgrade, sscregi, sscgroup, hscboard, hscyear, hscroll, hscresult, hscgrade, hscregi, hscgroup, deguni, degyear, degroll, degresult, deggrade, degregi, degsub, masuni, masyear, masroll, masresult, masgrade, masregi, massub, jscboard, jscyear, jscroll, jscregi, jscresult, jscgrade, ptype, pdate, pamount, rmobile, rtransection, reference, app_status) VALUES ('$insname', '$ssession', '$unique_image', '$studname', '$cnumber', '$fathername', '$mothername', '$gnumber', '$studemail', '$brdateday', '$brdatemonth', '$brdateyear', '$dob', '$selecttrade', '$course', '$religion', '$gender', '$saddress', '$selnation', '$bg', '$nid', '$sscboard', '$sscyear', '$sscroll', '$sscresult', '$sscgrade', '$sscregi', '$sscgroup', '$hscboard', '$hscyear', '$hscroll', '$hscresult', '$hscgrade', '$hscregi', '$hscgroup', '$deguni', '$degyear', '$degroll', '$degresult', '$deggrade', '$degregi', '$degsub', '$masuni', '$masyear', '$masroll', '$masresult', '$masgrade', '$masregi', '$massub', '$jscboard', '$jscyear', '$jscroll', '$jscregi', '$jscresult', '$jscgrade', '$ptype', '$pdate', '$pamount', '$rmobile', '$rtransection', '$reference', 'Applied')";

		 
$result = $conn->query($sql);
$last_id = $conn->insert_id;


if($result == True AND move_uploaded_file($file_temp, $uploaded_image)){

  echo "<script>window.location.assign('print_app.php?sscroll=$sscroll&app_id=$last_id');</script>";
}
else{
    echo "<script>window.location.assign('adv_std_reg.php?error=Something went wrong!');</script>";
}
?>