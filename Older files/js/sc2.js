//var pos = 2;
var pos = 2;
//var x = 1;
//var pos1 = 1;

//var pos = 2;
//var pos1 = 1;

$(document).ready(function(){
	$("#arrowleft").click(function(){
		moveRight();
		return false;
	});
});


function moveRight(){
	
	//var pos1 = 7 - pos;
	var img = "#picc-" + pos;
 		$(img).animate({left: '1500px'}, 0);
		$(img).animate({left: '-500px'}, "slow");
	    $(img).animate({left: '0px'}, "slow");
	    pos++;

}

