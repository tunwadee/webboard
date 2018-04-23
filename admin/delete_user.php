<?php
session_start();
if($_SESSION["session_user"]!="" && $_SESSION["user_type"]=="admin" ){
	include ('../conf/config.php');
				if(isset($_GET['user_login'])){
					 $sql_query="UPDATE users SET user_status =0  WHERE user_login='".$_GET['user_login']."'";
					 mysqli_query($con,$sql_query);
					 header("Location: index.php");
				}
}else{
header( "location: ../logout.php" );	
}

?>