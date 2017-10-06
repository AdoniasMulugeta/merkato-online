<?php
	//echo $_POST["address1"]."&".$_POST["address2"]."&".$_POST["region"]."&".$_POST["city"]."&".$_POST["phone_no"];
	echo '<div class="step-progress-bar">
		<ul class="progerssbar2">
		<li class="active">Step 1<br>Address</li>
		<li class="active">Step 2<br>Business</li>
		<li>Step 3<br>Payment</li>
		</ul>
		</div>
		<div class="sepator"></div>
		<section class="form">
		<h2>Describe your Business</h2>
		<form action="#" method="POST">
			<p>
                            Campany Name<br>
                            <input type="text" name="campany_name" id="campany_name">
			</p>
			<p>
                            Campany Description <br>
                            <textarea cols="37" name="description" name="campany_discription" rows="6" id="campany_discription"></textarea>
			</p>
			<p>
                            Tax Detail <br>
                            <textarea cols="37" name="tax_detail" id="tax_detail" rows="6"></textarea>
			</p>
			<p>
                            <input type="submit" name="provide_address" value="next" id="nextt">
			</p>
                        <div>
		</form>
	</section>';

?>		 