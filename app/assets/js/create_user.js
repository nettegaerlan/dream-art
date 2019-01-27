$(document).ready(function(){
	const addUser = $("#add-user");

	const username = $("#username");
	const password = $("#password");
	const confirmpassword = $("#confirm-password");
	const email = $("#email");
	const firstname = $("#firstname");
	const lastname = $("#lastname");
	const address = $("#address");

	function validateRegistrationForm(){
		let errors = 0;
		
		//username should be grater than or equal to 18 characters

		if(username.val().length < 8){
			username.next().text("Please provide a username with 8 characters or more");
			errors++;
		}else if(username.val() == password.val()){ 
			username.next().text("Username should be different from your password.");
			errors++;
		} else {
			username.next().text("");
		}

		//password should be greater than or equal to 8 characters
		if(password.val().length < 8){
			password.next().text("Please provide a password with at least 8 characters");
			errors++;
		}else{
			password.next().text("");
		}

		//email should follow the email template
		if(!email.val().includes("@")){
			email.next().text("Please provide a valid email");
			errors++;
		}else{
			email.next().text("");
		}

		//address should not be empty
		if(address.val() == ""){
			address.next().text("Please provide an address");
			errors++;
		}else{
			address.next().text("");
		}

		//first name
		if(firstname.val() == ""){
			firstname.next().text("Please provide a valid first name");
			errors++;
		}else{
			firstname.next().text("");
		}

		//last name
		if(lastname.val() == ""){
			lastname.next().text("Please provide a valid last name");
			errors++;
		}else{
			lastname.next().text("");
		}

		//password confirmation
		if(password.val() != confirmpassword.val()){
			confirmpassword.next().text("Passwords did not match!");
			errors++;
		}else{
			confirmpassword.next().text("");
		}

		if(errors>0){
			return false;
		}else{
			return true;
		}
	}
	addUser.click(function(e){
		//validate reg form
			//user
		e.preventDefault();
		if(validateRegistrationForm()){
			let usernameVal = username.val();
			let passwordVal = password.val();
			let firstnameVal = firstname.val();
			let lastnameVal = lastname.val();
			let emailVal = email.val();
			let addressVal = address.val();
			
			// console.log(usernameVal);
			$.ajax({
				"url": "../controllers/create_users.php",
				"type": "POST",
				"data":{
					"username": usernameVal,
					"password": passwordVal,
					"firstname": firstnameVal,
					"lastname": lastnameVal,
					"email": emailVal,
					"address": addressVal
				},
				"success": function(jsondata){
					if(jsondata == "user_and_email_exists" || jsondata == "user_exists" || jsondata == "email_exists"){
						if (jsondata == "user_and_email_exists") {
							username.next().text("Username already exists");
							email.next().text("Email already exists");
						} else if (jsondata == "user_exists") {
							username.next().text("Username already exists");
						} else if (jsondata == "email_exists") {
							email.next().text("Email already exists");
						}
						
					}else{
						$("#main").html(`<h1> You have succesfully registered! </h1>`)
					}
				}
			});
		}
	});
});