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
                <h5 class="card-header">Student List (Short Course)</h5>
                <div class="card-body">  
                    <table class="table table-bordered table-striped table-responsive" id="example1">
                              <thead>
                                 <tr>
                                    <th> SL NO </th>
                                    <th> 
                                    	<div>Student Name</div>
                                    	<div>Trainee ID</div>
                                    </th>
                                    <th> 
                                    	<div>Mobile</div>
                                    	<div>Email</div> 
                                    </th>
                                   <th> 
                                   		<div>Course Name</div>
                                   </th>
                                   <th> <div>Session</div>
                                   </th>
                                   <th> <div>Shift</div>
                                   </th>
                                   <th><div>Status</div></th>
                                   <th>
                                    	<div>Address</div>
                                  </th>
                                  <th>
                                    	<div>Course Type</div>
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
                                $sqlt = "SELECT * from application as app, admited_student as ads where app.app_id=ads.app_id and ads.status='admited' and app.course_type='short' order by trainee_id asc";
                                $resultt = $conn->query($sqlt);
                                while($row = $resultt->fetch_array())
                                { 
                                ?>
                                <tr>
                                  <td><?=$i;?></td>
                                  <td>
                                  	<div><strong><a href="trainee_profile.php?trainee_id=<?=$row['trainee_id'];?>"><?=$row['studname'];?></a></strong></div>
                                  	<div><?=$row['trainee_id'];?></div>
                                  </td>
                                  <td>
                                  	<div><strong><a href="tel:<?=$row['cnumber'];?>"><?=$row['cnumber'];?></a></strong></div>
                                  	<div><?=$row['studemail'];?></div>
                                  </td>
                                  <td>
									<div><?=$row['course'];?></div>
                                  	</td>
                                  <td><div>
                                    <?=$row['ssession'];?>
                                  </div></td>
                                  <td><div>
                                    <?=$row['shift'];?>
                                  </div></td>
                                  <td><div>
                                    <?=$row['status'];?>
                                  </div></td>
                                  <th>
                                    	<div><?=$row['course_type'];?></div>
                                  </th>
                                  	<td>
                                  	    <div><?=$row['saddress'];?></div>
                                  	</td>
                                  	<td>
                                  	    <div><img class="img-bordered-sm" height="100" width="80" src="../img/appliedstd/<?=$row['pic_file'];?>"></div>
                                  	</td>
                                  <td> <div class="btn-group">
                      <button type="button" class="btn btn-default btn-flat dropdown-toggle" data-toggle="dropdown">Action</button>
                      <ul class="dropdown-menu" role="menu">
                        <li><a target="_blank"href="trainee_edit.php?trainee_id=<?=$row['trainee_id'];?>">Edit</a></li>
                        <li><a href="#">Profile View </a></li>
						<li><a target="_blank"href="applicant_profile.php?trainee_id=<?=$row['trainee_id'];?>">Print Profile</a></li>
            <li><a target="_blank" href="std_payslip.php?trainee_id=<?=$row['trainee_id'];?>">Payment History</a></li>
                        <li><a href="std_delete.php?trainee_id=<?=$row['trainee_id'];?>">Delete</a></li>
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
                                    	<div>Trainee ID</div>
                                    </th>
                                    <th> 
                                    	<div>Mobile</div>
                                    	<div>Email</div> 
                                    </th>
                                   <th> 
                                   		<div>Course Name</div>
                                   </th>
                                   <th> <div>Session</div>
                                   </th>
                                   <th> <div>Shift</div>
                                   </th>
                                   <th><div>Status</div></th>
                                   <th>
                                    	<div>Address</div>
                                  </th>
                                  <th>
                                    	<div>Course Type</div>
                                  </th>
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