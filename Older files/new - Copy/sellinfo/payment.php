<?php
	//echo $_POST["campany_name"]."&".$_POST["campany_discription"]."&".$_POST["tax_detail"];
	echo '<div class="step-progress-bar">
		<ul class="progerssbar2">
		<li class="active">Step 1<br>Address</li>
		<li class="active">Step 2<br>Business</li>
		<li class="active">Step 3<br>Payment</li>
		</ul>
		</div>
		<div class="sepator"></div>
		<section class="form">
		<h2>Describe your Business</h2>
		<form action="#" method="POST">
			<p>
                            Card No<br>
                            <input type="text" name="card_no">
			</p>
			<p>
                            Expire Date<br>
                            <input type="text" name="expire_date">
			</p>
			<p>
                            <input type="submit" name="provide_address" value="next" id="nexttt">
			</p>
                        <div>
		</form>
	</section>';
?>	