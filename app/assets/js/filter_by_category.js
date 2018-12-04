$(document).ready(function() {
	const listItems = $(".list-group-item");

	listItems.each(function() {
		$(this).click(function() {
			let obj = {
				"catId": $(this).attr("id")
			};
			$.ajax({
				"url": "../controllers/show_by_category.php",
				"type": "POST",
				"data": obj,
				"success": filterByCatId
			});
		});
	});

	function filterByCatId(jsondata) {
		if(jsondata !== "") {
			const filteredItems = JSON.parse(jsondata);
			let cardColumns = ``;
			let listItems = ``;
			filteredItems.forEach(function(item) {
				listItems += `
					<div class="card">
					  <img class="card-img-top" src="../assets/images/${item.image}" alt="Card image cap">
					  <div class="card-body">
					    <h5 class="card-title">${item.name}</h5>
					    <p class="card-text">PHP ${item.price}</p>
					    <a href="#" class="btn btn-sm btn-outline-primary">Add To Cart</a>
					  </div>
					</div>
				`;
				cardColumns = `
					<div class="card-columns">
						${listItems}
					</div>
				`;
				$(".products-container").html(cardColumns);
			});
		}
	}
});