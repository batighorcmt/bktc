<?php
include '../manage/db_conn.php';
$app_id = isset($_GET['app_id']) ? intval($_GET['app_id']) : null;
?>



<!DOCTYPE html>
<!-- saved from url=(0023)https://www.bktc.edu.bd/ -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    
 <title>Print Application Copy | BKTC</title> 
    
    <link href="../ite_images/icon.ico" rel="icon">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
    
    <!-- Bootstrap core CSS -->
    <link href="../elements/bootstrap.min.css" rel="stylesheet">
    
    <!-- Your custom styles (optional) -->
    <link rel="stylesheet" href="../elements/animate.css">
    
    <link rel="stylesheet" href="../elements/all-fonts.css">
    
    <link href="../elements/style.css" rel="stylesheet">
    
     <link href="../elements/owl.carousel.min.css" rel="stylesheet">
   
   <link rel="stylesheet" href="../elements/carlous.css">
     <script src="../elements/jquery.min.js.download"></script>
  <script src="../elements/bootstrap.min.js.download"></script>
     
   <link href="../elements/font.css" rel="stylesheet">
   <link href="https://fonts.maateen.me/kalpurush/font.css" rel="stylesheet">
  <style type="text/css">
<!--
.sig {
  margin-top: 50px;
  margin-bottom: 0px;
  margin-right: 20px;
  margin-left: 0px;
}
.sigborder {
  border-top: 2px solid black;
}
  </style>
   
    
  </head>
  <body>

    <section style="background-color: #FFF;">
  <div class="container py-5">
    <div class="row">
      <div class="col-sm-12">
<?php 
    $sqlinst = "SELECT * from inst_data limit 1";
  $resultinst = $conn->query($sqlinst);
  while($r = $resultinst->fetch_assoc())
  { 
        $instname = $r['inst_name'];
        $instadd = $r['inst_add'];
        $instaddress = $r['inst_address'];
?>
<div class="table-responsive">
    <table class="table table-sm>
      <tr>
        <td> <img src="../site_images/logo.png" alt="BKTC Logo" width="100px" height="100px"> </td>
        <td>
        <h1 align="center" class=""><?php echo $instname; ?></h1>
    <h6 align="center" class=""><?php echo $instadd; ?></h6>
    <h6 align="center" class=""><?php echo $instaddress; ?></h6>
        </td>
        <td></td>
      </tr>
  </table>
<?php
    }
?>
    <div align="center" style="font-size:12pt;"><strong><h4>Online Application Copy</h4></strong></div>
    <hr>
  </div>
    </div>
