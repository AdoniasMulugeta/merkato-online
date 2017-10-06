<?php
include_once ($_SERVER['DOCUMENT_ROOT'].'/e-commerce/inc/init.php');
if(!Session::exists('user_id'))
   header("Location:signin.php?redirected-from={$_SERVER['SCRIPT_NAME']}&message=Please+signin+first"); 

if(Input::exists('message','GET'))
    echo "<p>".Input::get ('message','GET')."</P>";
if (Input::exists('submit_address')){
   $data_to_validate = [
       'address_1'=>['required'=>true],
       'address_2'=>['required'=>true],
       'country'=>['required'=>true],
       'city'=>['required'=>true],
       'phone'=>['required'=>true]
   ]; 
   $validation = new Validate();
   $validation->validate($data_to_validate);
   if($validation->passed){
       $user_manager = UserManager::getInstance();
       $new_address = new Address();
       $new_address->setAddress_1(Input::get('address_1'));
       $new_address->setAddress_2(Input::get('address_2'));
       $new_address->setCountry(Input::get('country'));
       $new_address->setCity(Input::get('city'));
       $new_address->setPhone(Input::get('phone'));

       if($user_manager->setAddress(Session::get('user_id'),$new_address)){
           header("Location:account.php");
       }
   }
   else{
       $validation->printErrors();
   }
}
?>
<!DOCTYPE>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/signup.css">
	<title>SIGN UP MERKATO ONLINE</title>
</head>
<body>
    <a href="home.php"><img src="images/signup/logoRed.png"></a>
	<section>
		<h2>Address Information</h2>
		<form action="#" method="GET">
			<p>
				Address 1 <br>
                                <input type="text" name="address_1" value=<?=Input::get("address_1")?>>
			</p>
			<p>
				Address 2 <br>
				<input type="text" name="address_2" value=<?=Input::get("address_2")?>>
			</p>
			<p>
				country <br>
				<input type="text" name="country" value=<?=Input::get("country")?>>
			</p>
			<p>
				city <br>
				<input type="text" name="city" value=<?=Input::get("city")?>>
			</p>
			<p>
				phone <br>
				<input type="text" name="phone" value=<?=Input::get("phone")?>>
			</p>
			<p>
				<input type="submit" name="submit_address" value="next" id="submit">
			</p>
			<p id="see-our">
				see our <a href="#">Privacy policy</a> and
				<a href="#">Condition of Use</a>.
			</p>
			<p id="have-acc">
                            Already have an account?&nbsp; <a href="signin.php">Sign in</a>
			</p>
		</form>
	</section>
	<div id="footer">
		<a id="first-a-foot" href="#">Conditions of Use</a>
		<a href="#">Privacy Policy</a>
		<a href="#">Help</a>
		<p>Copy Right 2017, merkatoOnLine.com</p>
	</div>
</body>
</html>
