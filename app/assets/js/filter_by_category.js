import { displayCardItems, listCardItems } from "./function_template.js";

$(document).ready(function() {
	const listItems = $(".list-group-item");
	const cat_items = $(".category-items");

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
			listCardItems.template = ``;
			filteredItems.forEach(displayCardItems);
			let cardColumns = `
				<div class= "card-columns">
					${listCardItems.template}
				</div>
			`;
			let listItems = ``;
			$(".products-container").html(cardColumns);
		}else{
			$(".products-container").html("No items in this category");
		}
	}
});