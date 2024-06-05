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
                <h5 class="card-header">Notices</h5>
                <div class="card-body">  
                  <a href="syllabus_add.php"> <div  align="right" style="align-items: right; padding: 10px; margin: 10px;" class="btn btn-success"> Add new Syllabus</div></a>
                    <table class="table table-bordered table-striped table-responsive" id="example1">
                              <thead>
                                 <tr>
                                    <th> SL NO </th>
                                    <th> Course Name</th>
                                    <th>Syllabus Title</th>
                                    <th> Status</th>
                                    <th>File</th>
                                    <th> Action </th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php
                                $i=1;
                                $sqln = "SELECT * from syllabus order by sly_id desc";
                                $resultn = $conn->query($sqln);
                                while($row = $resultn->fetch_array())
                                {
                                ?>
                                <tr>
                                  <td><?=$i;?></td>
                                  <td><?=$row['sly_course'];?></td>
                                  <td><?=$row['sly_title'];?></td>
                                  <td><?=$row['sly_status'];?></td>
                                  <td><div><a href="../syllabus/<?=$row['sly_file'];?>">View File</a></div></td>
                                  <td> <div class="btn-group">
                      <button type="button" class="btn btn-default btn-flat dropdown-toggle" data-toggle="dropdown">Action</button>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="syllabus_edit.php?sly_id=<?=$row['sly_id'];?>">Edit</a></li>
                        
                        <li><a href="syllabus_delete.php?sly_id=<?=$row['sly_id'];?>">Delete</a></li>
                      </ul>
                    </div></td>
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