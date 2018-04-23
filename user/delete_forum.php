<?php
session_start();
if($_SESSION["session_user"]!="" && $_SESSION["user_type"]=="user"){

	include ('../conf/config.php');
				if(isset($_GET['QuestionID'])){
					 $sql_query="UPDATE webboard SET Status =0  WHERE QuestionID='".$_GET['QuestionID']."'";
					 mysqli_query($con,$sql_query);
					 header("Location: index.php");
				}
				}else{
header( "location: ../logout.php" );	
}

?>