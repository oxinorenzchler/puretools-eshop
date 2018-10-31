<?php include ($_SERVER['DOCUMENT_ROOT'].'/techies/partials/header.php') ?>
<?php include ($_SERVER['DOCUMENT_ROOT'].'/techies/partials/top_section.php') ?>

<div class="container mb-5">
	<nav aria-label="breadcrumb" class="mb-3 d-none d-md-block d-lg-block">
		<ol class="breadcrumb bg-white d-flex justify-content-center">
			<li class="breadcrumb-item active">Home</li>
			<li class="breadcrumb-item active">My Account</li>
		</ol>
	</nav>

	<ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
		<li class="nav-item">
			<a class="nav-link active" id="home-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="home" aria-selected="true">Profile</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" id="orders-tab" data-toggle="tab" href="#orders" role="tab" aria-controls="orders" aria-selected="false">Orders</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" id="address-tab" data-toggle="tab" href="#address" role="tab" aria-controls="address" aria-selected="false">Address</a>
		</li>
	</ul>
	<div class="tab-content" id="myTabContent">
		<div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="orders-tab">
			<form>
				<div class="row">
					<div class="col-md-4 offset-md-4">
						<!-- Large input -->
<div class="md-form form-lg">
  <input type="text" id="inputLGEx" class="form-control form-control-lg">
  <label for="inputLGEx">Name</label>
</div>

<div class="md-form form-lg">
  <input type="text" id="inputLGEx" class="form-control form-control-lg">
  <label for="inputLGEx">Email</label>
</div>

<button class="btn btn-sm btn-warning">Change Password</button>
<div class="d-none">
<div class="md-form form-lg">
  <input type="text" id="inputLGEx" class="form-control form-control-lg">
  <label for="inputLGEx">Password</label>
</div>

<div class="md-form form-lg">
  <input type="text" id="inputLGEx" class="form-control form-control-lg">
  <label for="inputLGEx">Confirm password</label>
</div>
</div>



					</div>
				</div>
			</form>
		</div>
		<div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="orders-tab">
			<table class="table">
  <thead class="grey lighten-2">
    <tr>
      <th scope="col">Reference #</th>
      <th scope="col">Date</th>
      <th scope="col">Payment</th>
      <th scope="col">Total</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">pure-123xyz</th>
      <td>2018-10-31</td>
      <td>Paypal</td>
      <td>$200</td>
      <td>
      	<form>
      		<input type="hidden" name="">
      		<button class="btn btn-sm btn-warning"><i class="fas fa-eye"></i></button>
      	</form>
      </td>
    </tr>

     <tr>
      <th scope="row">pure-123xyz</th>
      <td>2018-10-31</td>
      <td>Paypal</td>
      <td>$200</td>
      <td>
      	<form>
      		<input type="hidden" name="">
      		<button class="btn btn-sm btn-warning"><i class="fas fa-eye"></i></button>
      	</form>
      </td>
    </tr>

     <tr>
      <th scope="row">pure-123xyz</th>
      <td>2018-10-31</td>
      <td>Paypal</td>
      <td>$200</td>
      <td>
      	<form>
      		<input type="hidden" name="">
      		<button class="btn btn-sm btn-warning"><i class="fas fa-eye"></i></button>
      	</form>
      </td>
    </tr>

     <tr>
      <th scope="row">pure-123xyz</th>
      <td>2018-10-31</td>
      <td>Paypal</td>
      <td>$200</td>
      <td>
      	<form>
      		<input type="hidden" name="">
      		<button class="btn btn-sm btn-warning"><i class="fas fa-eye"></i></button>
      	</form>
      </td>
    </tr>
  </tbody>
</table>		
		</div>
		<div class="tab-pane fade" id="address" role="tabpanel" aria-labelledby="address-tab">
					<form>
				<div class="row">
					<div class="col-md-4 offset-md-4">
						<!-- Large input -->
<div class="md-form form-lg">
  <input type="text" id="inputLGEx" class="form-control form-control-lg">
  <label for="inputLGEx">Name</label>
</div>

<div class="md-form form-lg">
  <input type="text" id="inputLGEx" class="form-control form-control-lg">
  <label for="inputLGEx">Address</label>
</div>

<div class="md-form form-lg">
  <input type="text" id="inputLGEx" class="form-control form-control-lg">
  <label for="inputLGEx">Contact</label>
</div>

<div class="md-form form-lg">
  <input type="text" id="inputLGEx" class="form-control form-control-lg">
  <label for="inputLGEx">City</label>
</div>

<div class="md-form form-lg">
  <input type="text" id="inputLGEx" class="form-control form-control-lg">
  <label for="inputLGEx">Zip Code</label>
</div>

					</div>
				</div>
			</form>
		</div>
	</div>
</div>

<?php include ($_SERVER['DOCUMENT_ROOT'].'/techies/partials/footer.php') ?>