$(document).ready(function(){
	$(document).on("click", ".item-remove", function(e){
		e.stopPropagation();
		let item_id = $(e.target).data('id');
		/*console.log("Item to be deleted" + item_id);*/

		$.ajax({
			"url": "../controllers/update_cart.php",
			"type": "POST",
			"data": {
				"item_id": item_id,
				"item_quantity": 0,
				"ifFromCatalogPage": 0
			},
			"success": function(dataFromController){
				$(e.target).parents("tr").remove();
				$("#cart-count").text(dataFromController);
				//update total
				let total=0;
				//get all .item_subtotal's values and add them all up
				$(".item_subtotal").each(function(e){
					total += parseFloat($(this).text());
				});
				$("#total_price").text(total.toFixed(2));
			}
		})
	});
});