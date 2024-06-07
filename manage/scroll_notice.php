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
                <h1 class="m-0"> </h1>
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
    </div>
    </div>

        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="card">
                <h5 class="card-header">Scroll Notice List</h5>
                <div class="card-body">  
                  <a href="scroll_notice_add.php"> <div  align="right" style="align-items: right; padding: 10px; margin: 10px;" class="btn btn-success"> Add new </div></a>
                    <table class="table table-bordered table-striped table-responsive" id="example1">
                              <thead>
                                 <tr>
                                    <th> SL NO </th>
                                    <th> Title</th>
                                    <th> Status</th>
                                    <th> Action </th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php
                                $i=1;
                                $sqls = "SELECT * from scroll_notice order by sn_id desc";
                                $results = $conn->query($sqls);
                                while($row = $results->fetch_array())
                                {
                                ?>
                                <tr>
                                  <td><?=$i;?></td>
                                  <td><?=$row['sn_title'];?></td>
                                  <td><?=$row['sn_status'];?></td>
                                  <td> <div class="btn-group">
                                  <a href="scroll_notice_edit.php?sn_id=<?=$row['sn_id'];?>" class="btn btn-primary">Edit</a> 
                                  <a href="scroll_notice_delete.php?sn_id=<?=$row['sn_id'];?>" class="btn btn-danger">Delete</a> 
                                </div>
                                  </td>
                             </tr>
                             <?php $i++; } ?>
                              </tbody>
                             
                           </table>
                    </div>
                </div>


                </div>
                </div>
            </div>

          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header --> 
      </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Page specific script -->

  
  <?php } else {
    header("Location: dashboard.php");
      	 } ?>

  
  <?php include('footer.php'); ?>

<?php } else{
	header("Location: index.php");
} ?>