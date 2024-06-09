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

  <!--



  function isDate(dateStr) {



    var datePat = /^(\d{1,2})(\/|-)(\d{1,2})(\/|-)(\d{4})$/;

    var matchArray = dateStr.match(datePat);



    if (matchArray == null) {

      alert("Please enter date as either mm/dd/yyyy or mm-dd-yyyy.");

      return false;

    }



    month = matchArray[1];

    day = matchArray[3];

    year = matchArray[5];



    if (month < 1 || month > 12) {

      alert("Month must be between 1 and 12.");

      return false;

    }



    if (day < 1 || day > 31) {

      alert("Day must be between 1 and 31.");

      return false;

    }



    if ((month==4 || month==6 || month==9 || month==11) && day==31) {

      alert("Month "+month+" doesn't have 31 days!")

      return false;

    }



    if (month == 2) {

      var isleap = (year % 4 == 0 && (year % 100 != 0 || year % 400 == 0));

      if (day > 29 || (day==29 && !isleap)) {

        alert("February " + year + " doesn't have " + day + " days!");

        return false;

      }

    }

    return true;

  }





  function nextfocus()

  {

    if(document.entry.studname.keypress==13)

    {

      document.entry.studfaname.focus();

    }

  }



  function vrfyuppercase()

  {



    if (document.entry.stdname.value.length > 1)

    {

      //alert("Please enter a Student Name.");

      document.entry.studname.focus();

      document.entry.studname.value=document.entry.studname.value.toUpperCase(document.entry.studname.value);

    }

    if (document.entry.stdfaname.value.length > 1)

    {

      //alert("Please enter a Father Name.");

      document.entry.fathername.focus();

      document.entry.fathername.value=document.entry.fathername.value.toUpperCase(document.entry.fathername.value);

    }

    if (document.entry.mothername.value.length > 1)

    {

      //alert("Please enter a Mother Name.");

      document.entry.mothername.focus();

      document.entry.mothername.value=document.entry.stdmoname.value.toUpperCase(0,document.entry.mothername.value);

    }



    //document.entry.stdname.focus();



  }

  function veryfynum()

  {

//alert("Please enter a Student Name.");

    /*

     var object1 = window.document.getElementById(div);

     if (isNaN(object1.value)||(object1.value.length > 6))

     {

     alert("Please enter a Valid Number.");

     //alert(substr(document.entry.classroll.value,0,3);

     object1.focus();

     object1.value=object1.value.substr(0,object1.value.length-1);

     return false;

     }*/



    if (isNaN(document.entry.classroll.value)||(document.entry.classroll.value.length > 6))

    {

      alert("Please enter a Valid Class Roll.");

      //alert(substr(document.entry.classroll.value,0,3);

      document.entry.classroll.focus();

      document.entry.classroll.value=document.entry.classroll.value.substr(0,document.entry.classroll.value.length-1);

      return false;

    }

    if (isNaN(document.entry.sscroll.value)||(document.entry.sscroll.value.length > 6))

    {

      alert("Please enter a Valid SSC Roll.");

      //alert(substr(document.entry.classroll.value,0,3);

      document.entry.sscroll.focus();

      document.entry.sscroll.value=document.entry.sscroll.value.substr(0,document.entry.sscroll.value.length-1);

      return false;

    }

    if (isNaN(document.entry.sscgrade.value)||(document.entry.sscgrade.value.length > 5)||(document.entry.sscgrade.value > 5))

    {

      alert("Please enter a Valid S.S.C. GPA.");

      //alert(substr(document.entry.classroll.value,0,3);

      document.entry.sscgrade.focus();

      document.entry.sscgrade.value=document.entry.sscgrade.value.substr(0,document.entry.sscgrade.value.length-1);

      return false;

    }



    if (isNaN(document.entry.jscroll.value)||(document.entry.jscroll.value.length > 6))

    {

      alert("Please enter a Valid SSC Roll.");

      //alert(substr(document.entry.classroll.value,0,3);

      document.entry.jscroll.focus();

      document.entry.jscroll.value=document.entry.jscroll.value.substr(0,document.entry.jscroll.value.length-1);

      return false;

    }

    if (isNaN(document.entry.jscgrade.value)||(document.entry.jscgrade.value.length > 5)||(document.entry.jscgrade.value > 5))

    {

      alert("Please enter a Valid J.S.C. GPA.");

      //alert(substr(document.entry.classroll.value,0,3);

      document.entry.jscgrade.focus();

      document.entry.jscgrade.value=document.entry.jscgrade.value.substr(0,document.entry.jscgrade.value.length-1);

      return false;

    }



  }

  function vrfy()

  {

    if (document.entry.slno.value == "" )

    {

      alert("Please enter a Sl No.");

      document.entry.slno.focus();

      return false;

    }





    if (document.entry.studname.value == "" )

    {

      alert("Please enter a Student Name.");

      document.entry.studname.focus();

      return false;

    }

    if (document.entry.fathername.value == "" )

    {

      alert("Please enter a Father Name.");

      document.entry.fathername.focus();

      return false;

    }

    if (document.entry.mothername.value == "" )

    {

      alert("Please enter a Mother Name.");

      document.entry.mothername.focus();

      return false;

    }

    if (document.entry.classroll.value == "" )

    {

      alert("Please enter a Class Roll.");

      document.entry.classroll.focus();

      return false;

    }



    if (document.entry.orgfilename.value == "" )

    {

      alert("Please enter a Picture.");

      document.entry.filename.focus();

      return false;

    }


    if ((document.entry.brdateyear.value == "" )||(document.entry.brdateyear.value.length < 4))

    {

      alert("Please enter a DOB. (dd/mm/yyyy) ");

      document.entry.brdateyear.focus();

      return false;

    }



    if (document.entry.selecttrade.value == "" )

    {

      alert("Please select a Trade/Technology.");

      document.entry.selecttrade.focus();

      return false;

    }





    if (document.entry.jscboard.value == "" && document.entry.sscboard.value == "")

    {

      alert("Please Select a JSC Board or SSC Board ");

      if(document.entry.jscboard.value !="" || document.entry.jscroll.value != "" || document.entry.jscgrade.value !="" || document.entry.jscyear.value != "")

        document.entry.jscboard.focus();

      else document.entry.sscboard.focus();

      return false;

    }



    if (document.entry.jscroll.value == "" && document.entry.sscroll.value == "" )

    {

      alert("Please enter a JSC Roll or SSC Roll.");

      if(document.entry.jscboard.value !="" || document.entry.jscroll.value != "" || document.entry.jscgrade.value !="" || document.entry.jscyear.value != "")

        document.entry.jscroll.focus();

      else document.entry.sscroll.focus();

      return false;

    }



    if ((document.entry.jscgrade.value == "" && document.entry.sscgrade.value == "" ))

    {

      alert("Please enter a JSC GPA or SSC GPA");

      if(document.entry.jscboard.value !="" || document.entry.jscroll.value != "" || document.entry.jscgrade.value !="" || document.entry.jscyear.value != "")

        document.entry.jscgrade.focus();

      else document.entry.sscgrade.focus();

      return false;

    }



    if ((document.entry.jscyear.value == "" && document.entry.sscyear.value == "" ))

    {

      alert("Please enter a JSC year or SSC year");

      if(document.entry.jscboard.value !="" || document.entry.jscroll.value != "" || document.entry.jscgrade.value !="" || document.entry.jscyear.value != "")

        document.entry.jscyear.focus();

      else document.entry.sscyear.focus();

      return false;

    }

    //if ((document.entry.sscgrade.value == "" )&&(document.entry.sscdivision.value == "" ))

    //if ((document.entry.sscgrade.value == "" ))

    //{

    //alert("Please enter a SSC GPA.");

    //document.entry.sscgrade.focus();

    //return false;

    //}







    var p1=document.entry.brdateday.value + "";

    var p2=document.entry.brdatemonth.value + "";

    var p3=document.entry.brdateyear.value + "";



    if ((p3 == "" ))

    {

      p3="0000";

    }



    //var datestringdob = p1 + "/" + p2 + "/" + p3;

    var datestringdob = p2 + "/" + p1 + "/" + p3;

    //var datestringadd = document.entry.brdateday.value+'/'+document.entry.brdatemonth.value+'/'+document.entry.brdateyear.value;

    //alert(datestringdob);

    if (isDate(datestringdob)==false)

    //if (isDate(datestringdob,toString(dd/mm/yyyy)))

    {

      alert("Date of Birth is not valid. ");

      document.entry.brdateyear.focus();

      return false;

    }



    // if (document.entry.sscboard.value == "" )

    //{

    // alert("Please Select a SSC Board.");

    //document.entry.sscboard.focus();

    //return false;

    //}





    //if (alert(isDate(this.form.string1.value,this.form.format1.value))dd/mm/yyyy





  }//end function

  //--></script>



