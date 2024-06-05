<?php 
   session_start();
   include "db_conn.php";
   if (isset($_SESSION['username']) && isset($_SESSION['id'])) {   

    include("header.php");
    include("sidebar.php");

    $txntype = "select * from txn_type order by txn_type_id desc limit 1";
    $results = mysqli_query($conn,$txntype);
    $row = mysqli_fetch_array($results);
    $last_id = $row['txn_type_id'];
    $txn_type_name = $row['txn_type_name'];
    if ($last_id == "")
    {
        $txn_type_id = "1";
    }
    else
    {
        $txn_type_id = substr($last_id,0, 5);
        $txn_type_id = intval($txn_type_id);
        $txn_type_id = ($txn_type_id + 1);
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
            <div class="col-lg-6 col-6">
                <div class="card">
                <h5 class="card-header">Add New Transaction Type</h5>
                <div class="card-body">  
         <form role="form" method="post" action="ins_txn_type_save.php" enctype="multipart/form-data">
              <div class="row">
                <div class="col-md-12">
                <div class="form-group">
                    <label>Transaction Type ID</label>
                       <input name="txn_type_id" readonly value="<?php echo $txn_type_id; ?>" class="form-control" style="width: 100%;" >
                  </div><!-- /.form-group -->
            
                <div class="form-group">
                    <label>Transaction Type Name</label>
                       <input name="txn_type_name" class="form-control" style="width: 100%;" placeholder="Enter transaction type name" required >
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
      <th scope="col">Transaction Type ID</th>
      <th scope="col">Transaction Type Name</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>

                                <?php
                                $i=1;
                                $sqlt = "SELECT * from txn_type order by txn_type_id asc";
                                $resultt = $conn->query($sqlt);
                                while($row = $resultt->fetch_array())
                                { 
                                ?>



    <tr>
      <th scope="row"><?=$row['txn_type_id'];?></th>
      <td><?=$row['txn_type_name'];?></td>
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


            <div class="col-lg-6 col-6">
                <div class="card">
                <h5 class="card-header">Add New Transaction Type</h5>
                <div class="card-body">  
         <form role="form" method="post" action="inst_txn_cat_save.php" enctype="multipart/form-data">
              <div class="row">
                <div class="col-md-12">
                <div class="form-group">
                    <label>Transaction Type ID</label>
                    <?php
                    $txn_type_query = "SELECT * FROM txn_type";
                    $txn_type_result = $conn->query($txn_type_query);
                    ?>
                    <select class="form-control" id="txn_type_id" name="txn_type_id" style="width: 100%;" >
            <option value="">Select Transaction Type</option>
            <?php
            while ($row = $txn_type_result->fetch_assoc()) {
                echo "<option value='" . $row['txn_type_id'] . "'>" . $row['txn_type_name'] . "</option>";
            }
            ?>
        </select>
                  </div><!-- /.form-group -->
            
                <div class="form-group">
                    <label>Transaction Categoty Name</label>
                       <input name="txn_cat_name" class="form-control" style="width: 100%;" placeholder="Enter transaction category name" required >
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
      <th scope="col">Transaction Type ID</th>
      <th scope="col">Transaction Type Name</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>

                                <?php
                                $i=1;
                                $txncat = "SELECT * from txn_type, txn_cat where txn_type.txn_type_id=txn_cat.txn_type_id  order by txn_cat.txn_type_id asc";
                                $resultcat = $conn->query($txncat);
                                while($rows = $resultcat->fetch_array())
                                { 
                                ?>



    <tr>
      <th scope="row"><?=$rows['txn_type_name'];?></th>
      <td><?=$rows['txn_cat_name'];?></td>
      <td> <a href="#"> Delete </a>   </td>
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
        </div><!-- /.content-header --> 
      </div><!-- /.container-fluid -->
        </section><!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php include('footer.php'); ?>

<?php }else{
	header("Location: index.php");
} ?>