<?php
header("content-type: application/x-javascript; charset=utf-8");
session_start(); 
error_reporting(~E_NOTICE);
//    ค่ากำหนดของ ฐานข้อมูล
    include 'conf/config.php';
	// Check connection
	$username= $_POST['username'];    
	$password= md5($_POST['password']);   
	$strSQL = "select user_login,user_type_name,user_fullname from users us inner join user_type ut on us.user_type_id = ut.user_type_id where user_login = '".$username."' and password='".$password."' AND user_status = '1' ";
		//echo $strSQL;
	$objQuery = mysqli_query($con,$strSQL);
    $Num_Rows = mysqli_num_rows($objQuery);
	if($Num_Rows==0){
			echo "UNSUCCESS".$strSQL;
	}else{
			while ($Result = mysqli_fetch_array($objQuery)) {	
			$_SESSION['session_user'] =$Result["user_login"];

			$_SESSION['user_type'] = $Result["user_type_name"];
			}	   
		echo "Success,".$_SESSION['user_type'];
	}
?>
