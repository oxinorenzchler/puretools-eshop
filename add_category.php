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
				<h2><i class="fas fa-plus-circle"></i> Add New Category</h2>
				<form action="lib/controllers/CategoryController.php" method="POST" enctype="multipart/form-data">
						<div class="form-group">
							<input type="text" name="name" class="form-control" placeholder="Category name....">
						</div>

						<div class="form-group">
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
		
		
					<div class="form-group">
						<button class="btn btn-primary w-100"  name="addCategoryForm">Add</button>
					</div>
				</form>
			</div>
		</div>	
	</div>

	<?php include ($_SERVER['DOCUMENT_ROOT'].'/techies/partials/admin_footer.php') ?>
