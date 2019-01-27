<?php 
$pageTitle = "Products";
require("../controllers/get_categories.php");
require("../controllers/get_products.php");
require_once("../partials/start_body.php"); 

if(isset($_SESSION['user']) && ($_SESSION['user']['role_id'] == 1)){
	header("Location: error.php");
}
?>

	<?php require_once("../partials/navbar.php") 

	?>

	<main id="main" class="role">
		<div class="container">

			<section class="row pt-5">
				<div class="col-md-3">
					<h2 class="text center"> COLLECTION </h2>
				</div>
					<!-- <div class="col">
						<div class="input-group">
							<input id="search-form" type="text" name="search" class="form-control" placeholder="Search product">
							<div class="input-group-append">
								<span class="input-group-text" id="search-icon"><i class="fas fa-search"></i></span>
							</div>
						</div>
					</div> -->
			</section>
			<section class="row my-5">
				<div class="category-container col-md-3">
					<ul class="list-group show-category">
						<li class="list-group-item show-all"><a href="catalog.php" class="show-all">All Products</a></li>
					  <?php foreach($categories as $category): ?>
					  	<li id="<?php echo $category["id"] ?>" class="list-group-item"><?php echo $category["name"] ?></li>
					  <?php endforeach; ?>

					</ul>
				</div>
				<div class="products-container col-md-9">
					<div class="card-columns">
						<?php foreach($items as $item): ?>
							<div class="card card-items">
							  <img class="card-img-top" src="../assets/images/<?php echo $item["image"] ?>" alt="Card image cap">
							  <div class="card-body">
							    <h5 class="card-title">
							    	<a href="product.php?id=<?php echo $item['id'] ?>">
							    		<?php echo $item["name"]; ?>
							    	</a>	
							    </h5>
							    <p class="card-text">PHP <?php echo $item["price"] ?></p>
							    <input type="number" class="form-control my-3 qty-field" placeholder="1">
							    <button data-id= "<?php echo $item["id"]; ?>" class="btn btn-sm btn-outline-primary add-cart">Add To Cart</button>
							  </div>
							</div>
						<?php endforeach; ?>	
					</div>
				</div>
			</section>
		</div>
		<div class="row mx-0">
			<div class="col-4 offset-6">
				<a href="#header" class="show-all"><i class="fas fa-arrow-up"></i>Back to top</a>
			</div>
			
		</div>
	</main>

<?php require_once("../partials/end_body.php") ?>
<?php require_once("../partials/footer.php") ?>