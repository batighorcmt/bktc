<?php 
   session_start();
   include "db_conn.php";
   if (isset($_SESSION['username']) && isset($_SESSION['id'])) {   

    include("header.php");
    include("sidebar.php");

    $txntype = "select * from session order by session_id desc limit 1";
    $results = mysqli_query($conn,$txntype);
    $row = mysqli_fetch_array($results);
    $last_id = $row['session_id'];
    $session_name = $row['session_name'];
    if ($last_id == "")
    {
        $session_id = "1";
    }
    else
    {
        $session_id = substr($last_id,0, 5);
        $session_id = intval($session_id);
        $session_id = ($session_id + 1);
    }
    
    
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
                <h5 class="card-header">Add New Session</h5>
                <div class="card-body">  
         <form role="form" method="post" action="session_save.php" enctype="multipart/form-data">
              <div class="row">
                <div class="col-md-12">
                <div class="form-group">
                    <label>Session ID</label>
                       <input name="trade_id" readonly value="<?php echo $session_id; ?>" class="form-control" style="width: 100%;" >
                  </div><!-- /.form-group -->
            
                  <div class="form-group">
                    <label>Session Name</label>
                       <input name="session_name" class="form-control" style="width: 100%;" placeholder="" required >
                  </div><!-- /.form-group -->

                  <div class="form-group">
                    <label>Session Year</label>
                       <input name="session_year" class="form-control" style="width: 100%;" placeholder="" required >
                  </div><!-- /.form-group -->
                  <div class="form-group">
                    <label>Session Duration</label>
                    <select name="session_dura" class="form-control" required >
                        <option value="1">01 Month</option>
                        <option value="3">03 Months</option>
                        <option value="6">06 Months</option>
                        <option value="12">12 Months</option>
                    </select>
                  </div><!-- /.form-group -->
                  <div class="form-group">
                    <label>Admission Open ?</label>
                    <select name="session_form" class="form-control" required >
                        <option value="Open">Open</option>
                        <option value="Close">Close</option>
                    </select>
                  </div><!-- /.form-group -->

        
</div> <!-- /.col -->	
                <div class="col-md-12" align="center">
            		 <input id="submit" name="submit" type="submit" value="Submit" class="btn btn-success btn-lg">
				</div>
             
              </div><!-- /.row -->
    </form>

    </br></br>


<div> 
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">#SL</th>
      <th scope="col">Session Name</th>
      <th scope="col">Session Year</th>
      <th scope="col">Session Duration</th>
      <th scope="col">Status</th>
      <th scope="col">Admission</th>
    </tr>
  </thead>
  <tbody>

                                <?php
                                $i=1;
                                $sqlt = "SELECT * from session order by session_id asc";
                                $resultt = $conn->query($sqlt);
                                while($row = $resultt->fetch_array())
                                { 
                                ?>



    <tr>
      <th scope="row"><?=$i;?></th>
      <td><?=$row['session_name'];?></td>
      <td><?=$row['session_year'];?></td>
      <td><?=$row['session_dura'];?></td>
      <td><?=$row['session_status'];?></td>
      <td><?=$row['session_form'];?></td>
      <td> <a href="" class="btn btn-primary" data-toggle="modal" data-target="#coureedit">Edit</a><a href="" class="btn btn-danger">Delete</a>   </td>
    </tr>

    <?php $i++; } ?>

  </tbody>
</table>

</div>

                </div>
                </div></div>

<!-- Modal -->
<div class="modal fade" id="coureedit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit Transaction Type</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
<p>Hello!</p>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
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