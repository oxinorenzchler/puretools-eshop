<?php include __DIR__."\lib\\route\Route.php"; ?>
<?php include __DIR__.'\lib/controllers/PublicController.php'; ?>
<?php include __DIR__.'\partials/header.php'; ?>
<?php include __DIR__.'\partials/top_section.php'; ?>

<?php if(isset($_SESSION['productID']) && !empty($_GET['product']) && ($_GET['pid'] == $_SESSION['productID'] && $_SESSION['product'] == $_GET['product'])): ?>
<!-- start -->

<div class="container mb-5">
  <nav aria-label="breadcrumb" class="mb-3 d-none d-md-block d-lg-block">
    <ol class="breadcrumb bg-white d-flex justify-content-center">
      <li class="breadcrumb-item active">Home</li>
      <li class="breadcrumb-item active">Products</li>
      <li class="breadcrumb-item active"><?php echo getProduct($_SESSION['productID'])->name; ?></li>
    </ol>
  </nav>

  <div class="content mb-5 mt-5">
    <div class="row">
      <div class="col-md-6">
        <div class="product-featured-image border border-light p-2 rounded" id="product-image">
          <img src=<?php echo getProduct($_SESSION['productID'])->image; ?> class="img-fluid" alt="<?php echo getProduct($_SESSION['productID'])->name; ?>">

        </div>
      </div>
      <div class="col-md-6">
        <h3><?php echo getProduct($_SESSION['productID'])->name; ?></h3>
        <div>
         <?php include __DIR__.'\partials/rating_productpage.php'; ?>
       </div>
       <span>&#8369; <?php echo number_format(getProduct($_SESSION['productID'])->price, 2); ?></span>
       <p>  <?php echo getProduct($_SESSION['productID'])->sdescription; ?></p>
       <div class="mb-3" id="add-to-cart-form">
        <input type="number" name="quantity" class="form-control w-50" min="1">
        <button class="btn btn-danger btn-sm" onclick="addToCart(<?php echo getProduct($_SESSION['productID'])->id; ?>)"><i class="fas fa-shopping-cart"></i> Add to cart
        </button>
      </div>
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
  <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab"><?php echo getProduct($_SESSION['productID'])->description; ?></div>
  <div class="tab-pane fade" id="details" role="tabpanel" aria-labelledby="details-tab"><?php echo getProduct($_SESSION['productID'])->details; ?></div>

</div>

<!-- end -->

<h5 class="h2 mb-3 title text-uppercase"><img src="assets/img/svg/related.png" class="info-icon">Related Products</h5>
<div class="featured-items">

 <?php foreach(getRelatedProducts($_SESSION['productID']) as $product): ?>
  <div class="card border border-light">

    <!--Zoom effect-->
    <div class="view overlay zoom p-2">
      <img src="<?php echo $product->image; ?>" class="img-fluid card-img-top" alt="smaple image">
      <div class="mask flex-center rgba-black-slight">
       <form id="getproductform-<?php echo $product->id; ?>" action="lib/controllers/PublicController.php" method="GET">
        <input type="hidden" name="id" value=<?php echo $product->id; ?> >
        <input type="hidden" name="slug" value=<?php echo $product->slug; ?>>
        <button class="btn btn-primary btn-sm w-100" >View</button>
      </form>  
    </div>
  </div>

  <!-- Card content -->
  <div class="card-body text-center">
    <div class="">
     <?php include __DIR__.'\partials/rating.php'; ?>
   </div>

   <!-- Title -->
   <h6 class="card-title m-0"><a onclick="getProduct(<?php echo $product->id;?>)" class="grey-text"><?php echo $product->name; ?></a></h6>
   <!-- Text -->
   <p class="card-text m-0 blue-text">&#8369;
    <?php echo number_format($product->price, 2); ?></p>
  </div>

</div>
<?php endforeach ?>
</div>
</div>

<?php else: ?>
 
 <div class='container'>
   <img class='img-fluid d-block mx-auto' src='assets/img/404.png' alt='Page not found.'>
 </div>

<?php endif ?>
<script type="text/javascript">
  $(document).ready(function(){

    $('#product-image').zoom();

  });

  function rate(pts,id,uid){

    $.ajax({
      'url':'lib/controllers/RatingController.php',
      'method':'POST',
      'data':{'pts':pts, 'id':id, 'rating':'rating', 'uid':uid}
    }).done(function(data){

      console.log(data);

    });

  }

  function getProduct(id){
    $('#getproductform-' + id ).submit();
  }
</script>
<?php include __DIR__.'\partials/footer.php'; ?>
