
<div class="container">
  <h2 class="text-center text-uppercase title mb-5"><img src="assets/img/svg/fire.png" class="info-icon">What's Hot</h2>

  <?php foreach(getCategories() as $category) {?>
    <!-- Hand Tools -->
    <h5 class="h2 mb-3 title text-uppercase"><img src="<?php echo $category->image; ?>" class="info-icon"><?php echo $category->name ?></h5>
    <div class="featured-items mb-5">

      <?php foreach (getFeatured($category->id) as $product) {?>
        <div class="card border border-light">

          <!--Zoom effect-->
           <div class="view overlay zoom p-2">
                <img src="<?php echo $product->image; ?>" class="img-fluid card-img-top" alt="smaple image">
                <div class="mask flex-center rgba-black-slight">
                 <form id="getproductform-<?php echo $product->id; ?>" action="lib/controllers/PublicController.php" method="GET">
                  <input type="hidden" name="id" value=<?php echo $product->id; ?> >
                  <input type="hidden" name="getProductForm">
                  <button class="btn btn-primary btn-sm w-100" >View</button>
                </form>  
              </div>
            </div>

          <!-- Card content -->
          <div class="card-body text-center">
            <div class="">
              <?php if(getRating($product->id) == 1): ?>
                <span class="fas fa-star checked" onclick="rate(1, <?php echo $product->id ?>, 2)"></span>
                <span class="fas fa-star" onclick="rate(2, <?php echo $product->id ?>, 2)"></span>
                <span class="fas fa-star" onclick="rate(3, <?php echo $product->id ?>, 2)"></span>
                <span class="fas fa-star" onclick="rate(4, <?php echo $product->id ?>, 2)"></span>
                <span class="fas fa-star" onclick="rate(5, <?php echo $product->id ?>, 2)"></span>
                <?php elseif(getRating($product->id) == 2): ?>
                  <span class="fas fa-star checked" onclick="rate(1, <?php echo $product->id ?>, 3)"></span>
                  <span class="fas fa-star checked" onclick="rate(2, <?php echo $product->id ?>, 6)"></span>
                  <span class="fas fa-star" onclick="rate(3, <?php echo $product->id ?>, 7)"></span>
                  <span class="fas fa-star" onclick="rate(4, <?php echo $product->id ?>, 3)"></span>
                  <span class="fas fa-star" onclick="rate(5, <?php echo $product->id ?>, 6)"></span>
                  <?php elseif(getRating($product->id) == 3): ?>
                    <span class="fas fa-star checked" onclick="rate(1, <?php echo $product->id ?>, 3)"></span>
                    <span class="fas fa-star checked" onclick="rate(2, <?php echo $product->id ?>, 6)"></span>
                    <span class="fas fa-star checked" onclick="rate(3, <?php echo $product->id ?>, 7)"></span>
                    <span class="fas fa-star" onclick="rate(4, <?php echo $product->id ?>, 3)"></span>
                    <span class="fas fa-star" onclick="rate(5, <?php echo $product->id ?>, 6)"></span>
                    <?php elseif(getRating($product->id) == 4): ?>
                      <span class="fas fa-star checked" onclick="rate(1, <?php echo $product->id ?>, 3)"></span>
                      <span class="fas fa-star checked" onclick="rate(2, <?php echo $product->id ?>, 6)"></span>
                      <span class="fas fa-star checked" onclick="rate(3, <?php echo $product->id ?>, 7)"></span>
                      <span class="fas fa-star checked" onclick="rate(4, <?php echo $product->id ?>, 3)"></span>
                      <span class="fas fa-star" onclick="rate(5, <?php echo $product->id ?>, 6)"></span>
                      <?php elseif(getRating($product->id) == 5): ?>
                       <span class="fas fa-star checked" onclick="rate(1, <?php echo $product->id ?>, 3)"></span>
                       <span class="fas fa-star checked" onclick="rate(2, <?php echo $product->id ?>, 6)"></span>
                       <span class="fas fa-star checked" onclick="rate(3, <?php echo $product->id ?>, 7)"></span>
                       <span class="fas fa-star checked" onclick="rate(4, <?php echo $product->id ?>, 3)"></span>
                       <span class="fas fa-star checked" onclick="rate(5, <?php echo $product->id ?>, 6)"></span>
                       <?php else: ?>
                        <span class="fas fa-star" onclick="rate(1, <?php echo $product->id ?>, 3)"></span>
                        <span class="fas fa-star" onclick="rate(2, <?php echo $product->id ?>, 6)"></span>
                        <span class="fas fa-star" onclick="rate(3, <?php echo $product->id ?>, 7)"></span>
                        <span class="fas fa-star" onclick="rate(4, <?php echo $product->id ?>, 3)"></span>
                        <span class="fas fa-star" onclick="rate(5, <?php echo $product->id ?>, 6)"></span>
                      <?php endif ?>
                    </div>

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
            <?php } ?>

          </div>

