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
	function reset_form() {
		alert("ffdfdggfgf");
		document.getElementById('question').value="";
		document.getElementById('detail').value="";
		document.getElementById('name').value="";
		document.getElementById('cate_id').value="";
		
	}
		
    function checkValidate() {
				
        document.getElementById('content-err').style.display = 'block';
		var user_fullname =  document.getElementById('user_fullname').value;
		var user_login =  document.getElementById('user_login').value;
		var user_password =  document.getElementById('user_password').value;
		var user_Confpassword =  document.getElementById('user_Confpassword').value;
		var user_type =  document.getElementById('user_type').value;
                /*******************CHECK VALIDATE***********************/
				if(user_fullname == ''||user_login == ''||user_password == ''||user_Confpassword == ''||(user_password !=user_Confpassword)||user_type=='' ){
              	var div_err = "<div id=error><ul>";
						if(user_fullname == '') {
                           div_err += "<li><strong>Invalid value:</strong> กรุณากรอกชื่อ-นามสกุล</li>";                      
                    	}if(user_login == '') {
                           div_err += "<li><strong>Invalid value: </strong>กรุณากรอก email (user_login)</li>";
						}if(user_password == '') {
                           div_err += "<li><strong>Invalid value:</strong> กรุณากรอกรหัสผ่าน</li>";                     
                    	}if(user_Confpassword == '') {
                           div_err += "<li><strong>Invalid value: </strong>กรุณากรอกยืนยันรหัสผ่าน</li>";
					    }if(user_password !=user_Confpassword) {
                           div_err += "<li><strong>Invalid value: </strong>กรุณากรอกรหัสผ่านให้ตรงกัน</li>";
						}if(user_type == '') {
                           div_err += "<li><strong>Invalid value: </strong>กรุณาเลือกสิทธิ์เข้าใช้งาน</li>";                      
                      
					}
						chkValidate = false;                     
                    }else{
						chkValidate = true;
                    }
                div_err += "</ul></div>";
                document.getElementById('content-err').innerHTML = div_err;
				
			/************************AJAX*******************************/
                if (chkValidate == true) {
				document.getElementById('content-err').style.display = 'block';
                   var req = Inint_AJAX();
                    req.onreadystatechange = function() {
                        if (req.readyState == 4) {
                            if (req.status == 200) {
								var ret =  req.responseText;
                                //var ret =  req.responseText.split(','); //รับค่ากลับมา
        if (ret == 'Success'){	
			document.getElementById('card').style.display = 'none';
			document.getElementById('showPreview').style.display = 'block';			
			var div_success = "<div class='card-body'>";
			div_success +="<div class='form-group'><div class='form-row'>";
			div_success +="<div class='col-md-12'>"+
			"<h2><img src='../img/right.png' width='35px' heigh='35px'>บันทึกข้อมูลสำเร็จ</img></h2><a href = 'manage_user.php'>กลับไปยังหน้ากระทู้</a></div>";
			div_success += "</div></div></div>";
			document.getElementById('showPreview').innerHTML = div_success;			
        }else{				
			var div_success = "<div id=error><h2><img src='../img/right.png' width='35px' heigh='35px'>บันทึกข้อมูลไม่สำเร็จ</img></h2><a href = 'index.php'>กลับไปยังหน้ากระทู้</a>"+ret+"</div>";
			document.getElementById('content-err').innerHTML = div_success;	
                                }
                                
                            }
                        }
                    };
                    req.open("POST", "add_user.php"); //สร้าง connection
                    req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); //header					
                    req.send("user_fullname="+user_fullname+
							"&user_login="+user_login+
							"&user_password="+user_password+
							"&user_type="+user_type); //ส่งค่า
                }
                /**************************************************************************************************/
				
                } 