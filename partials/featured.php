<div class="container">
  <?php foreach(getCategories() as $category):?>
    <!-- Hand Tools -->
    <h5 class="h2 mb-3"><?php echo $category->name ?></h5>
    <div class="featured-items mb-5">

      <?php foreach (getFeatured($category->id) as $product) {?>
        <div class="card border border-light">

          <!--Zoom effect-->
          <div class="view overlay zoom p-2">
            <img src="<?php echo $product->image; ?>" class="img-fluid card-img-top" alt="smaple image">
            <div class="mask flex-center rgba-black-slight">
              <form action="lib/controllers/PublicController.php" method="GET" id="getproductform-<?php echo $product->id; ?>">
                  <input type="hidden" name="id" value=<?php echo $product->id; ?> >
                  <input type="hidden" name="slug" value=<?php echo $product->slug; ?>>
                  <button class="btn btn-primary btn-sm w-100">View</button>
                </form>  
          </div>
        </div>

        <!-- Card content -->
        <div class="card-body text-center">
         <!-- Ratings -->
         <?php include  $_SERVER['DOCUMENT_ROOT'].'/techies/ratingnoclick.php'; ?>

         <!-- Title -->
         <h6 class="card-title m-0"><a onclick="getProduct(<?php echo $product->id;?>)" class="grey-text"><?php echo $product->name; ?></a></h6>
         <!-- Text -->
         <p class="card-text m-0 blue-text">&#8369;
          <?php echo number_format($product->price, 2); ?></p>
        </div>

      </div>
    <?php } ?>


  </div>
  <hr class="hr py-2">  
<?php endforeach ?>

</div>

