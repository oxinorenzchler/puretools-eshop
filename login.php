<?php include ($_SERVER['DOCUMENT_ROOT'].'/techies/partials/header.php') ?>
<?php include ($_SERVER['DOCUMENT_ROOT'].'/techies/partials/top_section.php') ?>

<div class="container mt-5 mb-5">
	<div class="row">
		<div class="col-md-6 offset-md-3">
			<!-- Default form login -->
			<form class="text-center border border-light p-5">

				<p class="h4 mb-4 text-uppercase">Sign in</p>

				<!-- Email -->
				<input type="email" id="defaultLoginFormEmail" class="form-control mb-4" placeholder="E-mail">

				<!-- Password -->
				<input type="password" id="defaultLoginFormPassword" class="form-control mb-4" placeholder="Password">

				<div class="d-flex justify-content-around">
					<div>
						<!-- Remember me -->
						<div class="custom-control custom-checkbox">
							<input type="checkbox" class="custom-control-input" id="defaultLoginFormRemember">
							<label class="custom-control-label" for="defaultLoginFormRemember">Remember me</label>
						</div>
					</div>
					<div>
						<!-- Forgot password -->
						<a href="">Forgot password?</a>
					</div>
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

<?php include ($_SERVER['DOCUMENT_ROOT'].'/techies/partials/footer.php') ?>