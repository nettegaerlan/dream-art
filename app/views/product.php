<?php
	$pageTitle = "Product Information";
	require_once("../controllers/get_product.php");
	require_once("../partials/start_body.php");
	extract($product);
?>

<?php require_once("../partials/navbar.php") ?>

	<main id="main" role="main">

		<?php if($product !== NULL): ?>
			<h1> Product Information </h1>
			<h2> <?php echo $name ?> </h2>
			<h2> <?php echo $price ?> </h2>
			<h2> <?php echo $description ?> </h2>
			<h2> <img src="../assets/images/<?php echo $image ?>"> </h2>
		<?php else: ?>
			<h1> Product Not Found </h1>
		<?php endif; ?>

	</main>

<?php require_once("../partials/end_body.php") ?>