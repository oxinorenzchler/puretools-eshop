<?php include ($_SERVER['DOCUMENT_ROOT'].'/techies/lib/controllers/ProductController.php'); ?>
<?php include ($_SERVER['DOCUMENT_ROOT'].'/techies/partials/header.php') ?>
<?php include ($_SERVER['DOCUMENT_ROOT'].'/techies/partials/top_section.php') ?>
<?php unset($_SESSION['productID']); ?>

<div class="container mb-5">
	<nav aria-label="breadcrumb" class="mb-3 d-none d-md-block d-lg-block">
    <ol class="breadcrumb bg-white d-flex justify-content-center">
      <li class="breadcrumb-item active">Home</li>
      <li class="breadcrumb-item active">Catalog</li>
    </ol>
  </nav>

  <div class="mt-5 row">
  	<div class="col-md-3 col-lg-3 mb-3">
  		<div class="card">
  			<h3 class="card-title p-2 red text-center">Categories</h3>
  			<div class="card-body">
  				<ul class="list-unstyled">
           <li>Tools</li>
           <li>Office</li>
           <li>Machines</li>
         </div>
       </ul>
     </div>
   </div>
   <div class="col-md-9 col-lg-9">

    <div class="row">
    <?php foreach (json_decode(getAllProducts()) as $product) { ?>
     <div class="col-md-6 col-lg-4 mb-3">
       <div class="card">
        <!--Zoom effect-->
        <div class="view overlay zoom p-2">
          <img src="assets/img/products/printer.jpg" class="img-fluid card-img-top" alt="smaple image">
        </div>

        <!-- Card content -->
        <div class="card-body text-center">

          <!-- Title -->
          <h6 class="card-title"><a><?php echo $product->name; ?></a></h6>
          <!-- Text -->
          <p class="card-text m-0 blue-text">&#8369;
          <?php echo $product->price; ?></p>
          <!-- Button -->
          <form action="lib/controllers/ProductController.php" method="GET">
            <input type="text" name="id" value=<?php echo $product->id; ?> >
            <button class="btn btn-primary btn-sm w-100" name="getProductForm">View</button>
          </form>
          <a href="#" class="btn btn-sm btn-danger w-100"><i class="fas fa-shopping-cart"></i></a>
        </div>
      </div>
    </div>
    <?php } ?>

  </div>
</div>
</div>	

</div>

<?php include ($_SERVER['DOCUMENT_ROOT'].'/techies/partials/footer.php') ?>