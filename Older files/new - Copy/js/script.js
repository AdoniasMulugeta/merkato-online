//////////////////////////////////////////////////////////////
/////////////////      drop-down     /////////////////////////
//////////////////////////////////////////////////////////////
//var count = 0;

//$(document).ready(function(){
//	$("#depart-btn").mouseenter(function(){
//		$("#depa-content").show();
//		count++;
//		if (count == 1){
//			$("#main-area").mouseenter(function(){
//				$("#depa-content").hide();
//				count--;
//			});
//		}
//	});
//});

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

var value = "";
var key = 1;

$(document).ready(function(){
	moveForSearch();
	getValueFromTextFild();
	$("#searchText").click(function(){
		createAutoAssist();
	});
	$("#main-area").click(function(){
		distroyAutoAssist();
	});
	// $("#searchText").focus(function(){
		//arrowKeyPress();
	// });
});

function getValueFromTextFild(){
	var textbox = document.getElementById("searchText");
	$("#searchText").keyup(function(){
		//$("#search-result").empty();
		 value = textbox.value;
		if(value.length != 0) {
			getXMLData();
			$("#search-result").css("display", "block");
	} else {
		$("#p1").text("");
		$("#p2").text("");
		$("#p3").text("");
		$("#p4").text("");
		$("#p5").text("");
		$("#p6").text("");
		$("#search-result").css("display", "none");
}
	});
}


function getXMLData() {	
	$.get("autosuggest.php?key="+value , function (result) {
		var name1 = result.getElementsByTagName("name")[0];
		var name2 = result.getElementsByTagName("name")[1];
		var name3 = result.getElementsByTagName("name")[2];
		var name4 = result.getElementsByTagName("name")[3];
		var name5 = result.getElementsByTagName("name")[4];
		var name6 = result.getElementsByTagName("name")[5];
		
		//alert(name5.firstChild.nodeValue);
		//alert(name4.firstChild.nodeValue)
		var ret = result.getElementsByTagName("name").length;

		if (ret == 1) {
			$("#a1").attr("href", "productDetail.php?name=" + name1.firstChild.nodeValue);
			$("#p1").text(name1.firstChild.nodeValue);
			$("#p2").text("");
			$("#p3").text("");
			$("#p4").text("");
			$("#p5").text("");
			$("#p6").text("");			
		}

		if (ret == 2) {
			$("#a1").attr("href", "productDetail.php?name=" + name1.firstChild.nodeValue);
			$("#a2").attr("href", "productDetail.php?name=" + name2.firstChild.nodeValue);
			$("#p1").text(name1.firstChild.nodeValue);
			$("#p2").text(name2.firstChild.nodeValue);
			$("#p3").text("");
			$("#p4").text("");
			$("#p5").text("");
			$("#p6").text("");			
		}

		if (ret == 3) {
			$("#a1").attr("href", "productDetail.php?name=" + name1.firstChild.nodeValue);
			$("#a2").attr("href", "productDetail.php?name=" + name2.firstChild.nodeValue);
			$("#a3").attr("href", "productDetail.php?name=" + name3.firstChild.nodeValue);
			$("#p1").text(name1.firstChild.nodeValue);
			$("#p2").text(name2.firstChild.nodeValue);
			$("#p3").text(name3.firstChild.nodeValue);
			$("#p4").text("");
			$("#p5").text("");
			$("#p6").text("");			
		}

		if (ret == 4) {
			$("#a1").attr("href", "productDetail.php?name=" + name1.firstChild.nodeValue);
			$("#a2").attr("href", "productDetail.php?name=" + name2.firstChild.nodeValue);
			$("#a3").attr("href", "productDetail.php?name=" + name3.firstChild.nodeValue);
			$("#a4").attr("href", "productDetail.php?name=" + name4.firstChild.nodeValue);
			$("#p1").text(name1.firstChild.nodeValue);
			$("#p2").text(name2.firstChild.nodeValue);
			$("#p3").text(name3.firstChild.nodeValue);
			$("#p4").text(name4.firstChild.nodeValue);
			$("#p5").text("");
			$("#p6").text("");			
		}

		if (ret == 5) {
			$("#a1").attr("href", "productDetail.php?name=" + name1.firstChild.nodeValue);
			$("#a2").attr("href", "productDetail.php?name=" + name2.firstChild.nodeValue);
			$("#a3").attr("href", "productDetail.php?name=" + name3.firstChild.nodeValue);
			$("#a4").attr("href", "productDetail.php?name=" + name4.firstChild.nodeValue);
			$("#a5").attr("href", "productDetail.php?name=" + name5.firstChild.nodeValue);
			$("#p1").text(name1.firstChild.nodeValue);
			$("#p2").text(name2.firstChild.nodeValue);
			$("#p3").text(name3.firstChild.nodeValue);
			$("#p4").text(name4.firstChild.nodeValue);
			$("#p5").text(name5.firstChild.nodeValue);
			$("#p6").text("");			
		}

		if (ret == 6) {
			$("#a1").attr("href", "productDetail.php?name=" + name1.firstChild.nodeValue);
			$("#a2").attr("href", "productDetail.php?name=" + name2.firstChild.nodeValue);
			$("#a3").attr("href", "productDetail.php?name=" + name3.firstChild.nodeValue);
			$("#a4").attr("href", "productDetail.php?name=" + name4.firstChild.nodeValue);
			$("#a5").attr("href", "productDetail.php?name=" + name5.firstChild.nodeValue);
			$("#a6").attr("href", "productDetail.php?name=" + name6.firstChild.nodeValue);
			$("#p1").text(name1.firstChild.nodeValue);
			$("#p2").text(name2.firstChild.nodeValue);
			$("#p3").text(name3.firstChild.nodeValue);
			$("#p4").text(name4.firstChild.nodeValue);
			$("#p5").text(name5.firstChild.nodeValue);
			$("#p6").text(name6.firstChild.nodeValue);			
		}

			//$("#p1").text(name1.firstChild.nodeValue);
			//$("#p2").text(name2.firstChild.nodeValue);
			//$("#p3").text(name3.firstChild.nodeValue);
			//$("#p4").text(name4.firstChild.nodeValue);
			//$("#p5").text(name5.firstChild.nodeValue);
			//$("#p6").text(name6.firstChild.nodeValue);
	});
}


function successFn(result) {
	//alert("Setting result");
	$("#search-result").append(result);
	$("#search-result").css("display", "block");
}

function errorFn(xhr, status, strErr) {
	alert("There was an error!");
}

function distroyAutoAssist() {
	$("#search-result").css("display", "none");
}

function createAutoAssist() {
	$("#search-result").css("display", "block");
}

function moveForSearch() {
	$("#searchText").mouseenter(function(){
		$("#searchText").val(value);
	});
	$("#p1").mouseenter(function(){
		var val = $("#p1").text();
		$("#searchText").val(val);
	});
	$("#p2").mouseenter(function(){
		var val = $("#p2").text();
		$("#searchText").val(val);
	});
	$("#p3").mouseenter(function(){
		var val = $("#p3").text();
		$("#searchText").val(val);
	});
	$("#p4").mouseenter(function(){
		var val = $("#p4").text();
		$("#searchText").val(val);
	});
	$("#p5").mouseenter(function(){
		var val = $("#p5").text();
		$("#searchText").val(val);
	});
	$("#p6").mouseenter(function(){
		var val = $("#p6").text();
		$("#searchText").val(val);
	});
}

