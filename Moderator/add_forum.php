<?php
session_start();
if($_SESSION["session_user"]!="" && $_SESSION["user_type"]=="Moderator"){

	include "../conf/config.php";
	include "../common/common.php";
	$question = $_POST["question"];
	$cate_id  = $_POST["cate_id"];
	$detail   = $_POST["detail"];
	$name     = $_POST["name"];
	$ip_address = get_client_ip();
	
	$strSQL = "Insert into webboard (CreateDate,Question, cate_id, Details, ip_address, Name, View, Reply, Status) values (now(),'$question','$cate_id','$detail','$ip_address','$name',0,0,1) " ;
	$objQuery = mysqli_query($con,$strSQL);
	if ($objQuery === TRUE) {
		echo "Success";
	}else{
    	echo "Error: " . $sql . "<br>" . $con->error;
	}
}else{
header( "location: ../logout.php" );	
}
		

?>