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
                                    </th>
                                    <th>Trainee ID</th>
                                    <th> 
                                    	<div>Mobile</div>
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
                                    	<div>Payment Amount</div>
                                  </th>
=
                                    <th> Action </th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php
                                $i=1;
                                $sqlt = "SELECT * from admited_student as ads, application as app, trainee_payment as tp WHERE ads.app_id=app.app_id and ads.trainee_id=tp.trainee_id and ads.trainee_id='$_GET[trainee_id]'";
                                $resultt = $conn->query($sqlt);
                                while($row = $resultt->fetch_array())
                                { 
                                ?>
                                <tr>
                                  <td><?=$i;?></td>
                                  <td>
                                  	<div><strong><a href="std_payslip.php?trainee_id=<?=$row['trainee_id'];?>"><?=$row['studname'];?></a></strong></div>
                                  	<div> </div>
                                  </td>
                                  <td><?=$row['trainee_id'];?></td>
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
                                  	<td>
                                  	    <div><?=$row['payment_amount'];?></div>
                                  	</td>

                                  <td> <div class="btn-group">
                      <button type="button" class="btn btn-default btn-flat dropdown-toggle" data-toggle="dropdown">Action</button>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="trainee_edit.php?trainee_id=<?=$row['trainee_id'];?>">Edit</a></li>
            <li><a target="_blank" href="std_payslip.php?trainee_id=<?=$row['trainee_id'];?>">Payment History</a></li>
                        <li><a href="std_fees_delete.php?trainee_id=<?=$row['trainee_id'];?>">Delete</a></li>
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
                                    </th>
                                    <th>Trainee ID</th>
                                    <th> 
                                    	<div>Mobile</div>
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
                                    	<div>Payment Amount</div>
                                  </th>
=
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