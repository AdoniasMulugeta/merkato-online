<?php
require_once('inc/init.php');
if(!Session::exists('user_id'))
   header("Location:signin.php?redirected-from={$_SERVER['SCRIPT_NAME']}&message=Please+signin+first"); 
   
$user_manager = UserManager::getInstance();
$current_user = $user_manager->getUserById(Session::get('user_id'));

if(Input::get('update_account')){
    $validation = new Validate();
    $data_to_validate = array(
        'first_name'=> array('required'=>true,'min'=>2,'max'=>16),
        'last_name'=> array('required'=>true,'min'=>2,'max'=>16),
        'old_password'=>['required'=>true],
        'password'=> array('required'=>true,'match'=>'re_password','min'=>6,'max'=>16)
    );
     $validation->validate($data_to_validate);
    if($validation->passed){
        $user_manager = UserManager::getInstance();
        $new_user = new User();
        $new_user->setEmail($current_user->getEmail());
        $new_user->setPassword(Input::get('old_password'));
        
        if($user_manager->login($new_user)){
            $new_user->setUserId(Session::get('user_id'));
            $new_user->setFirstName(Input::get("first_name"));
            $new_user->setLastName(Input::get("last_name"));
            $new_user->setSalt(Hash::generateSalt(32));
            $hashed_password = Hash::generateHash(Input::get('password').$new_user->getsalt());
            $new_user->setPassword($hashed_password);
            
            if($user_manager->updateUser($new_user)){
                //Email the user Here for validation purposes
                echo "Update Successfull";
            }
            else{
                echo 'FAIL!';
            }
        }
        else{
            echo 'Old password Incorrect';
        }
    }
    else {
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
		<h2>Update account</h2>
		<form action="#" method="POST">
			<p>
				First name <br>
                                <input type="text" name="first_name" value=<?=((Input::get("first_name")) ? Input::get("first_name"):$current_user->getFirstName())?>>
			</p>
			<p>
				Last name <br>
				<input type="text" name="last_name" value=<?=((Input::get("last_name")) ? Input::get("last_name"):$current_user->getLastName())?>>
			</p>
			<p>
				Email <br>
                                <input type="text" name="email" disabled="true" value="<?=$current_user->getEmail()?>">
			</p>
                        <p>
				Old Password <br>
				<input type="password" name="old_password">
			</p>
			<p>
				New Password <br>
				<input type="password" name="password" placeholder=" At least 6 characters">
			</p>
			<p>
				Re-enter New Password <br>
				<input type="password" name="re_password">
			</p>
			<p>
				<input type="submit" name="update_account" value="Update account" id="submit">
			</p>
			<p id="see-our">
                        <div>
                            <a href="updateAddress.php">Update Your Address Information</a></div>
				<!--see our <a href="#">Privacy policy</a> and-->
				<!--<a href="#">Condition of Use</a>.-->
			</p>
			<p id="have-acc">
                            <!--Already have an account?&nbsp; <a href="signin.php">Sign in</a>-->
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