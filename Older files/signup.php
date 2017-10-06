<?php
require_once('inc/init.php');
if(Input::exists("create_account")){
    $validation = new Validate();
    $data_to_validate = array(
        'first_name'=> array('required'=>true,'min'=>2,'max'=>16),
        'last_name'=> array('required'=>true,'min'=>2,'max'=>16),
        'email'=> array('required'=>true,'min'=>9,'unique'=>'users'),
        'password'=> array('required'=>true,'match'=>'re_password','min'=>6,'max'=>16)
    );
    $validation->validate($data_to_validate);
    if($validation->passed){
        $user_manager = UserManager::getInstance();
        $new_user = new User();
        $new_user->setFirstName(Input::get("first_name"));
        $new_user->setLastName(Input::get("last_name"));
        $new_user->setEmail(Input::get("email"));
        $new_user->setSalt(Hash::generateSalt(32));
        $hashed_password = Hash::generateHash(Input::get('password').$new_user->getsalt());
        $new_user->setPassword($hashed_password);
        
        if($user_manager->addUser($new_user)){
            //Email the user Here for validation purposes
        }
        else{
            echo 'FAIL!';
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
		<h2>Create account</h2>
		<form action="#" method="POST">
			<p>
				First name <br>
                                <input type="text" name="first_name" value=<?=Input::get("first_name")?>>
			</p>
			<p>
				Last name <br>
				<input type="text" name="last_name" value=<?=Input::get("last_name")?>>
			</p>
			<p>
				Email <br>
				<input type="text" name="email" value=<?=Input::get("email")?>>
			</p>
			<p>
				Password <br>
				<input type="password" name="password" placeholder=" At least 6 characters">
			</p>
			<p>
				Re-enter password <br>
				<input type="password" name="re_password">
			</p>
			<p>
				<input type="submit" name="create_account" value="Create account" id="submit">
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