<?php include __DIR__."\lib\\route\Route.php"; ?>
<?php include __DIR__.'\lib/controllers/PublicController.php'; ?>
<?php include __DIR__.'\partials/header.php'; ?>
<?php include __DIR__.'\partials/top_section.php'; ?>
<div class="container mb-5">
	<nav aria-label="breadcrumb" class="mb-3 d-none d-md-block d-lg-block">
    <ol class="breadcrumb bg-white d-flex justify-content-center">
      <li class="breadcrumb-item active">Home</li>
      <li class="breadcrumb-item active">About</li>
    </ol>
  </nav>

  <div class="mt-5">
  	<div class="card card-image" style="background-image: url(https://mdbootstrap.com/img/Photos/Others/gradient1.jpg);">
  <div class="text-white text-center py-5 px-4 my-5">
    <div>
      <h2 class="card-title h1-responsive pt-3 mb-5 font-bold text-uppercase"><strong>Pure Tools E-shop</strong></h2>
      <p class="mx-5 mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat fugiat, laboriosam, voluptatem,
        optio vero odio nam sit officia accusamus minus error nisi architecto nulla ipsum dignissimos. Odit sed qui, dolorum!
      </p>
      <a class="btn btn-outline-white btn-md"><i class="fa fa-clone left"></i> View project</a>
    </div>
  </div>
</div>
  </div>
</div>

<?php include __DIR__.'\partials/footer.php'; ?>
  <!-- Store curren url -->
<?php $_SESSION['redirect_url'] = Route::current(); ?>