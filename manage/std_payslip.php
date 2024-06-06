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


 
<h4><b><center>Student Profile</center></b></h4>
                    <div class="table-responsive">
                        <table class="table table-sm table table-bordered table-striped">
                        <?php
    $sql1 = "SELECT * from admited_student as ads, application as app, trainee_payment as tp WHERE ads.app_id=app.app_id and ads.trainee_id='$_GET[trainee_id]'";
	$result1 = $conn->query($sql1);
	while($rows = $result1->fetch_assoc())
	{ 
        $trainee_id = $rows['trainee_id'];
        $studname = $rows['studname'];
        $fathername = $rows['fathername'];
        $mothername = $rows['mothername'];
        $pic_file = $rows['pic_file'];
        $course = $rows['course'];
        $ssession = $rows['ssession'];
        $shift = $rows['shift'];
        $cnumber = $rows['cnumber'];
        $saddress = $rows['saddress'];
?>
                                <tr>
                                <th scope="col">Trainee ID</th>
                                <th scope="col"><?php echo $trainee_id; ?></th>
                                <th scope="col" colspan="2" rowspan="4">
                                <img src="../img/appliedstd/<?php echo $pic_file; ?>" alt="<?php echo $studname; ?>'s photo" width="120px" height="150px">
                                </th>
                                </tr>
                                <tr>
                                <th>Tainee Name</th>
                                <th><?php echo $studname; ?></th>
                                </tr>
                                <tr>
                                <th>Father Name</th>
                                <td><?php echo $fathername; ?></td>
                                </tr>
                                <tr>
                                <th>Mother Name</th>
                                <td><?php echo $mothername; ?></td>
                                </tr>
                                <tr>
                                <th>Course</th>
                                <td><?php echo $course; ?></td>
                                <th>Batch</th>
                                <td><?php echo $ssession; ?> </td>
                                </tr>
                                <tr>
                                <th>Address</th>
                                <td colspan="3"><?php echo $saddress; ?></td>
                                </tr>
                                <tr>
                                <th>Mobile No</th>
                                <td><?php echo $cnumber; ?></td>
                                <th>Shift</th>
                                <td><?php echo $shift; ?></td>
                                </tr>
                                <?php    } ?>
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
    $sql3 = "SELECT * from admited_student as ads, application as app, trainee_payment as tp WHERE ads.app_id=app.app_id and ads.trainee_id=tp.trainee_id and ads.trainee_id='$_GET[trainee_id]'";
	$result3 = $conn->query($sql3);
	while($roww = $result3->fetch_assoc())
	{ 
        $total += $roww['payment_amount'];
        $payment_date = $roww['payment_date'];
?>
    
                                <tr>
                                <th><?=$i;?></th>
                                <td><?php echo date("d/m/Y",strtotime("$payment_date")); ?></td>
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


<?php } else{
	header("Location: index.php");
} ?>