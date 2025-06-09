<?php
extract($_REQUEST);
include("db_conn.php");


// trainee_id জেনারেট
$yearPrefix = date('y');
$typeDigit = ($course_type == 'short') ? '1' : '2';

// সর্বশেষ trainee_id বের করে নতুন সিরিয়াল তৈরি
$check_sql = "SELECT MAX(trainee_id) as last_id FROM admited_student WHERE trainee_id LIKE '$yearPrefix$typeDigit%'";
$check_result = $conn->query($check_sql);
$row = $check_result->fetch_assoc();
$last_id = $row['last_id'];

if ($last_id) {
    $last_serial = (int)substr($last_id, 3, 4);
    $new_serial = str_pad($last_serial + 1, 4, '0', STR_PAD_LEFT);
} else {
    $new_serial = "0001";
}

$trainee_id = $yearPrefix . $typeDigit . $new_serial;

// ছবি আপলোড
$permited  = array('jpg', 'jpeg', 'png', 'gif');
$file_name = $_FILES['new_photo']['name'];
$file_temp = $_FILES['new_photo']['tmp_name'];

$div = explode('.', $file_name);
$file_ext = strtolower(end($div));
$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
$uploaded_image = "../img/appliedstd/".$unique_image;

// Step 1: Update application table
$sql1 = "UPDATE application SET 
    ssession = '$ssession',
    pic_file = '$unique_image',
    studname = '$studname',
    cnumber = '$cnumber',
    fathername = '$fathername',
    mothername = '$mothername',
    gnumber = '$gnumber',
    studemail = '$studemail',
    dob = '$dob',
    selecttrade = '$selecttrade',
    course = '$course',
    religion = '$religion',
    gender = '$gender',
    saddress = '$saddress',
    selnation = '$selnation',
    bg = '$bg',
    nid = '$nid',
    sscboard = '$sscboard',
    sscyear = '$sscyear',
    sscroll = '$sscroll',
    sscgrade = '$sscgrade',
    sscregi = '$sscregi',
    sscgroup = '$sscgroup',
    hscboard = '$hscboard',
    hscyear = '$hscyear',
    hscroll = '$hscroll',
    hscgrade = '$hscgrade',
    hscregi = '$hscregi',
    hscgroup = '$hscgroup',
    deguni = '$deguni',
    degyear = '$degyear',
    degroll = '$degroll',
    deggrade = '$deggrade',
    degregi = '$degregi',
    degsub = '$degsub',
    masuni = '$masuni',
    masyear = '$masyear',
    masroll = '$masroll',
    masgrade = '$masgrade',
    masregi = '$masregi',
    massub = '$massub',
    jscboard = '$jscboard',
    jscyear = '$jscyear',
    jscroll = '$jscroll',
    jscregi = '$jscregi',
    jscgrade = '$jscgrade',
    ptype = '$ptype',
    pdate = '$pdate',
    pamount = '$pamount',
    rmobile = '$rmobile',
    rtransection = '$rtransection',
    app_status = '$status',
    course_type = '$course_type'
WHERE app_id = '$app_id'";

// Step 2: Insert into admited_student
$sql2 = "INSERT INTO admited_student (app_id, trainee_id, shift, status, contract, file_submit) 
         VALUES ('$app_id', '$trainee_id', '$shift', '$status', '$contract', '$file_submit')";

// Step 3: Create user login
$password = md5($password); // password from form input
$sql3 = "INSERT INTO users (username, password, role, user_id) 
         VALUES ('$trainee_id', '$password', 'user', '$trainee_id')";

// Execute all queries
$result1 = $conn->query($sql1);
$result2 = $conn->query($sql2);
$result3 = $conn->query($sql3);

// Upload image and final redirect
if ($result1 === TRUE && $result2 === TRUE && $result3 === TRUE && move_uploaded_file($file_temp, $uploaded_image)) {
    echo "<script>window.location.assign('std_list.php?success=Recorded Successfully.');</script>";
} else {
    echo "<script>window.location.assign('std_list.php?error=Something went wrong!');</script>";
}
?>
