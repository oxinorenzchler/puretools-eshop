<?php session_start(); ?>
<?php include ($_SERVER['DOCUMENT_ROOT'].'/techies/partials/admin_header.php') ?>
<?php include ($_SERVER['DOCUMENT_ROOT'].'/techies/lib/Category.php') ?>
<?php include ($_SERVER['DOCUMENT_ROOT'].'/techies/partials/admin_nav.php') ?>

<div class="container" style="min-height: 100vh; height: auto;">
	<?php if(isset($_SESSION['categoryID'])) { ?>
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
				<?php unset($_SESSION['file']);} ?>
					<a href="categories.php" class="btn btn-warning mb-3"><i class="fas fa-arrow-left"></i> Back</a>
					<h2><i class="fas fa-plus-circle"></i> Edit Category</h2>
					<?php $categories = new Category(); ?>
					<?php foreach(json_decode($categories->getCategory($_SESSION['categoryID'])) as $category) { ?>

						<form action="lib/controllers/CategoryController.php" method="POST" enctype="multipart/form-data">
							<div class="form-group">
								<input type="text" name="name" class="form-control" placeholder="Category name...." value="<?php echo $category->name ?>">
							</div>

					<div class="form-group">
						<label>Image:</label>
						<img src="<?php echo $category->image; ?>" class="img-fluid">
					</div>							

					<div class="form-group">
						<label for="file">Change: </label>
						<input type="file" class="" id="file" aria-describedby="inputGroupFileAddon01" name="file">
					</div>
							<input type="hidden" name="id" value="<?php echo $category->id; ?>">
							<div class="form-group">
								<button class="btn btn-primary w-100"  name="saveEdit">Save changes</button>
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

