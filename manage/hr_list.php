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

<div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <table class="table table-bordered table-striped" id="example1">
                              <thead>
                              <tr>
                                    <th> SL NO </th>
                                    <th> 
                                    	<div>HR ID</div>
                                    </th>
                                    <th> 
                                    	<div>HR Name</div>
                                    </th>
                                    <th> 
                                    	<div>Mobile</div>
                                    </th>
                                    <th> 
                                    	<div>Email</div> 
                                    </th>
                                  <th>
                                    	<div>Present Address</div>
                                  </th>
                                  <th>
                                    	<div>Photo</div>
                                  </th>
                                    <th> Action </th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php
                                $i=1;
                                $sql3 = "SELECT * from hr order by hr_id asc";
                                $result3 = $conn->query($sql3);
                                while($row = $result3->fetch_array())
                                { 
                                ?>
                                <tr>
                                  <td><?=$i; ?></td>
                                  <td><?=$row['hr_id'];?></td>
                                  <td><?=$row['hr_name'];?></td>
                                  <td><?=$row['hr_mobile'];?></td>
                                  <td><?=$row['hr_email'];?></td>
                                  <td><?=$row['hr_pre_add'];?></td>
                                  	<td>
                                  	    <div><img class="img-bordered-sm" height="100" width="80" src="img/trainee/<?=$row['hr_photo'];?>"></div>
                                  	</td>
                                  <td> <div class="btn-group">
                      <button type="button" class="btn btn-default btn-flat dropdown-toggle" data-toggle="dropdown">Action</button>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="trainee_edit.php?hr_id=<?=$row['hr_id'];?>">Edit</a></li>
                        <li><a href="#">Profile View </a></li>
						<li><a href="#">Print Profile</a></li>
            <li><a target="_blank" href="trainee_payment_info_print.php?trainee_id=<?=$row['hr_id'];?>">Payment History</a></li>
                        <li><a href="trainee_delete.php?hr_id=<?=$row['hr_id'];?>">Delete</a></li>
                      </ul>
                    </div></td>
                             </tr>
                             <?php $i++; } ?>
                              </tbody>
                              <tfoot>
                              <tr>
                                    <th> SL NO </th>
                                    <th> 
                                    	<div>HR ID</div>
                                    </th>
                                    <th> 
                                    	<div>HR Name</div>
                                    </th>
                                    <th> 
                                    	<div>Mobile</div>
                                    </th>
                                    <th> 
                                    	<div>Email</div> 
                                    </th>
                                  <th>
                                    	<div>Present Address</div>
                                  </th>
                                  <th>
                                    	<div>Photo</div>
                                  </th>
                                    <th> Action </th>
                                 </tr>
                              </tfoot>
                           </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

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