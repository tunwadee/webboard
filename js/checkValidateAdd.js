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
			
			
			/*****ดูตัวอย่างก่อนโพส************/
	function FshowPreview() {
		
		
		var question =  document.getElementById('question').value;
		var detail =  document.getElementById('detail').value;
		var name =  document.getElementById('name').value;
		var cate_id =  document.getElementById('cate_id').value;
		
		var div_err = "<div id=error><ul>";
		if(question == ''||cate_id == ''||name == ''||detail == ''){			
			if(question == '') {
			div_err += "<li><strong>Invalid value:</strong> กรุณากรอก คำถามการตั้งกระทู้</li>";                       
			}if(cate_id == '') {
		   div_err += "<li><strong>Invalid value: </strong>กรุณาเลือกหมวดหมู่</li>";
			}if(detail == '') {
			div_err += "<li><strong>Invalid value:</strong> กรุณากรอก รายละเอียดการตั้งกระทู้</li>";                       
			}if(name == '') {
			div_err += "<li><strong>Invalid value: </strong>กรุณากรอก ชื่อผู้ตั้งกระทู้</li>";  
			}
			chkValidate = false; 
		}else {
			chkValidate = true;	
		}
		
		 if(chkValidate){
			document.getElementById('showPreview').style.display="block";
			document.getElementById('card').style.display="none";
		 var div_preview = "<div class='card card-register mx-auto mt-5'>";
		div_preview +="<div class='card-body'>";
		div_preview +="<div class='form-group'><div class='form-row'>";
        div_preview +="<div class='col-md-12'>"+
        "<label for='question'><h1>"+question+"</h1></label></div>";
		div_preview +="<div class='col-md-12'>"+
        "<label for='cate_id'>"+cate_id+"</label></div>";
   		div_preview +="<div class='col-md-12'>"+
        "<label for='detail'>"+detail+"</label></div>";
		div_preview +="<div class='col-md-12'><img src='../img/account.png' width='25px'> : "+
        "<label for='name'>"+name+"</label></div>";
		div_preview +="<div class='col-md-12'>"+
        "<a class='btn btn-primary btn-block' href='#' onClick= 'back()'>กลับ</a></div>";
		div_preview += "</div></div></div>";
        document.getElementById('showPreview').innerHTML = div_preview;	 
		}else{
		document.getElementById('content-err').style.display = 'block';
        div_err += "</ul></div>";
        document.getElementById('content-err').innerHTML = div_err;
		 }
	
	
	}
	
	
	function back() {
		document.getElementById('showPreview').style.display="none";
		document.getElementById('card').style.display="block";
	}
			
    function checkValidate() {
                document.getElementById('content-err').style.display = 'block';
				var question =  document.getElementById('question').value;
				var detail =  document.getElementById('detail').value;
				var name =  document.getElementById('name').value;
				var cate_id =  document.getElementById('cate_id').value;
				
				

                /*******************CHECK VALIDATE***************************/
				if(question == ''||cate_id == ''||name == ''||detail == ''){
              	var div_err = "<div id=error><ul>";
						if(question == '') {
                           div_err += "<li><strong>Invalid value:</strong> กรุณากรอก คำถามการตั้งกระทู้</li>";                      
                    	}if(cate_id == '') {
                           div_err += "<li><strong>Invalid value: </strong>กรุณาเลือกหมวดหมู่</li>";
						}if(detail == '') {
                           div_err += "<li><strong>Invalid value:</strong> กรุณากรอก รายละเอียดการตั้งกระทู้</li>";                     
                    	}if(name == '') {
                           div_err += "<li><strong>Invalid value: </strong>กรุณากรอก ชื่อผู้ตั้งกระทู้</li>";                      
                      
						}
						chkValidate = false;                     
                    }else{
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
								var ret =  req.responseText;
                                //var ret =  req.responseText.split(','); //รับค่ากลับมา
                                if (ret == 'Success'){
		document.getElementById('showPreview').style.display = 'block';
		document.getElementById('card').style.display = 'none';					
		var div_success = "<div class='card card-register mx-auto mt-5'>";
		div_success +="<div class='card-body'>";
		div_success +="<div class='form-group'><div class='form-row'>";
        div_success +="<div class='col-md-12'>"+
        "<h2><img src='../img/right.png' width='35px' heigh='35px'>บันทึกข้อมูลสำเร็จ</img></h2><a href = 'index.php'>กลับไปยังหน้ากระทู้</a></div>";
		div_success += "</div></div></div>";
		document.getElementById('showPreview').innerHTML = div_success;			
		
                                } else {
		document.getElementById('showPreview').style.display = 'block';
		document.getElementById('card').style.display = 'none';					
		var div_success = "<div class='card card-register mx-auto mt-5'>";
		div_success +="<div class='card-body'>";
		div_success +="<div class='form-group'><div class='form-row'>";
        div_success +="<div class='col-md-12'>"+
        "<h2><img src='../img/right.png' width='35px' heigh='35px'>บันทึกข้อมูลไม่สำเร็จ</img></h2><a href = 'index.php'>กลับไปยังหน้ากระทู้</a>"+ret+"</div>";
		div_success += "</div></div></div>";
		document.getElementById('showPreview').innerHTML = div_success;	
                                }
                                
                            }
                        }
                    };
                    req.open("POST", "add_forum.php"); //สร้าง connection
                    req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); //header
                    req.send("question="+question+
							"&cate_id="+cate_id+
							"&detail="+detail+
							"&name="+name); //ส่งค่า
                }
                /**************************************************************************************************/
				
                } 