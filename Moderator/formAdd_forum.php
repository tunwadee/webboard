<?php
session_start();
error_reporting(~E_NOTICE);
if($_SESSION["session_user"]!="" && $_SESSION["user_type"]=="Moderator"){
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
  <!-- Custom styles for this template-->
  <link href="../css/sb-admin.css" rel="stylesheet">
  <script src="../js/checkValidateAdd.js"></script>

</head>

<body class="bg-dark">
  <div class="container">
    <div class="card card-register mx-auto mt-5"  id="card">
      <div class="card-header">เพิ่มกระทู้</div>
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
 		<a class="btn btn-primary btn-block" href="#"  onClick="FshowPreview()">ดูตัวอย่าง</a>
          <a class="btn btn-primary btn-block" href="#"  onClick="checkValidate()">ตั้งกระทู้</a>
        </form>
       
      </div> 
      </div>
      <div id="showPreview" style="display:none"></div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
</body>

</html>

<?php 
}else{
header( "location: ../logout.php" );	
}

?>
