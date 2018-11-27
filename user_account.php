<?php include 'lib/controllers/PublicController.php'; ?>
<?php include 'partials/header.php'; ?>
<?php include 'partials/top_section.php'; ?>

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
        <a class="nav-link" id="deactivate-tab" data-toggle="tab" href="#deactivate" role="tab" aria-controls="deactivate" aria-selected="false">Deactivate</a>
      </li>
    </ul>
    <div class="tab-content mt-3" id="myTabContent">
      <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="orders-tab">
        <div class="row">
          <div class="col-md-8 offset-md-2">
            <?php if(isset($_SESSION['success'])) { ?>
              <div class="alert alert-success" role="alert">
                <?php echo $_SESSION['success']; ?>
              </div>
              <?php unset($_SESSION['success']); }?>

              <?php if(isset($_SESSION['errors'])) { ?>
                <div class="alert alert-danger" role="alert">
                  <?php foreach($_SESSION['errors'] as $value) { ?>
                    <ul class="list-unstyled">
                      <li><?php echo $value; ?></li>
                    </ul>
                  <?php } ?>
                </div>
                <?php unset($_SESSION['errors']); } ?>
                <div class="card w-100" style="width: 18rem;">

                  <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-user"></i> Account Info</h5>
                    <div class="row">
                      <div class="col-md-6">
                        <ul class="list-unstyled card-text">
                          <li><span class="font-weight-bold">Name:</span> <?php echo $_SESSION['user']->name; ?></li>
                          <li><span class="font-weight-bold">Email:</span> <?php echo $_SESSION['user']->email; ?></li>
                          <li><span class="font-weight-bold">Phone:</span> <?php echo $_SESSION['user']->phone; ?></li>
                        </ul>
                      </div>
                      <div class="col-md-6">
                       <ul class="list-unstyled card-text">
                        <li><span class="font-weight-bold">Address:</span> <?php echo $_SESSION['user']->address; ?></li>
                      </ul>
                    </div>
                  </div>
                  <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit-account-modal"><i class="fa fa-edit"></i> edit</a>
                  <a href="#" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#change-password-modal">change password</a>
                </div>
              </div>

            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="orders-tab">
<<<<<<< HEAD
          <?php include ($_SERVER['DOCUMENT_ROOT'].'/techies/partials/orders.php') ?>
=======
          <?php include __DIR__.'\partials/orders.php'; ?>
>>>>>>> dev
        </div>
         <div class="tab-pane fade" id="deactivate" role="tabpanel" aria-labelledby="deactivate-tab">
          <div class="jumbotron">
            <h4>Deactivate Account</h4>
            <p>Please note that this action cannot be undone. All orders and transactions will be removed.</p>
           <a class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deactivate-account-modal">Deactivate</a>
          </div>
        </div>
      </div>
      <?php else: ?>
        <img src="assets/img/404.png" class="img-fluid d-block mx-auto">
      <?php endif ?>
    </div>

<<<<<<< HEAD
<<<<<<< HEAD
    <?php include ($_SERVER['DOCUMENT_ROOT'].'/techies/partials/edit_account.php') ?>
    <?php include ($_SERVER['DOCUMENT_ROOT'].'/techies/partials/footer.php') ?>
=======
    <?php include __DIR__.'\partials/edit_account.php'; ?>
    <?php include __DIR__.'\partials/footer.php'; ?>
>>>>>>> dev
=======
    <?php include 'partials/edit_account.php'; ?>
    <?php include 'partials/footer.php'; ?>
>>>>>>> dev
