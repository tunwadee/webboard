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
    <script src="../js/checkValidateAdd_user.js"></script>

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
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="index.php">
            <i class="fa fa-fw fa-book" ></i>
            <span class="nav-link-text">จัดการกระทู้</span>
          </a>
        </li>
        <li class="nav-item active"  data-toggle="tooltip" data-placement="right" title="Dashboard">
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
  <div class="container">
    <div class="card card-register mx-auto mt-5"  id="card">
      <div class="card-header">เพิ่มuser</div>
      <div id="content-err" style="display:none"><ul><li><strong>tunwadee</strong></li></ul></div>
      <div class="card-body">
        <form>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label for="exampleInputName">คำถาม :</label>
                <input class="form-control" id="question" type="text" aria-describedby="nameHelp" placeholder="คำถาม">
              </div>
              <div class="col-md-12">
                <label for="cate_id">เลือกหมวดหมู่ :</label>
                <select class="form-control" id="cate_id">
                <option value=""><--กรุณาเลือก--></option>
                <?php
                include("../conf/config.php");
				$sql = "select cate_id,cate_name from category where status=1 ";
				$objQuery = mysqli_query($con,$sql);
				while ($Result = mysqli_fetch_array($objQuery)) {
					?>
				<option value="<?php echo $Result["cate_id"];?>"><?php echo $Result["cate_name"];?></option>	
					<?php
				}
				?>
                </select>
              </div>
              <div class="col-md-12">
                <label for="exampleInputLastName">รายละเอียด :</label>
                <textarea class="form-control" id="detail" type="text" aria-describedby="nameHelp" placeholder="รายละเอียด"></textarea>
        
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">ชื่อผู้ตั้งกระทู้</label>
            <input type="email" class="form-control" id="name" placeholder="ชื่อผู้ตั้งกระทู้" value="<?php echo $_SESSION["session_user"];?>" aria-describedby="emailHelp" disabled>
          </div>        
 		<a class="btn btn-primary btn-block" href="#"  onClick="FshowPreview()">ตกลง</a>
          <a class="btn btn-primary btn-block" href="#"  onClick="checkValidate()">ยกเลิก</a>
        </form>
       
      </div> 
      </div>
      <div id="showPreview" style="display:none"></div>
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
