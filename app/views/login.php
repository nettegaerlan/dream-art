<?php 
	$pageTitle = "Login";
	require_once("../partials/start_body.php");
?>
	<?php require_once("../partials/navbar.php");?>


	<main class="login">

		<div class="row py-5 mx-0">
			<div class="col">
				<h1 class="text-center">Login</h1>

				<form id="login-form">
					<div class="form-row">
						<div class="col-md-6 offset-md-3">
							<div class="form-group">
								<label for="username-email" class="label-register">Username or Email</label>
								<input type="text" name="username-email" id="username-email" placeholder="Username or Email" class="form-control">
								<span class="text-danger small"></span>
							</div>

							<div class="form-group">
								<label for="password" class="label-register">Password</label>
								<input type="password" name="password" id="password" placeholder="Password" class="form-control">
							</div>

							<button id="login" type="submit" class="btn btn-block btn-primary">Sign In</button>
						</div>
					</div>

				</form>
			</div>
		</div>

	</main>
<?php require_once("../partials/end_body.php");?>
<!-- <?php require_once("../partials/footer.php");?> -->