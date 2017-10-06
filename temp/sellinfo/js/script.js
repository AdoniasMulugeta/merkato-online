$(document).ready(function(){
    		$("#next").click(function(){
    			getData();
				return false;    			
    		});
    	});

    	function getData() {
    		$.ajax({
    				url: "text.php",
    				type: "POST",
    				data: "address1="+$("#address1").val()+"&address2="+$("#address2").val()+"&region="+$("#region").val()+"&city="+$("#city").val()+"&phone_no="+$("#phone_no").val(),
    				dataType: "text",
    				success: successFn, 
    				error: errorFn
    			});
    	}

    	function successFn(result){ 		
    		$("#mainarea").empty();
    		$("#mainarea").append(result);
    		$('html, body').animate({scrollTop: 0}, "slow");
    		$("#nextt").click(function(){
    			//alert("mike")
    			getDataAgain();
				return false;    			
    		});
    		//alert(result);
    	}

    	function errorFn(){
    		alert("error");
    	}
  


  		function getDataAgain() {
    		$.ajax({
    				url: "payment.php",
    				type: "POST",
    				data: "campany_name="+$("#campany_name").val()+"&campany_discription="+$("#campany_discription").val()+"&tax_detail="+$("#tax_detail").val(),
    				dataType: "text",
    				success: successFN, 
    				error: errorFN
    			});
    	}

    	function successFN(result){ 		
    		//alert(result);
    		$("#mainarea").empty();
    		$("#mainarea").append(result);
    		$('html, body').animate({scrollTop: 0}, "slow");
    	}

    	function errorFN(){
    		alert("error");
    	}