<?php session_start(); ?>
<?php include ($_SERVER['DOCUMENT_ROOT'].'/techies/partials/header.php') ?>
<div class="container mt-5 mb-5">
    <div class="row">
      <div class="col-md-6 offset-md-3">
         <?php if (!isset($_SESSION['uid'])): ?>
             <!-- Default form register -->
          <form class="text-center border border-light p-5" action="lib/controllers/RegisterController.php" method="POST">
            <input type="hidden" name="register">
            <p class="h4 mb-4 text-uppercase">Sign up</p>

            <!-- First name -->
            <div class="form-group">
                <input type="text" class="form-control form-control-sm" placeholder="Name" name="name">
                <?php if(isset($_SESSION['errors']['name'])): ?>
                    <small class="text-left form-text text-muted red-text">*
                        <?php echo $_SESSION['errors']['name']; ?>    
                    </small>
                <?php endif ?>

            </div>

            <!-- E-mail -->
            <div class="form-group">
                <input type="text" class="form-control  form-control-sm" placeholder="E-mail" name="email">
                <?php if(isset($_SESSION['errors']['email'])): ?>
                    <small class="text-left form-text text-muted red-text">*
                        <?php echo $_SESSION['errors']['email']; ?>    
                    </small>
                <?php endif ?>
            </div>

            <!-- Password -->
            <div class="form-group">
                <input type="password" class="form-control form-control-sm" placeholder="Password" name="password" autocomplete="no">
                <?php if(isset($_SESSION['errors']['password'])): ?>
                    <small class="text-left form-text text-muted red-text">*
                        <?php echo $_SESSION['errors']['password']; ?>    
                    </small>
                <?php endif ?>
            </div>
            <!-- Password -->
            <div class="form-group">
                <input type="password" class="form-control form-control-sm" placeholder="Confirm password" name="password_confirmation" autocomplete="no">
                <?php if(isset($_SESSION['errors']['password_confirm'])): ?>
                    <small class="text-left form-text text-muted red-text">*
                        <?php echo $_SESSION['errors']['password_confirm']; ?>    
                    </small>
                <?php endif ?>
            </div>

            <!-- Phone number -->
            <div class="form-group">
                <input type="text" min="1" class="form-control form-control-sm" placeholder="Phone number" name="phone">
                <?php if(isset($_SESSION['errors']['phone'])): ?>
                    <small class="text-left form-text text-muted red-text">*
                        <?php echo $_SESSION['errors']['phone']; ?>    
                    </small>
                <?php endif ?>

            </div>
            <!-- Sign up button -->
            <button class="btn btn-info btn-sm my-4 btn-block" type="submit">Sign Up</button>

            <p class="text-right small">Already have an account?<a href="login.php"> Sign in.</a></p>

            <hr class="my-4">

            <!-- Terms of service -->
            <p class="small">By clicking
                <em>Sign up</em> you agree to our
                <a href="" target="_blank">terms of service</a> and
                <a href="" target="_blank">terms of service</a>. </p>
            </form>
            <!-- Default form register -->
        <?php else: ?>
            <img src="assets/img/404.png" class="img-fluid">
            <a href="index.php" class="btn btn-sm btn-warning">Home</a>
         <?php endif ?>
        </div>
    </div>
</div>
<?php unset($_SESSION['errors']) ?>
