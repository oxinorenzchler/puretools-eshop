<?php include ($_SERVER['DOCUMENT_ROOT'].'/techies/partials/admin_header.php') ?>

<div id="login-container">
	<div class="container">
		<div class="row">
			<div class="col-md-6 offset-md-3">
				<!-- Default form login -->
			<form class="text-center border border-light p-5 mt-5">

				<p class="h4 mb-4 text-uppercase">Admin Login</p>

				<!-- Email -->
				<input type="text" id="defaultLoginFormEmail" class="form-control mb-4" placeholder="Username">

				<!-- Password -->
				<input type="password" id="defaultLoginFormPassword" class="form-control mb-4" placeholder="Password">


				<!-- Sign in button -->
				<button class="btn btn-info btn-block my-4" type="submit">Sign in</button>


			</form>
			<!-- Default form login -->
			</div>
		</div>
	</div>	
</div>	

<?php include ($_SERVER['DOCUMENT_ROOT'].'/techies/partials/admin_footer.php') ?>