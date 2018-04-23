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
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">เพิ่มuser</div>
      <div id="content-err" style="display:none"></div>
      <div class="card-body" id="card">
        <form>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label for="exampleuser_fullname">ชื่อ-นามสกุล :</label>
                <input class="form-control" id="user_fullname"  name="user_fullname" type="text" aria-describedby="user_fullname" placeholder="ชื่อ-นามสกุล">
              </div>
              <div class="col-md-12">
                <label for="exampleuser_login">email (user_login) :</label>
                <input class="form-control" id="user_login" name="user_login"  type="text" aria-describedby="user_login" placeholder="user_login">
              </div>
               <div class="col-md-12">
                <label for="exampleUser_password">รหัสผ่าน :</label>
                <input class="form-control" id="user_password" name="user_password"  type="password" aria-describedby="user_login" placeholder="รหัสผ่าน">
              </div>
               <div class="col-md-12">
                <label for="exampleUser_Confpassword">ยืนยันรหัสผ่าน :</label>
               <input class="form-control" id="user_Confpassword"  name="user_Confpassword" type="password" aria-describedby="user_login" placeholder="ยืนยันรหัสผ่าน">
              </div>
              <div class="col-md-12">
                <label for="cate_id">สิทธิ์เข้าใช้งาน :</label>
                <select class="form-control" id="user_type" name="user_type">
                <option value=""><--กรุณาเลือก--></option>
                <?php
                include("../conf/config.php");
				$sql = "select user_type_id,user_type_name from user_type where status=1 ";
				$objQuery = mysqli_query($con,$sql);
				while ($Result = mysqli_fetch_array($objQuery)) {
					?>
				<option value="<?php echo $Result["user_type_id"];?>"><?php echo $Result["user_type_name"];?></option>	
					<?php
				}
				?>
                </select>
              </div>
            </div>
          </div>     
 		<a class="btn btn-primary btn-block" href="#"  onClick="checkValidate()">ตกลง</a>
          <a class="btn btn-primary btn-block" href="#"  onClick="reset_form()">ยกเลิก</a>
        </form>
      </div> 
      <div id="showPreview" style="display:none"></div>
      </div>
      
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
