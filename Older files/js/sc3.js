var pos = 6;
var pos1 = 5;
$(document).ready(function(){
	$("#arrowleft").click(function(){
		moveLeft();
	});
});


function moveLeft(){
	var img1 = "#picc-" + pos1;
	var img = "#picc-" + pos;
	$(img1).animate({left: '-1500px'}, "slow");
	$(img).animate({left: '0px'}, "slow");
	pos--;
	pos1--;
	//for(i=1; i>7; i++){
	//	$("#pic-" + i).animate({left: '1500px'}, 300);
	//}
}

