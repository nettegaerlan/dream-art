<?php 
	$pageTitle = "Checkout";
	require_once("../partials/start_body.php");

	if(isset($_SESSION['user']) && ($_SESSION['user']['role_id'] == 1)){
		header("Location: error.php");
	}
?>

	<?php require_once("../partials/navbar.php");
	require_once("../controllers/connect.php"); ?>
	<?php 
		if(!isset($_SESSION['user'])){
			header("Location: login.php");
		}else{
	
	?>		
	<main>
		<div class="container py-5">
			<div class="row">
				<div class="col">
					<h1 class="text-center">Checkout page</h1>
					<form method="POST" action="../controllers/placeorder.php">
						<!-- TODO: placeorder.php controller -->

						<div class="container">
							<div class="row mt-4">
								<div class="col-lg-8">
									<h4>Shipping Address</h4>
									<div class="form-group">
										<input type="text" name="addressLine" class="form-control" value=
										"<?php echo $_SESSION['user']['home_address']; ?>">
									</div>
									<div>
										<h4>Payment Options</h4>
										<div class="form-group">
											<select class="form-control" id="payment_mode" name="payment_mode">
												<?php 
													
													$payment_mode_query = "SELECT * FROM payment_modes";
													$payment_modes = mysqli_query($conn, $payment_mode_query);
													foreach($payment_modes as $payment_mode){
														extract($payment_mode);
														echo "<option value= '$id'>$name</option>";
													}
												?>
											</select>
										</div>
									</div>
								</div>
								<div class="col-lg-4">
									<h4>Amount to pay</h4>
									<div class="row">
									<span id="total-price" class="font-weight-bold col-lg-6">PHP
										<?php
										$cart_total = 0; 
										if(isset($_SESSION["cart"]) && count($_SESSION["cart"]) !=0): 
										

										foreach ($_SESSION['cart'] as $id => $qty){
											$sql_query = "SELECT * FROM items WHERE id = $id";
											$item_info = mysqli_query($conn, $sql_query);
											$item = mysqli_fetch_assoc($item_info);

											$subTotal = $_SESSION['cart'][$id] * $item['price'];
											$cart_total += $subTotal;
										}
										echo $cart_total;
										
										endif;
										?>
									</span>
									<button type="submit" class="btn btn-primary" class="col-lg-6"> Place Order Now</button>
									</div>
								</div>
							</div>

							<div class="table-responsive">
						<table id="cart-items" class="table table-striped table-bordered">
							<thead>
								<tr class="text-center">
									<th>Item Name</th>
									<th>Item Price</th>
									<th>Item Quantity</th>
									<th>Item Subtotal</th>
								</tr>
							</thead>
							<tbody>
								<?php 
									foreach ($_SESSION['cart'] as $id => $qty){
										$sql_query = "SELECT * FROM items WHERE id = $id";
										$item_info = mysqli_query($conn, $sql_query);
										$item = mysqli_fetch_assoc($item_info);
										$subTotal = $_SESSION['cart'][$id] * $item['price'];
										$cart_total += $subTotal;
								?>
									<tr>
										<td class="item_name text-center align-middle"><?php echo $item["name"] ?></td>
										<td class="text-center align-middle"> PHP <span class="item_price"><?php echo $item["price"] ?></span></td>
										<td class="item_quantity text-center align-middle"><?php echo $qty?> </td>
										<td class="text-center align-middle">PHP <span class="item_subtotal"><?php echo $subTotal;?></span></td>
									</tr>
								<?php
									}
								?>
								
								<?php 
								mysqli_close($conn);
								?>
							</tbody>
						</table>
						
					</div>
					</form>
				</div>
			</div>
		</div>
	</main>
	<?php 
		}
	?>

<?php require_once("../partials/end_body.php") ?>