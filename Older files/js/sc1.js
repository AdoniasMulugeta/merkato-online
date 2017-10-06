var pos = 2;
var pos1 = 0;
$(document).ready(function(){
	$("#arrowright").click(function(){
		moveLeft();
	});
});


function moveLeft(){
	var img1 = "#pic-" + (pos1 + 1);
	var img = "#pic-" + pos;
	$(img1).animate({left: '1500px'}, "slow");
	$(img).animate({left: '0px'}, "slow");
	pos++;
	pos1++;
	//for(i=1; i>7; i++){
	//	$("#pic-" + i).animate({left: '1500px'}, 300);
	//}
}

