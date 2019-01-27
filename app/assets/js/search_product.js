import { displayCardItems, listCardItems } from "./function_template.js";

$(document).ready(function(){
	const searchForm = $("#search-form");

	searchForm.keypress(function(e){
		//13 is the keycode for the enter key
		if(e.which ==13){
			$.ajax({
				"url": "../controllers/search_product.php",
				"type": "POST",
				"data": {
					"search": searchForm.val()
				},
				"success": getResults
			})

		}
	});

	function getResults(jsondata){
		if(jsondata !== ""){
			const result = JSON.parse(jsondata);

			listCardItems.template = ``;
			result.forEach(displayCardItems);
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