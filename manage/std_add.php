<?php 
   session_start();
   include "db_conn.php";
   if (isset($_SESSION['username']) && isset($_SESSION['id'])) {   

    include("header.php");
    include("sidebar.php");

    $std = "select * from std_list order by trainee_id desc limit 1";
    $results = mysqli_query($conn,$std);
    $row = mysqli_fetch_array($results);
    $last_id = $row['trainee_id'];
    $std_name = $row['s_name'];
    $year = date('Y');
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


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0"></h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  
                </ol>
              </div><!-- /.col -->
            </div><!-- /.row -->
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


            <script>
		$(document).ready(function(){
			$('#mobile').on('blur', function(){
				var user_name = $(this).val().trim();
				if(user_name != ''){
					$.ajax({
						url: 'username_checker.php',
						type: 'post',
						data: {user_name: user_name},
						success: function(response){
							$('#uname_result').html(response);
						}
					});
				} else {
					$("#uname_result").html("");
				}
			});
		});
	</script>

        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="card">
                <h5 class="card-header">Add New Student</h5>
                <div class="card-body">  
         <form role="form" method="post" action="std_add_save.php" enctype="multipart/form-data">
              <div class="row">
                <div class="col-md-6">
                <div class="form-group">
                    <label>Trainee ID</label>
                       <input name="trainee_id" readonly value="<?php echo $trainee_id; ?>" class="form-control" style="width: 100%;" >
                  </div><!-- /.form-group -->
            
                <div class="form-group">
                    <label>Student Name</label>
                       <input name="s_name" class="form-control" style="width: 100%;" required >
                  </div><!-- /.form-group -->
                  
                   	<div class="form-group">
                    	<label>Father name</label>
						<input name="f_name" class="form-control" style="width: 100%;" >
					</div><!-- /.form-group -->
					
					<div class="form-group">
                    	<label>Mother name</label>
						<input name="m_name" class="form-control" style="width: 100%;" >
					</div><!-- /.form-group -->
					<div class="form-group">
                    	<label>Couple name (if need) </label>
						<input name="hw_name" class="form-control" style="width: 100%;" >
					</div><!-- /.form-group -->
					
                    <div class="form-group">
                    <label>Present Address</label>
                      <textarea name="present_add" class="form-control"  style="width: 100%;"></textarea>
                  </div><!-- /.form-group -->	

                  <div class="form-group">
                    <label>Permanent Address</label>
                      <textarea name="permanent_add" class="form-control"  style="width: 100%;"></textarea>
                  </div><!-- /.form-group -->	


					<div class="form-group">
                    	<label>Contact No</label>
						<input name="mobile" class="form-control" id="mobile" style="width: 100%;" required >
					</div><!-- /.form-group -->
                    <div id="uname_result"></div>
					<input type="text" name="admission_month" value="<?php echo date('F'); ?>-<?php echo date('Y'); ?>" />
          <input type="text" name="status" value="Admited" />
					<div class="form-group">
                    	
					</div><!-- /.form-group -->

          
			    </div><!-- /.col -->
                  <div class="col-md-6">
                  <div class="form-group">
                    <label>Course Name</label>
						<select name="course_name" class="form-control">
							<option value="Advanced Computer Course (1 Year)"> Advanced Computer (1 Year) </option>
              <option value="Advanced Fine and Arts Course (1 Year)"> Fine and Arts </option>
              <option value="Advanced B.P.ED Course (1 Year)">  B.P.ED </option>
              <option value="360 Hours Computer Office Application"> Computer Office Application </option>
              <option value="360 Hours Database Management"> Database Management </option>
					    </select>
                  </div><!-- /.form-group -->

                  <div class="form-group">
                    <label>Batch</label>
						<select name="batch" class="form-control">
							<option value="January-June"> January-June </option>
              <option value="July-December"> July-December </option>
					    </select>
                  </div><!-- /.form-group -->
                  
                  <div class="form-group">
                  <label>Year </label>
						<select name="year" class="form-control" required>
							<option value="2024"> 2024 </option>
							<option value="2025"> 2025 </option>
							<option value="2026"> 2026 </option>
					    </select>
                   	</div>
                  <!-- /.form-group -->

                  <div class="form-group">
                    <label>Shift </label>
						<select name="shift" class="form-control" required>
							<option value=""> Select One </option>
							<option value="9.00 AM"> 9.00 AM </option>
							<option value="10.00 AM"> 10.00 AM </option>
							<option value="11.00 AM"> 11.00 AM </option>
              <option value="12.00 PM"> 12.00 PM </option>
              <option value="01.00 PM"> 01.00 PM </option>
              <option value="03.00 PM"> 03.00 PM </option>
              <option value="04.00 PM"> 04.00 PM </option>
              <option value="05.00 PM"> 05.00 PM </option>
              <option value="Night Shift"> Night Shift </option>
					    </select>
                   	</div>
                  <!-- /.form-group -->
				  
				  <div class="form-group">
                    <label>Now Study Label </label>
                    <input name="study_label" class="form-control" style="width: 100%;">
				  </div><!-- /.form-group -->
				  
				  <div class="form-group">
                    <label>Contract Amount</label>
                    <input name="contract" class="form-control" style="width: 100%;" >
                  </div><!-- /.form-group -->
				  
				  <div class="form-group">
          <label>File Submited </label>
						<select name="file_submit" class="form-control" required>
							<option value=""> Select One </option>
							<option value="Yes"> Yes </option>
							<option value="No"> No </option>
						</select>
                  </div><!-- /.form-group -->
				  
				  <div class="form-group">
                    <label>Special Note</label>
                      <textarea name="note" class="form-control"  style="width: 100%;"></textarea>
                  </div><!-- /.form-group -->				  
                  <div class="form-group">
                    <label>Photo</label>
                      <input type="file" name="img" class="form-control" id="img"></input>
                  </div><!-- /.form-group -->	
</div> <!-- /.col -->	
                <div class="col-md-12" align="center">
            		 <input id="submit" name="submit" type="submit" value="Save Student Data" class="btn btn-success btn-lg">
				</div>
             
              </div><!-- /.row -->
    </form>


                </div>
                </div>
            </div>
        </div>
        </div><!-- /.container-fluid -->
        </div><!-- /.content-header --> 
      </div><!-- /.container-fluid -->
        </section><!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php include('footer.php'); ?>

<?php }else{
	header("Location: index.php");
} ?>