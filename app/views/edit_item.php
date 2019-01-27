<?php 
	$pageTitle = "Edit Item";
	require_once("../controllers/get_product.php");
	require_once("../controllers/get_categories.php");
	require_once("../partials/start_body.php");

	// print_r($product);
	if($product != NULL){
		extract($product);
	}else{
		$product = NULL;
	}

	if(!isset($_SESSION['user']) || (isset($_SESSION['user']) && $_SESSION['user']['role_id'] == 2)){
		header("Location: error.php");
	}
?>

<?php require_once("../partials/navbar.php") ?>
	
	<div class="col-lg-8 offset-lg-2">
		<h3 class="my-3">Add Item</h3>
		<hr>	
		<form action="../controllers/process_edit_item.php?id=<?php echo $id;?>" method="POST" enctype="multipart/form-data">
			<div class="form-group">
				<label for="item_name">Item Name: </label>
				<input type="text" name="item_name" class="form-control" id="item_name" value="<?php echo $name; ?>">
				<span class="validation"></span>
			</div>

			<div class="form-group">
				<label for="item_price">Price:</label>
				<input type="number" min="1" name="item_price" id="item_price" class="form-control" value ="<?php echo $price; ?>" >
				<span class="validation"></span>
			</div>

			<div class="form-group">
				<label for="item_description">Description:</label>
				<textarea rows="5" type="text" name="item_description" id="item_description" class="form-control"><?php echo $description; ?></textarea>
				<span class="validation"></span>
			</div>

			<div class="form-group">
				<label for="category">Category:</label>
				<select name="item_category" id="item_category" class="form-control">
					<?php foreach($categories as $category): ?>
					  	<option value ="<?php echo $category["id"] ?>" class="list-group-item" 
					  		<?php if($category["id"] == $category_id){ 
					  			echo "selected"; }?> >
							<?php echo $category["name"]?>
					  	</option>
					  <?php endforeach; ?>
				</select>
			</div>

			<div class="form-group">
				<!-- <img src="../assets/images/<?php echo $image?>" > -->
				<label for="item_image">Image: </label>
				<div id="img_holder" class="mb-2">
					<img id="img_preview" src="../assets/images/<?php echo $image?>" class="img-fluid">
				</div>
			  		<input type="file" name="image" class="form-control" id="img_item">
				<!-- <input type="file" name="image-upload" class="form-control-file"> -->
			</div>

			
				<button class="btn btn-primary" type="submit" id="edit-item">Edit Item</button>
			
			
		</form>

	</div>


<?php require_once("../partials/end_body.php") ?>