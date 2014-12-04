$("body").ready(function(){
	//init bootstrap
	$('.refresh').tooltip();
});

var pageindex = 0;
var ismax =false;
function getmorewish(){
	isfirst = false;
	if(!ismax){
		document.getElementById('nextpage').style.display="none";
		document.getElementById('waitbar').style.display="block";
		getwish();
	}	 
}

function getwish(){
	$.post("wishes.img",{pageindex:pageindex},function(data){
			pageindex++;
    		var jsonObject = eval(data);
    		var i = 0;
    		var ulwishes = document.getElementById('ulwishes');
    		
    		while(jsonObject.root[i]!= null){
    				var title=jsonObject.root[i].title;
    				var id= jsonObject.root[i].id;
    				var description=jsonObject.root[i].description; 
    				ulwishes.innerHTML += "<li class='span9'>"
    							+"<div class='thumbnail wthumbnail'>"
	    			    		+"<img class='wimg span5 hidden-phone' src='wish.img?wishid="+jsonObject.root[i].id+"'/>"
	    			    		+"<div class='caption span4'>"
	    			    			+"<h3>"+jsonObject.root[i].title+"</h3>"
	    			    			+"<p class='wcontent' style='font-size:15px;line-height:20px'>"+jsonObject.root[i].description+"</p>"
	    			    			+"<p class='pull-right'>"  		
	    			    				+"<a id = 'v"+jsonObject.root[i].id+"' href='javascript:void(0)' onclick= 'vote("+jsonObject.root[i].id+")' class='btn btn-primary'>" 
	    			    					+"<i class='icon-thumbs-up icon-white'></i>"
	    			    					+"<label id = 'lv"+jsonObject.root[i].id+"'>Vote("+jsonObject.root[i].votecount+")</label>"
	    			    					+"</a>" 
	    			    				+"<a id = 'o"+jsonObject.root[i].id+"' href='javascript:void(0)' onclick ='own("+jsonObject.root[i].id+")' class='btn btn-success'>" 
	    			    					+"<i class='icon-heart icon-white'></i>"
	    			    					+"<label id = 'lo"+jsonObject.root[i].id+"'>Own("+jsonObject.root[i].ownercount+")</label>"
	    			    				+"</a>"
	    			    			+"</p>"           
	    			    		+"</div>"
	    			    	+"</div>"
	    			    	+"</li>";
    			i++;
    		}
    		if(jsonObject.ismax == "false"){    			
    			isfirst = true; 
    			$("#nextpage").text("Scroll for more wishes");
    		}
    		else {    			
    			ismax = true;
    			$("#nextpage").text("No More Wishes");
    		}    
    		document.getElementById('nextpage').style.display="block";
			document.getElementById('waitbar').style.display="none";
    	}
    );
}

function refreshwishes(){
	pageindex = 0;
	ismax =false;
	document.getElementById("ulwishes").innerHTML="";	
	getmorewish();
}

function vote(wishid){	
	var countstr=document.getElementById('lv'+wishid).innerHTML;
 	var pop = $('#v'+wishid);
 	pop.attr("data-loading-text","voting...");
 	pop.button('loading');
	 	
 	$.post("vote.do",{wishid:wishid},function(data){
		if(data === "vote:ok"){
			pop.button('reset');
	 		var votecoutstr=countstr.substring(5,countstr.length);
			var votecount = 1+parseInt(votecoutstr);
		    $("#lv"+wishid).html("Vote("+votecount+")");
		    pop.attr("title","OK!");
		    pop.attr("data-content","Successfully vote!");
		    pop.attr("data-placement","bottom");
		    pop.popover("show");
		    setTimeout(function () {
		    	pop.popover("hide");
		    }, 2000);			
		}
		else if(data ==="vote:twice"){
			pop.button('reset');
		    $("#lv"+wishid).html(countstr);
		    pop.attr("title","Sorry!");
		    pop.attr("data-content","You have already voted...");
		    pop.attr("data-placement","bottom");
		    pop.popover("show");
		    setTimeout(function () {
		    	pop.popover("hide");
		    }, 2000);			
		}
		else {
			pop.button('reset');
		    $("#lv"+wishid).html(countstr);
		    pop.attr("title","Sorry!");
		    pop.attr("data-content","You should login...");
		    pop.attr("data-placement","bottom");
		    pop.popover("show");
		    setTimeout(function () {
		    	pop.popover("hide");
		    }, 2000);		
		}		
	});
 	
}
function own(wishid){
	var countstr=document.getElementById('lo'+wishid).innerHTML;
	var pop = $('#o'+wishid);
 	pop.attr("data-loading-text","owning...");
 	pop.button('loading');
	$.post("own.do",{wishid:wishid},function(data){
		if(data === "own:ok"){
			pop.button('reset');
			var countstr=document.getElementById('lo'+wishid).innerHTML;
			var owncoutstr=countstr.substring(4,countstr.length);
	 		var owncount = 1+parseInt(owncoutstr);
		    $("#lo"+wishid).html("Own("+owncount+")");
		    pop.attr("title","OK!");
		    pop.attr("data-content","Successfully own!");
		    pop.attr("data-placement","bottom");
		    pop.popover("show");
		    setTimeout(function () {
		    	pop.popover("hide");
		    }, 2000);			
		}
		else if(data === "own:okvote:ok"){
			pop.button('reset');
			var countstr=document.getElementById('lo'+wishid).innerHTML;
			var owncoutstr=countstr.substring(4,countstr.length);
			var owncount = 1+parseInt(owncoutstr);
			$("#lo"+wishid).html("Own("+owncount+")");
		    var countstr=document.getElementById('lv'+wishid).innerHTML;
			var owncoutstr=countstr.substring(5,countstr.length);
			var owncount = 1+parseInt(owncoutstr);
		    $("#lv"+wishid).html("Vote("+owncount+")");
		    pop.attr("title","OK!");
		    pop.attr("data-content","Successfully own and vote this wish!");
		    pop.attr("data-placement","bottom");
		    pop.popover("show");
		    setTimeout(function () {
		    	pop.popover("hide");
		    }, 2000);
		}
		else if(data ==="own:twice"){
			pop.button('reset');
		    $("#lo"+wishid).html(countstr);
		    pop.attr("title","Sorry!");
		    pop.attr("data-content","You have already owned...");
		    pop.attr("data-placement","bottom");
		    pop.popover("show");
		    setTimeout(function () {
		    	pop.popover("hide");
		    }, 2000);				
		}
		else {
			pop.button('reset');
		    $("#lo"+wishid).html(countstr);
		    pop.attr("title","Sorry!");
		    pop.attr("data-content","You should login...");
		    pop.attr("data-placement","bottom");
		    pop.popover("show");
		    setTimeout(function () {
		    	pop.popover("hide");
		    }, 2000);		
		}		
	});
}

