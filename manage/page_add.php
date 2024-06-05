<?php 
   session_start();
   include "db_conn.php";
   if (isset($_SESSION['username']) && isset($_SESSION['id'])) {   

    include("header.php");
    include("sidebar.php");

    $sqln = "select * from pages order by page_id desc limit 1";
    $resultn = mysqli_query($conn,$sqln);
    $row = mysqli_fetch_array($resultn);
    $last_id = $row['page_id'];
    if ($last_id == "")
    {
        $id = "1";
    }
    else
    {
        $id = substr($last_id,0, 7);
        $id = intval($id);
        $id = ($id + 1);
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
                <h5 class="card-header">Add New Page</h5>
                <div class="card-body">  
         <form role="form" method="post" action="page_save.php" enctype="multipart/form-data">
              <div class="row">
                <div class="col-md-12">
                <div class="form-group">
                    <label>ID</label>
                       <input name="page_id" readonly value="<?php echo $id; ?>" class="form-control" style="width: 100%;" >
                  </div><!-- /.form-group -->

                                 <div class="form-group">
                    <label>Page Title</label>
                       <input name="page_title" class="form-control" style="width: 100%;" required >
                  </div><!-- /.form-group -->


                                 <div class="form-group">
                    <label>Page Meta Text</label>
                       <input name="page_meta" class="form-control" style="width: 100%;"  >
                  </div><!-- /.form-group -->



           <div class="form-group">
                    <label>Content</label>
             <textarea name="editor" id="editor" >

            </textarea>
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ),{
          ckfinder:
          {
            uploadUrl: 'fileupload.php'
          }
        })
        .then(editor => {
          console.log(editor);
        })
        .catch( error => {
            console.error( error );
        });
</script>
                  </div><!-- /.form-group -->
            
 
                              <div class="form-group">
                    <label>Tag </label>
                       <input name="page_tag" placeholder="Separate with comma (,)" class="form-control" style="width: 100%;" >
                  </div><!-- /.form-group -->   
					
</div> <!-- /.col -->	
                <div class="col-md-12" align="center">
            		 <input id="submit" name="submit" type="submit" value="Save " class="btn btn-success btn-lg">
				</div>
             
              </div><!-- /.row -->
    </form>


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