<script language="javascript" type="text/javascript">

  <!--

  // Get the HTTP Object

  /*

   function getHTTPObject(){

   if (window.ActiveXObject) return new ActiveXObject("Microsoft.XMLHTTP");

   else if (window.XMLHttpRequest) return new XMLHttpRequest();

   else {

   alert("Your browser does not support AJAX.");

   return null;

   }

   }

   */



  function getHTTPObject() {

    var xmlhttp;



    if(window.XMLHttpRequest){

      xmlhttp = new XMLHttpRequest();

    }

    else if (window.ActiveXObject){

      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");

      if (!xmlhttp){

        xmlhttp=new ActiveXObject("Msxml2.XMLHTTP");

      }



    }

    return xmlhttp;





  }



  // Change the value of the outputText field

  function setOutput(){
    if(httpObject.readyState == 4){
      var results=httpObject.responseText;
//      console.log(results);
      if(!results.includes("Data has successfully entered. Must click Refresh before Preview")) {
        alert(results);
      }
      if(results.includes('Data has successfully entered. Must click Refresh before Preview'))
      {
        alert('Data has successfully entered. Must click Refresh before Preview');
        location.reload(true);
      }
//              document.getElementById('outputText').innerHTML = results;

    }



  }



  // Implement business logic    myoffid

  function doWork(){

    httpObject = getHTTPObject();



    if (vrfy(this)!= false) {



      if (httpObject != null) {

        httpObject.open("GET", "ereginfo_.php?slno="+document.getElementById('slno').value

            +'&selctshift='+document.getElementById('selctshift').value

            +'&studname='+document.getElementById('studname').value

            +'&fathername='+document.getElementById('fathername').value

            +'&mothername='+document.getElementById('mothername').value

            +'&classroll='+document.getElementById('classroll').value

            +'&studemail='+document.getElementById('studemail').value

            +'&orgfilename='+document.getElementById('orgfilename').value

            +'&filename='+document.getElementById('filename').value

            +'&brdateday='+document.getElementById('brdateday').value

            +'&brdatemonth='+document.getElementById('brdatemonth').value

            +'&brdateyear='+document.getElementById('brdateyear').value

            +'&gender='+document.getElementById('gender').value

            +'&selecttrade='+document.getElementById('selecttrade').value

            +'&religion='+document.getElementById('religion').value

            +'&medium='+document.getElementById('medium').value

            +'&selnation='+document.getElementById('selnation').value

            +'&sscboard='+document.getElementById('sscboard').value

            +'&sscyear='+document.getElementById('sscyear').value

            +'&sscroll='+document.getElementById('sscroll').value

            +'&sscresult='+document.getElementById('sscresult').value

            +'&sscgrade='+document.getElementById('sscgrade').value

            +'&jscboard='+document.getElementById('jscboard').value

            +'&jscyear='+document.getElementById('jscyear').value

            +'&jscroll='+document.getElementById('jscroll').value

            +'&jscresult='+document.getElementById('jscresult').value

            +'&jscgrade='+document.getElementById('jscgrade').value, true);

        //}

        httpObject.send(null);

        httpObject.onreadystatechange = setOutput;

      }

    }

  }





  var httpObject = null;

  var jsArray = new Array();
  var jsArrayCodeName = new Array();
  jsArray[0] = 80;
