$(document).ready(function() {

	const username_email = $("#username-email");

	$("#login").click(function (e) {
		e.preventDefault();

		let username = username_email.val(),
			password = $("#password").val();

		$.ajax({
			"url" : "../controllers/authenticate.php",
			"type" : "POST",
			"data" : {
				"username-email" : username,
				"password" : password
				},
			"success" : function(jsondata) {
				if (jsondata == "login_failed") {
					username_email.next().text("Please provide the correct credentials");
				} else {
					window.location.replace("index.php");
				}
			}
		});
	});
});