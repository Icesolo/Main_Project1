<?php 
  session_start();
  
  if(!isset($_SESSION["UserID"])){
    header('Location: ../Login/index.php');
  }
  //กำหนดเวลาที่สามารถอยู่ในระบบ
  // $sessionlifetime = 60; //กำหนดเป็นนาที
 
  //   if(isset($_SESSION["timeLasetdActive"])){
	//     $seclogin = (time()-$_SESSION["timeLasetdActive"])/60;
	//     //หากไม่ได้ Active ในเวลาที่กำหนด
	//   if($seclogin>$sessionlifetime){
	// 	  //goto logout page
	// 	  header("location: ../Login/logoutForSes.php");
	// 	exit;
	//   }else{
	// 	  $_SESSION["timeLasetdActive"] = time();
	//   }
  // }else{
	//   $_SESSION["timeLasetdActive"] = time();
  // }
  //
?>  
<!DOCTYPE html>
<html>
  
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link href="https://fonts.googleapis.com/css?family=Kanit&display=swap" rel="stylesheet">
  
  <title>AdminLTE 3 | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="../plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="../plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="../plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker-bs3.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="icon" type="image/png" href="../dist/img/206-2067143_no-wait-emergency-room-medical-bed-icon.png" >
</head>
<body class="hold-transition sidebar-mini">
<?php
$serverName = "localhost";
$userName = "root";
$userPassword = "itcmtc2019";
$dbName = "user_login";
$dbName1 = "post";
$dbName2 = "file-management";
$dbName3 = "treatment";

$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
$conn1 = mysqli_connect($serverName,$userName,$userPassword,$dbName1);
$conn2 = mysqli_connect($serverName,$userName,$userPassword,$dbName2);
$conn3 = mysqli_connect($serverName,$userName,$userPassword,$dbName3);

mysqli_set_charset($conn,"utf8");
$sql = "SELECT * FROM user WHERE Userlevel IN ('02', '03') ";
$query = mysqli_query($conn,$sql);
$num_rows = mysqli_num_rows($query);

$date = date("d/m/Y");
mysqli_set_charset($conn,"utf8");
$sql1 = "SELECT * FROM login_date WHERE `Lastdate`='$date'";
$query1 = mysqli_query($conn,$sql1);
$num_rows1 = mysqli_num_rows($query1);

mysqli_set_charset($conn,"utf8");
$sql2 = "SELECT * FROM allpost";
$query2 = mysqli_query($conn1,$sql2);
$num_rows2 = mysqli_num_rows($query2);

mysqli_set_charset($conn,"utf8");
$sql3 = "SELECT * FROM `files`";
$query3 = mysqli_query($conn2,$sql3);
$num_rows3 = mysqli_num_rows($query3);

$sql4 = "SELECT * FROM `user` WHERE Userlevel IN ('01')";
$query4 = mysqli_query($conn,$sql4);
$num_rows4 = mysqli_num_rows($query4);

$sql5 = "SELECT * FROM `tb_med`";
$query5 = mysqli_query($conn3,$sql5);
$num_rows5 = mysqli_num_rows($query5);

