var isChange = false;
var isValid = [false,false,false,false,true,true];

function isNameValid() {
	
	isChange = true;
	var username = $("#username").val();
	
	if (username.length === 0) {
		$("#warnName").html("&nbsp;&nbsp;<span class='input-notification error png_bg'>You can't leave this empty.</span>");
		isValid[0]= false;
	}

	else if (username.length < 6 || username.length > 16) {
		$("#warnName").html("&nbsp;&nbsp;<span class='input-notification error png_bg'>The username is just too short or too long</span>");	
		isValid[0]= false;
	}

	else if (!/^\w+$/.test(username)) { 
		  $("#warnName").html("&nbsp;&nbsp;<span class='input-notification error png_bg'>Please use only  letters (a-z,A-Z), numbers, and  underlines.</span>");
		  isValid[0]= false;
	 }
	 
	 else {
		$("#warnName").html("&nbsp;&nbsp;<font color='orange'>Checking...</font>"); 
		$.post("registerVerification.do",{username: username},function(data){
			if (data === "username:fail") {
				$("#warnName").html("&nbsp;&nbsp;<span class='input-notification error png_bg'>This name is Not OK!</span>");
				isValid[0]= false;
			} 
			else if(data === "username:ok"){
				$("#warnName").html("&nbsp;&nbsp;<span class='input-notification success png_bg'>This name is OK!</span>");
				isValid[0]= true;
			}
		});
	}	
	
}

function isPasswordValid(){
	
	isChange = true;
	var password1 = $("#password1").val();	
	isValid[1]= false;
	
	if (password1.length === 0) {
		
		$("#warnPassword1").html("&nbsp;&nbsp;<span class='input-notification error png_bg'>You can't leave this empty.</span>");		

	}

	else if (password1.length < 8 || password1.length > 16) {
		
		$("#warnPassword1").html("&nbsp;&nbsp;<span class='input-notification error png_bg'>The Password is just too short or too long.</span>");		

	}

	else if (!/^\w+$/.test(password1)) { 
		  
		  $("#warnPassword1").html("&nbsp;&nbsp;<span class='input-notification error png_bg'>Please use only letters (a-z,A-Z), numbers.</span>");		  

	 }
	else {
		
		 $("#warnPassword1").html("");
		 isValid[1]= true;
	}
		
}

function isPasswordEqual(){
	
	isChange = true;
	var password1 = $("#password1").val();
	var password2 = $("#password2").val();
	
	if(password2.length === 0){
		 
		 $("#warnPassword2").html("&nbsp;&nbsp;<span class='input-notification error png_bg'>You can't leave this empty.</span>");
		 isValid[2]= false;
	}
	
	else if(password1 === password2){
		
		 $("#warnPassword2").html("");
		 isValid[2]= true;
		 
	}
	else {
		
		 $("#warnPassword2").html("&nbsp;&nbsp;<span class='input-notification error png_bg'>These passwords don't match. Try again?</span>");
		 isValid[2]= false;
	}
	
}

function isEmailValid() {
	
	isChange = true;
	var email = $("#email").val();
	
	if (email.length === 0) {
		
		$("#warnEmail").html("&nbsp;&nbsp;<span class='input-notification error png_bg'>You can't leave this empty.</span>");
		isValid[3]= false;
	}	

	else if (!/^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+((\.[a-zA-Z0-9_-]{2,3}){1,2})$/.test(email)) { 
		  
		  $("#warnEmail").html("&nbsp;&nbsp;<span class='input-notification error png_bg'>Your email address contain illegal characters. Try Again?</span>");
		  isValid[3]= false;
	 }
	 
	  else {
		$("#warnEmail").html("&nbsp;&nbsp;<font color='orange'>Checking...</font>"); 
		$.post("registerVerification.do",{email : email},function(data){
			if (data === "email:fail") {

				$("#warnEmail").html("&nbsp;&nbsp;<span class='input-notification error png_bg'>Someone already has that email. Try another?</span>");
				isValid[3]= false;
				
			} 
			else if(data === "email:ok") {
				
				$("#warnEmail").html("&nbsp;&nbsp;<span class='input-notification success png_bg'>You can register with this email address.</span>");
				isValid[3]= true;
				
			}
		});
		
	}
		
}

function isMobileValid(){
	
	isChange = true;
	var phone = $("#phone").val();	
	isValid[4] = true;
	if(phone.length !== 11 && phone.length !== 0){
		
		$("#warnMobile").html("&nbsp;&nbsp;<span class='input-notification error png_bg'>Your mobile phone number is too long or too short.</span>");	
		isValid[4] = false;
	}
	else {
		
		$("#warnMobile").html("");
		isValid[4] = true;
		
	}
		
}

function normalChecked(){
	
	isChange = true;
	isValid[5] = true;
	document.getElementById('vip').checked = false;
	document.getElementById('accountinfor').style.display = 'none';
	document.getElementById('realname').value = "";
	document.getElementById('idnum').value = "";
	
}

function vipChecked(){
	
	isChange = true;
	isValid[5] = false;
	document.getElementById('normal').checked = false;
	document.getElementById('accountinfor').style.display = '';
	
}

function isAccountValid(){
	
	isChange = true;
	var idnum = $("#idnum").val();
	var realname = $("#realname").val();
	
	if (realname.length === 0) {
		
		$("#warnRealname").html("&nbsp;&nbsp;<span class='input-notification error png_bg'>You can't leave this empty.</span>");
		isValid[5] = false;

	}
	
	if (idnum.length === 0) {
		
		$("#warnIdnum").html("&nbsp;&nbsp;<span class='input-notification error png_bg'>You can't leave this empty.</span>");		
		isValid[5] = false;
	}

	else if (idnum.length !== 13) {
		
		$("#warnIdnum").html("&nbsp;&nbsp;<span class='input-notification error png_bg'>Your Id number is just too short or too long.</span>");	
		isValid[5] = false;
	}
	else if(!/^\d{12}[0-9|x]$/.test(idnum)){
		$("#warnIdnum").html("&nbsp;&nbsp;<span class='input-notification error png_bg'> Id number can only be number or end with 'x'.</span>");
		isValid[5] = false;
	}
	else {
		$("#warnIdnum").html("");
		isValid[5] = true;
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
		
		document.getElementById('password1').focus();
		
	}
	
	else if(isValid[2] === false){
		
		document.getElementById('password2').focus();
		
	}
	
	else if (isValid[3] === false){
		
		document.getElementById('email').focus();
		
	}
	
	else if(isValid[4] === false){
		
		document.getElementById('phone').focus();
	}
	
	else if(isValid[5] === false)
		;
	
	else if(document.getElementById('agree').checked === false){
		
		$("#warnAgree").html("&nbsp;&nbsp;<span class='input-notification error png_bg'>You must agree this.</span>");		
	}
	
	else {	
		
		$("#warnAgree").html("");
		document.getElementById('registerform').submit();
		
		
	}
}
