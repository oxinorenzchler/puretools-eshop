<?php include ($_SERVER['DOCUMENT_ROOT'].'/techies/lib/controllers/PublicController.php'); ?>

<?php if(isset($_SESSION['filter'])): ?>

 <div id="test-list">
  <div class="list row" id="product-list">
    <?php foreach (json_decode($products->raw($_SESSION['filter'])->get()) as $product): ?>
    <?php var_dump($products); ?>
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

<script type="text/javascript">
  //div
  var monkeyList = new List('test-list', {
    //item
    valueNames: ['name'],
    page: 10,
    pagination: true


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

</script>


<?php unset($_SESSION['filter']); ?>
<?php else: ?>

  <div class="jumbotron">
    <h2 class="text-center">No match found</h2>
  </div>

<?php endif  ?>
