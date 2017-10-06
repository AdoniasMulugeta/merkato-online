<?php
include_once ($_SERVER['DOCUMENT_ROOT'].'/e-commerce/inc/init.php');
if(Input::exists('search','GET')){
    if(Input::exists('search_field','GET') && !empty(Input::get('search_field', 'GET'))){
        $name = Input::get('search_field','GET');
        header("Location:".SEARCH_RESULTS_PAGE."?name={$name}");
    }
}
?>
<!DOCTYPE>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../css/home.css">
	<title>BUY ON LINE ETHIOPIA MERKATO ONLINE</title>
        <script type="text/javascript" src="../js/jquery-1.9.1.min.js"></script>
        <script type="text/javascript" src="../js/script.js"></script>
</head>
<body>
	<div id="main-area">
		<section id="header">
			<aside class="logo">
				<a href="#"><img src="<?=IMAGE_DIR?>/product-catagory/logoRed.png" alt="merkato on line" title="merkato on line"></a>
				<a class="lang" href="#">ENG/AMH</a>
			</aside>
			
			<aside class="top-nav">
				<ul>
				    <li><a href="<?=ACCOUNT?>"><img src="<?=IMAGE_DIR?>/product-catagory/person1.png"> Your Profile</a></li>
					<li><a href="#">Orders</a></li>
					<li><a href="#"><img src="<?=IMAGE_DIR?>/product-catagory/whiteChart.png" width="19" height="19"> Cart</a></li>
					<li><a href="#">Wish List</a></li>
                                        <li><a href="<?=ADD_PRODUCT?>">Sell</a></li>
				</ul>
			</aside>
			<aside class="info">
				<ul>
					<li><a href="#">About Us</a></li>
					<li><a href="#">Documention</a></li>
					<li><a href="#">Contact Us</a></li>
					<li><a href="#">Our Policy</a></li>
					<li><a href="#">Help</a></li>
				</ul>
			</aside>
			<aside class="credentials">
				<ul>
                                    <?php 
                                        if(!Session::exists('user_id')){
                                            echo '<li><a id="signUp" href="signup.php">Signup </a></li>';
                                            echo '<li><a id="login" href="signin.php">Login</a></li>';
                                        }
                                        else{
                                            echo '<li><a href="logout.php">Logout</a></li>';
                                        }
                                    ?>
				</ul>
			</aside>
			<div id="head-body-separater"></div>
		</section>
		<section id="nav">
			<div>
				<ul>
					<li><a href="#">All Electronics</a></li>
					<li><a href="#">Deals</a></li>
					<li><a href="#">Best Sellers</a></li>
					<li><a href="#">TV & Video</a></li>
					<li><a href="#">Audio $ Home Theater</a></li>
					<li><a href="#">Computer</a></li>
					<li><a href="#">Camera & Photo</a></li>
					<li><a href="#">Wearable Techonology</a></li>
					<li><a href="#">Car Electronics & GPS</a></li>
					<li><a href="#">Portable Audio</a></li>
					<li><a href="#">Cell Phones</a></li>
					<li><a href="#">Office Electronics</a></li>
				</ul>
			</div>
        </section>
        	
        <section id="ad-level-1">
        <aside id="ad-level-1-img">
        		<a href="#"><img src="<?=IMAGE_DIR?>/home/hero-ad.jpg" id="pic-1"></a>
        		<a href="#"><img src="<?=IMAGE_DIR?>/home/hero-ad-1.jpeg" id="pic-2"></a>
        		<a href="#"><img src="<?=IMAGE_DIR?>/home/hero-ad-2.jpeg" id="pic-3"></a>
        		<a href="#"><img src="<?=IMAGE_DIR?>/home/hero-ad-3.jpeg" id="pic-4"></a>
        		<a href="#"><img src="<?=IMAGE_DIR?>/home/hero-ad-4.jpeg" id="pic-5"></a>
        		<a href="#"><img src="<?=IMAGE_DIR?>/home/hero-ad-5.jpeg" id="pic-6"></a>

        		<a href="#"><img src="<?=IMAGE_DIR?>/home/arrowleft.png" id="arrowleft"></a>
        		<a href="#"><img src="<?=IMAGE_DIR?>/home/arrowright.png" id="arrowright"></a>
        </aside>
        </section>
        		<div id="body-body-separater"></div>
        <section id="home-nav">
        	<aside id="home-nav-1">
        		
        	</aside>
        	<aside id="home-nav-2">
        		<h2>Wellcome</h2>
        		<p class="best-exp">sign in for the best experience</p>
        		<a href="<?=SIGNIN_PAGE?>">Sign in</a>
        		<p id="new-to-para">New to MekatoOnLine?&nbsp; <a href="<?=SIGNUP_PAGE?>">Start here</a></p>
        	</aside>
        	<aside id="home-nav-3">
        		
        	</aside>
        </section>
        		<div id="body-footer-separater"></div>
        <section id="footer">
        	
        </section>		
 		<section id="copy-right">
 			
 		</section>
    </div>    



