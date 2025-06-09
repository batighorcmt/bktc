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
                <h5 class="card-header">Student List</h5>
                <div class="card-body">  
                    <table class="table table-bordered table-striped table-responsive" id="example1">
                              <thead>
                                 <tr>
                                    <th> SL NO </th>
                                    <th> 
                                    	<div>Student Name</div>
                                    	<div>Application ID</div>
                                    </th>
                                    <th> 
                                    	<div>Mobile</div>
                                    	<div>Email</div> 
                                    </th>
                                   <th> 
                                   		<div>Course Name</div>
                                   </th>
                                   <th> <div>Batch</div>
                                   </th>
                                   <th> <div>Shift</div>
                                   </th>
                                   <th><div>Status</div></th>
                                   <th><div>Applied Date</div></th>
                                  <th>
                                    	<div>Photo</div>
                                  </th>
                                    <th> Action </th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php
                                $i=1;
                                $sqlt = "SELECT * from application WHERE app_status='Applied' order by app_id desc";
                                $resultt = $conn->query($sqlt);
                                while($row = $resultt->fetch_array())
                                { 
                                  $app_date = $row['app_date']
                                ?>
                                <tr>
                                  <td><?=$i;?></td>
                                  <td>
                                  	<div><strong><a href="applicant_profile.php?app_id=<?=$row['app_id'];?>"><?=$row['studname'];?></a></strong></div>
                                  	<div><?=$row['app_id'];?></div>
                                  </td>
                                  <td>
                                  	<div><strong><a href="tel:<?=$row['cnumber'];?>"><?=$row['cnumber'];?></a></strong></div>
                                  	<div><?=$row['studemail'];?></div>
                                  </td>
                                  <td>
									<div><?=$row['course'];?></div>
                                  	</td>
                                  <td><div>
                                    <?=$row['selecttrade'];?>
                                  </div></td>
                                  <td><div>
                                    <?=$row['ssession'];?>
                                  </div></td>
                                  <td><?=$row['saddress'];?></td>
                                  <td><?php echo date("d/m/Y",strtotime("$app_date")); ?></td>
                                  	<td>
                                  	    <div><img class="img-bordered-sm" height="100" width="80" src="../img/appliedstd/<?=$row['pic_file'];?>"></div>
                                  	</td>
                                  <td> <div class="btn-group">
                      <button type="button" class="btn btn-default btn-flat dropdown-toggle" data-toggle="dropdown">Action</button>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="std_admit.php?app_id=<?=$row['app_id'];?>">Admit</a></li>
                        <li><a href="../applicant_profile.php?app_id=<?=$row['app_id'];?>">Profile View </a></li>
                        <li><a href="#">Delete</a></li>
                      </ul>
                    </div></td>
                             </tr>
                             <?php $i++; } ?>
                              </tbody>
                              <tfoot>
                              	<tr>
                                    <th> SL NO </th>
                                    <th> 
                                      <div>Student Name</div>
                                      <div>Application ID</div>
                                    </th>
                                    <th> 
                                      <div>Mobile</div>
                                      <div>Email</div> 
                                    </th>
                                   <th> 
                                      <div>Course Name</div>
                                   </th>
                                   <th> <div>Batch</div>
                                   </th>
                                   <th> <div>Shift</div>
                                   </th>
                                   <th><div>Status</div></th>
                                  <th>
                                      <div>Photo</div>
                                  </th>
                                    <th> Action </th>
                                 </tr>
                              </tfoot>
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