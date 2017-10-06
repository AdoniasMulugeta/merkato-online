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
	var img2 = "#pic-" +  (left-1);

	if(left == 0){
		var img2 = "#pic-" +  6;		
	}

	$(img).animate({left: '1500px'}, "400");
	$(img1).animate({left: '-1500px'}, 0);
	$(img1).animate({left: '600px'}, "400");

	$(img2).animate({left: '-900px'}, 0);
	$(img2).animate({left: '-1500px'}, "400");
	$(img1).animate({left: '0px'}, "400");
	right = center;
	center = left;
	left--;

	if(center == 1) {
		left = 6;
	}
}