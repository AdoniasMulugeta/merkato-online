<?php
require_once('inc/init.php');
if(!Session::exists('user_id'))
   header("Location:signin.php?redirected-from={$_SERVER['SCRIPT_NAME']}&message=Please+signin+first"); 

if(Input::exists('message','GET'))
    echo "<p>".Input::get ('message','GET')."</P>";

$user_manager = UserManager::getInstance();
$current_user = $user_manager->getUserById(Session::get('user_id'));
if($current_user)
    $address_id = $current_user->getAddressId();
    if($address_id)
        $address = $user_manager->getAddressById($address_id);
        if(!$address)
            header("Location:signin.php?redirected-from={$_SERVER['SCRIPT_NAME']}&message=You+have+no+Address+associated+with+your+account"); 
            
if (Input::exists('update_address')){
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
       $new_address->setAddressId($address->getAddressId());
       $new_address->setAddress_1(Input::get('address_1'));
       $new_address->setAddress_2(Input::get('address_2'));
       $new_address->setCountry(Input::get('country'));
       $new_address->setCity(Input::get('city'));
       $new_address->setPhone(Input::get('phone'));

       if($user_manager->updateAddress($new_address)){
           header("Location:updateAccount.php");
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
		<h2>Update Information</h2>
		<form action="#" method="POST">
			<p>
				Address 1 <br>
                                <input type="text" name="address_1" value=<?=$address->getAddress_1()?>>
			</p>
			<p>
				Address 2 <br>
				<input type="text" name="address_2" value=<?=$address->getAddress_2()?>>
			</p>
			<p>
				country <br>
				<input type="text" name="country" value=<?=$address->getCountry()?>>
			</p>
			<p>
				city <br>
				<input type="text" name="city" value=<?=$address->getCity()?>>
			</p>
			<p>
				phone <br>
				<input type="text" name="phone" value=<?=$address->getPhone()?>>
			</p>
			<p>
				<input type="submit" name="update_address" value="Update" id="submit">
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

