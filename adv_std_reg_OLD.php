<?php 
include 'manage/db_conn.php';
extract($_REQUEST);
$agg = $_POST['agree'];
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">


<html>

<head>

  <title>BKTC Student Registration Form</title>

  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

  <style type="text/css">

    <!--

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


    .style1 {font-size: 12px;color: #444444;}



    .style_edit {font-size: 14px; font-family:Arial, Helvetica, sans-serif;color: #444444; background-color:#FFFFFF}



    input {font-family: Verdana; font-size: 12px; color: #0000FF; border: 1 outset #969CCA}

    .myarea {BORDER-BOTTOM: #cdc0b0 1px solid; BORDER-LEFT: #cdc0b0 1px solid; BORDER-RIGHT: #cdc0b0 1px solid; BORDER-TOP: #cdc0b0 1px solid;

      COLOR: #0000FF; FONT-FAMILY: verdana; FONT-SIZE: 9px}

    .mybtn {BACKGROUND-IMAGE: url(ctl_bg.jpg); font-family: Verdana; font-size: 10px; font-weight: NORMAL; color: #D06F22; border: 1 solid #CDC0B0}

    .mycheck {font-family: Verdana; font-size: 8px; color: #4C61F5;}

    select {font-family: Verdana; font-size: 12px; color: #006633; border: 1 outset #969CCA}

    .style4 {font-size: 16px; }

    .stylesuccess {font-size: 14px; }

    .style5 {

      font-size: 14px;

      font-weight: bold;

    }

    .style6 {

      color: #FF0000;

      font-size: 10;

    }

    .style8 {font-size: 10px}



    -->

  </style>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
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

</head><body topmargin="3">
<script type="text/javascript" src="elements/ajaxupload.js"></script>
<script language="JavaScript">

</script>
<div align="center">
  
<div class="row">
            <div class="col-lg-12 col-12">
            <?php if (isset($_GET['success'])) { ?>
              <div class="success alert-success" role="alert">
          <?=$_GET['success']?>
        </div>

        <?php } elseif (isset($_GET['error'])) { ?>
       <div class="danger alert-danger" role="alert">
      <?=$_GET['error']?>
      </div>
      <?php } else {

      }
       ?>
            </div>
            </div>

 <form action="adv_std_data_save.php" method="post" class="form-horizontal validate" role="form" enctype="multipart/form-data"> 
    <table width="765" border=0 style="height: 10px"  align="center">
      <tr>
        <div class="btn btn-success"></div>

      </tr>
      <tr bgcolor="#f5f5dc">
        <td>
          <marquee behavior="" direction="">শিক্ষা নিয়ে গড়বো দেশ, শেখ হাসিনার বাংলাদেশ।</marquee>
        </td>
      </tr>
    </table>

    <table width="765" height="300" border="0"  align="center" cellpadding="0" cellspacing="1" bgcolor="#006633">

      <tr bgcolor="#FFFFFF">

        <td width="763" height="300" bgcolor="ffffff">

          <table width="727" height="646" border="0" align="center" cellpadding="0" cellspacing="1" class="style_edit">

            <tr>

              <td colspan="2"><img src="site_images/bktc_logo.png"  height="100" align="top"></td>

              <td>&nbsp;</td>

              <td colspan="5"><div align="left" style="font:Arial, Helvetica, sans-serif; font-size:18px; font-weight: BOLD;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Bamundi karigori Training Center</div>

                <div align="center" style="font:Arial, Helvetica, sans-serif; font-size:5px;">&nbsp;</div>

                <div align="left" style="font:Arial, Helvetica, sans-serif; font-size:16px;font-weight: BOLD;">Electronic Registration Information Form (e-RIF) </div><div align="left" class="style4"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                   One Year Advance Course               
                  </strong> </div></td>

              <td>&nbsp;</td>

            </tr>
             <tr>
                
                <td colspan="9" align="center" style="color:#D90000; font-weight:bold;">&nbsp;</td>
                
            </tr>
            
            <tr>
                
                <td colspan="9" align="center" style="color:#D90000; font-weight:bold;">ফর্ম পূরণের পূর্বে নির্দেশনাবলী  পড়ে এবং তথ্য সঠিক ভাবে যাচাই বাছাই করে সাবমিট করুন। হটলাইনঃ 01719799089, 01701315034</td>
                
            </tr>

            <tr>

              	<td>&nbsp;</td>
              	<td align="left">  </td>
				<td>&nbsp;</td>
              <td colspan="3" align="left"></td>

              <td align="center">&nbsp;</td>

              <td align="left"><span class="style5"><!--<font color="red">Last Date of submission: 02/11/2020</font>--><!--Session :
                  July-September                </span>--><BR>&nbsp;
                
              </td>

              <td width="12">&nbsp;</td>

            </tr>
			<!--institution Name-->
			<tr align="left">

              <td>&nbsp;</td>

              <td width="135" align=""> Institution<font style="color:#F00;">*</font> </td>

              <td width="3">&nbsp;</td>

              <td colspan="3">
                 
                  <?php
                    $sql = "SELECT * from branch where br_status='Active'";
                    $result = $conn->query($sql);
                  ?>
                 <select name="insname" required>              
							   <option value="">Select Institution</option>
							   <?php 
                 while($row = $result->fetch_array())
                  {
                 echo "<option value='" . $row['br_name'] . "'>" . $row['br_name'] . "</option>";
            }
            ?>
                            </select>     
                
                </td>

              

              <td width="3">&nbsp;</td>

              <td width="245" rowspan="7">
              	&nbsp;</td>

              <td>&nbsp;</td>

            </tr>
			<!-- Institution Name -->

            <tr align="left">

              <td>&nbsp;</td>

              <td width="135" align=""> Session<font style="color:#F00;">*</font> </td>

              <td width="3">&nbsp;</td>

              <td colspan="2">
                <select name="ssession" required>              
							 <option value="">Select Session</option>
                  <?php 
                  $sql = "SELECT * from session WHERE session_form='Open'";
                    $result = $conn->query($sql);
                 while($session = $result->fetch_array())
                  {
                 echo "<option value='" . $session['session_name'] . "'>" . $session['session_name'] . "</option>";
            }
            ?>
							 </select>     
                
                </td>

              <td width="73" align="left">&nbsp; </td>

              <td width="3">&nbsp;</td>

              <td width="245" rowspan="7">
              	<table height="249" border="0"  align="center" cellpadding="0" cellspacing="1"  bgcolor="#006633">

                  <tr><td width="245" height="247" bgcolor="#FFFFFF">

                      <table height="242" cellpadding="0" cellspacing="1">

                        <tr>

                          <td width="235" height="250">
                          
                          <img width="235" height="250" id="previewImg" src="site_images/manpicture.jpg" alt="Placeholder"></td>

                        </tr>

                        <tr>

                          <td height="29">

                            
                            <input required type="file" name="pic_file" onchange="previewFile(this);" />	<br>
                              

                            <span class="style8">Use Only JPEG,JPG,PNG format </span> </td>

                        </tr>

                      </table></td>

                  </tr></table></td>

              <td>&nbsp;</td>

            </tr>

            <tr>

              <td>&nbsp;</td>

              <td align="left"> Student's Name<font style="color:#F00;">*</font> </td>

              <td>&nbsp;</td>

              <td colspan="2" align="left"><input required="required" type="text" name="studname" id="studname"></td>

              <td>&nbsp;</td>

              <td>&nbsp;</td>

              <td>&nbsp;</td>

            </tr>
            
            <tr>

              <td>&nbsp;</td>

              <td align="left">Contact Number<font style="color:#F00;">*</font></td>

              <td>&nbsp;</td>

              <td colspan="2" align="left"><input required="required" type="text" name="cnumber" id="cnumber"></td>

              <td>&nbsp;</td>

              <td>&nbsp;</td>

              <td>&nbsp;</td>

            </tr>


            <tr>

              <td>&nbsp;</td>

              <td align="left">Father's Name<font style="color:#F00;">*</font></td>

              <td>&nbsp;</td>

              <td colspan="2" align="left"><input required="required" type="text" name="fathername" id="fathername"></td>

              <td>&nbsp;</td>

              <td>&nbsp;</td>

              <td>&nbsp;</td>

            </tr>

            <tr>

              <td>&nbsp;</td>

              <td align="left"> Mother's Name<font style="color:#F00;">*</font> </td>

              <td>&nbsp;</td>

              <td colspan="2" align="left"><input required="required" type="text" name="mothername" id="mothername"></td>

              <td>&nbsp;</td>

              <td>&nbsp;</td>

              <td>&nbsp;</td>

            </tr>
            
            <tr>

              <td>&nbsp;</td>

              <td align="left"> Gurdian Number<font style="color:#F00;">*</font></td>

              <td>&nbsp;</td>

              <td colspan="2" align="left"><input required="required" type="text" name="gnumber" id="gnumber"></td>

              <td>&nbsp;</td>

              <td>&nbsp;</td>

              <td>&nbsp;</td>

            </tr>

            

            <tr>

              <td>&nbsp;</td>

              <td align="left"> Email <font style="color:#F00;">*</font> </td>

              <td>&nbsp;</td>

              <td colspan="2" align="left"><input required="required" type="text" name="studemail" id="studemail"></td>

              <td>&nbsp;</td>

              <td>&nbsp;</td>

              <td>&nbsp;</td>

            </tr>

            <tr>

              <td>&nbsp;</td>

              <td align="left">Date of Birth<font style="color:#F00;">*</font> </td>

              <td>&nbsp;</td>

              <td colspan="2" align="left">

                <select name="brdateday" tabindex="4" id="brdateday" required>
                  <option value="">Date</option>
                  <option value="01">01</option>
                  <option value="02">02</option>
                  <option value="03">03</option>
                  <option value="04">04</option>
                  <option value="05">05</option>
                  <option value="06">06</option>
                  <option value="07">07</option>
                  <option value="08">08</option>
                  <option value="09">09</option>
                  <option value="10">10</option>
                  <option value="11">11</option>
                  <option value="12">12</option>
                  <option value="13">13</option>
                  <option value="14">14</option>
                  <option value="15">15</option>
                  <option value="16">16</option>
                  <option value="17">17</option>
                  <option value="18">18</option>
                  <option value="19">19</option>
                  <option value="20">20</option>
                  <option value="21">21</option>
                  <option value="22">22</option>
                  <option value="23">23</option>
                  <option value="24">24</option>
                  <option value="25">25</option>
                  <option value="26">26</option>
                  <option value="27">27</option>
                  <option value="28">28</option>
                  <option value="29">29</option>
                  <option value="30">30</option>
                  <option value="31">31</option>
                </select>

                <select name="brdatemonth" tabindex="5" id="brdatemonth" required>
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
                </select>&nbsp; <input type="text" name="brdateyear" size="4" id="brdateyear" required>        </td>

              <td align="left">Gender<font style="color:#F00;">*</font></td>

              <td>&nbsp;</td>

              <td align="left"><select name="gender" tabindex="8" id="gender" required>

                  <option value="" selected> Select Gender &nbsp;</option>

                  <option value="Male" >Male</option>

                  <option value="Female">Female</option>

                </select></td>

              <td>&nbsp;</td>

            </tr>

            <tr>

              <td height="45">&nbsp;</td>

              <td align="left">Trade/Technology<font style="color:#F00;">*</font></td>

              <td>&nbsp;</td>

              <td colspan="2" align="left">
                <select name="selecttrade" id="selecttrade" required>
                  <option value="">Select Trade</option>
                <?php 
                  $sql = "SELECT * from trade";
                    $result = $conn->query($sql);
                 while($session = $result->fetch_array())
                  {
                 echo "<option value='" . $session['trade_name'] . "'>" . $session['trade_code'] . '-' . $session['trade_name'] . "</option>";
                }
                ?>
                </select>

              </td>

              <td align="left">Religion</td>

              <td>&nbsp;</td>

              <td align="left"><select name="religion" tabindex="8" id="religion" required>

                  <option value=""> Select Religion</option>

                  <option value="Islam" selected>Islam</option>

                  <option value="Christian">Christian</option>

                  <option value="Hindu">Hindu</option>

                  <option value="Budhist">Budhist</option>

                  <option value="Others">Others</option>

                </select></td>

              <td>&nbsp;</td>

            </tr>
            <tr>
               <td height="45">&nbsp;</td>

              <td align="left">Course/ Subject<font style="color:#F00;">*</font></td>

              <td>&nbsp;</td>

              <td colspan="2" align="left">
                <select name="course" id="course" required>
                  <option value="">Select Course</option>
                <?php 
                  $sql = "SELECT * from course";
                    $result = $conn->query($sql);
                 while($session = $result->fetch_array())
                  {
                 echo "<option value='" . $session['course_name'] . "'>" . $session['course_code'] . '-' . $session['course_name'] . "</option>";
                }
                ?>
                </select>

              </td>
            </tr>
            <tr>
              <td colspan="8"><span id="seatspan" class="blink_text"></span></td>
            </tr>

            <tr>

              <td>&nbsp;</td>

              <td align="left">Address<font style="color:#F00;">*</font> </td>

              <td>&nbsp;</td>

              <td colspan="2" align="left"><textarea required="required" name="saddress" cols="25" rows="3" placeholder="E.g: Village, Post Office, Upozila, District"></textarea>

                </td>

              <td align="left">Nationality<font style="color:#F00;">*</font></td>

              <td>&nbsp;</td>

              <td align="left"><select name="selnation" tabindex="8" id="selnation">

                  <option value="">Select Nationality</option>

                  <option value="Bangladeshi" selected>Bangladeshi</option>

                  <option value="Other">Other</option>

                </select></td>

              <td>&nbsp;</td>

            </tr>

            

			<tr>
              <td colspan="8">&nbsp;</td>
            </tr>

            <tr>

              <td>&nbsp;</td>

              <td align="left">Blood Group</td>

              <td align="right">&nbsp;</td>

              <td colspan="2" align="left">

                <select name="bg" tabindex="8" id="bg">

                  <option value="" selected> Select Blood Group</option>

                  <option value="A+" >A+</option>

                  <option value="A-">A-</option>
				  
				  <option value="B+">B+</option>

                  <option value="B-">B-</option>

                  <option value="AB+">AB+</option>

                  <option value="AB-">AB-</option>

                  <option value="O+">O+</option>
				  <option value="O-">O-</option>

                </select>
				
				
				
				
				
			</td>

              <td align="left">NID/B.Certificate No.<font style="color:#F00;">*</font></td>

              <td>&nbsp;</td>

              <td align="left"> <input required="required" type="text" name="nid" id="nid"></td>

              <td>&nbsp;</td>

            </tr>


            


            <tr>
              <td>&nbsp;</td>
              <td colspan="8" align="left"><span class="style1">------- J.S.C. or Equvalent Exam ---------------------------------------------------------------------------------------------------------------</span><span class="style1">-------------------------</span></td>
            </tr>
            <tr bordercolor="#eeeeee" bgcolor="#eeeeee">
              <td>&nbsp;</td>
              <td align="left">Board</td>
              <td bgcolor="#eeeeee">&nbsp;</td>
              <td colspan="2" align="left" bgcolor="#eeeeee">
			          <select name="jscboard" tabindex="16" id="jscboard">
                  <option selected value=""> --Select Board -- </option>
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
							</td>
              <td align="left" >Passing Year</td>
              <td >&nbsp;</td>
              <td align="left" ><input type="text" name="jscyear" size="6" id="jscyear"></td>
              <td>&nbsp;</td>
            </tr>

            <tr bordercolor="#eeeeee" bgcolor="#eeeeee">
              <td>&nbsp;</td>
              <td align="left">Roll</td>
              <td >&nbsp;</td>
              <td colspan="2" align="left" ><input type="text" name="jscroll" id="jscroll"></td>
              <td align="left" >Result</td>
              <td >&nbsp;</td>
              <td align="left" >
                <select name="jscresult" tabindex="8" id="jscresult">
                  <option value="gpa" selected> GPA </option>
                  <option value="div">DIV</option>
               </select>
                <input type="text" name="jscgrade" size="6" id="jscgrade"></td>
              <td>&nbsp;</td>
            </tr>
            <tr bordercolor="#eeeeee" bgcolor="#eeeeee">
              <td>&nbsp;</td>
              <td align="left">Registration Number</td>
              <td >&nbsp;</td>
              <td colspan="2" align="left" ><input type="text" name="jscregi" id="jscregi"></td>
              <td align="left" >&nbsp;</td>
              <td >&nbsp;</td>
              <td align="left" >&nbsp;</td>
              <td>&nbsp;</td>
            </tr>


            <tr>
              <td>&nbsp;</td>
              <td colspan="8" align="left"><span class="style1">------- S.S.C. or Equvalent Exam ---------------------------------------------------------------------------------------------------------------</span><span class="style1">-------------------------</span></td>
            </tr>
            <tr bordercolor="#eeeeee" bgcolor="#eeeeee">
              <td>&nbsp;</td>
              <td align="left">Board</td>
              <td bgcolor="#eeeeee">&nbsp;</td>
              <td colspan="2" align="left" bgcolor="#eeeeee">
			          <select name="sscboard" tabindex="16" id="sscboard">
                  <option selected value=""> --Select Board -- </option>
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
							</td>
              <td align="left" >Passing Year</td>
              <td >&nbsp;</td>
              <td align="left" ><input type="text" name="sscyear" size="6" id="sscyear"></td>
              <td>&nbsp;</td>
            </tr>

            <tr bordercolor="#eeeeee" bgcolor="#eeeeee">
              <td>&nbsp;</td>
              <td align="left">Roll</td>
              <td >&nbsp;</td>
              <td colspan="2" align="left" ><input  type="text" name="sscroll" id="sscroll"></td>
              <td align="left" >Result</td>
              <td >&nbsp;</td>
              <td align="left" >
                <select name="sscresult" tabindex="8" id="sscresult">
                  <option value="gpa" selected> GPA </option>
                  <option value="div">DIV</option>
               </select>
                <input type="text"  name="sscgrade" size="6" id="sscgrade"></td>
              <td>&nbsp;</td>
            </tr>
            <tr bordercolor="#eeeeee" bgcolor="#eeeeee">
              <td>&nbsp;</td>
              <td align="left">Registration Number</td>
              <td >&nbsp;</td>
              <td colspan="2" align="left" ><input  type="text" name="sscregi" id="sscregi"></td>
              <td align="left" >Group</td>
              <td >&nbsp;</td>
              <td align="left" >
              <select name="sscgroup" tabindex="16" id="sscgroup">
                  <option selected value=""> --Select Group -- </option>
                  <option value="Science">Science</option>
                  <option value="Humanities">Humanities</option>
                  <option value="Business Studies">Business Studies</option>
                  <option value="Others">Others</option>
                </select>
              <td>&nbsp;</td>
            </tr>


            <tr>
              <td>&nbsp;</td>
              <td colspan="8" align="left"><span class="style1">------- H.S.C. or Equvalent Exam ---------------------------------------------------------------------------------------------------------------</span><span class="style1">-------------------------</span></td>
            </tr>
            <tr bordercolor="#eeeeee" bgcolor="#eeeeee">
              <td>&nbsp;</td>
              <td align="left">Board</td>
              <td bgcolor="#eeeeee">&nbsp;</td>
              <td colspan="2" align="left" bgcolor="#eeeeee">
			          <select name="hscboard" tabindex="16" id="hscboard">
                  <option selected value=""> --Select Board -- </option>
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
							</td>
              <td align="left" >Passing Year</td>
              <td >&nbsp;</td>
              <td align="left" ><input  type="text" name="hscyear" size="6" id="hscyear"></td>
              <td>&nbsp;</td>
            </tr>

            <tr bordercolor="#eeeeee" bgcolor="#eeeeee">
              <td>&nbsp;</td>
              <td align="left">Roll</td>
              <td >&nbsp;</td>
              <td colspan="2" align="left" ><input type="text" name="hscroll" id="hscroll"></td>
              <td align="left" >Result</td>
              <td >&nbsp;</td>
              <td align="left" >
                <select name="hscresult" tabindex="8" id="hscresult">
                  <option value="gpa" selected> GPA </option>
                  <option value="div">DIV</option>
               </select>
                <input type="text"  name="hscgrade" size="6" id="hscgrade"></td>
              <td>&nbsp;</td>
            </tr>
            <tr bordercolor="#eeeeee" bgcolor="#eeeeee">
              <td>&nbsp;</td>
              <td align="left">Registration Number</td>
              <td >&nbsp;</td>
              <td colspan="2" align="left" ><input  type="text" name="hscregi" id="hscregi"></td>
              <td align="left" >Group</td>
              <td >&nbsp;</td>
              <td align="left" >
              <select name="hscgroup" tabindex="16" id="hscgroup">
                  <option selected value=""> --Select Group -- </option>
                  <option value="Science">Science</option>
                  <option value="Humanities">Humanities</option>
                  <option value="Business Studies">Business Studies</option>
                  <option value="Others">Others</option>
                </select>
              <td>&nbsp;</td>
            </tr>


            <tr>
              <td height="24">&nbsp;</td>
              <td colspan="8" align="left" valign="bottom"><span class="style1">------- Honours or Degree or Fazil or Equvalent Exam ---------------------------------------------------------------------------------</span><span class="style1">-------------------------</span></td>
            </tr>
            <tr bordercolor="#eeeeee" bgcolor="#eeeeee">
              <td>&nbsp;</td>
              <td align="left">University</td>
              <td bgcolor="#eeeeee">&nbsp;</td>
              <td colspan="2" align="left" bgcolor="#eeeeee"><input type="text" name="deguni" id="deguni"></td>
              <td align="left" >Passing Year</td>
              <td >&nbsp;</td>
              <td align="left" ><input type="text" name="degyear" size="6" id="degyear"></td>
              <td>&nbsp;</td>
            </tr>
            <tr bordercolor="#eeeeee" bgcolor="#eeeeee">
              <td>&nbsp;</td>
              <td align="left">Roll</td>
              <td >&nbsp;</td>
              <td colspan="2" align="left" ><input type="text" name="degroll" id="degroll"></td>
              <td align="left" >Result</td>
              <td >&nbsp;</td>
              <td align="left" ><select name="degresult" tabindex="8" id="degresult">
                  <option value="cgpa" selected> CGPA </option>
                  <option value="div">DIV</option>
                </select>
                <input type="text" name="deggrade" size="6" id="deggrade"></td>
              <td>&nbsp;</td>
            </tr>
            <tr bordercolor="#eeeeee" bgcolor="#eeeeee">
              <td>&nbsp;</td>
              <td align="left">Registration Number</td>
              <td >&nbsp;</td>
              <td colspan="2" align="left" ><input  type="text" name="degregi" id="degregi"></td>
              <td align="left" >Subject</td>
              <td >&nbsp;</td>
              <td align="left" ><input type="text" name="degsub" id="degsub">
              <td>&nbsp;</td>
            </tr>


            <tr>
              <td height="24">&nbsp;</td>
              <td colspan="8" align="left" valign="bottom"><span class="style1">------- Masters or Equvalent Exam ---------------------------------------------------------------------------------</span><span class="style1">-------------------------</span></td>
            </tr>
            <tr bordercolor="#eeeeee" bgcolor="#eeeeee">
              <td>&nbsp;</td>
              <td align="left">University</td>
              <td bgcolor="#eeeeee">&nbsp;</td>
              <td colspan="2" align="left" bgcolor="#eeeeee"><input type="text" name="masuni" id="masuni"></td>
              <td align="left" >Passing Year</td>
              <td >&nbsp;</td>
              <td align="left" ><input type="text" name="masyear" size="6" id="masyear"></td>
              <td>&nbsp;</td>
            </tr>
            <tr bordercolor="#eeeeee" bgcolor="#eeeeee">
              <td>&nbsp;</td>
              <td align="left">Roll</td>
              <td >&nbsp;</td>
              <td colspan="2" align="left" ><input type="text" name="masroll" id="masroll"></td>
              <td align="left" >Result</td>
              <td >&nbsp;</td>
              <td align="left" ><select name="masresult" tabindex="8" id="masresult">
                  <option value="cgpa" selected> CGPA </option>
                  <option value="div">DIV</option>
                </select>
                <input type="text" name="masgrade" size="6" id="masgrade"></td>
              <td>&nbsp;</td>
            </tr>
            <tr bordercolor="#eeeeee" bgcolor="#eeeeee">
              <td>&nbsp;</td>
              <td align="left">Registration Number</td>
              <td >&nbsp;</td>
              <td colspan="2" align="left" ><input  type="text" name="masregi" id="masregi"></td>
              <td align="left" >Subject</td>
              <td >&nbsp;</td>
              <td align="left" ><input  type="text" name="massub" id="massub">
              <td>&nbsp;</td>
            </tr>
            
             <tr>
              <td>&nbsp;</td>
              <td colspan="8" align="left"><span class="style1">------- Payment Method ---------------------------------------------------------------------------------------------------------------</span><span class="style1">-------------------------</span></td>
            </tr>
            <tr bordercolor="#eeeeee" bgcolor="#eeeeee">
              <td>&nbsp;</td>
              <td align="left">Payment Type</td>
              <td bgcolor="#eeeeee">&nbsp;</td>
              <td colspan="2" align="left" bgcolor="#eeeeee">
			          <select name="ptype" tabindex="16" id="ptype" required="required">
                  <option selected value=""> --Payment Type -- </option>
                  <option value="Cash">Cash</option>
                  <option value="Bkash">Bkash</option>
                </select>
				      </td>
              <td align="left"> Transection Date</td>
              <td ></td>
              <td align="left" ><input type="text" name="pdate" id="pdate"></td>
              <td>&nbsp;</td>
            </tr>
            <tr bordercolor="#eeeeee" bgcolor="#eeeeee">
              <td>&nbsp;</td>
              <td colspan="2" align="left">Mobile Number<font style="color:#F00"> </font></td>
              <td colspan="2" align="left" ><input type="text" name="rmobile" id="rtransection"></td>
              <td align="left" >Transection ID<font style="color:#F00"> </font></td>
              <td colspan="2" align="left" ><input type="text" name="rtransection" id="rtransection"></td>
              <td>Amount: <input type="text" name="pamount" id="pamount"></td>
            </tr>     
			<tr>

              <td>&nbsp;</td>

              <td colspan="8" align="left"><span class="style1">------- Reference ---------------------------------------------------------------------------------------------------------------</span><span class="style1">-------------------------</span></td>

            </tr>
            <tr bordercolor="#eeeeee" bgcolor="#eeeeee">

              <td>&nbsp;</td>

              <td align="left">Reference</td>

              <td bgcolor="#eeeeee">&nbsp;</td>

              <td colspan="2" align="left" bgcolor="#eeeeee">
				  
			 <input type="text" name="reference">
				
				</td>

              <td align="left" >&nbsp;</td>

              <td >&nbsp;</td>

              <td align="left" >&nbsp;</td>

              <td>&nbsp;</td>

            </tr>
<tr>

              <td>&nbsp;</td>

              <td colspan="7"><div align="left" class="stylesuccess" id="outputText"></div></td>

              <td>&nbsp;</td>

            </tr>
            <tr>
              <td colspan="4" align="left">

                              <input type="submit" name="Submit" value="Submit">
                </td>

              <td colspan="5" align="left">&nbsp;

                <span class="style6">&nbsp;</span>

                &nbsp;</td></tr>

            <tr>

              <td>&nbsp;</td>

              <td>&nbsp;</td>

              <td>&nbsp;</td>

              <td width="174">&nbsp;</td>

              <td width="66">&nbsp;</td>

              <td>&nbsp;</td>

              <td>&nbsp;</td>

              <td>&nbsp;</td>

              <td>&nbsp;</td>

            </tr>

          </table>

        </td>

      </tr>

    </table>

  </form>
</div>

</body>

</html>