<?php include ($_SERVER['DOCUMENT_ROOT'].'/techies/partials/header.php') ?>
<?php include ($_SERVER['DOCUMENT_ROOT'].'/techies/partials/top_section.php') ?>

<div class="container mb-5">
  <nav aria-label="breadcrumb" class="mb-3 d-none d-md-block d-lg-block">
    <ol class="breadcrumb bg-white d-flex justify-content-center">
      <li class="breadcrumb-item active">Home</li>
      <li class="breadcrumb-item active">Cart</li>
      <li class="breadcrumb-item active">Checkout</li>
    </ol>
  </nav>


  <div class="mt-5">
  	<h5 class="h2 mb-3 title text-uppercase"><img src="assets/img/svg/checkout.png" class="info-icon">Checkout</h5>
  	<span>Already have an account? <a href="" class="btn btn-sm btn-warning">Sign In</a></span>
  	<div class="row">
  		<div class="col-md-6">
  			<h4>Order Summary</h4>
  			<div class="border-bottom"></div>
  	<table class="table table-sm">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col"></th>
      <th scope="col"></th>
      <th scope="col"></th>
      <th scope="col">Sub total</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">Crimper x2</th>
      <td>-</td>
      <td>-</td>
      <td>-</td>
      <td>$10</td>
    </tr>
      <tr>
      <th scope="row">Crimper x2</th>
      <td>-</td>
      <td>-</td>
      <td>-</td>
      <td>$10</td>
    </tr>
      <tr>
      <th scope="row">Crimper x2</th>
      <td>-</td>
      <td>-</td>
      <td>-</td>
      <td>$10</td>
    </tr>
  
  </tbody>
</table>
<h4>Order Total: $30</h4>
  		</div>
  		<div class="col-md-6">
  			<h4>Shipping</h4>
  			<div class="border-bottom mb-3"></div>
  			<form action="" method="POST">
  				<div class="row form-group">
  					<div class="col-md-6 mb-3">
  						<input type="text" name="firstname" class="form-control" placeholder="First name">
  					</div>
  					<div class="col-md-6">
  						<input type="text" name="lastname" class="form-control" placeholder="Last name">
  					</div>
  				</div>	
  				<div class="form-group">
  					<input type="text" name="address" class="form-control" placeholder="Address">
  				</div>
  				<div class="row form-group">
  					<div class="col-md-6 mb-3">
  						<input type="text" name="city" class="form-control" placeholder="City">
  					</div>
  					<div class="col-md-6">
  						<input type="number" min="1" name="zip" class="form-control" placeholder="Zip code">
  					</div>
  				</div>
  				<h4>Payment</h4>
  				<div class="border-bottom mb-3"></div>
  				<div class="form-group">
  					<select class="form-control">
  						<option>COD</option>
  						<option>Paypal</option>
  					</select>
  				</div>
  				<div class="form-group">
  					<button class="btn btn-primary w-100">Proceed</button>
  				</div>		
  			</form>
  		</div>
  	</div>
  </div>
</div>
   <?php include ($_SERVER['DOCUMENT_ROOT'].'/techies/partials/footer.php') ?>