<!-- Edit account -->
<div class="modal fade" id="edit-account-modal" tabindex="-1" role="dialog" aria-hidden="true">

  <!-- Change class .modal-sm to change the size of the modal -->
  <div class="modal-dialog modal-sm" role="document">


    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title w-100">Edit account</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="edit-account-form" action="lib/controllers/UserController.php" method="POST">
          <input type="hidden" name="edit_account">
          <input type="hidden" name="id" value="<?php echo $_SESSION['user']->id; ?>">

          <div class="form-group">
            <input type="text" class="form-control form-control-sm" name="name" value="<?php echo $_SESSION['user']->name; ?>">
            <small class="text-left form-text text-muted red-text">

            </small>
          </div>

          <div class="form-group">
            <input type="text" class="form-control form-control-sm" name="email" value="<?php echo $_SESSION['user']->email; ?>">
            <small class="text-left form-text text-muted red-text">

            </small>
          </div>

          <div class="form-group">
            <input type="text" class="form-control form-control-sm" name="phone" value="<?php echo $_SESSION['user']->phone; ?>">
            <small class="text-left form-text text-muted red-text">

            </small>
          </div>

          <div class="form-group">
            <input type="text" class="form-control form-control-sm" name="address" value="<?php echo $_SESSION['user']->address; ?>">
            <small class="text-left form-text text-muted red-text">

            </small>
          </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary btn-sm" onclick="$('#edit-account-form').submit()">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!-- Edit account -->




<!-- Change Password -->
<div class="modal fade" id="change-password-modal" tabindex="-1" role="dialog" aria-hidden="true">

  <!-- Change class .modal-sm to change the size of the modal -->
  <div class="modal-dialog modal-sm" role="document">


    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title w-100">Change password </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="change-password-form" action="lib/controllers/UserController.php" method="POST">

          <input type="hidden" name="change_pass">
          <input type="hidden" name="id" value="<?php echo $_SESSION['user']->id; ?>">

          <div class="form-group">
            <input type="password" class="form-control form-control-sm" name="password" placeholder="Password" autocomplete="no">
            <small class="text-left form-text text-muted red-text">

            </small>
          </div>

          <div class="form-group">
            <input type="password" class="form-control form-control-sm" name="password_confirmation" placeholder="Confirm password"  autocomplete="no">
            <small class="text-left form-text text-muted red-text">

            </small>
          </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary btn-sm" onclick="$('#change-password-form').submit()">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!-- Change Password -->



<!-- Deactivate account -->
<div class="modal fade" id="deactivate-account-modal" tabindex="-1" role="dialog" aria-hidden="true">

  <!-- Change class .modal-sm to change the size of the modal -->
  <div class="modal-dialog modal-sm" role="document">


    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title w-100">Deactivate account </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form action="lib/controllers/UserController.php" method="POST">
        <input type="hidden" name="deactivate_account">
        <input type="hidden" name="id" value="<?php echo $_SESSION['user']->id; ?>">
        <p class="text-center">Are you sure?</p>
        <button type="submit" class="btn btn-danger btn-sm d-block mx-auto">Proceed</button>
      </form>
    </div>
  </div>
</div>
</div>
<!-- Deactivate account -->


