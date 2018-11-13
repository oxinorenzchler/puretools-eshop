<?php include ($_SERVER['DOCUMENT_ROOT'].'/techies/lib/controllers/SearchController.php'); ?>
<?php include ($_SERVER['DOCUMENT_ROOT'].'/techies/partials/header.php') ?>
<?php include ($_SERVER['DOCUMENT_ROOT'].'/techies/partials/top_section.php') ?>
<?php unset($_SESSION['productID']); ?>
<?php unset($_SESSION['category_id']); ?>
<?php unset($_SESSION['filter']); ?>

<?php if (isset($_SESSION['searchinput'])): ?>
  

  <div class="container mb-5">
   <nav aria-label="breadcrumb" class="mb-3 d-none d-md-block d-lg-block">
    <ol class="breadcrumb bg-white d-flex justify-content-center">
      <li class="breadcrumb-item active">Home</li>
      <li class="breadcrumb-item active">Catalog</li>
    </ol>
  </nav>
  <h3>Your search for "<?php echo $_SESSION['searchinput']; ?>"</h3>
  <div class="mt-5 row">
    <div class="col-md-3 col-lg-3 mb-3">
      <div class="card">
        <div class="card-body">
          <h5 class="filter-title">Categories</h5>
          <ul class="list-unstyled">
            <?php foreach (getCategories() as $category): ?>
              <li><a onclick="getByCategory(<?php echo $category->id; ?>)"><?php echo $category->name; ?></a></li>
            <?php endforeach ?>
          </ul>
          <hr class="hr py-2">
          <h5 class="filter-title">Filter</h5>
          <form id="filter-form" method="GET">
            <div class="form-group">
              <label class="d-block filter-subtitle" for="rating-form">Rating <i class="fas fa-star checked"></i><i class="fas fa-star checked"></i><i class="fas fa-star checked"></i><i class="fas fa-star checked"></i><i class="fas fa-star checked"></i></label>
              <select id="ratingpoints" name="ratingpoints">
                <option value="">Select...</option>
                <option value="5">5 star</option>
                <option value="4">4 star</option>
                <option value="3">3 star</option>
                <option value="2">2 star</option>
                <option value="1">1 star</option>
              </select>
            </div>
            <div class="form-group">
              <label class="d-block filter-subtitle">Category</label>
              <select name="category" id="category">
                <option value="">Select...</option>
                <?php foreach (getCategories() as $category): ?>
                  <option value="<?php echo $category->id; ?>"> <?php echo $category->name; ?></option>
                <?php endforeach ?>
              </select>
            </div>
            <div class="form-group">
              <label class="d-block filter-subtitle">Price</label>
              <div class="form-row">
                <div class="col-lg-6">
                  <input min="1" type="number" id="minprice" name="minprice" class="form-control mb-2 form-control-sm" placeholder="&#8369; min">
                </div>
                <div class="col-lg-6">
                  <input min="1" type="number" id="maxprice" name="minprice" class="form-control form-control-sm" placeholder="&#8369; max">
                </div>

              </div>
            </div> 

            <button type="button" onclick="submitFilter()" class="btn btn-sm btn-warning w-100">submit</button>
          </form>
        </div>
      </div>
    </div>

    <?php if(!searchQuery($_GET['category'], $_GET['product'])): ?>
      <h3>No match found.</h3>
      <?php else: ?>
       <div class="col-md-9 col-lg-9"  id="catalog-container">
        <div id="test-list">
          <div class="list row" id="product-list">
            <?php foreach (json_decode(searchQuery($_GET['category'], $_GET['product'])) as $product): ?>
             <div class="col-md-6 col-lg-4 mb-3 name">
               <div class="card border border-light">
                <!--Zoom effect-->
                <div class="view overlay zoom p-2">
                  <img src="<?php echo $product->image; ?>" class="img-fluid card-img-top" alt="smaple image">
                  <div class="mask flex-center rgba-black-slight">
                   <form action="lib/controllers/PublicController.php" method="GET" id="getproductform-<?php echo $product->id; ?>">
                    <input type="hidden" name="id" value=<?php echo $product->id; ?> >
                    <input type="hidden" name="getProductForm">
                    <button class="btn btn-primary btn-sm w-100">View</button>
                  </form>  
                </div>
              </div>
              <!-- Card content -->
              <div class="card-body text-center">
                <?php include ($_SERVER['DOCUMENT_ROOT'].'/techies/partials/rating.php') ?>
                <!-- Title -->
                <h6 class="card-title m-0"><a onclick="getProduct(<?php echo $product->id;?>)" class="grey-text"><?php echo $product->name; ?></a></h6>
                <!-- Text -->
                <p class="card-text m-0 blue-text">&#8369;
                  <?php echo number_format($product->price, 2); ?></p>
                </div>
              </div>
            </div>
          <?php endforeach ?>      
        </div>
        <nav aria-label="Page navigation example">
          <ul class="pagination">

          </ul>
        </nav>
      </div>


    </div>
  <?php endif ?>
</div>	

</div>
<?php else: ?>
 <div class='container'>
   <img class='img-fluid d-block mx-auto' src='assets/img/404.png' alt='Page not found.'>
 </div>
<?php endif ?>

<?php include ($_SERVER['DOCUMENT_ROOT'].'/techies/partials/footer.php') ?>
