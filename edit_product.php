<?php session_start(); ?>
<?php include ($_SERVER['DOCUMENT_ROOT'].'/techies/lib/Product.php') ?>
<?php include ($_SERVER['DOCUMENT_ROOT'].'/techies/lib/Category.php') ?>
<?php include ($_SERVER['DOCUMENT_ROOT'].'/techies/partials/admin_header.php') ?>

<?php include ($_SERVER['DOCUMENT_ROOT'].'/techies/partials/admin_nav.php') ?>

<div class="container" style="min-height: 100vh; height: auto;">
	<?php if(isset($_SESSION['productID'])) {?>
		<div class="row mt-5 mb-5">
			<div class="col-md-6 offset-md-3">
				<?php if(isset($_SESSION['success'])) { ?>
					<div class="alert alert-success" role="alert">
						<?php echo $_SESSION['success']; ?>
					</div>
					<?php unset($_SESSION['success']); }?>

					<?php if(isset($_SESSION['errors'])) { ?>
						<div class="alert alert-danger" role="alert">
							<?php foreach($_SESSION['errors'] as $value) { ?>
								<ul class="list-unstyled">
									<li><?php echo $value ?></li>
								</ul>
							<?php } ?>
						</div>
					<?php unset($_SESSION['errors']); } ?>

					<?php if(isset($_SESSION['file'])) { ?>
				<div class="alert alert-danger" role="alert">
						<?php foreach($_SESSION['file'] as $value) { ?>
							<ul class="list-unstyled">
								<li><?php echo $value ?></li>
							</ul>
						<?php } ?>
				</div>
				<?php unset($_SESSION['file']); } ?>

					<a href="products.php" class="btn btn-warning mb-3"><i class="fas fa-arrow-left"></i> Back</a>
					<h2><i class="fas fa-plus-circle"></i> Edit Product</h2>
					<?php $products = new Product(); ?>
					<?php $categories = new Category(); ?>
					<?php foreach(json_decode($products->getProduct($_SESSION['productID'])) as $product) { ?>
						<form action="lib/controllers/ProductController.php" method="POST" enctype="multipart/form-data">
							<div class="form-group">
								<img src="<?php echo $product->image ?>" class="img-fluid">
							</div>
							<!-- Name and category -->
							<div class="form-row">
								<div class="col-md-6 mb-3">
									<input type="text" name="name" class="form-control" value="<?php echo $product->name; ?>" placeholder="Product name....">
								</div>
								<div class="col-md-6">
									<select class="form-control" name="category" >
										<option value="">--Select category--</option>
										<?php foreach(json_decode($categories->getAll()) as $category) { ?>
											<option value=<?php echo $category->id; ?> 
											<?php echo ($product->category_id === $category->id) ? "selected" : "" ?>
											><?php echo $category->name; ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
							<!-- Price and file -->
							<div class="form-row">
								<div class="col-md-6">
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text">&#8369;
											</span>
										</div>
										<input value="<?php echo number_format( $product->price, 2); ?>" type="number" class="form-control" aria-label="Amount (to the nearest dollar)" name="price">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="file">Change: </label>
										<input type="file" class="" id="file" aria-describedby="inputGroupFileAddon01" name="file">
									</div>
								</div>
							</div>
							<!-- Short description -->
							<div class="form-group">

								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text">Short Description</span>
									</div>
									<textarea class="form-control" name="sdescription">
										<?php echo $product->sdescription; ?>
									</textarea>
								</div>
							</div>
							<!-- Description -->
							<div class="form-group">

								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text">Description</span>
									</div>
									<textarea class="form-control" name="description"><?php echo $product->description; ?></textarea>
								</div>
							</div>
							<!-- Details -->
							<div class="form-group">

								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text">Details</span>
									</div>
									<textarea class="form-control" name="details">
										<?php echo $product->details; ?>
									</textarea>
								</div>
							</div>
							<input type="hidden" name="id" value="<?php echo $product->id; ?>">
							<div class="input-group">
								<button class="btn btn-primary w-100"  name="saveEdit">Save Changes</button>
							</div>
						</form>
					<?php } ?>
				</div>
			</div>	
		<?php }else{
			echo "
			<div class='container'>
			<img class='img-fluid d-block mx-auto' src='assets/img/404.png' alt='Page not found.'>
			</div>
			";
		} ?>
	</div>

	<?php include ($_SERVER['DOCUMENT_ROOT'].'/techies/partials/admin_footer.php') ?>

