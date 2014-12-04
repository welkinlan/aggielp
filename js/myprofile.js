var isValid = [false,true,false,false,false];
var isChange = false;

function isModiNameValid(){
	var username = $("#username").val();
	if (username===""|| username === null){
			
			$("#warnmodiName").html("");
			isValid[1] = true;
	}
	else if((username.length < 6 && username.length> 0) || username.length >16){
		$("#warnmodiName").html("&nbsp;&nbsp;<font color='red'>The username is just too short or too long.</font>");	
		isValid[0]= false;
	}
	else if (!/^\w+$/.test(username)) { 
		  
		  $("#warnmodiName").html("&nbsp;&nbsp;<font color='red'>Please use only  letters (a-z,A-Z), numbers, and  underlines.</font>");
		  isValid[0]= false;

	 }
	
	else {
		$("#warnmodiName").html("&nbsp;&nbsp;<font color='orange'>Checking...</font>"); 
		$.post("registerVerification.do",{username: username},function(data){
			if (data === "username:fail") {
				$("#warnmodiName").html("&nbsp;&nbsp;<font color='red'>Someone already has that username. Try another?</font>");
				isValid[0]= false;
			} 
			else if(data === "username:ok"){
				$("#warnmodiName").html("&nbsp;&nbsp;<font color='green'>You can use this name.</font>");
				isValid[0]= true;
				
			}
		});
		
	}
}

function isModiMobileValid(){
	var phone = $("#phone").val();
	isValid[1] = true;
	if(phone.length !== 11 && phone.length !== 0){
			
			$("#warnmodiMobile").html("&nbsp;&nbsp;<font color='red'>Your mobile phone number is too long or too short.</font>");	
			isValid[1] = false;
	}
	else {
			
			$("#warnmodiMobile").html("");
			isValid[1] = true;
			
		}
}
function isOldPasswordValid(){
	isChange = true;
	var oldpassword = $("#oldpassword").val();
	if(oldpassword === null|| oldpassword === ""){
		$("#warnoldpassword").html("");
		isValid[2] = true;
	}
	else{
		
		$("#warnoldpassword").html("&nbsp;&nbsp;<font color='orange'>Checking...</font>"); 
		$.post("myprofile.do",{oldpassword: oldpassword},function(data){
			if (data === "password wrong") {
				$("#warnoldpassword").html("&nbsp;&nbsp;<font color='red'>Your old password is wrong</font>");
				isValid[2]= false;
			} 
			else if(data === "password right"){
				$("#warnoldpassword").html("&nbsp;&nbsp;<font color='green'>Your old password is right.</font>");
				isValid[2]= true;
				
			}
		});
	}
}
function isNewPasswordValid(){
	
	isChange = true;
	
	var oldpassword = $("#oldpassword").val();
	var newpassword = $("#newpassword").val();
	if(newpassword === null || newpassword === "")
	{
		if(oldpassword === null || oldpassword === ""){
			$("#warnnewpassword").html("");
			 isValid[3]= true;
		}
		else{
			$("#warnnewpassword").html("&nbsp;&nbsp;<font color='red'>You can't leave this empty.</font>");
			isValid[3] = false;
		}
	}
	else if(newpassword!== null || newpassword !=="")
	{
		
		if(oldpassword === null || oldpassword === ""){
			$("#warnnewpassword").html("&nbsp;&nbsp;<font color='red'>You need to input your old password</font>");
			isValid[3] = false;
		}
		else{
			
			if (newpassword.length < 8 || newpassword.length > 16) {
				$("#warnnewpassword").html("&nbsp;&nbsp;<font color='red'>The Password is just too short or too long.</font>");	
				isValid[3] = false;

			}

			else if (!/^\w+$/.test(newpassword)) { 
				  $("#warnnewpassword").html("&nbsp;&nbsp;<font color='red'>Please use only letters (a-z,A-Z), numbers.</font>");		  
				  isValid[3] = false;
			 }
			
			else if(newpassword === oldpassword){
				
				$("#warnnewpassword").html("&nbsp;&nbsp;<font color='red'>New Password equals to Old Password</font>");
				isValid[3] = false;
			}
			else {
				
				 $("#warnnewpassword").html("");
				 isValid[3]= true;
			}
		}
	}
}
	
function isConfirmPasswordValid(){
	isChange = true;
	var oldpassword = $("#oldpassword").val();
	var newpassword = $("#newpassword").val();
	var confirmpassword = $("#confirmpassword").val();
	if((oldpassword === null || oldpassword === "")&& (confirmpassword === null || confirmpassword === "")){
		$("#warnconfirmpassword").html("");
		 isValid[4]= true;
	}
	else if(oldpassword === null||oldpassword ===""){
			
			$("#warnconfirmpassword").html("&nbsp;&nbsp;<font color='red'>You need to input your old password</font>");
			isValid[4] = false;
	}
	
	else{
		if(confirmpassword.length === 0){
			 
			 $("#warnconfirmpassword").html("&nbsp;&nbsp;<font color='red'>You can't leave this empty.</font>");
			 isValid[4]= false;
		}
		
		else if(newpassword === confirmpassword){
			
			 $("#warnconfirmpassword").html("");
			 isValid[4]= true;
			 
		}
		else {
			
			 $("#warnconfirmpassword").html("&nbsp;&nbsp;<font  color='red'>These passwords don't match. Try again?</font>");
			 isValid[4]= false;
		}
	}
}
	
function isAllValid(){	
	
	if(isChange === false){
		
		document.getElementById('username').focus();
	}
	
	if(isValid[0]=== false){
		
		document.getElementById('username').focus();
		
	}
	
	else if(isValid[1] === false){
		
		document.getElementById('phone').focus();
		
	}
	else if(isValid[2]===false){
		document.getElementById('oldpassword').focus();
	}
	else if(isValid[3]===false){
		document.getElementById('newpassword').focus();
	}
	else if(isValid[4]===false){
		document.getElementById('confirmpassword').focus();
	}
	else{
		document.getElementById('myprofileform').submit();
	}
}