<div id="pop-up-section">
    <section id="signUp-popup">
    		<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;New here.. just fill down the form and join <br>&nbsp;&nbsp;&nbsp;the fammily. Buy, Sell, Advertise and much more..</p>
		<form action="#" method="post"> 
	        <table class="signup-table">
	            <tr>
	            <td class="signup-table-cl-1">
	                &nbsp;
	            </td>
	            <td>
	                &nbsp;
	            </td>
	            </tr>
	            <tr>    
	            <td class="signup-table-cl-1">
	               Email: 
	            </td>
	            <td>
	                <input id="email" type="text" name="email" />
	            </td>
	            </tr>
	            <tr>    
	            <td class="signup-table-cl-1">
	               User Name: 
	            </td>
	            <td>
	                <input id="username" type="text" name="userName" />
	            </td>
	            </tr>
	            <tr>    
	            <td class="signup-table-cl-1">
	               Password: 
	            </td>
	            <td>
	                <input id="password" type="password" name="password" />
	            </td>
	            </tr>
	            <tr>
	            <td class="signup-table-cl-1">
	                &nbsp;
	            </td>
	            <td>
	                &nbsp;
	            </td>
	            </tr>
	            <tr>
	            <td class="table-cl-1">
	                &nbsp;
	            </td>
	            <td>
	                <input class="Submit1" type="submit" value="submit" /> 
	            </td>
	            </tr>
	        </table>
        </form>
    	    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    	    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Your email will never be sold or shared)</p>
    </section>
    <section id="login-popup">
    		<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Wellcome back.. when you try to buy or sell, <br>&nbsp;&nbsp;&nbsp;You will be requested with a larger form.</p>
                <form action="<?=SIGNIN_PAGE?>" method="post"> 
	        <table class="signup-table">
	            <tr>
	            <td class="signup-table-cl-1">
	                &nbsp;
	            </td>
	            <td>
	                &nbsp;
	            </td>
	            </tr>
	            <tr>    
	            <td class="signup-table-cl-1">
	               User Name: 
	            </td>
	            <td>
	                <input id="username" type="text" name="userName" />
	            </td>
	            </tr>
	            <tr>    
	            <td class="signup-table-cl-1">
	               Password: 
	            </td>
	            <td>
	                <input id="password" type="password" name="password" />
	            </td>
	            </tr>
	            <tr>
	            <td class="signup-table-cl-1">
	                &nbsp;
	            </td>
	            <td>
	                &nbsp;
	            </td>
	            </tr>
	            <tr>
	            <td class="table-cl-1">
	                &nbsp;
	            </td>
	            <td>
	                <input class="Submit1" type="submit" value="submit" /> 
	            </td>
	            </tr>
	        </table>
        </form>
    </section>
    
		<section>
			<div id="depa-dropdown">
				<span><a href="#">Departments </a></span>
					<div id="depa-dropdown-content">
	 					<ul>
		                <a href="<?=SEARCH_RESULTS_PAGE?>?catagory=Laptop"><li>Laptop</li></a>
						<a href="<?=SEARCH_RESULTS_PAGE?>?catagory=desktop"><li>Desktop</li></a>
						<a href="#"><li>Electronics</li></a>
						<a href="#"><li>Gaming</li></a>
						<a href="#"><li>Networking</li></a>
						<a href="#"><li>Office Solutions</li></a>
						<a href="#"><li>Software $ Services</li></a>
						<a href="#"><li>Home $ Tools</li></a>
						<a href="#"><li>Apparel $ Accessories</li></a>
						<a href="#"><li>Hobbies $ Toys</li></a>
					</ul>
					</div>
			</div>
	</section>
	<aside class="search">
				<form action="#" method="GET">
					<input id="searchText" type="text" name="search_field" placeholder=" Search.." autocomplete="off"> 
					<input id="searchSubmit" type="submit" name="search" value="Search">
				</form>
				<div id="search-result">
    	<a id="a1" href="#"><p id="p1"></p></a>
    	<a id="a2" href="#"><p id="p2"></p></a>
    	<a id="a3" href="#"><p id="p3"></p></a>
    	<a id="a4" href="#"><p id="p4"></p></a>
    	<a id="a5" href="#"><p id="p5"></p></a>
    	<a id="a6" href="#"><p id="p6"></p></a>
    </div>
			</aside>
</div>
</body>
</html>