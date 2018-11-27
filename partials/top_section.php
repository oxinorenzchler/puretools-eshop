<div class="d-flex justify-content-end container-fluid special-color">
	<?php if (isset($_SESSION['user'])): ?>
				<div class="btn-group pt-2">
					<a class="white-text" data-toggle="dropdown">
					Hello, 	
					<?php echo $_SESSION['user']->name; ?>
					<span class="fas fa-caret-down"></span>	
					</a>

				</button>
				<div class="dropdown-menu mr-5">
					<a class="dropdown-item small" href="user_account.php">My account</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item small" href="lib/controllers/LogoutController.php">Logout</a>
				</div>
			</div>
			<?php else: ?>
				<div class="justify-content-end d-flex pt-2">
				<a href="<?php echo Route::redirect("login.php"); ?>" class="mr-2 white-text">Sign In</a>
				<a href="<?php echo Route::redirect("register.php") ?>" class="white-text">Register</a>
				</div>
			<?php endif ?>
</div>	
<!-- Brand, search and cart section -->
<div class="d-flex justify-content-between align-items-end pr-4 pl-4 special-color white-text">
	<a href="index.php" class="">
		<img src="assets/img/demo.jpg" height="" width="">
			<a href="cart.php" class="white-text d-sm-block d-md-none">
			<i class="fas fa-shopping-cart"></i> Cart 
			<sup id="cart-count">
				<?php if(isset($_SESSION['cart_count'])): ?>
					<?php echo $_SESSION['cart_count']; ?> 
				<?php endif ?>
			</sup>
		</a>
	</a>
	<form class="d-none d-md-block d-lg-block pb-3" method="GET" action="lib/controllers/SearchController.php">
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
		<li class="list-inline-item"><i class="fas fa-headset"></i> <a href="contact.php" class="white-text">Contact Us</a></li>
		<li class="list-inline-item"><a href="cart.php" class="white-text">
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
<div class="orange mb-5">
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
			</ul>
		</div>
	</nav>
</div>
</div>