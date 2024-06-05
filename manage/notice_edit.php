<?php 
   session_start();
   include "db_conn.php";
   if (isset($_SESSION['username']) && isset($_SESSION['id'])) {   

    include("header.php");
    include("sidebar.php");

    $notice_id = isset($_GET['notice_id']) ? intval($_GET['notice_id']) : null;
    $sqln = "select * from notice Where notice_id=$notice_id";
    $resultn = mysqli_query($conn,$sqln);
    $row = mysqli_fetch_array($resultn);
    $last_id = $row['notice_id'];
  
    
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



        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="card">
                <h5 class="card-header">Add New Notice</h5>
                <div class="card-body">  
         <form role="form" method="post" action="notice_edit_save.php" enctype="multipart/form-data">
              <div class="row">
                <div class="col-md-6">
                <div class="form-group">
                    <label>ID</label>
                       <input name="notice_id" readonly value="<?=$row['notice_id'];?>" class="form-control" style="width: 100%;" >
                  </div><!-- /.form-group -->
            
                <div class="form-group">
                    <label>Title</label>
                       <input name="notice_title" value="<?=$row['notice_title'];?>" class="form-control" style="width: 100%;" required >
                  </div><!-- /.form-group -->
                  
                   	<div class="form-group">
                    	<label>Text</label>
						<input name="notice_text" class="form-control" style="width: 100%;" >
					</div><!-- /.form-group -->
					
					
                  <div class="form-group">
                    <label>Status</label>
						<select name="notice_status" class="form-control">
              <option value="<?=$row['notice_status'];?>" selected><?=$row['notice_status'];?></option>
							<option value="Active"> Active </option>
              <option value="Inactive"> Inactive </option>
					    </select>
                  </div><!-- /.form-group -->

                                    <div class="form-group">
                    <label>Published Date</label>
            <input name="notice_date" class="date form-control" value="<?php echo date("d-m-Y"); ?> " style="width: 100%;" >
                  </div><!-- /.form-group -->
	  
                  <div class="form-group">
                    <label>File</label>
                      <input type="file" name="notice_file" class="form-control" id="notice"></input>
                  </div><!-- /.form-group -->	
</div> <!-- /.col -->	
                <div class="col-md-12" align="center">
            		 <input id="submit" name="submit" type="submit" value="Save " class="btn btn-success btn-lg">
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