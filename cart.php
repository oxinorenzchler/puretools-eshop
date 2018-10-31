<?php include ($_SERVER['DOCUMENT_ROOT'].'/techies/partials/header.php') ?>
<?php include ($_SERVER['DOCUMENT_ROOT'].'/techies/partials/top_section.php') ?>

<div class="container mb-5">
	<nav aria-label="breadcrumb" class="mb-3 d-none d-md-block d-lg-block">
    <ol class="breadcrumb bg-white d-flex justify-content-center">
      <li class="breadcrumb-item active">Home</li>
      <li class="breadcrumb-item active">Cart</li>
    </ol>
  </nav>

  <div class="mt-5">
  	<h5 class="h2 mb-3 title text-uppercase"><img src="assets/img/svg/cart.png" class="info-icon">My Cart</h5>

  	<table class="table table-hover">
  <thead class="orange white-text">
    <tr>
      <th scope="col">Item</th>
      <th scope="col">Price</th>
      <th scope="col">Quantity</th>
      <th scope="col">Sub Total</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row"><img src="assets/img/products/crimper.png" class="info-icon"></th>
      <td>$10</td>
      <td class="form-inline"><input type="number" name="quantity" value="50" class="form-control"><button class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></button></td>
      <td>$10</td>
    </tr>
   <tr>
      <th scope="row"><img src="assets/img/products/crimper.png" class="info-icon"></th>
      <td>$10</td>
      <td class="form-inline"><input type="number" name="quantity" value="50" class="form-control"><button class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></button></td>
      <td>$10</td>
    </tr>
   <tr>
      <th scope="row"><img src="assets/img/products/crimper.png" class="info-icon"></th>
      <td>$10</td>
      <td class="form-inline"><input type="number" name="quantity" value="50" class="form-control"><button class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></button></td>
      <td>$10</td>
    </tr>
  </tbody>
</table>
	<div class="d-flex justify-content-end">
		<span class="h3 mr-2">Total:</span>
		<span class="h3"> $500</span>
	</div>
	<a href="" class="btn btn-sm btn-primary">Continue Shopping</a>
	<a href="" class="btn btn-sm btn-success">Checkout</a>
  </div>
</div>
  <?php include ($_SERVER['DOCUMENT_ROOT'].'/techies/partials/footer.php') ?>