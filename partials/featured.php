
<div class="container mb-5">
  <h2 class="text-center text-uppercase title mb-5"><img src="assets/img/svg/fire.png" class="info-icon">What's Hot</h2>

<?php foreach(getCategories() as $category) {?>
  <!-- Hand Tools -->
  <h5 class="h2 mb-3 title text-uppercase"><img src="<?php echo $category->image; ?>" class="info-icon"><?php echo $category->name ?></h5>
  <div class="featured-items mb-5">

    <?php foreach (getFeatured($category->id) as $product) {?>
    <div class="card">

    <!--Zoom effect-->
    <div class="view overlay zoom p-2">
      <img src="<?php echo $product->image; ?>" class="img-fluid card-img-top" alt="<?php echo $product->name; ?>">
    </div>

    <!-- Card content -->
    <div class="card-body text-center">

      <!-- Title -->
      <h6 class="card-title"><a><?php echo $product->name; ?></a></h6>
      <!-- Text -->
      <p class="card-text m-0 blue-text">&#8369;
      <?php echo number_format($product->price, 2); ?></p>
      <form action="lib/controllers/PublicController.php" method="GET">
            <input type="text" name="id" value=<?php echo $product->id; ?> >
            <button class="btn btn-primary btn-sm w-100" name="getProductForm">View</button>
          </form>
      <a href="#" class="btn btn-sm btn-danger w-100"><i class="fas fa-shopping-cart"></i></a>
    </div>

  </div>
  <?php } ?>


</div>
<?php } ?>

</div>

