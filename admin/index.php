<?php 
session_start();
error_reporting(~E_NOTICE);
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
	function delete_forum(id){
		if(confirm('ยืนยันการลบข้อมูล?')){
		window.location.href='delete_forum.php?QuestionID='+id;
		}
	}
	function view_forum(id){
		window.location.href='viewForum.php?QuestionID='+id;
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
        <li class="nav-item active" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="index.php">
            <i class="fa fa-fw fa-book" ></i>
            <span class="nav-link-text">จัดการกระทู้</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
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
          <div><a href="formAdd_forum.php"><img src="../img/add.png" width="36" height="35"> เพิ่มกระทู้</a></div>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>ลำดับ</th>
                  <th>ชื่อกระทู้</th>
                  <th>อ่าน/ตอบ</th>
                  <th>หมวดหมู่</th>
                  <th>สร้างโดย</th>
                  <th>วันที่สร้าง</th>
                  <th>สถานะ</th>
                  <th>จัดการ</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>ลำดับ</th>
                  <th>ชื่อกระทู้</th>
                  <th>อ่าน/ตอบ</th>
                  <th>หมวดหมู่</th>
                  <th>สร้างโดย</th>
                  <th>วันที่สร้าง</th>
                  <th>สถานะ</th>
                  <th>จัดการ</th>
                </tr>
              </tfoot>
              <tbody>
              <?php 
			  include("../conf/config.php");
			  $strSQL = "SELECT w.QuestionID,w.Question,concat(w.View,'/',w.Reply) as viewReply ,c.cate_name,w.ip_address,w.Name ,date_format(w.CreateDate,'%d-%M-%Y %H:%i:%S') as CreateDate,w.status FROM webboard w inner join category c on w.cate_id = c.cate_id  order by w.CreateDate desc ";
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
			$QuestionID = $Result["QuestionID"];
			$status = $Result["status"];
			  ?>
                <tr>
                  <td><?php echo $i;?></td>
				  <td><?php echo $Result["Question"];?></td>
                  <td><?php echo $Result["viewReply"];?></td>
                  <td><?php echo $Result["cate_name"];?></td>
                  <td><?php echo $Result["Name"]."[".$Result["ip_address"]."]";?></td>
                  <td><?php echo $Result["CreateDate"];?></td>
                  <td><?php if($status==0){
					  echo "<font color=red>ยกเลิก</font>";
					  }else{ echo "ปกติ";}?></td>
                  <td>
                  <?php if($status==1){?>
                  <a href="javascript:delete_forum('<?php echo $QuestionID; ?>')"><img src="../img/Delete_Icon.png" width="30"></a><a href="javascript:view_forum('<?php echo $QuestionID; ?>')"><img src="../img/view.png" width="30"></a>
				  <?php }else{?>
                  <img src="../img/Delete_Icon.png" width="30">
                  <img src="../img/view.png" width="30">
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
            <h5 class="modal-title" id="exampleModalLabel">แน่ใจเหรอ?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">คุณต้องการออกจากระบบใช่มั้ย</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">ยกเลิก</button>
            <a class="btn btn-primary" href="../logout.php">ออกจากระบบ</a>
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
