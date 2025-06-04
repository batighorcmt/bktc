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


<?php 
 $sqlinst = "SELECT * from inst_data limit 1";
  $resultinst = $conn->query($sqlinst);
  while($r = $resultinst->fetch_assoc())
  { 
        $instname = $r['inst_name'];
        $instadd = $r['inst_add'];
        $instaddress = $r['inst_address'];
  }
 
  $payment_id = isset($_GET['payment_id']) ? intval($_GET['payment_id']) : 0;
$total=0;
$sql = "SELECT * from admited_student as ads, application as app, trainee_payment as tp, txn_cat as txncat WHERE ads.app_id=app.app_id and ads.trainee_id=tp.trainee_id and tp.payment_purpose=txncat.txn_cat_id and tp.payment_sys_id='$payment_id]'";
$result = $conn->query($sql);

if ($result->num_rows === 0) {
    die("No Receipt found with the given ID.");
}

$roww = $result->fetch_assoc();
{ 
        $total += $roww['payment_amount'];
        $payment_date = $roww['payment_date']
?>

<!DOCTYPE html>
<html lang="bn">
<head>
  <meta charset="UTF-8">
  <title>Payment Receipt</title>
  <style>
    body { font-family: 'Siyam Rupali', sans-serif; background: #f9f9f9; padding: 20px }
    .receipt-container { width: 800px; margin: auto; background: white; padding: 20px; }
    .receipt { border: 1px solid #ccc; padding: 30px 40px; margin-bottom: 30px; position: relative; }
    .copy-label { text-align: right; font-weight: bold; margin-bottom: 0px; }
    .watermark {
      position: absolute; top: 50%; left: 50%;
      transform: translate(-50%, -50%);
      opacity: 0.06; z-index: 0;
      width: 400px;
    }
    .watermark img { width: 100%; }
    .content { position: relative; z-index: 1; }
    .header { display: flex; align-items: center; justify-content: space-between; }
    .logo img { width: 80px; }
    .header-text { text-align: center; flex: 1; }
    .title { text-align: center; font-weight: bold; margin: 10px 0; border-top: 1px dashed #888; border-bottom: 1px dashed #888; padding: 5px 0; }
    .row { display: flex; margin: 6px 0; }
    .label { width: 200px; font-weight: bold; }
    .value { flex: 1; border-bottom: 1px dotted #aaa; padding: 2px 10px; }
    .footer { display: flex; justify-content: space-between; margin-top: 25px; font-weight: bold; }
    .print-button { text-align: center; margin-top: 20px; }
    @media print { .print-button { display: none; } .receipt { page-break-inside: avoid; } }

    
  .divider {
  width: 100%;
  text-align: center;
  position: relative;
  height: 20px;
  margin: 30px 0;
}

.divider::before {
  content: "";
  position: absolute;
  top: 50%;
  left: 0;
  right: 0;
  border-top: 2px dashed #aaa;
  z-index: 1;
}

.divider span {
  background: #fff;
  padding: 0 15px;
  position: relative;
  z-index: 2;
  font-size: 16px;
  font-weight: bold;
  color: #555;
  font-family: 'Siyam Rupali', sans-serif;
}

  </style>
</head>
<body>

<div class="receipt-container">
  <?php for ($i = 0; $i < 2; $i++): ?>
    <div class="receipt">
      <div class="copy-label"><?= $i == 0 ? 'Office Copy' : 'Student Copy' ?></div>
      <div class="watermark">
        <img src="../site_images/bktc_logo.png" alt="Watermark Logo">
      </div>
      <div class="content">
        <div class="header">
          <div class="logo"><img src="../site_images/bktc_logo.png" alt="Logo"></div>
          <div class="header-text">
            <h2><?php echo $instname; ?></h2>
            <p><?php echo $instadd; ?></p>
      <p><?php echo $instaddress; ?></p>
          </div>
        </div>

        <div class="title">Payment Receipt</div>

        <div class="row"><div class="label">Receipt No :</div><div class="value"><?=$roww['payment_sys_id'];?> </div> <div class="label">Date :</div><div class="value"><?=$roww['payment_date'];?></div></div>
        <div class="row"><div class="label">Student Name :</div> <div class="value"><?=$roww['studname'];?> (<?=$roww['trainee_id'];?>) </div></div>
        <div class="row"><div class="label">Course Name :</div><div class="value"><?=$roww['course'];?> (<?=$roww['selecttrade'];?>)</div></div>
        <div class="row"><div class="label">Amount :</div><div class="value"> <?=$roww['payment_amount'];?>/=</div></div>
        <div class="row"><div class="label">In Words :</div><div class="value"> <?php echo convertNum ($total); ?></div></div>
        <div class="row"><div class="label">Purpose :</div><div class="value"><?=$roww['txn_cat_name'];?></div></div>


        <div class="footer">
          <div>Collector: <?=$_SESSION['name']?></div>
          <div>Director: ............</div>
        </div>
      </div>
    </div>
        <?php if ($i == 0): ?>
      <div class="divider"><span>✂</span></div>
    <?php endif; ?>
  <?php endfor; ?>
</div>

<div class="print-button">
  <button onclick="window.print()">Print</button>
</div>

</body>
</html>
<?php
   } }
   ?>