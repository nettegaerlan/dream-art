const listCardItems = {
	template: ``
};

function displayCardItems(item) {
				listCardItems.template += `
					<div class="card p-3">
					  <img class="card-img-top" src="../assets/images/${item.image}" alt="Card image cap">
					  <div class="card-body">
					    <h5 class="card-title">
					    	<a href="product.php?id=${item.id}">
							   	${item.name}
							 </a>	
					    </h5>
					    <p class="card-text">PHP ${item.price}</p>
					    <input type="number" class="form-control my-3" value=1>
					    <button data-id = "${item.id}" class="btn btn-sm btn-outline-primary add-cart">Add To Cart</button>
					  </div>
					</div>
				`;
				
				
			}

export {displayCardItems, listCardItems};