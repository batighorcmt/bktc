<?php 
include 'manage/db_conn.php';
extract($_REQUEST);
$agg = $_POST['agree'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>BKTC Student Registration Form</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .blink_text {
      animation:1s blinker linear infinite;
      -webkit-animation:1s blinker linear infinite;
      -moz-animation:1s blinker linear infinite;
      color: red;
    }
    @-moz-keyframes blinker {
      0% { opacity: 1.0; }
      50% { opacity: 0.0; }
      100% { opacity: 1.0; }
    }
    @-webkit-keyframes blinker {
      0% { opacity: 1.0; }
      50% { opacity: 0.0; }
      100% { opacity: 1.0; }
    }
    @keyframes blinker {
      0% { opacity: 1.0; }
      50% { opacity: 0.0; }
      100% { opacity: 1.0; }
    }
    .form-section {
      margin-bottom: 20px;
      padding: 15px;
      background-color: #f8f9fa;
      border-radius: 5px;
    }
    .form-section-title {
      border-bottom: 1px solid #ddd;
      margin-bottom: 15px;
      padding-bottom: 5px;
      font-weight: bold;
    }
    .required:after {
      content: " *";
      color: red;
    }
    .preview-img {
      border: 1px solid #ddd;
      border-radius: 4px;
      padding: 5px;
      background-color: white;
    }
  </style>
</head>
<body>
<div class="container mt-3 mb-5">
  <div class="row">
    <div class="col-12">
      <?php if (isset($_GET['success'])) { ?>
        <div class="alert alert-success" role="alert">
          <?=$_GET['success']?>
        </div>
      <?php } elseif (isset($_GET['error'])) { ?>
        <div class="alert alert-danger" role="alert">
          <?=$_GET['error']?>
        </div>
      <?php } ?>
    </div>
  </div>

  <form action="adv_std_data_save.php" method="post" class="form-horizontal validate" role="form" enctype="multipart/form-data">
    <div class="card mb-3">
      <div class="card-header bg-primary text-white">
        <div class="row">
          <div class="col-md-2">
            <img src="site_images/bktc_logo.png" height="80" class="img-fluid">
          </div>
          <div class="col-md-10">
            <h4 class="mb-0">Bamundi Karigori Training Center</h4>
            <h5 class="mb-0">Electronic Registration Information Form (e-RIF)</h5>
            <h6 class="mb-0">One Year Advance Course</h6>
          </div>
        </div>
      </div>
      
      <div class="card-body">
        <div class="alert alert-warning text-center">
          <strong>ফর্ম পূরণের পূর্বে নির্দেশনাবলী পড়ে এবং তথ্য সঠিক ভাবে যাচাই বাছাই করে সাবমিট করুন। হটলাইনঃ 01719799089, 01701315034</strong>
        </div>
        
        <div class="row mb-3">
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-md-4 col-form-label required">Institution</label>
              <div class="col-md-8">
                <select name="insname" class="form-control form-control-sm" required>
                  <option value="">Select Institution</option>
                  <?php 
                  $sql = "SELECT * from branch where br_status='Active'";
                  $result = $conn->query($sql);
                  while($row = $result->fetch_array()) {
                    echo "<option value='" . $row['br_name'] . "'>" . $row['br_name'] . "</option>";
                  }
                  ?>
                </select>
              </div>
            </div>
            
            <div class="form-group row">
              <label class="col-md-4 col-form-label required">Session</label>
              <div class="col-md-8">
                <select name="ssession" class="form-control form-control-sm" required>
                  <option value="">Select Session</option>
                  <?php 
                  $sql = "SELECT * from session WHERE session_form='Open'";
                  $result = $conn->query($sql);
                  while($session = $result->fetch_array()) {
                    echo "<option value='" . $session['session_name'] . "'>" . $session['session_name'] . "</option>";
                  }
                  ?>
                </select>
              </div>
            </div>
            
            <div class="form-group row">
              <label class="col-md-4 col-form-label required">Student's Name</label>
              <div class="col-md-8">
                <input type="text" name="studname" id="studname" class="form-control form-control-sm" required>
              </div>
            </div>
            
            <div class="form-group row">
              <label class="col-md-4 col-form-label required">Contact Number</label>
              <div class="col-md-8">
                <input type="text" name="cnumber" id="cnumber" class="form-control form-control-sm" required>
              </div>
            </div>
            
            <div class="form-group row">
              <label class="col-md-4 col-form-label required">Father's Name</label>
              <div class="col-md-8">
                <input type="text" name="fathername" id="fathername" class="form-control form-control-sm" required>
              </div>
            </div>
            
            <div class="form-group row">
              <label class="col-md-4 col-form-label required">Mother's Name</label>
              <div class="col-md-8">
                <input type="text" name="mothername" id="mothername" class="form-control form-control-sm" required>
              </div>
            </div>
            
            <div class="form-group row">
              <label class="col-md-4 col-form-label required">Gurdian Number</label>
              <div class="col-md-8">
                <input type="text" name="gnumber" id="gnumber" class="form-control form-control-sm" required>
              </div>
            </div>
            
            <div class="form-group row">
              <label class="col-md-4 col-form-label required">Email</label>
              <div class="col-md-8">
                <input type="text" name="studemail" id="studemail" class="form-control form-control-sm" required>
              </div>
            </div>
          </div>
          
          <div class="col-md-6">
            <div class="text-center mb-2">
              <img id="previewImg" src="site_images/manpicture.jpg" class="preview-img" width="200" height="250">
            </div>
            <div class="form-group">
              <input type="file" name="pic_file" class="form-control form-control-sm" onchange="previewFile(this);" required>
              <small class="form-text text-muted">Use Only JPEG,JPG,PNG format</small>
            </div>
          </div>
        </div>
        
        <div class="row mb-3">
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-md-4 col-form-label required">Date of Birth</label>
              <div class="col-md-8">
                <div class="row">
                  <div class="col-4">
                    <select name="brdateday" class="form-control form-control-sm" required>
                      <option value="">Date</option>
                      <?php for($i=1; $i<=31; $i++) { 
                        $day = str_pad($i, 2, '0', STR_PAD_LEFT);
                        echo "<option value='$day'>$day</option>";
                      } ?>
                    </select>
                  </div>
                  <div class="col-4">
                    <select name="brdatemonth" class="form-control form-control-sm" required>
                      <option value="">Month</option>
                      <option value="01">January</option>
                      <option value="02">February</option>
                      <option value="03">March</option>
                      <option value="04">April</option>
                      <option value="05">May</option>
                      <option value="06">June</option>
                      <option value="07">July</option>
                      <option value="08">August</option>
                      <option value="09">September</option>
                      <option value="10">October</option>
                      <option value="11">November</option>
                      <option value="12">December</option>
                    </select>
                  </div>
                  <div class="col-4">
                    <input type="text" name="brdateyear" class="form-control form-control-sm" placeholder="Year" required>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="form-group row">
              <label class="col-md-4 col-form-label required">Gender</label>
              <div class="col-md-8">
                <select name="gender" class="form-control form-control-sm" required>
                  <option value="">Select Gender</option>
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                </select>
              </div>
            </div>
            
            <div class="form-group row">
              <label class="col-md-4 col-form-label required">Trade/Technology</label>
              <div class="col-md-8">
                <select name="selecttrade" class="form-control form-control-sm" required>
                  <option value="">Select Trade</option>
                  <?php 
                  $sql = "SELECT * from trade";
                  $result = $conn->query($sql);
                  while($session = $result->fetch_array()) {
                    echo "<option value='" . $session['trade_name'] . "'>" . $session['trade_code'] . '-' . $session['trade_name'] . "</option>";
                  }
                  ?>
                </select>
              </div>
            </div>
            
            <div class="form-group row">
              <label class="col-md-4 col-form-label required">Course/Subject</label>
              <div class="col-md-8">
                <select name="course" class="form-control form-control-sm" required>
                  <option value="">Select Course</option>
                  <?php 
                  $sql = "SELECT * from course";
                  $result = $conn->query($sql);
                  while($session = $result->fetch_array()) {
                    echo "<option value='" . $session['course_name'] . "'>" . $session['course_code'] . '-' . $session['course_name'] . "</option>";
                  }
                  ?>
                </select>
              </div>
            </div>
          </div>
          
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-md-4 col-form-label required">Religion</label>
              <div class="col-md-8">
                <select name="religion" class="form-control form-control-sm" required>
                  <option value="">Select Religion</option>
                  <option value="Islam" selected>Islam</option>
                  <option value="Christian">Christian</option>
                  <option value="Hindu">Hindu</option>
                  <option value="Budhist">Budhist</option>
                  <option value="Others">Others</option>
                </select>
              </div>
            </div>
            
            <div class="form-group row">
              <label class="col-md-4 col-form-label required">Address</label>
              <div class="col-md-8">
                <textarea name="saddress" class="form-control form-control-sm" rows="3" placeholder="E.g: Village, Post Office, Upozila, District" required></textarea>
              </div>
            </div>
            
            <div class="form-group row">
              <label class="col-md-4 col-form-label required">Nationality</label>
              <div class="col-md-8">
                <select name="selnation" class="form-control form-control-sm">
                  <option value="">Select Nationality</option>
                  <option value="Bangladeshi" selected>Bangladeshi</option>
                  <option value="Other">Other</option>
                </select>
              </div>
            </div>
            
            <div class="form-group row">
              <label class="col-md-4 col-form-label">Blood Group</label>
              <div class="col-md-8">
                <select name="bg" class="form-control form-control-sm">
                  <option value="">Select Blood Group</option>
                  <option value="A+">A+</option>
                  <option value="A-">A-</option>
                  <option value="B+">B+</option>
                  <option value="B-">B-</option>
                  <option value="AB+">AB+</option>
                  <option value="AB-">AB-</option>
                  <option value="O+">O+</option>
                  <option value="O-">O-</option>
                </select>
              </div>
            </div>
            
            <div class="form-group row">
              <label class="col-md-4 col-form-label required">NID/B.Certificate No.</label>
              <div class="col-md-8">
                <input type="text" name="nid" id="nid" class="form-control form-control-sm" required>
              </div>
            </div>
          </div>
        </div>
        
        <div id="seatspan" class="blink_text text-center mb-3"></div>
        
        <!-- JSC Section -->
        <div class="form-section">
          <h6 class="form-section-title">J.S.C. or Equivalent Exam</h6>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group row">
                <label class="col-md-4 col-form-label">Board</label>
                <div class="col-md-8">
                  <select name="jscboard" class="form-control form-control-sm">
                    <option value="">--Select Board--</option>
                    <option value="BTEB">BTEB</option>
                    <option value="Dhaka">Dhaka</option>
                    <option value="Barisal">Barisal</option>
                    <option value="Chittagong">Chittagong</option>
                    <option value="Comilla">Comilla</option>
                    <option value="Dinajpur">Dinajpur</option>
                    <option value="Jessore">Jessore</option>
                    <option value="Rajshahi">Rajshahi</option>
                    <option value="Sylhet">Sylhet</option>
                    <option value="Madrasa">Madrasa</option>
                    <option value="Open University">Open University</option>
                    <option value="National">National University</option>
                    <option value="Others">Others</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group row">
                <label class="col-md-4 col-form-label">Passing Year</label>
                <div class="col-md-8">
                  <input type="text" name="jscyear" class="form-control form-control-sm">
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group row">
                <label class="col-md-4 col-form-label">Roll</label>
                <div class="col-md-8">
                  <input type="text" name="jscroll" class="form-control form-control-sm">
                </div>
              </div>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-md-4">
              <div class="form-group row">
                <label class="col-md-4 col-form-label">Result</label>
                <div class="col-md-8">
                  <div class="row">
                    <div class="col-6">
                      <select name="jscresult" class="form-control form-control-sm">
                        <option value="gpa">GPA</option>
                        <option value="div">DIV</option>
                      </select>
                    </div>
                    <div class="col-6">
                      <input type="text" name="jscgrade" class="form-control form-control-sm">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group row">
                <label class="col-md-4 col-form-label">Reg. Number</label>
                <div class="col-md-8">
                  <input type="text" name="jscregi" class="form-control form-control-sm">
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <!-- SSC Section -->
        <div class="form-section">
          <h6 class="form-section-title">S.S.C. or Equivalent Exam</h6>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group row">
                <label class="col-md-4 col-form-label">Board</label>
                <div class="col-md-8">
                  <select name="sscboard" class="form-control form-control-sm">
                    <option value="">--Select Board--</option>
                    <option value="BTEB">BTEB</option>
                    <option value="Dhaka">Dhaka</option>
                    <option value="Barisal">Barisal</option>
                    <option value="Chittagong">Chittagong</option>
                    <option value="Comilla">Comilla</option>
                    <option value="Dinajpur">Dinajpur</option>
                    <option value="Jessore">Jessore</option>
                    <option value="Rajshahi">Rajshahi</option>
                    <option value="Sylhet">Sylhet</option>
                    <option value="Madrasa">Madrasa</option>
                    <option value="Open University">Open University</option>
                    <option value="National">National University</option>
                    <option value="Others">Others</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group row">
                <label class="col-md-4 col-form-label">Passing Year</label>
                <div class="col-md-8">
                  <input type="text" name="sscyear" class="form-control form-control-sm">
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group row">
                <label class="col-md-4 col-form-label">Roll</label>
                <div class="col-md-8">
                  <input type="text" name="sscroll" class="form-control form-control-sm">
                </div>
              </div>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-md-4">
              <div class="form-group row">
                <label class="col-md-4 col-form-label">Result</label>
                <div class="col-md-8">
                  <div class="row">
                    <div class="col-6">
                      <select name="sscresult" class="form-control form-control-sm">
                        <option value="gpa">GPA</option>
                        <option value="div">DIV</option>
                      </select>
                    </div>
                    <div class="col-6">
                      <input type="text" name="sscgrade" class="form-control form-control-sm">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group row">
                <label class="col-md-4 col-form-label">Reg. Number</label>
                <div class="col-md-8">
                  <input type="text" name="sscregi" class="form-control form-control-sm">
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group row">
                <label class="col-md-4 col-form-label">Group</label>
                <div class="col-md-8">
                  <select name="sscgroup" class="form-control form-control-sm">
                    <option value="">--Select Group--</option>
                    <option value="Science">Science</option>
                    <option value="Humanities">Humanities</option>
                    <option value="Business Studies">Business Studies</option>
                    <option value="Others">Others</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <!-- HSC Section -->
        <div class="form-section">
          <h6 class="form-section-title">H.S.C. or Equivalent Exam</h6>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group row">
                <label class="col-md-4 col-form-label">Board</label>
                <div class="col-md-8">
                  <select name="hscboard" class="form-control form-control-sm">
                    <option value="">--Select Board--</option>
                    <option value="BTEB">BTEB</option>
                    <option value="Dhaka">Dhaka</option>
                    <option value="Barisal">Barisal</option>
                    <option value="Chittagong">Chittagong</option>
                    <option value="Comilla">Comilla</option>
                    <option value="Dinajpur">Dinajpur</option>
                    <option value="Jessore">Jessore</option>
                    <option value="Rajshahi">Rajshahi</option>
                    <option value="Sylhet">Sylhet</option>
                    <option value="Madrasa">Madrasa</option>
                    <option value="Open University">Open University</option>
                    <option value="National">National University</option>
                    <option value="Others">Others</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group row">
                <label class="col-md-4 col-form-label">Passing Year</label>
                <div class="col-md-8">
                  <input type="text" name="hscyear" class="form-control form-control-sm">
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group row">
                <label class="col-md-4 col-form-label">Roll</label>
                <div class="col-md-8">
                  <input type="text" name="hscroll" class="form-control form-control-sm">
                </div>
              </div>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-md-4">
              <div class="form-group row">
                <label class="col-md-4 col-form-label">Result</label>
                <div class="col-md-8">
                  <div class="row">
                    <div class="col-6">
                      <select name="hscresult" class="form-control form-control-sm">
                        <option value="gpa">GPA</option>
                        <option value="div">DIV</option>
                      </select>
                    </div>
                    <div class="col-6">
                      <input type="text" name="hscgrade" class="form-control form-control-sm">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group row">
                <label class="col-md-4 col-form-label">Reg. Number</label>
                <div class="col-md-8">
                  <input type="text" name="hscregi" class="form-control form-control-sm">
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group row">
                <label class="col-md-4 col-form-label">Group</label>
                <div class="col-md-8">
                  <select name="hscgroup" class="form-control form-control-sm">
                    <option value="">--Select Group--</option>
                    <option value="Science">Science</option>
                    <option value="Humanities">Humanities</option>
                    <option value="Business Studies">Business Studies</option>
                    <option value="Others">Others</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Degree Section -->
        <div class="form-section">
          <h6 class="form-section-title">Honours or Degree or Fazil or Equivalent Exam</h6>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group row">
                <label class="col-md-4 col-form-label">University</label>
                <div class="col-md-8">
                  <input type="text" name="deguni" class="form-control form-control-sm">
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group row">
                <label class="col-md-4 col-form-label">Passing Year</label>
                <div class="col-md-8">
                  <input type="text" name="degyear" class="form-control form-control-sm">
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group row">
                <label class="col-md-4 col-form-label">Roll</label>
                <div class="col-md-8">
                  <input type="text" name="degroll" class="form-control form-control-sm">
                </div>
              </div>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-md-4">
              <div class="form-group row">
                <label class="col-md-4 col-form-label">Result</label>
                <div class="col-md-8">
                  <div class="row">
                    <div class="col-6">
                      <select name="degresult" class="form-control form-control-sm">
                        <option value="cgpa">CGPA</option>
                        <option value="div">DIV</option>
                      </select>
                    </div>
                    <div class="col-6">
                      <input type="text" name="deggrade" class="form-control form-control-sm">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group row">
                <label class="col-md-4 col-form-label">Reg. Number</label>
                <div class="col-md-8">
                  <input type="text" name="degregi" class="form-control form-control-sm">
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group row">
                <label class="col-md-4 col-form-label">Subject</label>
                <div class="col-md-8">
                  <input type="text" name="degsub" class="form-control form-control-sm">
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Masters Section -->
        <div class="form-section">
          <h6 class="form-section-title">Masters or Equivalent Exam</h6>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group row">
                <label class="col-md-4 col-form-label">University</label>
                <div class="col-md-8">
                  <input type="text" name="masuni" class="form-control form-control-sm">
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group row">
                <label class="col-md-4 col-form-label">Passing Year</label>
                <div class="col-md-8">
                  <input type="text" name="masyear" class="form-control form-control-sm">
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group row">
                <label class="col-md-4 col-form-label">Roll</label>
                <div class="col-md-8">
                  <input type="text" name="masroll" class="form-control form-control-sm">
                </div>
              </div>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-md-4">
              <div class="form-group row">
                <label class="col-md-4 col-form-label">Result</label>
                <div class="col-md-8">
                  <div class="row">
                    <div class="col-6">
                      <select name="masresult" class="form-control form-control-sm">
                        <option value="cgpa">CGPA</option>
                        <option value="div">DIV</option>
                      </select>
                    </div>
                    <div class="col-6">
                      <input type="text" name="masgrade" class="form-control form-control-sm">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group row">
                <label class="col-md-4 col-form-label">Reg. Number</label>
                <div class="col-md-8">
                  <input type="text" name="masregi" class="form-control form-control-sm">
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group row">
                <label class="col-md-4 col-form-label">Subject</label>
                <div class="col-md-8">
                  <input type="text" name="massub" class="form-control form-control-sm">
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Payment Section -->
        <div class="form-section">
          <h6 class="form-section-title">Payment Method</h6>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group row">
                <label class="col-md-4 col-form-label required">Payment Type</label>
                <div class="col-md-8">
                  <select name="ptype" class="form-control form-control-sm" required>
                    <option value="">--Payment Type--</option>
                    <option value="Cash">Cash</option>
                    <option value="Bkash">Bkash</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group row">
                <label class="col-md-4 col-form-label">Transection Date</label>
                <div class="col-md-8">
                  <input type="text" name="pdate" class="form-control form-control-sm">
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group row">
                <label class="col-md-4 col-form-label">Amount</label>
                <div class="col-md-8">
                  <input type="text" name="pamount" class="form-control form-control-sm">
                </div>
              </div>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-md-4">
              <div class="form-group row">
                <label class="col-md-4 col-form-label">Mobile Number</label>
                <div class="col-md-8">
                  <input type="text" name="rmobile" class="form-control form-control-sm">
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group row">
                <label class="col-md-4 col-form-label">Transection ID</label>
                <div class="col-md-8">
                  <input type="text" name="rtransection" class="form-control form-control-sm">
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Reference Section -->
        <div class="form-section">
          <h6 class="form-section-title">Reference</h6>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group row">
                <label class="col-md-4 col-form-label">Reference</label>
                <div class="col-md-8">
                  <input type="text" name="reference" class="form-control form-control-sm">
                </div>
              </div>
            </div>
          </div>
        </div>
        <input type="hidden" name="course_type" id="course_type" value="Advanced">
        <div class="form-group row">
          <div class="col-md-12 text-center">
            <input type="submit" name="Submit" value="Submit" class="btn btn-primary">
          </div>
        </div>
      </div>
    </div>
  </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
function previewFile(input){
    var file = $("input[type=file]").get(0).files[0];
    if(file){
        var reader = new FileReader();
        reader.onload = function(){
            $("#previewImg").attr("src", reader.result);
        }
        reader.readAsDataURL(file);
    }
}
</script>
</body>
</html>