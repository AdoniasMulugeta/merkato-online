<?php
require_once('inc/init.php');
if(!Session::exists('user_id'))
   header("Location:signin.php?redirected-from={$_SERVER['SCRIPT_NAME']}&message=Please+signin+first"); 

if(Input::exists('search','GET')){
    $product_name = Input::get('search_field', 'GET');
    if(!empty($product_name)){
        header("Location: productList.php?product_name={$product_name}");
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
	<link rel="stylesheet" type="text/css" href="css/product-catagory.css">
	<title>LAPTOPS ETHIOPIA MERKATO ONLINE</title>
    <script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
</head>
<body>
	<div id="main-area">
		<section id="header">
			<aside class="logo">
				<a href="home.php"><img src="images/product-catagory/logoRed.png" alt="merkato on line" title="merkato on line"></a>
				<a class="lang" href="#">ENG/AMH</a>
			</aside>
			<aside class="search">
				<form action="" method="GET">
					<input id="seatchText" type="text" name="search_field" placeholder=" Search..">
					<input id="searchSubmit" type="submit" name="search" value="Search">
				</form>
			</aside>
			<aside class="top-nav">
				<ul>
				    <li><a href="#"><img src="images/product-catagory/person1.png"> Your Profile</a></li>
					<li><a href="#">Orders</a></li>
					<li><a href="#"><img src="images/product-catagory/whiteChart.png" width="19" height="19"> Cart</a></li>
					<li><a href="#">Wish List</a></li>
					<li><a href="#">Sell</a></li>
				</ul>
			</aside>
			<aside class="depa">
				<a id="depart-btn" href="#">Departments </a>	
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
					<li><a id="signUp" href="../signup/index.html">Sign up </a></li>
					<li><a id="login" href="../signin/index.html">Log in</a></li>
					<li><a href="#">Log out</a></li>
				</ul>
			</aside>
			<div id="head-body-separater"></div>
		</section>
		<section id="search-result-info">
			<div>
				<p>1-10 of over 2,000 results for <a href="#">Electronics </a>: <a href="#">Computers & Accessories </a>: <a href="#">Computers & Tablats </a>: <span>"laptop"</span></p>
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
<!--Adonias-->
            <?php if($search_result):?>
            <?php foreach ($search_result as $product): ?>
            <aside>
                <a href='#'><img src=<?=$product['image_dir']?>></a>
                <div>
                    <span>by Lenovo</span>
                    <h3><a href='#'><?=$product['product_name']?></a></h3>
                    <ul><li><?=$product['description']?></li></ul>
                    <aside>
                        <a href='#'><?=$product['price']?></a><br>
                        <p>FREE Shipping on eligible orders</p>
                    </aside>
                </div>
            </aside>
            <?php endforeach;?>
            <?php endif;?>
<!--Adonias-->
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
    <section id="search-result">
    	
    </section>
    <section id="depa-content">
			<ul>
                            <li><a href="productDetail.php?catagory=Laptop">Laptops</a></li>
				<li><a href="#">Components</a></li>
				<li><a href="#">Electronics</a></li>
				<li><a href="#">Gaming</a></li>
				<li><a href="#">Networking</a></li>
				<li><a href="#">Office Solutions</a></li>
				<li><a href="#">Software $ Services</a></li>
				<li><a href="#">Home $ Tools</a></li>
				<li><a href="#">Apparel $ Accessories</a></li>
				<li><a href="#">Hobbies $ Toys</a></li>
			</ul>
	</section> 


</div>
</body>
</html>