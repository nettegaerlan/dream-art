<?php 
	
	ob_start();
	session_start();
	require "../vendor/autoload.php";
	use PayPal\Api\Payment;
	use PayPal\Api\PaymentExecution;	//to process the payment
	
	require_once "paypal/start.php";
	require_once "connect.php";
	if(!isset($_GET['success'], $_GET['paymentId'], $_GET['PayerID'])){
		die();
	}

	if((bool)$_GET['success'] === false){
		die();
	}

	$paymentId = $_GET['paymentId'];
	$payerId = $_GET['PayerID'];
	$payment = Payment::get($paymentId, $paypal);
	$execute = new PaymentExecution();
	$execute->setPayerId($payerId);
	$transaction_code = "";

	try{
		$result = $payment->execute($execute, $paypal);
		$result_of_payment = json_decode($result);
		$transaction_code = $result_of_payment->transactions[0]->invoice_number;
	}catch(Exception $e){
		echo($e->getData());
		die();
	}

	$user_id = $_SESSION['user']['id'];
	$purchase_date = date("Y-m-d G:i:s");
	$status_id = 1;
	$payment_mode_id = 2;
	$address = $_SESSION['address'];
	$cart_total = 0;
	foreach($_SESSION['cart'] as $id=>$qty){
		$sql = "SELECT * FROM items WHERE id = $id";
		$result = mysqli_query($conn, $sql);
		$item_info = mysqli_fetch_assoc($result);
		$cart_total += ($qty * $item_info['price']);
	}

	$new_order_query = "INSERT INTO orders(user_id, transaction_code, purchase_date, status_id,
				payment_mode_id, total) VALUES('$user_id', '$transaction_code', '$purchase_date','$status_id',
				'$payment_mode_id', '$cart_total')";
	$new_order = mysqli_query($conn, $new_order_query) or die(mysqli_error($conn));
	$new_order_id = mysqli_insert_id($conn);

	if($new_order){
		foreach($_SESSION['cart'] as $id => $qty){
			$item_query = "SELECT * FROM items WHERE id = $id";
			$item_result = mysqli_query($conn, $item_query);
			$item = mysqli_fetch_assoc($item_result);

			$order_item_query = "INSERT INTO orders_items(order_id, item_id, quantity)
							VALUES('$new_order_id', '$id', '$qty')";
			$result = mysqli_query($conn, $order_item_query);
		}
	}

	unset($_SESSION['cart']);
	$_SESSION['txn_number'] = $transaction_code;
	mysqli_close($conn);
	header("Location: ../views/confirmation.php")

	ob_end_flush();
?>