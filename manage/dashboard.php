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
                <h1 class="m-0">Dashboard</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Dashboard</li>
                </ol>
              </div><!-- /.col -->
            </div><!-- /.row -->


            <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
            <?php 
            $std    = "SELECT * FROM admited_student as ads, application as app where ads.app_id=app.app_id and ads.status='Admited'";
            $stdresult = $conn->query($std);
            $stdcount  = mysqli_num_rows($stdresult);
            ?>
              <div class="inner">
                <h3> <?php echo $stdcount;?> </h3>

                <p>Runing Students</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="std_list.php" class="small-box-footer">Student List <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
            <?php 
            $hr    = "SELECT * FROM hr";
            $hrresult = $conn->query($hr);
            $hrcount  = mysqli_num_rows($hrresult);
            ?>
              <div class="inner">
                <h3> <?php echo $hrcount;?>  </h3>

                <p>Employees</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="hr_list.php" class="small-box-footer">Employees <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
            <?php 
            $app    = "SELECT * FROM application where app_status='Applied'";
            $appresult = $conn->query($app);
            $appcount  = mysqli_num_rows($appresult);
            ?>
              <div class="inner">
                <h3> <?php echo $appcount;?> </h3>

                <p>Applied Students</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
            <?php 
            $s    = "SELECT * FROM admited_student where status='Completed'";
            $sresult = $conn->query($s);
            $scount  = mysqli_num_rows($sresult);
            ?>
              <div class="inner">
                <h3><?php echo $scount;?></h3>

                <p>Course Completed</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->




        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-7 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-chart-pie mr-1"></i>
                  Students
                </h3>
                <div class="card-tools">
                  <ul class="nav nav-pills ml-auto">
                    <li class="nav-item">
                      <a class="nav-link active" href="#revenue-chart" data-toggle="tab">Area</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#sales-chart" data-toggle="tab">Donut</a>
                    </li>
                  </ul>
                </div>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content p-0">
                  <!-- Morris chart - Sales -->
                  <div class="chart tab-pane active" id="revenue-chart"
                       style="position: relative; height: 300px;">
                      <canvas id="revenue-chart-canvas" height="300" style="height: 300px;"></canvas>
                   </div>
                  <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">
                    <canvas id="sales-chart-canvas" height="300" style="height: 300px;"></canvas>
                  </div>
                </div>
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->












          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header --> 
      </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



  <?php } elseif ($_SESSION['role'] == 'manager') {?>
    <?php include('mangerfiles/managersidebar.php'); ?>
    
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">

          <?php
          $username = ($_SESSION['username']);
          $sql = "select * from users, hr where users.user_id=hr.hr_id AND users.username=$username";
          $result = $conn->query($sql);
          while($rows = $result->fetch_assoc())
          {

            ?>
    <div class="card" style="width: 18rem;">

        <div> User Name: <?=$rows['name'];?>  </div>
        <div> User Designation: <?=$rows['hr_designation'];?> </div>
        <div> User Mobile No: <?=$rows['hr_mobile'];?> </div>


			    <a href="logout.php" class="btn btn-dark">Logout</a>
			  </div>
        
        <?php 
          }
        ?>



          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header --> 
      </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  
  <?php }else { ?>
      		<!-- FORE USERS -->
          <?php include('userfiles/usersidebar.php');
           ?>
    
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">

          <?php
          $username = ($_SESSION['username']);
          $sql = "select * from users, std_list where users.user_id=std_list.trainee_id AND users.username=$username";
          $result = $conn->query($sql);
          while($rows = $result->fetch_assoc())
          {

            ?>
    <div class="card" style="width: 18rem;">

        <div> User Name: <?=$rows['s_name'];?>  </div>
        <div> User Batch: <?=$rows['batch'];?> </div>
        <div> User Mobile No: <?=$rows['mobile'];?> </div>


			    <a href="logout.php" class="btn btn-dark">Logout</a>
			  </div>
        
        <?php 
          }
        ?>



          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header --> 
      </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
      	<?php } ?>
      </div>
  
  <?php include('footer.php'); ?>

<?php }else{
	header("Location: index.php");
} ?>