<?php include ($_SERVER['DOCUMENT_ROOT'].'/techies/partials/header.php') ?>
<div class="container mt-5 mb-5">
	<div class="row">
		<div class="col-md-6 offset-md-3">
			<!-- Default form login -->
			<form class="border border-light p-5">

				<p class="h4 mb-4 text-uppercase">Sign in</p>

				<!-- Email -->
				<div class="form-group">
					<label for="email" class="font-weight-bold">Email</label>
					<input type="email" id="email" name="email" class="form-control form-control-sm" placeholder="Your email">
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
				<button class="btn btn-info btn-block my-4" type="submit">Sign in</button>

				<!-- Register -->
				<p>Not a member?
					<a href="">Register</a>
				</p>


			</form>
			<!-- Default form login -->
		</div>
	</div>
</div>