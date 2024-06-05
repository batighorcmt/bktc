<?php 
   session_start();
   include "db_conn.php";
   if (isset($_SESSION['username']) && isset($_SESSION['id'])) {   

    include("header.php");
    include("sidebar.php");

    $txntype = "select * from branch order by br_id desc limit 1";
    $results = mysqli_query($conn,$txntype);
    $row = mysqli_fetch_array($results);
    $last_id = $row['br_id'];
    $br_name = $row['br_name'];
    if ($last_id == "")
    {
        $br_id = "1";
    }
    else
    {
        $br_id = substr($last_id,0, 5);
        $br_id = intval($br_id);
        $br_id = ($br_id + 1);
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
                <h5 class="card-header">Add New Branch</h5>
                <div class="card-body">  
         <form role="form" method="post" action="branch_save.php" enctype="multipart/form-data">
              <div class="row">
                <div class="col-md-12">
                <div class="form-group">
                    <label>Transaction Type ID</label>
                       <input name="br_id" readonly value="<?php echo $br_id; ?>" class="form-control" style="width: 100%;" >
                  </div><!-- /.form-group -->
            
                <div class="form-group">
                    <label>Branch Name</label>
                       <input name="br_name" class="form-control" style="width: 100%;" placeholder="Enter transaction type name" required >
                  </div><!-- /.form-group -->

                  <div class="form-group">
                    <label>Branch Address</label>
                       <input name="br_address" class="form-control" style="width: 100%;" placeholder="Enter transaction type name" required >
                  </div><!-- /.form-group -->

                  <div class="form-group">
                    <label>Branch Director</label>
                       <input name="br_dirname" class="form-control" style="width: 100%;" placeholder="Enter transaction type name" required >
                  </div><!-- /.form-group -->

                  <div class="form-group">
                    <label>Director Mobile</label>
                       <input name="br_dirmob" class="form-control" style="width: 100%;" placeholder="Enter transaction type name" required >
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
      <th scope="col">Branch ID</th>
      <th scope="col">Branch Name</th>
      <th scope="col">Address</th>
      <th scope="col">Director</th>
      <th scope="col">Mobile</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>

                                <?php
                                $i=1;
                                $sqlt = "SELECT * from branch order by br_id asc";
                                $resultt = $conn->query($sqlt);
                                while($row = $resultt->fetch_array())
                                { 
                                ?>



    <tr>
      <th scope="row"><?=$row['br_id'];?></th>
      <td><?=$row['br_name'];?></td>
      <td><?=$row['br_address'];?></td>
      <td><?=$row['br_dirname'];?></td>
      <td><?=$row['br_dirmob'];?></td>
      <td><?=$row['br_status'];?></td>
      <td> <a href="" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong"> Edit </a>   </td>
    </tr>

    <?php $i++; } ?>

  </tbody>
</table>

</div>

                </div>
                </div></div>

<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit Transaction Type</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        



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