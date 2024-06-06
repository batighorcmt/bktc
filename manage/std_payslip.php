<?php 
   session_start();
   include "db_conn.php";
   if (isset($_SESSION['username']) && isset($_SESSION['id'])) {   

extract($_REQUEST);
            
			
?>

<?php

function convertNum($number){
    //A function to convert numbers into Indian readable words with Cores, Lakhs and Thousands.
    $words = array(
    '0'=> '' ,'1'=> 'one' ,'2'=> 'two' ,'3' => 'three','4' => 'four','5' => 'five',
    '6' => 'six','7' => 'seven','8' => 'eight','9' => 'nine','10' => 'ten',
    '11' => 'eleven','12' => 'twelve','13' => 'thirteen','14' => 'fouteen','15' => 'fifteen',
    '16' => 'sixteen','17' => 'seventeen','18' => 'eighteen','19' => 'nineteen','20' => 'twenty',
    '30' => 'thirty','40' => 'fourty','50' => 'fifty','60' => 'sixty','70' => 'seventy',
    '80' => 'eighty','90' => 'ninty');
    
    //First find the length of the number
    $number_length = strlen($number);
    //Initialize an empty array
    $number_array = array(0,0,0,0,0,0,0,0,0);        
    $received_number_array = array();
    
    //Store all received numbers into an array
    for($i=0;$i<$number_length;$i++){    
  		$received_number_array[$i] = substr($number,$i,1);    
  	}

    //Populate the empty array with the numbers received - most critical operation
    for($i=9-$number_length,$j=0;$i<9;$i++,$j++){ 
        $number_array[$i] = $received_number_array[$j]; 
    }

    $number_to_words_string = "";
    //Finding out whether it is teen ? and then multiply by 10, example 17 is seventeen, so if 1 is preceeded with 7 multiply 1 by 10 and add 7 to it.
    for($i=0,$j=1;$i<9;$i++,$j++){
        //"01,23,45,6,78"
        //"00,10,06,7,42"
        //"00,01,90,0,00"
        if($i==0 || $i==2 || $i==4 || $i==7){
            if($number_array[$j]==0 || $number_array[$i] == "1"){
                $number_array[$j] = intval($number_array[$i])*10+$number_array[$j];
                $number_array[$i] = 0;
            }
               
        }
    }

    $value = "";
    for($i=0;$i<9;$i++){
        if($i==0 || $i==2 || $i==4 || $i==7){    
            $value = $number_array[$i]*10; 
        }
        else{ 
            $value = $number_array[$i];    
        }            
        if($value!=0)         {    $number_to_words_string.= $words["$value"]." "; }
        if($i==1 && $value!=0){    $number_to_words_string.= "Crores "; }
        if($i==3 && $value!=0){    $number_to_words_string.= "Lakhs ";    }
        if($i==5 && $value!=0){    $number_to_words_string.= "Thousand "; }
        if($i==6 && $value!=0){    $number_to_words_string.= "Hundred "; }            

    }
    if($number_length>9){ $number_to_words_string = "Sorry This does not support more than 99 Crores"; }
    return ucwords(strtolower("".$number_to_words_string)." Taka Only.");
}


    
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Payment Invoice Print</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="css/ionicons.min.css">

<link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
    <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
<!--Time picker-->
   <link rel="stylesheet" href="plugins/timepicker/bootstrap-timepicker.min.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <style type="text/css">
<!--
.note {font-size: 10px}
body {margin: 0.2in 0.2in 0.2in 0.2in}
-->
  </style>
        <script type="text/javascript">
            function window_print()
            {
                window.print();
            }
        </script>
    </head>
    <body onLoad="awindow_print()">
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

  <h1 align="center" class=""><?php echo $instname; ?></h1>
    <h6 align="center" class=""><?php echo $instadd; ?></h6>
    <h6 align="center" class=""><?php echo $instaddress; ?></h6>
<?php
    }
