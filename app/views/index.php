<?php 
$pageTitle = "Dream Art";
require_once("../partials/start_body.php");
require("../controllers/get_categories.php");
?>

	<?php require_once("../partials/navbar.php") ?>

	<main>
		
		<section id="banner">
			<h1 class="text-center pt-5">Dream Art</h1>
			<h4 class="text-center">Bring out the artist in you.</h4>
		</section>

		<section id="categories" class="mt-5">
			<!-- <div class="category row">
				<div id="drawing" class="col-3">
					<h4 class="text-center">Drawing</h4>
				</div>
				<div id="writing" class="col-3">
					<h4 class="text-center">Writing</h4>
				</div>
				<div id="paint" class="col-3">
					<h4 class="text-center">Paints & Brushes</h4>
				</div>
			</div> -->
			<?php if(!isset($_SESSION['user']) || (isset($_SESSION['user']) && $_SESSION['user']['role_id'] ==2 )) { ?>
			<div class="card-columns">
						<?php foreach($categories as $category): ?>
							<div class="card card-home">
							  <img class="card-img-top" src="../assets/images/<?php echo $category["image"] ?>" alt="Card image cap">
							  <div class="card-body">
							    <h5 class="card-title">
							    	<a href="catalog.php" id="<?php echo $category["id"] ?>" class="category-items">
							    		<?php echo $category["name"]; ?>
							    	</a>	
							    </h5>
							  </div>
							</div>
						<?php endforeach; ?>	
					</div>
				<?php }; ?>
		</section>
	</main>

<?php require_once("../partials/end_body.php") ?>
<?php require_once("../partials/footer.php") ?>