
<?php session_start(); ?>
<div class="container mt-5 mb-5">
	<?php include ($_SERVER['DOCUMENT_ROOT'].'/techies/partials/header.php') ?>
	<div class="container mt-5 mb-5">
		<div class="row">
			<div class="col-md-6 offset-md-3">
				<?php if(isset($_SESSION['success'])): ?>
					<div class="alert alert-success" role="alert">
						<?php echo $_SESSION['success']; ?>
					</div>
				<?php endif ?>
				<?php if(!isset($_SESSION['user'])): ?>
					<!-- Default form login -->
					<form class="border border-light p-5" action="lib/controllers/LoginController.php" method="POST">
						<input type="hidden" name="login">
						<p class="h4 mb-4 text-uppercase">Sign in</p>
						<?php if(isset($_SESSION['auth.error'])): ?>
							<small class="text-left form-text text-muted red-text">
								<?php echo $_SESSION['auth.error']; ?>    
							</small>
						<?php endif ?>
						<!-- Email -->
						<div class="form-group">
							<label for="email" class="font-weight-bold">Email</label>
							<input type="email" id="email" name="email" class="form-control form-control-sm">
							<?php if(isset($_SESSION['errors']['name'])): ?>
								<small class="text-left form-text text-muted red-text">*
									<?php echo $_SESSION['errors']['name']; ?>    
								</small>
							<?php endif ?>
						</div>

						<div class="form-group">
							<label for="password" class=" font-weight-bold">Password</label>
							<input type="password" name="password" id="password" class="form-control form-control-sm">
							<?php if(isset($_SESSION['errors']['name'])): ?>
								<small class="text-left form-text text-muted red-text">*
									<?php echo $_SESSION['errors']['name']; ?>    
								</small>
							<?php endif ?>
						</div>
						<div class="small text-right">
							<!-- Forgot password -->
							<a href="">Forgot password?</a>
						</div>

						<!-- Sign in button -->
						<button class="btn btn-info btn-block btn-sm my-4" type="submit">Sign in</button>

						<!-- Register -->
						<p class="small">Not a member?
							<a href="register.php">Register</a>
						</p>


					</form>
					<!-- Default form login -->
					<?php else: ?>
						<img src="assets/img/404.png" class="img-fluid">
						<a href="index.php" class="btn btn-sm btn-warning">Home</a>
					<?php endif ?>
				</div>
			</div>
		</div>

	<?php session_destroy(); ?>