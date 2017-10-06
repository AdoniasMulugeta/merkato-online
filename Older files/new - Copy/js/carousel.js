var center = 1;
var right = 2;
var left = 6;


$(document).ready(function(){
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
	$(img1).animate({left: '-1500px'}, 0);
	$(img1).animate({left: '0px'}, "400");
	right = center;
	center = left;
	left--;

	if(center == 1) {
		left = 6;
	}
}