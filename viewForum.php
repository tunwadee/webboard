<?php
	include("conf/config.php");
	include "common/common.php";	
	if($_GET["Action"] == "Save") {
	$ip_address = get_client_ip();
	//*** Insert Reply ***//
	$strSQL = "INSERT INTO reply ";
	$strSQL .="(QuestionID,CreateDate,Details,Name,ip_address) ";
	$strSQL .="VALUES ";
	$strSQL .="('".$_GET["QuestionID"]."',now(),'".$_POST["txtDetails"]."','".$_POST["txtName"]."','".$ip_address."') ";
	$objQuery = mysqli_query($con,$strSQL);
	
	//*** Update Reply ***//
	$strSQL = "UPDATE webboard ";
	$strSQL .="SET Reply = Reply + 1 WHERE QuestionID = '".$_GET["QuestionID"]."' ";
	$objQuery = mysqli_query($con,$strSQL);	
	}
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
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
  <script src="js/checkValidateAdd.js"></script>

</head>

<body class="bg-dark">

  <div class="container">
    <div class='card card-register mx-auto mt-5'>
		<div class='card-body'>
			<div class='form-group'>
            	<div class='form-row'>
                <?php 
			  
			  //*** Select Question ***//
			$strSQL = "SELECT * FROM webboard w inner join category c on w.cate_id = c.cate_id  WHERE QuestionID = '".$_GET["QuestionID"]."' ";
			$objQuery = mysqli_query($con,$strSQL) or die ("Error Query [".$strSQL."]");
			$objResult = mysqli_fetch_array($objQuery);
			$Num_Rows = mysqli_num_rows($objQuery);
			
			//*** Update View ***//
			$strSQL = "UPDATE webboard ";
			$strSQL .="SET View = View + 1 WHERE QuestionID = '".$_GET["QuestionID"]."' ";
			$objQuery = mysqli_query($con,$strSQL);
			if($Num_Rows==0){
				?>
                    <div class='col-md-12'>
                    <label for='question'>
                    <h1><font color="red">ไม่พบกระทู้ดังกล่าว !</font></h1>
                    </label>
                    </div>
                <?php }else{
				?>
					<div class='col-md-12'>
                    <label for='question'><h1><?php echo $objResult["Question"];?></h1></label>
                    </div>
                    <div class='col-md-12'>
                    <label for='cate_id'><U><?php echo $objResult["cate_name"];?></U></label>
                    </div>
                    <div class='col-md-12'>
                    <label for='detail'><?php echo nl2br($objResult["Details"]);?></label>
                    </div>
                    <div class='col-md-12'>
                    <label for='name'>
                    <img src='img/account.png' width='25px'><?php echo $objResult["Name"]."[".$objResult["ip_address"]."]";?></label>
                    </div>
                    <div class='col-md-12'>
                    <label for='Reply'>
                    อ่าน:<?php echo $objResult["View"]."/ตอบ:".$objResult["Reply"];?></label>
                    </div>
				<?php }?>
                <a href="index.php">Back to Webboard</a> <br>
				</div>
        	</div>
         </div>
       </div>
       
  <br/>
    
                <?php 
				$intRows = 0;
				$strSQL2 = "SELECT * FROM reply  WHERE QuestionID = '".$_GET["QuestionID"]."' order by ReplyID ";
				$objQuery2 = mysqli_query($con,$strSQL2) or die ("Error Query [".$strSQL."]");
				$Num_Rows2 = mysqli_num_rows($objQuery2);
			if($Num_Rows2>0){
				while($objResult2 = mysqli_fetch_array($objQuery2))
				{
					$intRows++;
?> 				
	<div class='card card-register mx-auto mt-5'>
		<div class='card-body'>
			<div class='form-group'>
            	<div class='form-row'>	
                    ลำดับที่ : <?php echo $intRows;?>
                    <div class='col-md-12'>
                    <label for='detail'>
                    คำตอบ : <?php echo $objResult2["Details"];?> 
                    </label>
                    </div>
                    <div class='col-md-12'>
                    <label for='question'>
                    ชื่อผู้ตอบกระทู้ : <?php echo $objResult2["Name"]."[".$objResult2["ip_address"]."]";?> 
                    </label>
                    </div>
                     <div class='col-md-12'>
                    <label for='CreateDate'>
                    วัน/เวลาที่ตอบ : <?php echo $objResult2["CreateDate"];?> 
                    </label>
                    </div>
				</div>
        	</div>
         </div>
       </div>
	   <?php }
			}?>
       <form action="ViewForum.php?QuestionID=<?=$_GET["QuestionID"];?>&Action=Save" method="post" name="frmMain" id="frmMain">
     
       <div class='card card-register mx-auto mt-5'>
		<div class='card-body'>
			<div class='form-group'>
            	<div class='form-row'>	
                    <div class='col-md-12'>
                    <a href="index.php">Back to Webboard</a><br/>
                 <label for="lbtxtDetails">คำตอบ :</label>
                <textarea  class="form-control"  name="txtDetails" id="txtDetails" cols="50" rows="5"></textarea>
                    </div>
                     <div class='col-md-12'>
                     <label for="lbtxtName">ชื่อผู้ตอบกระทู้ :</label>
                	<input class="form-control"  name="txtName"  id="txtName" type="text" placeholder="ชื่อผู้ตอบกระทู้">
                    </div>
                    <div class='col-md-12'>
                     <input name="btnSave" type="submit" id="btnSave" value="Submit">
                    </div>
				</div>
        	</div>
         </div>
       </div>
       </form>
            
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
</body>

</html>
