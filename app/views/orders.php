<?php 
	$pageTitle = "Orders Admin";
	require_once("../partials/start_body.php");
	require_once("../partials/navbar.php");

	require_once("../controllers/connect.php");
	$order_query = "SELECT o.id, o.transaction_code, s.name AS status FROM orders o JOIN status s ON(o.status_id = s.id)"; 
	$orders = mysqli_query($conn, $order_query);
?>
<div class="container">
	<div class="row">
		<div class="col-lg-8 offset-lg-2">
			<h4 class="text-center">Orders</h4>
			<?php if (mysqli_num_rows($orders)): ?>
			<table class="table table-striped">
				<thead>
					<tr>
						<td>Transaction Code </td>
						<td>Status </td>
						<td>Action </td>
					</tr>
				</thead>
				<tbody>
					<?php
						foreach($orders as $indiv_order){ 
					?>
						<tr>
							<td><?php echo $indiv_order['transaction_code']; ?></td>
							<td><?php echo $indiv_order['status']; ?></td>
							<td>
								<?php 
									if($indiv_order['status'] == "pending"){ ?>
										<a href="../controllers/complete_order.php?id=<?php echo $indiv_order['id']?>" class="btn btn-success">Complete Order</a>
										<a href="../controllers/cancel_order.php?id=<?php echo $indiv_order['id']?>" class="btn btn-danger">Cancel Order</a>
								<?php } ?>

							</td>
						</tr>
						
					<?php } ?>
				</tbody>
			</table>
			<?php else: ?>
				<h5 class="text-center">No Pending Orders.</h5>
			<?php endif; ?>
		</div>
	</div>
</div>
<?php require_once("../partials/end_body.php"); ?>