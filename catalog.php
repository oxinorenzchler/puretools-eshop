<?php include ($_SERVER['DOCUMENT_ROOT'].'/techies/lib/controllers/PublicController.php'); ?>
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
          <?php foreach (getCategories() as $category): ?>
            <li><a href=""><?php echo $category->name; ?></a></li>
          <?php endforeach ?>
         </div>
       </ul>
     </div>
   </div>
   <div class="col-md-9 col-lg-9">

    <div id="test-list" >
      <div class="list row">
        <?php foreach (json_decode(getAllProducts()) as $product): ?>
     <div class="col-md-6 col-lg-4 mb-3 name">
       <div class="card">
        <!--Zoom effect-->
        <div class="view overlay zoom p-2">
          <img src="<?php echo $product->image; ?>" class="img-fluid card-img-top" alt="smaple image">
          <div class="mask flex-center rgba-black-slight">
           <form action="lib/controllers/PublicController.php" method="GET">
            <input type="hidden" name="id" value=<?php echo $product->id; ?> >
            <button class="btn btn-primary btn-sm w-100" name="getProductForm">View</button>
          </form>  
          </div>
        </div>
        <!-- Card content -->
        <div class="card-body text-center">
          <div class="">
            <span class="fa fa-star checked" onclick="rate(1, <?php echo $product->id ?>)"></span> 
            <span class="fa fa-star checked" onclick="rate(2, <?php echo $product->id ?>)"></span>
            <span class="fa fa-star checked" onclick="rate(3, <?php echo $product->id ?>)"></span>
            <span class="fa fa-star" onclick="rate(4, <?php echo $product->id ?>)"></span>
            <span class="fa fa-star" onclick="rate(5, <?php echo $product->id ?>)"></span>
          </div>
          <!-- Title -->
          <h6 class="card-title"><a><?php echo $product->name; ?></a></h6>
          <!-- Text -->
          <p class="card-text m-0 blue-text">&#8369;
          <?php echo $product->price; ?></p>
          <!-- Button -->
          <a href="#" class="btn btn-sm btn-danger w-100"><i class="fas fa-shopping-cart"></i></a>
        </div>
      </div>
    </div>
    <?php endforeach ?>      </div>
    <nav aria-label="Page navigation example">
  <ul class="pagination">
   
  </ul>
</nav>
  </div>

</div>
</div>	

</div>


<script type="text/javascript">
  //div
  var monkeyList = new List('test-list', {
    //item
  valueNames: ['name'],
  page: 10,
  pagination: true

  
});
  
  function rate(pts,id){

      $.ajax({
          'url':'lib/controllers/RatingController.php',
          'method':'POST',
          'data':{'pts':pts, 'id':id, 'rating':'rating'}
        }).done(function(data){

          console.log(data);

        });

  }
</script>
<?php include ($_SERVER['DOCUMENT_ROOT'].'/techies/partials/footer.php') ?>
