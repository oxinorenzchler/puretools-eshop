<?php include ($_SERVER['DOCUMENT_ROOT'].'/techies/lib/controllers/CategoryController.php'); ?>
<?php include ($_SERVER['DOCUMENT_ROOT'].'/techies/partials/admin_header.php') ?>
<?php include ($_SERVER['DOCUMENT_ROOT'].'/techies/partials/admin_nav.php') ?>
<div class="container mt-5 mb-5" style="min-height: 100vh; height: auto;">
    <?php unset($_SESSION['categoryID']); ?>
    <?php if(isset($_SESSION['success'])) { ?>
        <div class="alert alert-success" role="alert">
            <?php echo $_SESSION['success']; ?>
        </div>
        <?php unset($_SESSION['success']); }?>
        <h3>Manage Categories</h3>
        <table id="users-table" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Encoded At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach(json_decode(getAllCategories()) as $category) {?>
                    <tr>
                        <td><?php echo $category->name; ?></td>
                        <td>sda</td>
                        <td><?php echo date('Y-m-d'); ?></td>
                        <td class="d-flex justify-content-center">
                          <form id="showEditForm<?php echo $category->id; ?>" action="lib/controllers/CategoryController.php" method="GET">
                            <input type="text" name="id" value=<?php echo $category->id; ?> >
                            <input type="hidden" name="showEditForm">
                        </form>
                         <a onclick="$('#showEditForm' + <?php echo $category->id; ?>).submit()" class="fa fa-edit mr-2"></a>
                        <a class="fa fa-trash"  onclick="deleteCategory(<?php echo $category->id; ?>)"></a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
        <tfoot>
            <tr>
                <th>Name</th>
                <th>Image</th>
                <th>Encoded At</th>
                <th>Action</th>
            </tr>
        </tfoot>
    </table>
</div>


<div class="modal" tabindex="-1" role="dialog" id="category-modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Delete category?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
  </div>
  <div class="modal-body text-center">
    <p>Are you sure you want to remove this category?</p>
</div>
<div class="modal-footer">
    <form action="lib/controllers/CategoryController.php" method="POST"> 
        <input type="hidden" name="id" id="id"> 
        <input type="hidden" name="deleteCategoryForm">
    </form>
    <button type="button" class="btn btn-primary" onclick="$('form').submit()">Save changes</button>
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>

<script type="text/javascript">
    function deleteCategory($id){
        $('#category-modal').modal('show');
        $('#id').val($id);
    }
</script>

<?php include ($_SERVER['DOCUMENT_ROOT'].'/techies/partials/admin_footer.php') ?>