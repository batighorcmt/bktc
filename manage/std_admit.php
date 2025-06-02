<?php
include 'db_conn.php';
$app_id = isset($_GET['app_id']) ? intval($_GET['app_id']) : null;

$std = "select * from admited_student order by trainee_id desc limit 1";
$results = mysqli_query($conn,$std);
$row = mysqli_fetch_array($results);
$last_id = $row['trainee_id'];
if ($last_id == "")
{
    $trainee_id = "0000001";
}
else
{
    $trainee_id = substr($last_id,0, 7);
    $trainee_id = intval($trainee_id);
    $trainee_id = ($trainee_id + 1);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admit Student | BKTC</title>
    <link href="site_images/icon.ico" rel="icon">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
    <style>
        .sig {
            margin-top: 50px;
            margin-bottom: 0px;
            margin-right: 20px;
            margin-left: 0px;
        }
        .sigborder {
            border-top: 2px solid black;
        }
        .student-photo {
            max-width: 150px;
            max-height: 180px;
            object-fit: cover;
        }
        .form-section {
            margin-bottom: 30px;
            border: 1px solid #dee2e6;
            border-radius: 5px;
            padding: 20px;
            background-color: #f8f9fa;
        }
        .form-section-title {
            font-weight: bold;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 1px solid #dee2e6;
        }
    </style>
</head>
<body>
    <div class="container py-4">
        <div class="row mb-4">
            <div class="col-12 text-center">
                <?php 
                $sqlinst = "SELECT * from inst_data limit 1";
                $resultinst = $conn->query($sqlinst);
                while($r = $resultinst->fetch_assoc()) { 
                    $instname = $r['inst_name'];
                    $instadd = $r['inst_add'];
                    $instaddress = $r['inst_address'];
                ?>
                <h1 class="mb-2"><?php echo $instname; ?></h1>
                <h5 class="mb-1"><?php echo $instadd; ?></h5>
                <h6 class="mb-3"><?php echo $instaddress; ?></h6>
                <?php } ?>
                <h4 class="mb-3"><strong>Admit Student</strong></h4>
                <hr>
            </div>
        </div>

        <?php 
        $sql = "SELECT * from application WHERE app_id=$app_id";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()) { 
            $app_date = $row['app_date'];
        ?>
        
        <form role="form" method="post" action="std_admit_save.php" enctype="multipart/form-data">
            <input type="hidden" name="trainee_id" value="<?php echo $trainee_id; ?>">
            <input type="hidden" name="app_id" value="<?php echo $app_id; ?>">
            <input type="hidden" name="username" value="<?php echo $trainee_id; ?>">
            <input type="hidden" name="password" value="<?php echo $trainee_id; ?><?php echo $app_id; ?>">

            <!-- Personal Details Section -->
            <div class="form-section">
                <h5 class="form-section-title">Personal Details</h5>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3 row">
                            <label class="col-sm-4 col-form-label">Application ID</label>
                            <div class="col-sm-8">
                                <input type="text" readonly class="form-control" value="<?=$row['app_id']; ?> - <?php echo $trainee_id; ?>">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-4 col-form-label">Applied On</label>
                            <div class="col-sm-8">
                                <input type="text" readonly class="form-control" value="<?php echo date("d/m/Y h:i:s A",strtotime("$app_date")); ?>">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-4 col-form-label">Trainee Name</label>
                            <div class="col-sm-8">
                                <input type="text" name="studname" class="form-control" value="<?=$row['studname']; ?>">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-4 col-form-label">Father Name</label>
                            <div class="col-sm-8">
                                <input type="text" name="fathername" class="form-control" value="<?=$row['fathername']; ?>">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-4 col-form-label">Mother Name</label>
                            <div class="col-sm-8">
                                <input type="text" name="mothername" class="form-control" value="<?=$row['mothername']; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 text-center">
                        <img class="student-photo img-thumbnail mb-3" src="../img/appliedstd/<?=$row['pic_file']; ?>" alt="<?=$row['studname']; ?>'s photo">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3 row">
                            <label class="col-sm-4 col-form-label">Trade</label>
                            <div class="col-sm-8">
                                <input type="text" name="selecttrade" class="form-control" value="<?=$row['selecttrade']; ?>">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-4 col-form-label">Course/Subject</label>
                            <div class="col-sm-8">
                                <input type="text" name="course" class="form-control" value="<?=$row['course']; ?>">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-4 col-form-label">Session</label>
                            <div class="col-sm-8">
                                <input type="text" name="ssession" class="form-control" value="<?=$row['ssession']; ?>">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-4 col-form-label">Blood Group</label>
                            <div class="col-sm-8">
                                <input type="text" name="bg" class="form-control" value="<?=$row['bg']; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3 row">
                            <label class="col-sm-4 col-form-label">NID/BRID</label>
                            <div class="col-sm-8">
                                <input type="text" name="nid" class="form-control" value="<?=$row['nid']; ?>">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-4 col-form-label">Date of Birth</label>
                            <div class="col-sm-8">
                                <input type="text" name="dob" class="form-control" value="<?=$row['dob']; ?>">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-4 col-form-label">Contact No</label>
                            <div class="col-sm-8">
                                <input type="text" name="cnumber" class="form-control" value="<?=$row['cnumber']; ?>">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-4 col-form-label">Gurdian Number</label>
                            <div class="col-sm-8">
                                <input type="text" name="gnumber" class="form-control" value="<?=$row['gnumber']; ?>">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3 row">
                            <label class="col-sm-4 col-form-label">Email</label>
                            <div class="col-sm-8">
                                <input type="text" name="studemail" class="form-control" value="<?=$row['studemail']; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3 row">
                            <label class="col-sm-4 col-form-label">Nationality</label>
                            <div class="col-sm-8">
                                <input type="text" name="selnation" class="form-control" value="<?=$row['selnation']; ?>">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3 row">
                            <label class="col-sm-4 col-form-label">Religion</label>
                            <div class="col-sm-8">
                                <input type="text" name="religion" class="form-control" value="<?=$row['religion']; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3 row">
                            <label class="col-sm-4 col-form-label">Gender</label>
                            <div class="col-sm-8">
                                <input type="text" name="gender" class="form-control" value="<?=$row['gender']; ?>">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">Address</label>
                            <div class="col-sm-10">
                                <textarea name="saddress" class="form-control" rows="2"><?=$row['saddress']; ?></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Educational Details Section -->
            <div class="form-section">
                <h5 class="form-section-title">Educational Details</h5>
                <div class="table-responsive">
                    <table class="table table-bordered table-sm">
                        <thead class="table-light">
                            <tr align="center">
                                <th>Exam Name</th> 
                                <th>Board/University</th> 
                                <th>Group/Subject</th>
                                <th>Passing Year</th> 
                                <th>Roll NO</th> 
                                <th>Registration NO</th>
                                <th>Result</th> 
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>J.S.C</td> 
                                <td><input type="text" name="jscboard" class="form-control form-control-sm" value="<?=$row['jscboard']; ?>"></td> 
                                <td></td> 
                                <td><input type="text" name="jscyear" class="form-control form-control-sm" value="<?=$row['jscyear']; ?>"></td> 
                                <td><input type="text" name="jscroll" class="form-control form-control-sm" value="<?=$row['jscroll']; ?>"></td> 
                                <td><input type="text" name="jscregi" class="form-control form-control-sm" value="<?=$row['jscregi']; ?>"></td> 
                                <td><input type="text" name="jscgrade" class="form-control form-control-sm" value="<?=$row['jscgrade']; ?>"></td> 
                            </tr>
                            <tr>
                                <td>S.S.C</td> 
                                <td><input type="text" name="sscboard" class="form-control form-control-sm" value="<?=$row['sscboard']; ?>"></td> 
                                <td><input type="text" name="sscgroup" class="form-control form-control-sm" value="<?=$row['sscgroup']; ?>"></td> 
                                <td><input type="text" name="sscyear" class="form-control form-control-sm" value="<?=$row['sscyear']; ?>"></td> 
                                <td><input type="text" name="sscroll" class="form-control form-control-sm" value="<?=$row['sscroll']; ?>"></td> 
                                <td><input type="text" name="sscregi" class="form-control form-control-sm" value="<?=$row['sscregi']; ?>"></td> 
                                <td><input type="text" name="sscgrade" class="form-control form-control-sm" value="<?=$row['sscgrade']; ?>"></td> 
                            </tr>
                            <tr>
                                <td>H.S.C</td> 
                                <td><input type="text" name="hscboard" class="form-control form-control-sm" value="<?=$row['hscboard']; ?>"></td> 
                                <td><input type="text" name="hscgroup" class="form-control form-control-sm" value="<?=$row['hscgroup']; ?>"></td> 
                                <td><input type="text" name="hscyear" class="form-control form-control-sm" value="<?=$row['hscyear']; ?>"></td> 
                                <td><input type="text" name="hscroll" class="form-control form-control-sm" value="<?=$row['hscroll']; ?>"></td> 
                                <td><input type="text" name="hscregi" class="form-control form-control-sm" value="<?=$row['hscregi']; ?>"></td> 
                                <td><input type="text" name="hscgrade" class="form-control form-control-sm" value="<?=$row['hscgrade']; ?>"></td> 
                            </tr>
                            <tr>
                                <td>Honours/ Degree</td> 
                                <td><input type="text" name="deguni" class="form-control form-control-sm" value="<?=$row['deguni']; ?>"></td> 
                                <td><input type="text" name="degsub" class="form-control form-control-sm" value="<?=$row['degsub']; ?>"></td> 
                                <td><input type="text" name="degyear" class="form-control form-control-sm" value="<?=$row['degyear']; ?>"></td> 
                                <td><input type="text" name="degroll" class="form-control form-control-sm" value="<?=$row['degroll']; ?>"></td> 
                                <td><input type="text" name="degregi" class="form-control form-control-sm" value="<?=$row['degregi']; ?>"></td> 
                                <td><input type="text" name="deggrade" class="form-control form-control-sm" value="<?=$row['deggrade']; ?>"></td> 
                            </tr>
                            <tr>
                                <td>Masters</td> 
                                <td><input type="text" name="masuni" class="form-control form-control-sm" value="<?=$row['masuni']; ?>"></td> 
                                <td><input type="text" name="massub" class="form-control form-control-sm" value="<?=$row['massub']; ?>"></td> 
                                <td><input type="text" name="masyear" class="form-control form-control-sm" value="<?=$row['masyear']; ?>"></td> 
                                <td><input type="text" name="masroll" class="form-control form-control-sm" value="<?=$row['masroll']; ?>"></td> 
                                <td><input type="text" name="masregi" class="form-control form-control-sm" value="<?=$row['masregi']; ?>"></td> 
                                <td><input type="text" name="masgrade" class="form-control form-control-sm" value="<?=$row['masgrade']; ?>"></td> 
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Transaction Details Section -->
            <div class="form-section">
                <h5 class="form-section-title">Transaction Details</h5>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3 row">
                            <label class="col-sm-4 col-form-label">Payment Type</label>
                            <div class="col-sm-8">
                                <input type="text" name="ptype" class="form-control" value="<?=$row['ptype']; ?>">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-4 col-form-label">Trans. Date</label>
                            <div class="col-sm-8">
                                <input type="text" name="pdate" class="form-control" value="<?=$row['pdate']; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3 row">
                            <label class="col-sm-4 col-form-label">Mobile No</label>
                            <div class="col-sm-8">
                                <input type="text" name="rmobile" class="form-control" value="<?=$row['rmobile']; ?>">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-4 col-form-label">Amount</label>
                            <div class="col-sm-8">
                                <input type="text" name="pamount" class="form-control" value="<?=$row['pamount']; ?>">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3 row">
                            <label class="col-sm-4 col-form-label">Trans. ID</label>
                            <div class="col-sm-8">
                                <input type="text" name="rtransection" class="form-control" value="<?=$row['rtransection']; ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Admission Information Section -->
            <div class="form-section">
                <h5 class="form-section-title">Admission Information</h5>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3 row">
                            <label class="col-sm-4 col-form-label">Shift</label>
                            <div class="col-sm-8">
                                <select name="shift" class="form-control" required>
                                    <option value="">Select One</option>
                                    <option value="9.00 AM">9.00 AM</option>
                                    <option value="10.00 AM">10.00 AM</option>
                                    <option value="11.00 AM">11.00 AM</option>
                                    <option value="12.00 PM">12.00 PM</option>
                                    <option value="01.00 PM">01.00 PM</option>
                                    <option value="03.00 PM">03.00 PM</option>
                                    <option value="04.00 PM">04.00 PM</option>
                                    <option value="05.00 PM">05.00 PM</option>
                                    <option value="Night Shift">Night Shift</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3 row">
                            <label class="col-sm-4 col-form-label">File Submitted</label>
                            <div class="col-sm-8">
                                <select name="file_submit" class="form-control" required>
                                    <option value="">Select One</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3 row">
                            <label class="col-sm-4 col-form-label">Status</label>
                            <div class="col-sm-8">
                                <select name="status" class="form-control" required>
                                    <option value="">Select one</option>
                                    <option value="Admited">Admited</option>
                                    <option value="Rejected">Rejected</option>
                                    <option value="Inactive">Inactive</option>
                                    <option value="Completed">Completed</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3 row">
                            <label class="col-sm-4 col-form-label">Contract Amount</label>
                            <div class="col-sm-8">
                                <input type="text" name="contract" class="form-control" placeholder="Enter Contract Fees Amount" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3 row">
                            <label class="col-sm-4 col-form-label">Course Type</label>
                            <div class="col-sm-8">
                                <select name="course_type" class="form-control" required>
                                    <option value="">Select one</option>
                                    <option value="Short">Short Course</option>
                                    <option value="Advanced">Advanced Course</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3 row">
                            <label class="col-sm-4 col-form-label"> </label>
                            <div class="col-sm-8">
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-12 text-center">
                        <button type="submit" name="submit" class="btn btn-success btn-lg">Admit Student</button>
                    </div>
                </div>
            </div>
        </form>
        <?php } ?>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>