<?php
header('Content-Type: application/xml');
include_once ($_SERVER['DOCUMENT_ROOT'].'/e-commerce/inc/init.php');
if(Input::exists('key','GET')){
    $manager = ProductManager::getInstance();
    $new_product = new Product();
    $product_found = $manager->searchProductByName(Input::get('key','GET'));
    $count = 0;
	$output = '<data>';
	if($product_found && $count<6){
		foreach ($product_found as $product){
			$output .= "<name>";
				if (!empty($product['product_name'])){
					$output .= $product['product_name'];
				}else{
					$output .= "";
				}
			$output .= "</name>";
			$count++;
        }	
		$output .= '</data>';
		print($output);
	}
}else{
		$output = "<data>
		  <name></name>
		  <name></name>
		  <name></name>
		  <name></name>
		  <name></name>";
		  $output .= "<name></name>";
		  $output .= "</data>";
		  print ($output);
	}

