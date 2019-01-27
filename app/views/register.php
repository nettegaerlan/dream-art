<?php 
	$pageTitle = "Register";
	require_once("../partials/start_body.php");
?>
	<?php require_once("../partials/navbar.php");?>

	<main id="main" role="main" class="login text-center">
		<div class="container py-5">
			<section class="row">
				<div class="col">
					<h1 class="text-center"><!-- <img src="../assets/images/art.jpg" class="brand-logo img-fluid" height="50" width="50"> --></h1>

					<form id="reg-form">
						<div class="form-row">
							<div class="col-lg-6 col-12">
								<div class="form-group">
									<label class="label-register">First  Name:</label>
									<input type="text" name="firstname" id="firstname" class="form-control register" placeholder="Enter first name">
									<span class="text-danger small"></span>
								</div>
							</div>

							<div class="col-lg-6 col-12">
								<div class="form-group">
									<label class="label-register">Last  Name:</label>
									<input type="text" name="lastname" id="lastname" class="form-control register" placeholder="Enter last name">
									<span class="text-danger small"></span>
								</div>
							</div>
						</div>

						<div class="form-row">
							<div class="col-lg-6 col-12">
								<div class="form-group">
									<label class="label-register">Username:</label>
									<input type="text" name="username" id="username" class="form-control register" placeholder="Enter username">
									<span class="text-danger small"></span>
								</div>
							</div>
							<div class="col-lg-6 col-12">
								<div class="form-group">
									<label class="label-register">Email Address:</label>
									<input type="email" name="email" id="email" class="form-control register" placeholder="Enter email">
									<span class="text-danger small"></span>
								</div>
							</div>
						</div>
						
						<div class="form-row">
							<div class="col-lg-6 col-12">
								<div class="form-group">
									<label class="label-register">Password:</label>
									<input type="password" name="password" id="password" class="form-control register" placeholder="Enter password">
									<span class="text-danger small"></span>
								</div>
							</div>
							<div class="col-lg-6 col-12">
								<div class="form-group">
									<label class="label-register">Confirm Password:</label>
									<input type="password" name="confirm-password" id="confirm-password" class="form-control register" placeholder="Confirm password">
									<span class="text-danger small"></span>
								</div>
							</div>
						</div>

						<div class="form-row">
							<div class="col-12">
								<label class="label-register">Address:</label>
								<input type="text" name="address" id="address" class="form-control register" placeholder="Enter Address">
								<span class="text-danger small"></span>
							</div>	
						</div>

						<button id="add-user" type="submit" class="d-block btn btn-primary mx-auto mt-3">Sign up</button>
					</form>
				</div>
			</section>
		</div>
	</main>
<?php require_once("../partials/end_body.php");?>
<!-- <?php require_once("../partials/footer.php");?> -->