$sql6 = "SELECT * FROM `tb_treatment`";
$query6 = mysqli_query($conn3,$sql6);
$num_rows6 = mysqli_num_rows($query6);
?>
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
      <a href="#" class="nav-link"><i class="ion-ios-home"></i> หน้าแรก</a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li>
      <?php
        echo '<a href="../Login/logout.php"><i class="fa fa-indent"></i> ออกจากระบบ</a> ';
      ?>
      </li>
      <!-- Notifications Dropdown Menu -->
      
    </ul>

  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">สำหรับเจ้าหน้าที่</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <?php
            $id = $_SESSION['User'];
            mysqli_set_charset($conn,"utf8");
            $sqlimg="SELECT `profile` FROM `user` WHERE `Username` = '$id' ";
            $query1 = mysqli_query($conn,$sqlimg);
            while($result=mysqli_fetch_array($query1)){
          ?>
          <img src="./authorities/profile/<?php echo $result["profile"]?>" class="img-circle elevation-2" alt="User Image" style="width:40px;height:40px;">
          <?php 
            }
          ?>
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION["name"]?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2" style="font-family: 'Kanit', sans-serif;">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-header">รายชื่อ ลงชื่อเข้าใช้ เวชภัณฑ์ ยา</li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-users"></i>
              <p>
                รายชื่อสมาชิก
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./page/alluser.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>รายชื่อสมาชิกทั้งหมด</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./page/user02.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>นักเรียน นักศึกษา</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./page/user03.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>ครู บุคลากร</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-table"></i>
              <p>
                การลงชื่อเข้าใช้
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./page/login_date.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>การลงชื่อเข้าใช้ประจำวัน</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./page/logindate_menu.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>การลงชื่อเข้าใช้ทั้งหมด</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-medkit"></i>
              <p>
              ข้อมูลเวชภัณฑ์ ยา
              
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./treatment/treatment_list.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>ข้อมูลทั้งหมด</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./treatment/treatment_frm.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>เพิ่มข้อมูลเวชภัณฑ์ยา</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header">ประวัติการรักษา</li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-book"></i>
              <p>
                ประวัติการรักษา
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./treatment/treatment.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>เพิ่มข้อมูลประวัติการรักษา</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./treatment/treatment_list1.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>ประวัติการรักษาทั้งหมด</p>
                </a>
              </li>
              </ul>
            </li>
          <li class="nav-header">ข่าวประชาสัมพันธ์</li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-book"></i>
              <p>
                ข่าวประชาสัมพันธ์
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./page/addpost.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>เพิ่มข่าวประชาสัมพันธ์</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./page/allpost.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>ข่าวประชาสัมพันธ์ทั้งหมด</p>
                </a>
              </li>
              </ul>
            </li>
            <li class="nav-header">เอกสารสำหรับดาวน์โหลด</li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
              <i class="nav-icon fa fa-file"></i>
              <p>
                เอกสารดาวน์โหลด
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./page/upload_download/upload.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>เพิ่มเอกสารดาวน์โหลด</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./page/upload_download/download.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>เอกสารดาวน์โหลดทั้งหมด</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header">สำหรับเจ้าหน้าที่</li>
          <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
              <i class="fa fa-user-md" aria-hidden="true"></i>
              <p>
                ข้อมูลเจ้าหน้าที่
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./authorities/add_authorities.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>เพิ่มข้อมูลเจ้าหน้าที่</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./authorities/list_authorities.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>รายชื่อเจ้าหน้าที่</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">ระบบริหารจัดการ</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">ระบบริหารจัดการ</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $num_rows1 ?> คน</h3>

                <p>การลงชื่อเข้าใช้ประจำวัน</p>
              </div>
              <div class="icon">
              <i class="ion-ios-calendar"></i>
              </div>
              <a href="./page/login_date.php" class="small-box-footer">ข้อมูลเพิ่มเติม <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $num_rows5 ?> รายการ<sup style="font-size: 20px"></sup></h3>

                <p>ข้อมูลเวชภัณฑ์ ยา และอุปกรณ์ทางการแพทย์</p>
              </div>
              <div class="icon">
                <i class="ion ion-ios-medkit"></i>
              </div>
              <a href="./treatment/treatment_list.php" class="small-box-footer">ข้อมูลเพิ่มเติม <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $num_rows ?> คน</h3>
                <p>สมาชิกทั้งหมด</p>
              </div>
              <div class="icon">
                <i class="ion-ios-people"></i>
              </div>
              <a href="./page/alluser.php" class="small-box-footer">ข้อมูลเพิ่มเติม <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo $num_rows4 ?> คน</h3>

                <p>เจ้าหน้าที่ประจำ</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="./authorities/list_authorities.php" class="small-box-footer">ข้อมูลเพิ่มเติม <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <div class="row" >
          <div class="col-lg-3 col-6" >
            <div class="small-box" style="background-color:#1229FE;color:white;">
              <div class="inner">
                <h3><?php echo $num_rows6 ?> รายการ</h3>
                <p>ประวัติการรักษา</p>
              </div>
              <div class="icon">
              <i class="ion-ios-pulse"></i>
              </div>
              <a href="./treatment/treatment_list1.php" class="small-box-footer">ข้อมูลเพิ่มเติม <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6" >
            <!-- small box -->
            <div class="small-box" style="color:white;background-color:#FE9A17;">
              <div class="inner">
                <h3><?php echo $num_rows2 ?> โพสต์</h3>

                <p>ข่าวประชาสัมพันธ์ทั้งหมด</p>
              </div>
              <div class="icon">
              <i class="ion-ios-paper"></i>
              </div>
              <a href="./page/allpost.php" class="small-box-footer">ข้อมูลเพิ่มเติม <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6" >
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <h3><?php echo $num_rows3 ?> เอกสาร</h3>

                <p>เอกสารดาวน์โหลดทั้งหมด</p>
              </div>
              <div class="icon">
              <i class="ion-ios-download"></i>
              </div>
              <a href="./page/upload_download/download.php" class="small-box-footer">ข้อมูลเพิ่มเติม <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
                 
            
          
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2018 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.0-alpha
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="../plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="../plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="../plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="../plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="../plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
</body>
</html>
