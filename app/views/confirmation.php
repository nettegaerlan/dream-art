<?php 
	$pageTitle = "Confirmation";
	require_once("../partials/start_body.php");

	if(isset($_SESSION['user']) && ($_SESSION['user']['role_id'] == 1)){
		header("Location: error.php");
	}
?>

<?php require_once("../partials/navbar.php"); ?>
<hr>
	<?php
	if(isset($_SESSION["txn_number"]) && isset($_SESSION["address"])){
	?>

	<div class="container">
		<div class="row">
			<div class="col-lg-8">
				<h1>Confirmation Page</h1>
				<h3>Reference Number: <?php echo $_SESSION["txn_number"]; ?></h3>
				<h3>Shipped to: <?php echo $_SESSION["address"]; ?></h3>
				<p>Thank you for shopping! Your order is now being processed.</p>
				<a href="catalog.php" class=" btn btn-primary">Continue Shopping</a>
				<?php 
				unset($_SESSION["txn_number"]);
				unset($_SESSION["address"]);
				?>
			</div>
		</div>
	</div>
	<?php }else{ 
		header("location: catalog.php");
	} ?>

<?php require_once("../partials/end_body.php"); ?>