jsArrayCodeName[0] = "Computer Office Application";
jsArray[1] = 40;
jsArrayCodeName[1] = "Graphics Design and Multimedia Programming";

  function showSeat(tmp)
  {
    //console.log(tmp.selectedIndex-1);
    if(tmp.selectedIndex==0)
      document.getElementById("seatspan").innerHTML = "";
    else
      document.getElementById("seatspan").innerHTML = "Total Seat " + jsArray[tmp.selectedIndex-1] +" for Trade ("+jsArrayCodeName[tmp.selectedIndex-1]+")";

  }


  //-->

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

              <td align="left" >Year</td>

              <td >&nbsp;</td>

              <td align="left" ><input required="required" type="text" name="sscyear" size="6" id="sscyear"></td>

              <td>&nbsp;</td>

            </tr>

            <tr bordercolor="#eeeeee" bgcolor="#eeeeee">

              <td>&nbsp;</td>

              <td align="left">Roll</td>

              <td >&nbsp;</td>

              <td colspan="2" align="left" ><input required="required" type="text" name="sscroll" id="sscroll"></td>

              <td align="left" >Result</td>

              <td >&nbsp;</td>

              <td align="left" ><select name="sscresult" tabindex="8" id="sscresult">

                  <option value="gpa" selected> GPA </option>

                  <option value="div">DIV</option>

                </select>

                <input type="text" required="required" name="sscgrade" size="6" id="sscgrade"></td>

              <td>&nbsp;</td>

            </tr>
            <tr bordercolor="#eeeeee" bgcolor="#eeeeee">

              <td>&nbsp;</td>

              <td align="left">Registration Number</td>

              <td >&nbsp;</td>

              <td colspan="2" align="left" ><input required="required" type="text" name="sscregi" id="sscregi"></td>

              <td align="left" >&nbsp;</td>

              <td >&nbsp;</td>

              <td align="left" >&nbsp;</td>

              <td>&nbsp;</td>

            </tr>
            
            <tr>

              <td height="24">&nbsp;</td>

              <td colspan="8" align="left" valign="bottom"><span class="style1">------- Honours or Degree or Fazil or Equvalent Exam ---------------------------------------------------------------------------------</span><span class="style1">-------------------------</span></td>

            </tr>

            <tr bordercolor="#eeeeee" bgcolor="#eeeeee">

              <td>&nbsp;</td>

              <td align="left">Board/University</td>

              <td bgcolor="#eeeeee">&nbsp;</td>

              <td colspan="2" align="left" bgcolor="#eeeeee"><input type="text" name="jscboard" id="jscboard"></td>

              <td align="left" >Year</td>

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

              <td align="left" ><select name="jscresult" tabindex="8" id="jscresult">

                  <option value="gpa" selected> GPA </option>

                  <option value="div">DIV</option>

                </select>

                <input type="text" name="jscgrade" size="6" id="jscgrade"></td>

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
				  
			  <select name="ptype" tabindex="16" id="sscboard" required="required">

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