<?php 
    $sql = "SELECT * from application WHERE app_id=$app_id";
  $result = $conn->query($sql);
  while($row = $result->fetch_assoc())
  { 
    $app_date = $row['app_date'];
    ?>
<div class="table-responsive">
    <table class="table table-sm table table-bordered table-striped">
      <tr>
        <th colspan="4" align="center">Personal Details</th>
      </tr>
      <tr>
      <th scope="col">Application ID</th>
      <th scope="col"><?=$row['app_id']; ?></th>
      <th scope="col" colspan="2" rowspan="4">
      <img class="prtpic" src="../img/appliedstd/<?=$row['pic_file']; ?>" alt="<?=$row['studname']; ?>'photo" width="120px" height="150px">
      </th>
      </tr>
      <tr>
      <th scope="col">Applied On</th>
      <th scope="col"><?php echo date("d/m/Y H:i:s A",strtotime("$app_date")); ?> </th>
      </tr>
      <tr>
      <th>Tainee Name</th>
      <th><?=$row['studname']; ?></th>
      </tr>
      <tr>
      <th>Father Name</th>
      <td><?=$row['fathername']; ?></td>
      </tr>
      <tr>
      <th>Mother Name</th>
      <td><?=$row['mothername']; ?></td>
      </tr>
      <tr>
      <th>Trade</th>
      <td><?=$row['selecttrade']; ?></td>
      <th>Course/Subject</th>
      <td><?=$row['course']; ?> </td>
      </tr>
      <tr>
      <th>Session</th>
      <td><?=$row['ssession']; ?></td>
      <th>Blood Group</th>
      <td><?=$row['bg']; ?> </td>
      </tr>
      <tr>
      <th>NID/BRID</th>
      <td><?=$row['nid']; ?></td>
      <th>Date of Birth</th>
      <td><?=$row['dob']; ?> </td>
      </tr>
      <tr>
      <th>Address</th>
      <td colspan="3"><?=$row['saddress']; ?></td>
      </tr>
      <tr>
      <th>Contact No</th>
      <td><?=$row['cnumber']; ?></td>
      <th>Gurdian Number</th>
      <td><?=$row['gnumber']; ?></td>
      </tr>
      <tr>
      <th>Email</th>
      <td><?=$row['studemail']; ?></td>
      <th>Nationality</th>
      <td><?=$row['selnation']; ?></td>
      </tr>
      <tr>
      <th>Religion</th>
      <td><?=$row['religion']; ?></td>
      <th>Gender</th>
      <td><?=$row['gender']; ?></td>
      </tr>
      <tr>
    </table>
    <table class="table table-sm table table-bordered table-striped">
      <th colspan="7" align="center">Educational Details</th>
      </tr>
      <tr align="center">
        <th>Exam Name</th> 
        <th>Board/University</th> 
        <th>Group/Subject</th>
        <th>Passing Year</th> 
        <th>Roll NO</th> 
        <th>Registration NO</th>
        <th>Result</th> 
      </tr>
      <tr>
        <td>J.S.C</td> 
        <td><?=$row['jscboard']; ?></td> 
        <td> </td> 
        <td><?=$row['jscyear']; ?></td> 
        <td><?=$row['jscroll']; ?></td> 
        <td><?=$row['jscregi']; ?></td> 
        <td><?=$row['jscgrade']; ?></td> 
      </tr>
      <tr>
        <td>S.S.C</td> 
        <td><?=$row['sscboard']; ?></td> 
        <td><?=$row['sscgroup']; ?></td> 
        <td><?=$row['sscyear']; ?></td> 
        <td><?=$row['sscroll']; ?></td> 
        <td><?=$row['sscregi']; ?></td> 
        <td><?=$row['sscgrade']; ?></td> 
      </tr>
      <tr>
        <td>H.S.C</td> 
        <td><?=$row['hscboard']; ?></td> 
        <td><?=$row['hscgroup']; ?></td> 
        <td><?=$row['hscyear']; ?></td> 
        <td><?=$row['hscroll']; ?></td> 
        <td><?=$row['hscregi']; ?></td> 
        <td><?=$row['hscgrade']; ?></td> 
      </tr>
      <tr>
        <td>Honours/ Degree </td> 
        <td><?=$row['deguni']; ?></td> 
        <td><?=$row['degsub']; ?></td> 
        <td><?=$row['degyear']; ?></td> 
        <td><?=$row['degroll']; ?></td> 
        <td><?=$row['degregi']; ?></td> 
        <td><?=$row['deggrade']; ?></td> 
      </tr>
      <tr>
        <td>Masters</td> 
        <td><?=$row['masuni']; ?></td> 
        <td><?=$row['massub']; ?></td> 
        <td><?=$row['masyear']; ?></td> 
        <td><?=$row['masroll']; ?></td> 
        <td><?=$row['masregi']; ?></td> 
        <td><?=$row['masgrade']; ?></td> 
      </tr>
      
    </table>


        <table class="table table-sm table table-bordered table-striped">
      <th colspan="6" align="center">Transection Details</th>
      </tr>
      <tr align="center">
        <th>Payment Type</th> 
        <th>Trans. Date</th> 
        <th>Mobile No</th> 
        <th>Amount</th>
        <th>Trans. ID</th> 
      </tr>
      <tr> 
        <td><?=$row['ptype']; ?></td> 
        <td><?=$row['pdate']; ?></td> 
        <td><?=$row['rmobile']; ?></td> 
        <td><?=$row['pamount']; ?></td> 
        <td><?=$row['rtransection']; ?></td> 
      </tr>
    </table>
</div>
<?php
    }
?>


<div align="Right" class="sig"> <span class="sigborder">Applicant Signature</span></div>

</body>
</html>