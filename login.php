<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>ระบบตั้งกระทู้</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
<script type="text/javascript">
// JavaScript Document
       function Inint_AJAX() {
                var xmlhttp = false;
                try {
                    xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
                } catch (e) {
                    try {
                        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                    } catch (e) {
                        xmlhttp = false;
                    }
                }
                if (!xmlhttp && document.createElement) {
                    xmlhttp = new XMLHttpRequest();
                }
                return xmlhttp;
            }
    function checkValidate() {
                document.getElementById('content-err').style.display = 'block';
				var user_name =  document.getElementById('user_name').value;
				var password =  document.getElementById('password').value;

                /****************************************CHECK VALIDATE********************************************/
              var div_err = "<div id=error><ul>";			
						if (user_name == '') {
                           div_err += "<li><strong>Invalid value: กรุณากรอก Email address</strong></li>";  
						   chkValidate = false;                     
                    } if (password == '') {
                           div_err += "<li><strong>Invalid value: กรุณากรอก PASSWORD</strong></li>";  
						   chkValidate = false;                     
                    } else {
						chkValidate = true;
                    }
                div_err += "</ul></div>";
                document.getElementById('content-err').innerHTML = div_err;
				
			/*****************************************AJAX*****************************************************/
                if (chkValidate == true) {
					document.getElementById('content-err').style.display = 'none';
                   var req = Inint_AJAX();
                    req.onreadystatechange = function() {
                        if (req.readyState == 4) {
                            if (req.status == 200) {
                                var ret =  req.responseText.split(','); //รับค่ากลับมา
                                if (ret[0] == 'Success') {
									if(ret[1] == "admin"){
										window.location="admin/index.php";
									}if(ret[1] == "Moderator"){
										window.location="Moderator/index.php";
									}if(ret[1] == "user"){
										window.location="user/index.php";
									}
                                } else {
									document.getElementById('content-err').style.display = 'block';
								    var div_err = "<div id=error><ul>";			
									div_err += "<li><strong>Invalid value:ชื่อผู้ใช้หรือรหัสผ่านที่คุณป้อนไม่ถูกต้อง</strong>";
									div_err += "</ul></div>";
               					 document.getElementById('content-err').innerHTML = div_err;
                                }
                                
                            }
                        }
                    };
                    req.open("POST", "chk_login.php"); //สร้าง connection
                    req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); //header
                    req.send("username="+user_name+
							 "&password=" + password ); //ส่งค่า
                }
                /**************************************************************************************************/
				
                } 
</script>
</head>

<body class="bg-dark">
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login</div>
      <div class="card-body">
        <form>
        <div id="content-err" style="display:none"><ul><li><strong>tunwadee</strong></li></ul></div>
          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input class="form-control" id="user_name" type="email" aria-describedby="emailHelp" placeholder="Enter email">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input class="form-control" id="password" type="password" placeholder="Password">
          </div>
          <div class="form-group">
            <div class="form-check">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox"> Remember Password</label>
            </div>
          </div>
          <a class="btn btn-primary btn-block" href="#" onClick="checkValidate()">Login</a>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="register.html">Register an Account</a>
          <a class="d-block small" href="forgot-password.html">Forgot Password?</a>
        </div>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
</body>

</html>


