<?php 
	$pageTitle = "Add Item";
	require_once("../controllers/get_categories.php");
	require_once("../partials/start_body.php");

	if(!isset($_SESSION['user']) || (isset($_SESSION['user']) && $_SESSION['user']['role_id'] == 2)){
		header("Location: error.php");
	}
?>

<?php require_once("../partials/navbar.php") ?>
	
	<div class="col-lg-8 offset-lg-2">
		<h3 class="my-3">Add Item</h3>
		<hr>	
		<form action="../controllers/process_new_item.php" method="POST" enctype="multipart/form-data">
			<div class="form-group">
				<label for="item_name">Item Name: </label>
				<input type="text" name="item_name" class="form-control" id="item_name">
				<span class="validation"></span>
			</div>

			<div class="form-group">
				<label for="item_price">Price:</label>
				<input type="number" min="1" name="item_price" id="item_price" class="form-control">
				<span class="validation"></span>
			</div>

			<div class="form-group">
				<label for="item_description">Description:</label>
				<textarea rows="5" type="text" name="item_description" id="item_description" class="form-control"></textarea>
				<span class="validation"></span>
			</div>

			<div class="form-group">
				<label for="category">Category:</label>
				<select name="item_category" id="item_category" class="form-control">
					<?php foreach($categories as $category): ?>
					  	<option value ="<?php echo $category["id"] ?>" class="list-group-item"><?php echo $category["name"] ?></option>
					  <?php endforeach; ?>
				</select>
			</div>

			<div class="form-group">
				<label for="item_image">Image: </label>
				<input type="file" name="image-upload" class="form-control-file">
			</div>

			
			<button class="btn btn-primary" type="submit" id="add-item">Add Item</button>
		</form>

	</div>


<?php require_once("../partials/end_body.php") ?>