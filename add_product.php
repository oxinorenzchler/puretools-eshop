<?php session_start(); ?>
<?php include ($_SERVER['DOCUMENT_ROOT'].'/techies/partials/admin_header.php') ?>

<?php include ($_SERVER['DOCUMENT_ROOT'].'/techies/partials/admin_nav.php') ?>

<div class="container" style="min-height: 100vh; height: auto;">
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
				<?php } ?>
				<h2><i class="fas fa-plus-circle"></i> Add New Product</h2>
				<form action="lib/controllers/AddProduct.php" method="POST" enctype="multipart/form-data">
					<!-- Name and category -->
					<div class="form-row">
						<div class="col-md-6 mb-3">
							<input type="text" name="name" class="form-control" placeholder="Product name....">
						</div>
						<div class="col-md-6">
							<select class="form-control" name="category">
								<option value="no">Category</option>
								<option value="1">Tools</option>
								<option>Office</option>
								<option>Machines</option>
							</select>
						</div>
					</div>
					<!-- Price and file -->
					<div class="form-row">
						<div class="col-md-6">
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text">$</span>
								</div>
								<input type="number" class="form-control" aria-label="Amount (to the nearest dollar)" name="price">
								<div class="input-group-append">
									<span class="input-group-text">.00</span>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
								</div>
								<div class="custom-file">
									<input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="file">
									<label class="custom-file-label" for="inputGroupFile01">Choose file</label>
								</div>
							</div>
						</div>
					</div>
					<!-- Short description -->
					<div class="form-group">

						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text">Short Description</span>
							</div>
							<textarea class="form-control" name="sdescription"></textarea>
						</div>
					</div>
					<!-- Description -->
					<div class="form-group">

						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text">Description</span>
							</div>
							<textarea class="form-control" name="description"></textarea>
						</div>
					</div>
					<!-- Details -->
					<div class="form-group">

						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text">Details</span>
							</div>
							<textarea class="form-control" name="details"></textarea>
						</div>
					</div>

					<div class="input-group">
						<button class="btn btn-primary w-100"  name="addProductForm">Add</button>
					</div>
				</form>
			</div>
		</div>	
	</div>

	<?php include ($_SERVER['DOCUMENT_ROOT'].'/techies/partials/admin_footer.php') ?>

