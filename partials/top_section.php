<!-- Top section -->
<div class="container-fluid bg-success pt-2 pb-2">
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6 text-center">
			Sale of 50% off everything shop sitewide sale
		</div>
		<div class="col-md-3 text-center d-md-block d-none">
			<?php if (isset($_SESSION['user'])): ?>
				<div class="btn-group">
					<button type="button" class="btn btn-danger btn-sm">
					<?php echo $_SESSION['user']->name; ?>	
					</button>
					<button type="button" class="btn btn-danger btn-sm dropdown-toggle px-3" data-toggle="dropdown" aria-haspopup="true"
					aria-expanded="false">
					<span class="sr-only">Toggle Dropdown</span>
				</button>
				<div class="dropdown-menu">
					<a class="dropdown-item small" href="user_account.php">My account</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item small" href="lib/controllers/LogoutController.php">Logout</a>
				</div>
			</div>
			<?php else: ?>
				<a href="<?php echo Route::redirect("login.php"); ?>" class="btn btn-sm btn-primary">Sign In</a>
				<a href="<?php echo Route::redirect("register.php") ?>" class="btn btn-sm btn-secondary">Register</a>
			<?php endif ?>
		</div>
	</div>
</div>
<!-- Brand, search and cart section -->
<div class="d-flex justify-content-between p-4 align-items-end mb-3">
	<a href="index.php">
		<img src="assets/img/demo.jpg">
	</a>
	<form class="d-none d-md-block d-lg-block" method="GET" action="lib/controllers/SearchController.php">
		<input type="hidden" name="search">
		<div class="input-group">
			<div class="input-group-prepend">
				<select class="form-control" name="category">
					<option value="">All</option>
					<?php foreach (getCategories() as $category): ?>
						<option value="<?php echo $category->id; ?>"> <?php echo $category->name; ?></option>
					<?php endforeach ?>
				</select>
			</div>
			<input type="text" name="product" class="form-control">
		</div>
	</form>
	<ul class="list-inline d-none d-md-block d-lg-block">
		<li class="list-inline-item"><i class="fas fa-headset"></i> Contact Us</li>

		<li class="list-inline-item"><a href="cart.php">
			<i class="fas fa-shopping-cart"></i> Cart 

			<sup id="cart-count">
				<?php if(isset($_SESSION['cart_count'])): ?>
					<?php echo $_SESSION['cart_count']; ?> 
				<?php endif ?>
			</sup>

		</a>

	</li>
</ul>
</div>

<!-- Navbar -->
<div class="bg-primary">
	<div class="container">
		<nav class="navbar navbar-expand-md navbar-dark shadow-none">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav"
			aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse justify-content-center" id="navbarNav">
			<ul class="navbar-nav">
				<li class="nav-item mobile-link">
					<form class="mobile-link d-none nav-link">
						<input type="text" name="" class="form-control" placeholder="Search...">
					</form>	
				</li>
				<li class="nav-item active">
					<a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="catalog.php">Catalogs</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="about.php">About</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="">Developer Profile</a>
				</li>
				<li class="nav-item d-none mobile-link">
					<a href="contact.php" class="nav-link">Contact Us</a>
				</li>
				<?php if (isset($_SESSION['user'])): ?>
				<li class="nav-item d-none mobile-link">
					<a href="" class="nav-link">My Account</a>
				</li>
				<li class="nav-item d-none mobile-link">
					<a class="nav-link" href="lib/controllers/LogoutController.php">Logout</a>
				</li>
				<?php else: ?>
				<li class="nav-item d-none mobile-link">
					<a href="" class="nav-link">Login</a>
				</li>
				<li class="nav-item d-none mobile-link">
					<a href="" class="nav-link">Register</a>
				</li>
				<?php endif ?>
			</ul>
		</div>
	</nav>
</div>
</div>