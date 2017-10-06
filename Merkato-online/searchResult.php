<?php
include_once ($_SERVER['DOCUMENT_ROOT'].'/e-commerce/inc/init.php');
if(Input::exists('search','GET')){
    if(Input::exists('search_field','GET') && !empty(Input::get('search_field', 'GET'))){
        $name = Input::get('search_field','GET');
        header("Location:".SEARCH_RESULTS_PAGE."?name={$name}");
    }
}
if(Input::exists('catagory','GET')){
    $product_manager = ProductManager::getInstance();
    $search_result = $product_manager->searchProductByCatagory(Input::get('catagory', 'GET'));
}
elseif(Input::exists('name','GET')){
    $product_manager = ProductManager::getInstance();
    $search_result = $product_manager->searchProductByName(Input::get('name','GET'));
}    
?>
<!DOCTYPE>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../css/product-catagory.css">
	<title>LAPTOPS ETHIOPIA MERKATO ONLINE</title>
    <script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
</head>
<body>
	<div id="main-area">
		<section id="header">
			<aside class="logo">
				<a href="<?=HOME_PAGE?>"><img src="<?=IMAGE_DIR?>/product-catagory/logoRed.png" alt="merkato on line" title="merkato on line"></a>
				<a class="lang" href="#">ENG/AMH</a>
			</aside>
			
			<aside class="top-nav">
				<ul>
				    <li><a href="#"><img src="<?=IMAGE_DIR?>/product-catagory/person1.png"> Your Profile</a></li>
					<li><a href="#">Orders</a></li>
					<li><a href="#"><img src="<?=IMAGE_DIR?>/product-catagory/whiteChart.png" width="19" height="19"> Cart</a></li>
					<li><a href="#">Wish List</a></li>
					<li><a href="#">Sell</a></li>
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
					<li><a id="signUp" href="<?=SIGNUP_PAGE?>">Sign up </a></li>
					<li><a id="login" href="<?=SIGNIN_PAGE?>">Log in</a></li>
					<li><a href="#">Log out</a></li>
				</ul>
			</aside>
			<div id="head-body-separater"></div>
		</section>
		<section id="search-result-info">
			<div>
				<p>1-10 of over 2,000 results for <a href="#">Electronics </a>: <a href="#">Computers & Accessories </a>: <a href="#">Computers & Tablats </a>: <span><?php 
				if(isset($_GET["name"])){
				  echo '"'.@$_GET["name"].'"';	
				}
				 ?></span></p>
			</div>
			<aside>
				<form>
					Sort by &nbsp
					<select>
						<option>Price: Low to High</option>
						<option>Price: High to Low</option>
						<option>Avg: Customer Review</option>
						<option>Most Viewed</option>
						<option>Best Sellers</option>
					</select>
				</form>
			</aside>
        </section>
        <section id="product-list">
        	<p>Showing results for <span>Laptops</span></p>
        	<P>Laptop Display Size: <a href="#">17 inches & above </a>| <a href="#">16 to 16.9 inches </a>| <a href="#">15 to 15.9 inches </a>| <a href="#">14 to 14.9 inches </a>| <a href="#">13 to 13.9 inches </a>| <a href="#">See more</a></P>
<!--php output-->
            <?php if($search_result):?>
            <?php foreach ($search_result as $product): ?>
            <aside>
                <a href='#'><img src=<?=IMAGE_DIR.'/Laptop/'.$product['image_dir']?>></a>
                <div>
                    <span>by Lenovo</span>
                    <h3><a href='#'><?=$product['product_name']?></a></h3>
                    <ul><li><?=$product['description']?></li></ul>
                    <aside>
                        <a href='#'>$<?=$product['price']?></a><br>
                        <p>FREE Shipping on eligible orders</p>
                    </aside>
                </div>
            </aside>
            <?php endforeach;?>
            <?php endif;?>
<!--php output-->
        </section>
        <section id="left-nave">
 			<h3>Shop Category</h3>
				<ul>
					<li>
						<a href="#">All Electronics</a>
						<ul>
							<li><a href="#">Laptop Computers</a></li>
							<li><a href="#">Phones</a></li>
							<li><a href="#">Tv</a></li>
							<li><a href="#">Computer Acesseres</a></li>
							<li><a href="#">Phone Acesseres</a></li>
						</ul>
					</li>
				</ul>	
 		</section>
 		<section>
 			
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
                                                <a href="searchResult.php?catagory=Laptop"><li>Laptop</li></a>
						<a href="searchResult.php?catagory=desktop"><li>Desktop</li></a>
						<a href="searchResult.php?catagory=Electronics"><li>Electronics</li></a>
						<a href="searchResult.php?catagory=desktop"><li>Gaming</li></a>
						<a href="searchResult.php?catagory=desktop"><li>Networking</li></a>
						<a href="searchResult.php?catagory=desktop"><li>Office Solutions</li></a>
						<a href="searchResult.php?catagory=desktop"><li>Software $ Services</li></a>
						<a href="searchResult.php?catagory=desktop"><li>Home $ Tools</li></a>
						<a href="searchResult.php?catagory=desktop"><li>Apparel $ Accessories</li></a>
						<a href="searchResult.php?catagory=desktop"><li>Hobbies $ Toys</li></a>
					</ul>
					</div>
			</div>
	</section> 
	<aside class="search">
			<form action="#" method="GET">
				<input id="searchText" type="text" name="search_field" placeholder=" Search.." autocomplete="off"> 
				<input id="searchSubmit" type="submit" name="search" value="Search">
				 <div id="search-result">
    	<a id="a1" href="#"><p id="p1"></p></a>
    	<a id="a2" href="#"><p id="p2"></p></a>
    	<a id="a3" href="#"><p id="p3"></p></a>
    	<a id="a4" href="#"><p id="p4"></p></a>
    	<a id="a5" href="#"><p id="p5"></p></a>
    	<a id="a6" href="#"><p id="p6"></p></a>
    			</div>
			</form>
	</aside>
</div>
</body>
</html>