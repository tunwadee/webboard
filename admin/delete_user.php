<?php
session_start();
error_reporting(~E_NOTICE);
if($_SESSION["session_user"]!="" && $_SESSION["user_type"]=="admin" ){
	include ('../conf/config.php');
				if(isset($_GET['user_login'])){
					 $sql_query="UPDATE users SET user_status =0  WHERE user_login='".$_GET['user_login']."'";
					 mysqli_query($con,$sql_query);
					 header("Location: manage_user.php");
				}
}else{
header( "location: ../logout.php" );	
}

?>