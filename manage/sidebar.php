
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
      <img src="../site_images/bktc_logo.png" alt="BKTC Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">BKTC Admin Panel</span>
    </a>
    
  <!-- Sidebar -->
<div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/<?=$_SESSION['user_photo']?>" class="img-circle elevation-2" alt="<?=$_SESSION['name']?>'s Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?=$_SESSION['name']?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="dashboard.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard</p>
                </a>
              </li>
                </a>
              </li>
            </ul>
          </li>
          
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p style="color:yellow";>
                Institute Management
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="inst_setup.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Institute Setup</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="inst_txn_setup.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Transaction Setup</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="branch_add.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Branch Setup</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="trade_add.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Trade Setup</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="course_add.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Course Setup</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p style="color:yellow";>
                HR Management
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="hr_add.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Employee</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="hr_list.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>HR List</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p style="color:yellow";>
                Student Management
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="std_add.php" class="nav-link">
                  <i class="far fa-user nav-icon"></i>
                  <p>Add New Student</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="std_list.php" class="nav-link">
                  <i class="fa fa-list-ol nav-icon"></i>
                  <p>Student List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="std_query.php" class="nav-link">
                  <i class="fa fa-print nav-icon"></i>
                  <p>Print Student List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="std_fees_add.php" class="nav-link">
                  <i class="fa fa-edit nav-icon"></i>
                  <p>Student's Fees Colection</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="std_fees_list.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Received Student Fees</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="std_report_print.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Student Report Print</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="std_applications.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Received Applications</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p style="color:yellow";>
                Financial Management
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="fin_txn_add.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Income/Expences</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="fin_report.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Financial Report</p>
                </a>
              </li>
            </ul>

            <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p style="color:yellow";>
                Website Management
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="slider_list.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Slider</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="scroll_notice.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Scroll Notice</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="notice_list.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Notice Board</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="syllabus_list.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Syllabus</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="download_list.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Downloads</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="gallary_photo.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Gallary</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="page_list.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Webpage List</p>
                </a>
              </li>
            </ul>

            <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p style="color:yellow";>
                User Management
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="user_profile.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Profile</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="logout.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                  <p>Logout</p>
                </a>
              </li>
            </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
