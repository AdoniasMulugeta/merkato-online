//////////////////////////////////////////////////////////////
/////////////////      drop-down     /////////////////////////
//////////////////////////////////////////////////////////////
var count = 0;

$(document).ready(function(){
	$("#depart-btn").mouseenter(function(){
		$("#depa-content").show();
		count++;
		if (count == 1){
			$("#main-area").mouseenter(function(){
				$("#depa-content").hide();
				count--;
			});
		}
	});
});

//////////////////////////////////////////////////////////////
/////////////////    drop-down-btn    ////////////////////////
//////////////////////////////////////////////////////////////


var out = false;

function popUp(elementId, messageId, signed) {
	$(elementId).click(function(){
		if (signed == false) {
			$(messageId).slideDown();
			out = true;
			$("#main-area").click(function(){
				$(messageId).slideUp("fast");
				out = false;
			});
			return false;
		} else {
			return true;
		}
	});
}

$(document).ready(function(){
	popUp("#login", "#login-popup", false);
	    	$("#signUp").click(function(){
	    		if (out == true){
	    			$("#login-popup").slideUp("fast");
	    		     out = false;
	    		     return false;
	    	} else {
	    		if (out == false){
	    			$("#signUp-popup").slideDown();
	    			out = true;
	    	
	    			$("#main-area").click(function(){
	    				$("#signUp-popup").slideUp("fast");
	    			});
	    		}

	    	    popUp("#signUp", "#signUp-popup", false);
				return false;
	    }     
	});
});
//////////////////////////////////////////////////////////////
/////////////////      carousel      /////////////////////////
//////////////////////////////////////////////////////////////

var center = 1;
var right = 2;
var left = 6;


$(document).ready(function(){	
	setTimeout(moveRight, 3000);
	setTimeout(moveRight, 5000);
	setTimeout(moveRight, 7000);
	//setTimeout(moveRight, 12000);
	//setTimeout(moveRight, 15000);
	$("#arrowright").click(function(){
		moveLeft();
		return false;
	});
	$("#arrowleft").click(function(){
		moveRight();
		return false;
	});
});


function moveLeft(){
	
	var img1 = "#pic-" + right;
	var img = "#pic-" +  center;

	$(img1).animate({left: '1500px'}, 0);
	$(img).animate({left: '-1500px'}, "400");
	$(img1).animate({left: '0px'}, "400");
	left = center;
	center = right;
	right++;

	if(center == 6){
		right = 1;
	}
	
}

function moveRight(){
	var img1 = "#pic-" + left;
	var img = "#pic-" +  center;

	$(img).animate({left: '1500px'}, "400");
	$(img).animate({left: '-1500px'}, 0);
	$(img1).animate({left: '-1500px'}, 0);
	$(img1).animate({left: '0px'}, "400");
	right = center;
	center = left;
	left--;

	if(center == 1) {
		left = 6;
	}
}

//////////////////////////////////////////////////////////////
/////////////////     ajax auto-suggest     //////////////////
//////////////////////////////////////////////////////////////


$(document).ready(function(){
	getValueFromTextFild();
});

function getValueFromTextFild(){
	var textbox = document.getElementById("seatchText");
	$("#seatchText").keyup(function(){
		$("#search-result").empty();
		var value = textbox.value;
		if(value.length != 0) {
			getData(value);	
			$("#search-result").css("display", "block");
	} else {
		$("#search-result").empty();
}
	});
}

function getData(val) {
	$.get("autoSuggest.php?key="+val, successFn);
}

function successFn(result) {
	//alert("Setting result");
	$("#search-result").append(result);
}