<?php 
   session_start();
   include "db_conn.php";
   if (isset($_SESSION['username']) && isset($_SESSION['id'])) {   ?>
<?php include('header.php'); ?>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <?php if ($_SESSION['role'] == 'admin') {?>
              <!-- For Admin -->

      <?php include('sidebar.php'); ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0">Institute Setup</h1>
              </div><!-- /.col -->
            </div><!-- /.row -->    

  <div class="row">
    <div class="col-lg-12 col-12">

    <?php if (isset($_GET['update'])) { ?>
      	      <div class="success alert-success" role="alert">
				  <?=$_GET['update']?>
			  </div>

			  <?php } elseif (isset($_GET['error'])) { ?>
       <div class="danger alert-danger" role="alert">
      <?=$_GET['error']?>
      </div>
      <?php } else {

      }
       ?>
<?php
    $sql1 = "SELECT * from inst_data WHERE inst_id = 1";
	$result1 = $conn->query($sql1);
	while($rows = $result1->fetch_assoc())
	{

?>



    <form role="form" method="post" action="inst_setup_update.php" enctype="multipart/form-data">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Institute Name</label>
      <input type="text" name="inst_name" class="form-control" id="inst_name" placeholder="Institute Name" value="<?=$rows['inst_name'];?>">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Established Year</label>
      <input type="text" name="inst_estd" class="form-control" id="inst_estd" placeholder="Established Year" value="<?=$rows['inst_estd'];?>">
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Address 1</label>
    <input type="text" name="inst_add" class="form-control" id="inst_add" placeholder="Address referece like Infront of Sonali Bank PLC." value="<?=$rows['inst_add'];?>">
  </div>
  <div class="form-group">
    <label for="inputAddress2">Address 2</label>
    <input type="text" name="inst_address" class="form-control" id="inst_address" placeholder="Main Address like, Gangni, Meherpur" value="<?=$rows['inst_address'];?>">
  </div>
  
<?php
  }
  ?>

  <center><button type="submit" class="btn btn-primary">Update</button></center>
</form>

    </div><!-- /.col -->          
  </div><!-- /.row -->












          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header --> 
      </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  
  <?php }else {
    header("Location: dashboard.php");
      	 } ?>

  
  <?php include('footer.php'); ?>

<?php }else{
	header("Location: index.php");
} ?>