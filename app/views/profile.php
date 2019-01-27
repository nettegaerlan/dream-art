<?php 
	$pageTitle = "My Profile";
	require_once("../partials/start_body.php");
	require_once("../controllers/connect.php");

	if(!isset($_SESSION['user'])){
		header("Location: error.php");
		}

	$userID = $_SESSION['user']['id'];

	$order_query = "SELECT * FROM orders WHERE user_id = $userID";
	$orders = mysqli_query($conn, $order_query);
?>

	<?php require_once("../partials/navbar.php"); ?>

	<div class="container">
		<div class="row mt-5">
			<div class="col-lg-3">
				<div class="list-group" id="list-tab" role="tab-list">
					<a href="#profile" class="list-group-item active" data-toggle="list" role="tab">
						User Information
					</a>
					<a href="#password" class="list-group-item" data-toggle="list" role="tab">
						Password
					</a>
					<?php if(isset($_SESSION['user']) && $_SESSION['user']['role_id'] == 2):?>
					<a href="#history" class="list-group-item" data-toggle="list" role="tab">
						Order History
					</a>
				<?php endif; ?>
				</div>
			</div>
			<div class="col-lg-9">
				<div class="tab-content">
					<div class="tab-pane show active" id="profile" role= "tabpanel">
						<h3>User Information</h3>
						<span id="update_status" class="text-primary"></span>
						<form>
							<div class="form-group">
								<input type="text" name="user_id" class="form-control" value="<?php echo $_SESSION['user']['id'];?>" id="user_id" hidden readonly>
							</div>

							<div class="form-group">
								<label for="username">Username: </label>
								<input type="text" name="username" class="form-control" id="username" value="<?php echo $_SESSION['user']['username']; ?>">
								<span class="validation text-danger"></span>
							</div>

							<div class="form-group">
								<label for="firstname">First Name:</label>
								<input type="text" name="firstname" id="firstname" class="form-control" value = "<?php echo $_SESSION['user']['firstname']; ?>">
								<span class="validation text-danger"></span>
							</div>

							<div class="form-group">
								<label for="lastname">Last Name:</label>
								<input type="text" name="lastname" id="lastname" class="form-control" value = "<?php echo $_SESSION['user']['lastname']; ?>">
								<span class="validation text-danger"></span>
							</div>

							<div class="form-group">
								<label for="email">Email:</label>
								<input type="text" name="email" id="email" class="form-control" value = "<?php echo $_SESSION['user']['email']; ?>">
								<span class="validation text-danger"></span>
							</div>

							<div class="form-group">
								<label for="address">Address:</label>
								<input type="text" name="address" id="address" class="form-control" value = "<?php echo $_SESSION['user']['home_address']; ?>">
								<span class="validation text-danger"></span>
							</div>

							<div class="form-group">
								<label for="oldPassword">Old Password:</label>
								<input type="password" name="oldPassword" id="oldPassword" class="form-control" value = "">
								<span class="validation text-danger"></span>
							</div>

							<button class="btn btn-primary" type="submit" id="update-user">Update Info</button>
						</form>
					</div>
					<div class="tab-pane" id="password" role= "tabpanel">
						<h3>Password Update</h3>
						<span id="update_status_pass" class="text-primary"></span>
						<form>
							<div class="form-group">
								<input type="text" name="id_user" class="form-control" value="<?php echo $_SESSION['user']['id'];?>" id="id_user" hidden readonly>
							</div>

							<div class="form-group">
								<label for="old_password">Old Password:</label>
								<input type="password" name="old_password" id="old_password" class="form-control" value = "">
								<span class="validation text-danger"></span>
							</div>

							<div class="form-group">
								<label for=" new_password">New Password:</label>
								<input type="password" name="new_password" id="new_password" class="form-control" value = "">
								<span class="validation text-danger"></span>
							</div>

							<div class="form-group">
								<label for=" confirm_new">Confirm New Password:</label>
								<input type="password" name="confirm_new" id="confirm_new" class="form-control" value = "">
								<span class="validation text-danger"></span>
							</div>


							<button class="btn btn-primary" type="submit" id="update-pass">Update Password</button>
						</form>
					</div>
					<div class="tab-pane" id="history" role= "tabpanel">
						<div class="table-responsive">
							<table class="table table-striped table-hover">
								<thead>
									<tr>
										<th class="text-truncate">Transaction Code</th>
										<th class="text-truncate">Purchase Date</th>
										<th class="text-truncate">Total</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach($orders as $indiv_order): ?>
										<tr>
											<td class="text-truncate"><?php echo $indiv_order['transaction_code'] ?></td>
											<td class="text-truncate"><?php echo $indiv_order['purchase_date'] ?></td>
											<td class="text-truncate"><?php echo $indiv_order['total'] ?></td>
										</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				
				</div>
			</div>
		</div>
	</div>


	<?php require_once("../partials/end_body.php"); ?>