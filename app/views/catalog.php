<?php 
$pageTitle = "Catalog";
require("../controllers/get_categories.php");
require("../controllers/get_products.php");
require_once("../partials/start_body.php"); ?>

	<?php require_once("../partials/navbar.php") ?>

	<main id="main" class="role">
		<div class="container">
			<section class="row my-5">
				<div class="category-container col-md-3">
					<ul class="list-group">
					  <?php foreach($categories as $category): ?>
					  	<li id="<?php echo $category["id"] ?>" class="list-group-item"><?php echo $category["name"] ?></li>
					  <?php endforeach; ?>
					</ul>
				</div>
				<div class="products-container col-md-9">
					<div class="card-columns">
						<?php foreach($items as $item): ?>
							<div class="card">
							  <img class="card-img-top" src="../assets/images/<?php echo $item["image"] ?>" alt="Card image cap">
							  <div class="card-body">
							    <h5 class="card-title">
							    	<a href="product.php?id=<?php echo $item['id'] ?>">
							    		<?php echo $item["name"]; ?>
							    	</a>	
							    </h5>
							    <p class="card-text">PHP <?php echo $item["price"] ?></p>
							    <a href="#" class="btn btn-sm btn-outline-primary">Add To Cart</a>
							  </div>
							</div>
						<?php endforeach; ?>	
					</div>
				</div>
			</section>
		</div>
	</main>

<?php require_once("../partials/end_body.php") ?>