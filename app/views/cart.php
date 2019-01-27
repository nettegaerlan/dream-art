<?php 
	$pageTitle = "Cart";
	require_once("../partials/start_body.php");
	
	if(isset($_SESSION['user']) && ($_SESSION['user']['role_id'] == 1)){
		header("Location: error.php");
	}
?>

<?php require_once("../partials/navbar.php") ?>

	<main id="main">
		<div class="container py-5">
			<div class="row">
				<div class="col">
					<h1 class="text-center">My Cart</h1>
					
					<div class="table-responsive">
						<table id="cart-items" class="table table-striped table-bordered">
							<thead>
								<tr class="text-center">
									<th>Item Name</th>
									<th>Item Price</th>
									<th>Item Quantity</th>
									<th>Item Subtotal</th>
									<th>Actions</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$cart_total = 0;
								
								if(isset($_SESSION["cart"]) && count($_SESSION["cart"]) !=0): 
									require_once("../controllers/connect.php");

									
									
									foreach($_SESSION["cart"] as $id => $qty){
										$sql = "SELECT * FROM items WHERE id = '$id'";
										$item_info = mysqli_query($conn, $sql);
										$item = mysqli_fetch_assoc($item_info);
										
										$subTotal = $_SESSION["cart"][$id] * $item["price"];
										$cart_total += $subTotal; 
								?>
									
								<tr>
									<td class="item_name"><?php echo $item["name"] ?></td>
									<td> PHP <span class="item_price"><?php echo $item["price"] ?></span></td>
									<td class="item_quantity"> <input type="number" class="form-control text-right" value="<?php echo $qty?>" data-id="<?php echo $id?>"> </td>
									<td>PHP <span class="item_subtotal"><?php echo $subTotal;?></span></td>
									<td class="item_action"><button class="btn btn-danger item-remove" data-id="<?php echo $id?>" >Remove From Cart</button></td>
								</tr>
								<?php }
								mysqli_close($conn);
								?>

								<?php endif; ?>
							</tbody>
							<tfoot>
								<tr>
									<td class="text-right font-weight-bold align-middle" colspan="3">Total: </td>
									<td class="text-right font-weight-bold aling-middle" >PHP 
										<span id="total_price"> <?php echo $cart_total; ?> </span>
									</td>
									<td class="">
										<a href="checkout.php" class="btn btn-primary">
											Proceed to checkout
										</a>
									</td>
								</tr>
							</tfoot>
						</table>
						
					</div>
				</div>
			</div>
		</div>
	</main>


<?php require_once("../partials/end_body.php") ?>
<?php require_once("../partials/footer.php") ?>