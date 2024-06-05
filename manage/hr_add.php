<?php 
   session_start();
   include "db_conn.php";
   if (isset($_SESSION['username']) && isset($_SESSION['id'])) {   ?>

<?php include("header.php");
   include("sidebar.php");
   ?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Add New HR (Employee)</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">HR Entry</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

      <div class="row">
        <div class="col-lg-12">
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
			$('#hr_mobile').on('blur', function(){
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

  
       <!-- Main row -->
       <div class="row">
          <!-- Left col -->
          <section class="col-lg-7 connectedSortable">
             <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fa fa-user mr-1"></i>
                  Add Employee
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content p-0">
                
                <form role="form" method="post" action="hr_save.php" enctype="multipart/form-data">                 
                <div class="form-group row">
                    <label  class="col-sm-4 col-form-label">Employee Name</label>
                    <div class="col-sm-8">
                      <input name="hr_name" type="text" class="form-control" id="hr_name" placeholder="Employee Name">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label  class="col-sm-4 col-form-label"> Designation</label>
                    <div class="col-sm-8">
                      <input name="hr_designation" type="text" class="form-control" id="hr_designation" placeholder="Employee's Designation">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label  class="col-sm-4 col-form-label"> Mobile No</label>
                    <div class="col-sm-8">
                      <input name="hr_mobile" type="text" class="form-control" id="hr_mobile" placeholder="Employee Mobile No">
                    </div>
                    <div id="uname_result"></div>
                  </div>
                  <center><button type="submit" class="btn btn-primary">Register</button></center>
                  </form>

                </div>
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->

        
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->






  </div>
  <!-- /.content-wrapper -->


  
  <?php include('footer.php'); ?>

<?php }else{
	header("Location: index.php");
} ?>