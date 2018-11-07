<?php session_start(); ?>
<?php include ($_SERVER['DOCUMENT_ROOT'].'/techies/lib/Product.php') ?>
<?php include ($_SERVER['DOCUMENT_ROOT'].'/techies/partials/header.php') ?>
<?php include ($_SERVER['DOCUMENT_ROOT'].'/techies/partials/top_section.php') ?>
<?php if(isset($_SESSION['productID'])) { ?>
<?php $products = new Product(); ?>

<?php foreach(json_decode($products->getProduct($_SESSION['productID'])) as $product) { ?>

<div class="container mb-5">
  <nav aria-label="breadcrumb" class="mb-3 d-none d-md-block d-lg-block">
    <ol class="breadcrumb bg-white d-flex justify-content-center">
      <li class="breadcrumb-item active">Home</li>
      <li class="breadcrumb-item active">Products</li>
      <li class="breadcrumb-item active"><?php echo $product->name; ?></li>
    </ol>
  </nav>

    <div class="content mb-5 mt-5">
      <div class="row">
        <div class="col-md-6">
          <div class="product-featured-image border">
            <img src="<?php echo $product->image; ?>" class="img-fluid">
          </div>
        </div>
        <div class="col-md-6">
          <h3><?php echo $product->name; ?></h3>
          <span>&#8369; <?php echo number_format($product->price, 2); ?></span>
          <p><?php echo $product->sdescription; ?></p>
          <form class="mb-3">
            <input type="number" name="quantity" class="form-control w-50" min="1">
            <button class="btn btn-danger btn-sm"><i class="fas fa-shopping-cart"></i> Add to cart</button>
          </form>
          <ul class="list-unstyled pr-2 pl-2">
            <li class="mb-2">
              <img src="assets/img/svg/shield.png" height="30" width="30">
              Secured transactions.
            </li>
            <li class="mb-2">
              <img src="assets/img/svg/van.png" height="30" width="30">
              Free Delivery
            </li>
            <li class="mb-2">
              <img src="assets/img/svg/return.png" height="30" width="30">
              Replacement & Refund is available for this item.
            </li>
          </ul>
        </div>
      </div>
    </div>
    <ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">Description</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="details-tab" data-toggle="tab" href="#details" role="tab" aria-controls="details" aria-selected="false">Details</a>
  </li>
</ul>
<div class="tab-content mb-5" id="myTabContent">
  <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab"><?php echo $product->description; ?></div>
  <div class="tab-pane fade" id="details" role="tabpanel" aria-labelledby="details-tab"><?php echo $product->details; ?></div>
  
</div>
<?php } ?>

<h5 class="h2 mb-3 title text-uppercase"><img src="assets/img/svg/related.png" class="info-icon">Related Products</h5>
<div class="featured-items">

   <div class="card">


    <!--Zoom effect-->
    <div class="view overlay zoom p-2">
      <img src="assets/img/products/welding.jpg" class="img-fluid card-img-top" alt="smaple image">
    </div>

    <!-- Card content -->
    <div class="card-body text-center">

      <!-- Title -->
      <h6 class="card-title"><a>Logilink Crimper</a></h6>
      <!-- Text -->
      <p class="card-text m-0 blue-text">&#8369;
      10</p>
      <!-- Button -->
      <a href="#" class="btn btn-primary btn-sm w-100">View</a>
      <a href="#" class="btn btn-sm btn-danger w-100"><i class="fas fa-shopping-cart"></i></a>
    </div>

  </div>
  <div class="card">


    <!--Zoom effect-->
    <div class="view overlay zoom p-2">
      <img src="assets/img/products/printer.jpg" class="img-fluid card-img-top" alt="smaple image">
    </div>

    <!-- Card content -->
    <div class="card-body text-center">

      <!-- Title -->
      <h6 class="card-title"><a>Logilink Crimper</a></h6>
      <!-- Text -->
      <p class="card-text m-0 blue-text">&#8369;
      10</p>
      <!-- Button -->
      <a href="#" class="btn btn-primary btn-sm w-100">View</a>
      <a href="#" class="btn btn-sm btn-danger w-100"><i class="fas fa-shopping-cart"></i></a>
    </div>

  </div>
  <div class="card">


    <!--Zoom effect-->
    <div class="view overlay zoom p-2">
      <img src="assets/img/products/welding.jpg" class="img-fluid card-img-top" alt="smaple image">
    </div>

    <!-- Card content -->
    <div class="card-body text-center">

      <!-- Title -->
      <h6 class="card-title"><a>Logilink Crimper</a></h6>
      <!-- Text -->
      <p class="card-text m-0 blue-text">&#8369;
      10</p>
      <!-- Button -->
      <a href="#" class="btn btn-primary btn-sm w-100">View</a>
      <a href="#" class="btn btn-sm btn-danger w-100"><i class="fas fa-shopping-cart"></i></a>
    </div>

  </div>
  <div class="card">


    <!--Zoom effect-->
    <div class="view overlay zoom p-2">
      <img src="assets/img/products/printer.jpg" class="img-fluid card-img-top" alt="smaple image">
    </div>

    <!-- Card content -->
    <div class="card-body text-center">

      <!-- Title -->
      <h6 class="card-title"><a>Logilink Crimper</a></h6>
      <!-- Text -->
      <p class="card-text m-0 blue-text">&#8369;
      10</p>
      <!-- Button -->
      <a href="#" class="btn btn-primary btn-sm w-100">View</a>
      <a href="#" class="btn btn-sm btn-danger w-100"><i class="fas fa-shopping-cart"></i></a>
    </div>

  </div>
  <div class="card">


    <!--Zoom effect-->
    <div class="view overlay zoom p-2">
      <img src="assets/img/products/printer.jpg" class="img-fluid card-img-top" alt="smaple image">
    </div>

    <!-- Card content -->
    <div class="card-body text-center">

      <!-- Title -->
      <h6 class="card-title"><a>Logilink Crimper</a></h6>
      <!-- Text -->
      <p class="card-text m-0 blue-text">&#8369;
      10</p>
      <!-- Button -->
      <a href="#" class="btn btn-primary btn-sm w-100">View</a>
      <a href="#" class="btn btn-sm btn-danger w-100"><i class="fas fa-shopping-cart"></i></a>
    </div>

  </div>
</div>
</div>

<?php }else {
   echo "
            <div class='container'>
            <img class='img-fluid d-block mx-auto' src='assets/img/404.png' alt='Page not found.'>
            </div>
          ";

  }
?>
<script type="text/javascript">
  $(document).ready(function(){
    var redirect = $('#redirect').val();
    var $protocol = window.location.protocol
    var $location = window.location.host;
    // if(redirect != undefined){
    //   // window.location = $protocol+"//"+$location+"/index.php";
    //   window.location = "index.php";
    // }
  });
</script>
<?php include ($_SERVER['DOCUMENT_ROOT'].'/techies/partials/footer.php') ?>