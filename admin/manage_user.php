<?php 
session_start();
if($_SESSION["session_user"]!="" && $_SESSION["user_type"]=="admin" ){
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>ระบบตั้งกระทุ้</title>
  <!-- Bootstrap core CSS-->
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="../css/sb-admin.css" rel="stylesheet">
  <script type="text/javascript">
	function delete_user(id){
		/*if(confirm('ยืนยันการลบข้อมูล?')){
		window.location.href='delete_user.php?user_login='+id;
		}*/
		alert('gfgdfgfd');
	}
	
  </script>
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.html">Start Bootstrap</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="index.php">
            <i class="fa fa-fw fa-book" ></i>
            <span class="nav-link-text">จัดการกระทู้</span>
          </a>
        </li>
        <li class="nav-item active" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="manage_user.php">
            <i class="fa fa-fw fa-users" ></i>
            <span class="nav-link-text">จัดการ user</span>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
		<li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-users"></i><?php echo $_SESSION["session_user"];?></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">จัดการกระทู้</li>
      </ol>
     
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i>กระทู้</div>
        <div class="card-body">
          <div class="table-responsive">
          <div><a href="formAdd_user.php"><img src="../img/add.png" width="36" height="35"> เพิ่มuser</a></div>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>ลำดับ</th>
                  <th>user_login</th>
                  <th>ชื่อ-นามสกุล</th>
                  <th>สิทธิ์</th>
                  <th>สถานะ</th>
                  <th>จัดการ</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>ลำดับ</th>
                  <th>user_login</th>
                  <th>ชื่อ-นามสกุล</th>
                  <th>สิทธิ์</th>
                  <th>สถานะ</th>
                  <th>จัดการ</th>
                </tr>
              </tfoot>
              <tbody>
              <?php 
			  include("../conf/config.php");
			  $strSQL = "SELECT user_login,user_fullname,user_type_name,user_status FROM users us inner join user_type ut on us.user_type_id = ut.user_type_id ";
		//echo $strSQL;
	$objQuery = mysqli_query($con,$strSQL);
    $Num_Rows = mysqli_num_rows($objQuery);
	$i=0;
	if($Num_Rows==0){
	?>
    <tr>
    	<td colspan="8" align="center"><font color="red">ไม่พบข้อมูล</font></td>
    </tr>
	<?php
	}else{
			while ($Result = mysqli_fetch_array($objQuery)) {
			$i++;
			$user_login = $Result["user_login"];
			$user_fullname = $Result["user_fullname"];
			$user_type_name = $Result["user_type_name"];
			$status = $Result["user_status"];
			  ?>
                <tr>
                  <td><?php echo $i;?></td>
				  <td><?php echo $user_login;?></td>
                  <td><?php echo $user_fullname;?></td>
                  <td><?php echo $user_type_name;?></td>
                  <td><?php if($status==0){
					  echo "<font color=red>ยกเลิก</font>";
					  }else{ echo "ปกติ";}?></td>
                  <td>
                  <?php if($status==1){?>
                  <a href="javascript:delete_user(<?php echo $user_login; ?>)"><img src="../img/Delete_Icon.png" width="30"></a>
				  <?php }else{?>
                  <img src="../img/Delete_Icon.png" width="30">
				  <?php } ?></td>
                </tr>
                <?php } 
	} ?>

              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © Your Website 2018</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="../logout.php">Logout</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="../vendor/chart.js/Chart.min.js"></script>
    <script src="../vendor/datatables/jquery.dataTables.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="../js/sb-admin-datatables.min.js"></script>
    <script src="../js/sb-admin-charts.min.js"></script>
  </div>
</body>

</html>
<?php 
}else{
header( "location: ../logout.php" );	
}

?>
