<?php 
	$hardwares = [
		[
			"name" => "Nintendo Switch",
			"img-name" => "switch",
			"price" => "24,000.00"
		],
		[
			"name" => "Nindendo 3DS",
			"img-name" => "3ds",
			"price" => "11,999.99"
		],
		[
			"name" => "Nintendo 2DS",
			"img-name" => "2ds",
			"price" => "9,999.99"
		]
	]
?>

<section class="row my-5 echo-explore-system">
	<div class="col-md-12">
		<h2 class="text-center"> Explore Our Game Systems </h2>
	</div>

	<?php foreach($hardwares as $hardware): ?>
		<div class="col-md-4 d-flex justify-content-center align-items-center">
			<div class="card border-0" style="width: 18rem;">
			  <div class="card-body">
			  	<p class="card-text text-center">
			  		<a class="product-link" href="#">
			  			<img class="card-img-top mb-4" src="../assets/images/hardware-<?php echo $hardware["img-name"] ?>.jpg" alt="Card image cap">
			  			<span class="product-name"><?php echo $hardware["name"] ?></span> <br> PHP <?php echo $hardware["price"] ?></a>	
			  	</p>
			  </div>
			</div>
		</div>
	<?php endforeach; ?>

</section>