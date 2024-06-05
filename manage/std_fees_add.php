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
                <h5 class="card-header">Collect Student Fees</h5>
                <div class="card-body">  
        
                <form role="form" method="post" action="std_fees_save.php" enctype="multipart/form-data">
              <div class="row">
                <div class="col-md-12">
                <div class="form-group">
                <label>Trainee Name</label>
                    <select name="trainee_id" class="form-control select2" data-placeholder="Select a Trainee" style="width: 100%;" required>
                      <<?php
                                $i=1;
                                $sql = "SELECT * from std_list";
                                $result = $conn->query($sql);
                                while($row = $result->fetch_array())
                                { 
                                ?>
                                  	<option value="<?=$row['trainee_id'];?>"> <?=$row['trainee_id'];?> - <?=$row['s_name'];?></option>

                             <?php $i++; } ?>
                    </select>
                  </div><!-- /.form-group -->
            
                <div class="form-group">
                    <label>Payment Date</label>
                       <input name="payment_date" value="<?php echo date('d-m-Y'); ?>" class="form-control" style="width: 100%;">
                  </div><!-- /.form-group -->

                  <div class="form-group">
                    <label>Payment Method</label>
                                  <select name="payment_method" class="form-control select2" data-placeholder="Select a Trainee" style="width: 100%;">
                                  <option value="Cash"> Cash </option>
                                  <option value="Bkash"> Bkash </option>
                                  <option value="Rocket"> Rocket </option>
                                  <option value="Nagad"> Nagad </option>
                                  <option value="Bank"> Bank </option>
                                </select>
                  </div><!-- /.form-group -->
                  
                  <div class="form-group">
                    	<label>Transaction ID</label>
						<input name="payment_txn" class="form-control" style="width: 100%;" >
					</div><!-- /.form-group -->


                   	<div class="form-group">
                    	<label>Amount</label>
						<input name="payment_amount" class="form-control" style="width: 100%;" >
					</div><!-- /.form-group -->
					
					<div class="form-group">
                    	<label>Remarks</label>
						<textarea name="remarks" class="form-control" style="width: 100%;" ></textarea>
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