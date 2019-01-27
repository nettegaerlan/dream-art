<?php 
ob_start();
	session_start();

	function getCartCount(){
		return array_sum($_SESSION["cart"]);
	}

	$item_id = htmlspecialchars($_POST["item_id"]);
	$item_quantity = htmlspecialchars($_POST["item_quantity"]);
	$ifFromCatalogPage = $_POST["ifFromCatalogPage"];

	if($item_quantity == "0"){
		unset($_SESSION["cart"][$item_id]);
	}else{
		if(isset($_SESSION["cart"][$item_id])){
			//add it to our session variable
			if($ifFromCatalogPage == 1){
				$_SESSION["cart"][$item_id] += $item_quantity;
			}else{
				$_SESSION["cart"][$item_id] = $item_quantity;
			}
			
		} else{
			$_SESSION["cart"][$item_id] = $item_quantity;
		}
	}

	echo getCartCount();

	ob_end_flush();
?>