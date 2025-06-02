<?php
include 'db_conn.php';
$trainee_id = isset($_GET['trainee_id']) ? intval($_GET['trainee_id']) : null;
?>
<!DOCTYPE html>
<html lang="bn">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Student Profile | Print</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <style>
    body { font-family: 'Kalpurush', sans-serif; }
    .table th, .table td { font-size: 14px; vertical-align: middle; }
    .centered { text-align: center; }
    .prtpic { border: 1px solid #ddd; padding: 4px; }
    @media print { .no-print { display: none; } }
  </style>
</head>
<body>
<div class="container py-4">

  <?php 
  $sqlinst = "SELECT * from inst_data LIMIT 1";
  $resultinst = $conn->query($sqlinst);
  if ($row = $resultinst->fetch_assoc()) {
      echo "<h2 class='text-center'>{$row['inst_name']}</h2>";
      echo "<p class='text-center mb-0'>{$row['inst_add']}</p>";
      echo "<p class='text-center'>{$row['inst_address']}</p>";
  }
  ?>

<?php
$sql = "SELECT * FROM application AS app
JOIN admited_student AS st ON app.app_id = st.app_id
LEFT JOIN trainee_payment AS tp ON st.trainee_id = tp.trainee_id
WHERE st.trainee_id = $trainee_id LIMIT 1";

$result = $conn->query($sql);
if ($row = $result->fetch_assoc()) {
?>
<h4 class="text-center my-4">Student Profile (<?= $row['trainee_id'] ?>)</h4>
  <hr>

  <table class="table table-sm table table-bordered table-striped>
    <thead class="thead-light">
      <tr><th colspan="4" class="centered">Personal Details</th></tr>
    </thead>
    <tbody>
      <tr>
        <th>Application ID</th><td><?= $row['app_id'] ?></td>
        <td colspan="2" rowspan="5" class="text-center">
          <img src="../img/appliedstd/<?= $row['pic_file'] ?>" width="120" height="150" class="prtpic">
        </td>
      </tr>
      <tr><th>Applied On</th><td><?= date('d/m/Y h:i:s A', strtotime($row['app_date'])) ?></td></tr>
      <tr><th>Name</th><td><?= $row['studname'] ?></td></tr>
      <tr><th>Father's Name</th><td><?= $row['fathername'] ?></td></tr>
      <tr><th>Mother's Name</th><td><?= $row['mothername'] ?></td></tr>
      <tr><th>Trade</th><td><?= $row['selecttrade'] ?></td><th>Course</th><td><?= $row['course'] ?></td></tr>
      <tr><th>Session</th><td><?= $row['ssession'] ?></td><th>Blood Group</th><td><?= $row['bg'] ?></td></tr>
      <tr><th>NID/BRID</th><td><?= $row['nid'] ?></td><th>Date of Birth</th><td><?= $row['dob'] ?></td></tr>
      <tr><th>Address</th><td colspan="3"><?= $row['saddress'] ?></td></tr>
      <tr><th>Contact No</th><td><?= $row['cnumber'] ?></td><th>Guardian No</th><td><?= $row['gnumber'] ?></td></tr>
      <tr><th>Email</th><td><?= $row['studemail'] ?></td><th>Nationality</th><td><?= $row['selnation'] ?></td></tr>
      <tr><th>Religion</th><td><?= $row['religion'] ?></td><th>Gender</th><td><?= $row['gender'] ?></td></tr>
    </tbody>
  </table>

  <table class="table table-sm table table-bordered table-striped>
    <thead class="thead-light">
      <tr><th colspan="7" class="centered">Educational Details</th></tr>
      <tr class="text-center">
        <th>Exam</th><th>Board/University</th><th>Group/Subject</th><th>Year</th><th>Roll</th><th>Reg</th><th>Result</th>
      </tr>
    </thead>
    <tbody>
      <tr><td>JSC</td><td><?= $row['jscboard'] ?></td><td></td><td><?= $row['jscyear'] ?></td><td><?= $row['jscroll'] ?></td><td><?= $row['jscregi'] ?></td><td><?= $row['jscgrade'] ?></td></tr>
      <tr><td>SSC</td><td><?= $row['sscboard'] ?></td><td><?= $row['sscgroup'] ?></td><td><?= $row['sscyear'] ?></td><td><?= $row['sscroll'] ?></td><td><?= $row['sscregi'] ?></td><td><?= $row['sscgrade'] ?></td></tr>
      <tr><td>HSC</td><td><?= $row['hscboard'] ?></td><td><?= $row['hscgroup'] ?></td><td><?= $row['hscyear'] ?></td><td><?= $row['hscroll'] ?></td><td><?= $row['hscregi'] ?></td><td><?= $row['hscgrade'] ?></td></tr>
      <tr><td>Degree</td><td><?= $row['deguni'] ?></td><td><?= $row['degsub'] ?></td><td><?= $row['degyear'] ?></td><td><?= $row['degroll'] ?></td><td><?= $row['degregi'] ?></td><td><?= $row['deggrade'] ?></td></tr>
      <tr><td>Masters</td><td><?= $row['masuni'] ?></td><td><?= $row['massub'] ?></td><td><?= $row['masyear'] ?></td><td><?= $row['masroll'] ?></td><td><?= $row['masregi'] ?></td><td><?= $row['masgrade'] ?></td></tr>
    </tbody>
  </table>

  <table class="table table-sm table table-bordered table-striped>
    <thead class="thead-light">
      <tr><th colspan="6" class="centered">Payment History</th></tr>
      <tr class="text-center">
        <th>SL</th><th>Date</th><th>Method</th><th>Txn ID</th><th>Amount</th><th>Remarks</th>
      </tr>
    </thead>
    <tbody>
    <?php
    $i = 1; $total = 0;
    $sql3 = "SELECT * FROM trainee_payment WHERE trainee_id = $trainee_id";
    $res3 = $conn->query($sql3);
    while($pay = $res3->fetch_assoc()) {
      $total += $pay['payment_amount'];
      echo "<tr class='text-center'>
              <td>{$i}</td>
              <td>" . date('d/m/Y', strtotime($pay['payment_date'])) . "</td>
              <td>{$pay['payment_method']}</td>
              <td>{$pay['payment_txn']}</td>
              <td>{$pay['payment_amount']}</td>
              <td>{$pay['remarks']}</td>
            </tr>";
      $i++;
    }
    ?>
      <tr class="font-weight-bold text-center">
        <td align="left" colspan="4">Total (In Word) : <?php echo convertNum ($total); ?> </td><td><?= $total ?></td><td></td>
      </tr>
    </tbody>
  </table>

<?php } else { echo "<p class='text-danger text-center'>Trainee not found.</p>"; } ?>
<p class="text-right mt-3"><small>Printed on: <?= date('d/m/Y h:i A') ?></small></p>
<div class="text-center mt-4 no-print">
  <button class="btn btn-primary" onclick="window.print()"><i class="fa fa-print"></i> Print</button>
</div>

</div>
</body>
</html>
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