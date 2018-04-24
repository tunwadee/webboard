<?php
	session_start();
	error_reporting(~E_NOTICE);
	include "../conf/config.php";
	include "../common/common.php";
	
	$user_fullname = $_POST["user_fullname"];
	$user_login = $_POST["user_login"];
	$user_password = $_POST["user_password"];
	$user_type = $_POST["user_type"];
	$user = $_SESSION["session_user"];
	
	/***********************เช็คว่ามีการลงทะเบียนในระบบเหรอยัง*************/
	$chkSQL = "select * from users where user_login = '".$user_login."' " ;
	$objQuery = mysqli_query($con,$chkSQL);
	$num_row = mysqli_num_rows($objQuery);
	if($num_row>0){
		echo "มีการลงทะเบียน $user_login นี้แล้วในระบบ";
		
	}else{	
		$strSQL = "insert into users (user_login, password, user_fullname, user_type_id, user_status,create_by,create_date) values ('$user_login',md5('$password'),'$user_fullname','$user_type',1,'$user',now()) " ;
		$objQuery1 = mysqli_query($con,$strSQL);
		if ($objQuery1 === TRUE) {
			echo "Success";
		}else{
			echo "Error: " . $strSQL . "<br>" . $con->error;
		}
	}
	
	
	
	
	
	/*************************************************************/
	
	
	
	
	
	
	
	
		

?>