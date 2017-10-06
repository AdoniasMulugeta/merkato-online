<?php
require_once 'inc/init.php';
if(Input::exists('message','GET'))
    echo '<p>'.Input::get ('message','GET').'</p>';
if(Input::exists("sign_in")){
    $validation = new Validate();
    $data_to_validate = array(
        'email'=>array('required'=>true,'min'=>9),
        'password'=>array('required'=>true)
    );
    $validation->validate($data_to_validate);
    if($validation->passed){
        $user = new User();
        $user->setEmail(Input::get('email'));
        $user->setPassword(Input::get('password'));
        
        $user_manager = UserManager::getInstance();
        $login_success = $user_manager->login($user);
        if($login_success){
            Session::set("user_id",  UserManager::getCurrentUser()->getUserId());
            echo UserManager::getCurrentUser()->getUserId();
            if(Input::exists('redirected-from','GET')){
                header('Location:'.Input::get ('redirected-from','GET'));
            }
            else{
                header('Location:home.php');
            }
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
	<link rel="stylesheet" type="text/css" href="css/signin.css">
	<title>SIGN IN MERKATO ONLINE</title>
</head>
<body>
    <a href="home.php"><img src="images/signin/logoRed.png"></a>
	<section>
		<h2>Sign in</h2>
		<form action="#" method="POST">
			<p>
				Email <br>
				<input type="text" name="email">
			</p>
			<p>
				Password <br>
				<input type="password" name="password">
			</p>
			<p>
				<input type="submit" name="sign_in" value="Sign in" id="submit">
			</p>
			<p id="see-our">
				see our <a href="#">Privacy policy</a> and
				<a href="#">Condition of Use</a>.
			</p>
			<p id="have-acc">
                            New to merkatoOnLine? &nbsp; <a href="signin.php">Sign up</a>
			</p>
		</form>
	</section>
	<div id="footer">
		<a id="first-a-foot" href="#">Conditions of Use</a>
		<a href="#">Privacy Policy</a>
		<a href="#">Help</a>
		<p>&copy 2017, merkatoOnLine.com</p>
	</div>
</body>
</html>