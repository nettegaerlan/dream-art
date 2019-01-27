$(document).ready(function(){
	const cartBtn = $(".add-cart");

	$(this).on("click", ".add-cart", function(e){
	
		e.stopPropagation();		//prevent parents elements to be triggered
		let item_id = $(e.target).attr("data-id");
		let item_quantity = parseInt($(e.target).prev().val());
		

		$.ajax({
			"url" : "../controllers/update_cart.php",
			"type": "POST",
			"data" : {
				"item_id": item_id,
				"item_quantity": item_quantity,
				"ifFromCatalogPage": 1
			},
			"success": function(dataFormController){
				$("#cart-count").text(dataFormController);
			}
		});
	});
});