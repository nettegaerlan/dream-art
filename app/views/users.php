<?php 

	$pageTitle = "User Admin";
	require_once("../partials/start_body.php");

	if(!isset($_SESSION['user']) || (isset($_SESSION['user']) && $_SESSION['user']['role_id'] == 2)){
		header("Location: error.php");
	}

	require_once("../partials/navbar.php");
?>

<div class="container">
	<div class="row">
		<div class="col-lg-8 offset-lg-2">
			<h4 class="my-3">User Admin Page</h4>
			<table class="table table-striped table-responsive">
				<thead>
					<tr>
						<td>User Name</td>
						<td>First Name</td>
						<td>Last Name</td>
						<td>Email</td>
						<td>Role</td>
						<td>Action</td>
					</tr>
				</thead>
				<tbody>
					<?php require_once("../controllers/connect.php"); 
					$get_user_details_query = "SELECT u.id, u.firstname, u.lastname, u.username,
						u.email, r.name AS role FROM users u JOIN roles r ON (r.id = u.role_id)";
					$user_details = mysqli_query($conn, $get_user_details_query);
						foreach($user_details as $indiv_user){ ?>
							<tr>
								<td> <?php echo $indiv_user['username']; ?> </td>
								<td> <?php echo $indiv_user['firstname']; ?> </td>
								<td> <?php echo $indiv_user['lastname']; ?> </td>
								<td> <?php echo $indiv_user['email']; ?> </td>
								<td> <?php echo $indiv_user['role']; ?> </td>
								<td>
									<?php 
										$id = $indiv_user['id'];
										if($indiv_user['role'] == "admin"){
									?>
										<a href="../controllers/grant_admin.php?id=<?php echo $id;?>" class="btn btn-danger">Revoke Admin</a>

									<?php
										}else{
									?>
										<a href="../controllers/grant_admin.php?id=<?php echo $id;?>" class="btn btn-primary">Make Admin</a>

									<?php } ?>
								</td>
							</tr>
						<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>