$(document).ready(function(){
	const updatePass = $("#update-pass");
	function validate_update_form(){
		let id_user = $("#id_user").val();
		let old_password = $("#old_password").val();
		let new_password = $("#new_password").val();
		let confirm_new = $("#confirm_new").val();

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


		if(new_password != confirm_new){
			$("#new_password").next().text("Passwords do not match!");
			errors++;
		}else{
			$("#new_password").next().text("");
		}

		if(old_password == new_password){
			$("#new_password").next().text("New password can't be the same as old password");
		}else{
			$("new_password").next().text("");
		}
		if(errors > 0){
			return false;
		}else{
			return true;
		}
	};

	updatePass.on("click", function(e){
		e.preventDefault();
		if(validate_update_form()){
			let id_user = $("#id_user").val();
			let old_password = $("#old_password").val();
			let new_password = $("#new_password").val();
			
			$.ajax({
				"url": "../controllers/update_password.php",
				"type": "POST",
				"data": {
					"id_user": id_user,
					"old_password": old_password,
					"new_password": new_password
				},
				"success": function(dataFromController){
					//TODO: 
					if(dataFromController == "success"){
						$("#update_status_pass").text("You have successfully updated your password!");
					}else{
						$("#update_status_pass").text("Incorrect old password provided");
					}
				}
			})



		};
	});
});