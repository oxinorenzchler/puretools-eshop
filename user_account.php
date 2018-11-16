<?php include ($_SERVER['DOCUMENT_ROOT'].'/techies/lib/controllers/PublicController.php') ?>
<?php include ($_SERVER['DOCUMENT_ROOT'].'/techies/partials/header.php') ?>
<?php include ($_SERVER['DOCUMENT_ROOT'].'/techies/partials/top_section.php') ?>

<div class="container mb-5">
	<nav aria-label="breadcrumb" class="mb-3 d-none d-md-block d-lg-block">
		<ol class="breadcrumb bg-white d-flex justify-content-center">
			<li class="breadcrumb-item active">Home</li>
			<li class="breadcrumb-item active">My Account</li>
		</ol>
	</nav>

	<?php if (isset($_SESSION['user'])): ?>
    <ul class="nav nav-tabs mt-3" id="myTab" role="tablist">
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
    <div class="tab-content mt-3" id="myTabContent">
      <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="orders-tab">
        <div class="row">
          <div class="col-md-4 offset-md-4">

            <div class="card w-100" style="width: 18rem;">

              <div class="card-body">
                <h5 class="card-title">Account Info</h5>
                <ul class="list-unstyled card-text">
                  <li><span class="font-weight-bold">Name:</span> <?php echo $_SESSION['user']->name; ?></li>
                  <li><span class="font-weight-bold">Email:</span> <?php echo $_SESSION['user']->email; ?></li>
                  <li><span class="font-weight-bold">Phone:</span> <?php echo $_SESSION['user']->phone; ?></li>
                  <li><span class="font-weight-bold">Address:</span> <span class="small">Unit 3201 A East Tower, Philippine Stock Exchange, Ortigas, Pasig City, 1605 Kalakhang Maynila</span></li>
                </ul>
                <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> edit</a>
              </div>
            </div>

          </div>
        </div>
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
                <input type="text" id="inputLGEx" class="form-control form-control-sm">
                <label for="inputLGEx">Name</label>
              </div>

              <div class="md-form form-lg">
                <input type="text" id="inputLGEx" class="form-control form-control-sm">
                <label for="inputLGEx">Address</label>
              </div>

              <div class="md-form form-lg">
                <input type="text" id="inputLGEx" class="form-control form-control-sm">
                <label for="inputLGEx">Contact</label>
              </div>

              <div class="md-form form-lg">
                <input type="text" id="inputLGEx" class="form-control form-control-sm">
                <label for="inputLGEx">City</label>
              </div>

              <div class="md-form form-lg">
                <input type="text" id="inputLGEx" class="form-control form-control-sm">
                <label for="inputLGEx">Zip Code</label>
              </div>

            </div>
          </div>
        </form>
      </div>
    </div>
    <?php else: ?>
      <img src="assets/img/404.png" class="img-fluid d-block mx-auto">
    <?php endif ?>
  </div>

  <?php include ($_SERVER['DOCUMENT_ROOT'].'/techies/partials/footer.php') ?>