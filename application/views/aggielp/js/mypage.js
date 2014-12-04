$("body").ready(function(){
	//init bootstrap
	$('.dropdown-toggle').dropdown();
	$('.collapse').collapse();
	if($.carousel)
		$('.carousel').carousel();
	checkactive("mywishes",0);
});

var isclicked = [false,false,false,false];
function checkactive(content,i){
	if (isclicked[i]== false){
		isclicked[i] = true;
		getfromdb(content);
	}	
}
function getfromdb(content){
	$('#waitModal').modal('show');
	$.post("getmystaff.do?content="+content,null,function(json) {
		var ul = document.getElementById('ul'+content);
        var jsonObject = eval(json);
        if(jsonObject.size =='0'){
        	ul.innerHTML = "<h2 class='span7' style='text-align:center;color:#6CA300'>Not Found..</h2>";
        }
        else{
        	var i = 0;
        	while(jsonObject.root[i]!= null){
        		var title=jsonObject.root[i].title;
        		var id= jsonObject.root[i].id;
        		var description=jsonObject.root[i].description;
        		var image_src="myimage.do?imagetype="+content+"&imageid="+id;
        		
        		var head="<li class='span8'>";
        		var base = "<div class='thumbnail wthumbnail'> <img class='wimg span5 hidden-phone' src="+ image_src +" alt=''/>"
	  	    		+"<div class='caption span3'><h3>"+title+"</h3>"
	  	    		+"<p class='wcontent'  style='font-size:15px;line-height:20px'>"+description+"</p>"
	  			    +"<p class='pull-right'><a onclick=delete_item("+id+",'"+content+"')"+" class='btn btn-danger'>" 
	  			    +"<i class='icon-trash icon-white'></i>Delete</a>";
        		var tail="";
        		
        		if(content=="mywishes"){
        			head="<li class='span8' id='limywishes"+ id +"'>";
        			tail="<a id =achieve"+id+" onclick=achieve_item("+id+")"+" class='btn btn-info'>" 
    			    +"<i class='icon-check icon-white'></i>Achieve</a></p></div></div></li>";
        		}
        		else if(content=="myachievements"){
        			head="<li class='span8 id='limyachievements"+ id +"'>";
        			tail="";
        		}
        		else if(content=="joinedcampaigns"){
        			head="<li class='span8'>";
        			tail="";
        		}
        		else{
        			head="<li class='span8'>";
        			tail="";
        		}
        		ul.innerHTML+=head+base+tail;
        		i++;
        	}
        }
        $('#waitModal').modal('hide');
        document.getElementById("wait_"+content).style.display="none";
	}); 
}


var id=-1;
var type="";
var wid=-1;

function delete_item(_id,_type){
	id=_id;
	type=_type;
	$('#deleteModal').modal('show');
}

function deleting_item(){
	$('#deleteModal').modal('hide');
	$('#deletingModal').modal('show');
	$.post("delwish.do",{wishid:wid},function(data){
		if(data == "delete:ok"){			
			var limywished= document.getElementById("limywishes"+wid);
			limywished.style.display = "none";
			setTimeout(function () {
				$('#deletingModal').modal('hide');
		    }, 2000);			
		}		
	});		
}

function achieve_item(_wid){
	wid=_wid;
	$('#achieveModal').modal('show');
}

function achieving_item(){
	$('#achieveModal').modal('hide');
	$('#achievingModal').modal('show');
	$.post("achieve.do",{wishid:wid},function(data){
		if(data == "achieve:ok"){			
			var limywished= document.getElementById("limywishes"+wid);
			var achievebutton = document.getElementById("achieve"+wid);
			achievebutton.style.display = "none";
			//document.getElementById("ulmyachievements").appendChild(li);
			//var ulmyachievements = document.getElementById("ulmyachievements");
			//var noneli = document.getElementById("noneli");			
			//ulmyachievements.insertBefore(limywished,noneli);
			limywished.style.display = "none";			
			setTimeout(function () {
				$('#achievingModal').modal('hide');
		    }, 2000);		
		}		
	});		
}

/*my profile*/
var isValid = [false,true,false,false,false];
var isChange = false;

function isModiNameValid(){
	var username = $("#username").val();
	if(username.length < 6 || username.length >16){
		$("#warnmodiName").html("&nbsp;&nbsp;<font color='red'>The username is just too short or too long.</font>");	
		isValid[0]= false;
	}
	else if (!/^\w+$/.test(username)) { 
		  
		  $("#warnmodiName").html("&nbsp;&nbsp;<font color='red'>Please use only  letters (a-z,A-Z), numbers, and  underlines.</font>");
		  isValid[0]= false;

	 }
	else if (username.length ===0){
		
		$("#warnmodiName").html("");
		isValid[1] = true;
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

