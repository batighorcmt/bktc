<?php 
   session_start();
   include "db_conn.php";
   if (isset($_SESSION['username']) && isset($_SESSION['id'])) {   

    include("header.php");
?>
<!-- Select2 -->
<link rel="stylesheet" href="plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

<?php    include("sidebar.php");    ?>


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
                                $sql = "SELECT * FROM admited_student as ads, application as app where ads.app_id=app.app_id and ads.status='Admited'";
                                $result = $conn->query($sql);
                                while($row = $result->fetch_array())
                                { 
                                ?>
                                  	<option value="<?=$row['trainee_id'];?>"> <?=$row['trainee_id'];?> - <?=$row['studname'];?></option>

                             <?php $i++; } ?>
                    </select>
                  </div><!-- /.form-group -->
            
                <div class="form-group">
                    <label>Payment Date</label>
                       <input name="payment_date" value="<?php echo date('Y-m-d'); ?>" class="form-control" style="width: 100%;">
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