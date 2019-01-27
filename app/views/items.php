<?php 
$pageTitle = "Items";
require("../controllers/get_categories.php");
require("../controllers/get_products.php");
require_once("../partials/start_body.php"); 

if(!isset($_SESSION['user']) || (isset($_SESSION['user']) && $_SESSION['user']['role_id'] == 2)){
	header("Location: error.php");
}
?>

	<?php require_once("../partials/navbar.php") 

	?>

	<main id="main" class="role">
		<div class="container">
			<section class="row my-5">
					<div class="card-columns">
						<div class="card card-admin">
							<form method="POST" action = "../controllers/process_new_item.php" enctype="multipart/form-data">
								<div id="img_holder" class="mb-2">
									<img id="img_preview" src="../assets/images/default-image.jpg" class="img-fluid">
								</div>
							  		<input type="file" name="image"id="img_item">
							  	<div class="card-body">
							    <!-- <p class="card-text">PHP <?php echo $item["price"] ?></p> -->
							    <input type="text" name="name" id="name" class="form-control my-3" placeholder="Item Name">
							    <input type="number" name="price" id="price" class="form-control my-3" placeholder="Item Price">
							    <select name="category" class="form-control">
							    	<?php foreach($categories as $category): ?>
							    	<option value="<?php echo $category["id"]?>"><?php echo $category["name"] ?></option>
							    <?php endforeach; ?>
							    </select>
							    
							    <textarea class="form-control mt-2" name="description" placeholder="Description"></textarea>
							    <!-- <input type="number" class="form-control my-3 qty-field" value=1> -->
							    
							    	<button  name = "add" class="btn btn-sm btn-outline-primary add-item mt-3" > ADD ITEM </button>
							  	</form>
							  </div>
							</div>

						<?php foreach($items as $item): ?>
							<div class="card  card-admin">
							  <img class="card-img-top" src="../assets/images/<?php echo $item["image"] ?>" alt="Card image cap">
							  <div class="card-body">
							    <h5 class="card-title">
							    	<a href="product.php?id=<?php echo $item['id'] ?>">
							    		<?php echo $item["name"]; ?>
							    	</a>	
							    </h5>
							    <p class="card-text">PHP <?php echo $item["price"] ?></p>
							    <form method="POST" action = "edit_item.php?id=<?php echo $item['id']; ?>" >
							    	<button  name = "edit" data-id= "<?php echo $item["id"]; ?>" class="btn btn-sm btn-outline-primary delete-item" > EDIT ITEM </button>
							  	</form>
							  	<button type="button" data-toggle="modal" data-target="#delete_<?php echo $item['id']?>" class="btn btn-sm btn-outline-primary delete-item mt-2">DELETE ITEM</button>
							  </div>
							</div>
							<div id="delete_<?php echo $item['id']?>" class="modal fade" role="dialog">
							  <div class="modal-dialog" role="document">
							    <div class="modal-content">
							      <div class="modal-header">
							        <h5 class="modal-title">Confirm Delete</h5>
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							          <span aria-hidden="true">&times;</span>
							        </button>
							      </div>
							      <div class="modal-body">
							        <p>Are you sure you want to delete the item <?php echo $item['name']?> ?</p>
							      </div>
							      <div class="modal-footer">
							      	<form method="POST" action=../controllers/delete_item.php?id=<?php echo $item['id']; ?>>
							      		<button type="submit" class="btn btn-primary" name="delete">Yes</button>
								    	<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
								        
							  	</form>
							        
							      </div>
							    </div>
							  </div>
							</div>
						<?php endforeach; ?>
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