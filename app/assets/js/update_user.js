$(document).ready(function(){
	const updateUser = $("#update-user");
	function validate_update_form(){
		let user_id = $("#user_id").val();
		let username = $("#username").val();
		let firstname = $("#firstname").val();
		let lastname = $("#lastname").val();
		let email = $("#email").val();
		let address = $("#address").val();
		let oldPassword = $("#oldPassword").val();
		// let new_password = $("#new_password").val();
		// let confirm_new = $("#confirm_new").val();

		// console.log(user_id);
		// console.log(username);
		// console.log(firstname);
		// console.log(lastname);
		// console.log(email);
		// console.log(address);
		// console.log(old_password);
		// console.log(new_password);
		// console.log(confirm_new);

		let errors = 0;

		if(username.length < 8){
			$("#username").next().text("Please provide valid username");
			errors++;
		}else{
			$("#username").next().text("");
		}

		if(firstname == ""){
			$("#firstname").next().text("Please provide a valid first name");
			errors++;
		}else{
			$("#firstname").next().text("");
		}

		if(lastname == ""){
			$("#lastname").next().text("Please provide a valid first name");
			errors++;
		}else{
			$("#lastname").next().text("");
		}

		if(firstname == ""){
			$("#firstname").next().text("Please provide a valid first name");
			errors++;
		}else{
			$("#firstname").next().text("");
		}

		if(!email.includes("@")){
			$("#email").next().text("Please provide a valid email");
			errors++;
		}else{
			$("#email").next().text("");
		}

		if(address == ""){
			$("#address").next().text("Please provide an address");
			errors++;
		}else{
			$("#address").next().text("");
		}

		// if(new_password != confirm_new){
		// 	$("#new_password").next().text("Passwords do not match!");
		// 	errors++;
		// }else{
		// 	$("#new_password").next().text("");
		// }

		// if(old_password == new_password){
		// 	$("#new_password").next().text("New password can't be the same as old password");
		// }else{
		// 	$("new_password").next().text("");
		// }
		if(errors > 0){
			return false;
		}else{
			return true;
		}
	};

	updateUser.on("click", function(e){
		e.preventDefault();
		if(validate_update_form()){
			let user_id = $("#user_id").val();
			let username = $("#username").val();
			let firstname = $("#firstname").val();
			let lastname = $("#lastname").val();
			let email = $("#email").val();
			let address = $("#address").val();
			let oldPassword = $("#oldPassword").val();
			// let new_password = $("#new_password").val();
			
			$.ajax({
				"url": "../controllers/update_user.php",
				"type": "POST",
				"data": {
					"user_id": user_id,
					"username": username,
					"firstname": firstname,
					"lastname": lastname,
					"email": email,
					"address": address,
					"oldPassword": oldPassword
					// "new_password": new_password,
				},
				"success": function(dataFromController){
					//TODO: 
					if(dataFromController == "success"){
						$("#update_status").text("You have successfully edited your profile!");
					}else{
						$("#update_status").text("Incorrect old password provided");
					}
				}
			})



		};
	});
});