?>
    <div align="center" style="font-size:12pt;"><strong><h4>Payment Slip</h4></strong></div>
    <hr>
  </div>
    </div>
    <hr>

    <?php
    $sql1 = "SELECT * from admited_student as ads, application as app, trainee_payment as tp WHERE ads.app_id=app.app_id and ads.trainee_id=tp.trainee_id and ads.trainee_id='$_GET[trainee_id]'";
	$result1 = $conn->query($sql1);
	while($rows = $result1->fetch_assoc())
	{ 
        $trainee_id = $rows['trainee_id'];
        $name = $rows['s_name'];
        $fname = $rows['f_name'];
        $mname = $rows['m_name'];
        $img = $rows['img'];
        $course = $rows['course_name'];
        $batch = $rows['batch'];
        $shift = $rows['shift'];
        $mobile = $rows['mobile'];
        $year = $rows['year'];
        $village = $rows['village'];
?>
<h4><b><center>Student Profile</center></b></h4>
                    <div class="table-responsive">
                        <table class="table table-sm table table-bordered table-striped">
                                <tr>
                                <th scope="col">Trainee ID</th>
                                <th scope="col"><?php echo $trainee_id; ?></th>
                                <th scope="col" colspan="2" rowspan="4">
                                <img src="img/student/<?php echo $img; ?>" alt="<?php echo $name; ?>'photo" width="120px" height="150px">
                                </th>
                                </tr>
                                <tr>
                                <th>Tainee Name</th>
                                <th><?php echo $name; ?></th>
                                </tr>
                                <tr>
                                <th>Father Name</th>
                                <td><?php echo $fname; ?></td>
                                </tr>
                                <tr>
                                <th>Mother Name</th>
                                <td><?php echo $mname; ?></td>
                                </tr>
                                <tr>
                                <th>Course</th>
                                <td><?php echo $course; ?></td>
                                <th>Batch</th>
                                <td><?php echo $batch; ?> (<?php echo $year; ?>) </td>
                                </tr>
                                <tr>
                                <th>Address</th>
                                <td colspan="3"><?php echo $village; ?></td>
                                </tr>
                                <tr>
                                <th>Mobile No</th>
                                <td><?php echo $mobile; ?></td>
                                <th>Shift</th>
                                <td><?php echo $shift; ?></td>
                                </tr>
                        </table>
                    </div>
                    
                    <h4><b><center>Payment History</center></b></h4>
                 <div class="table-responsive">
                        <table class="table table-sm table table-bordered table-striped">
                            <thead>
                                <tr>
                                <th scope="col">SL</th>
                                <th scope="col">Payment Date</th>
                                <th scope="col">Payment Method</th>
                                <th scope="col">Transaction ID</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Remarks</th>
                                </tr>
                            </thead>
                            <tbody>
 <?php
    $i=1;
    $total=0;
    $sql3 = "SELECT * from trainee_payment as tp, std_list as st where st.trainee_id=tp.trainee_id AND tp.trainee_id='$_GET[trainee_id]'";
	$result3 = $conn->query($sql3);
	while($roww = $result3->fetch_assoc())
	{ 
        $total += $roww['payment_amount'];
?>
    
                                <tr>
                                <th><?=$i;?></th>
                                <td><?=$roww['payment_date'];?></td>
                                <td><?=$roww['payment_method'];?></td>
                                <td><?=$roww['payment_txn'];?></td>
                                <td><?=$roww['payment_amount'];?></td>
                                <td><?=$roww['remarks'];?></td>
                                </tr>
                                <?php  $i++;   }    ?>
                                <tr>
                                <th colspan="3">In Word: <?php echo convertNum ($total); ?></th>
                                <td>Total</td>
                                <td> <?php echo $total; ?> </td>
                                <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <br><br><br>
	<p align="right"><span style="border-top:solid #000000;">Collector's Signature</span> </p>
</div>

<div align="left" class="fa">
   <p class="note">* This payment slip is made by automatic Computerized system. Design and Developed by <strong>Abdul Halim</strong>.   </p>
</div>
    <p>&nbsp; </p>
<br><br><br>

</body>
</html>
<?php    } ?>

<?php } else{
	header("Location: index.php");
} ?>