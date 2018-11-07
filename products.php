<?php include ($_SERVER['DOCUMENT_ROOT'].'/techies/lib/controllers/ProductController.php'); ?>
<?php include ($_SERVER['DOCUMENT_ROOT'].'/techies/partials/admin_header.php') ?>
<?php include ($_SERVER['DOCUMENT_ROOT'].'/techies/partials/admin_nav.php') ?>
<div class="container mt-5 mb-5" style="min-height: 100vh; height: auto;">
    <?php unset($_SESSION['productID']); ?>
    <?php if(isset($_SESSION['success'])) { ?>
        <div class="alert alert-success" role="alert">
            <?php echo $_SESSION['success']; ?>
        </div>
        <?php unset($_SESSION['success']); }?>
        <h3>Manage Products</h3>
        <table id="users-table" class="table table-striped table-bordered table-sm">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Short Description</th>
                    <th>Details</th>
                    <th>Image</th>
                    <th>Encoded At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach(json_decode(getAllProducts()) as $product) {?>
                    <tr>
                        <td><?php echo $product->name; ?></td>
                        <td><?php echo $product->category_id; ?></td>
                        <td><?php echo "&#8369; ".number_format($product->price); ?></td>
                        <td><?php echo substr($product->description, 0, 10); ?></td>
                        <td><?php echo substr($product->sdescription, 0, 10); ?></td>
                        <td><?php echo substr($product->details, 0, 10); ?></td>
                        <td><img src="<?php echo $product->image; ?>"  height="50" width="50"></td>
                        <td><?php echo $product->created_at; ?></td>
                        <td class="">
                          <form id="showEditForm<?php echo $product->id ?>" action="lib/controllers/ProductController.php" method="GET">
                            <input type="hidden" name="id" value=<?php echo $product->id; ?> >
                            <input type="hidden" name="showEditForm">
                        </form>
                          <div class="d-flex justify-content-center">
                              <a onclick="$('#showEditForm' + <?php echo $product->id ?>).submit()" class="fa fa-edit mr-2"></a>
                        <a class="fa fa-trash"  onclick="deleteProduct(<?php echo $product->id; ?>)"></a>
                        </div>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
        <tfoot>
            <tr>
                <th>Name</th>
                <th>Category</th>
                <th>Price</th>
                <th>Description</th>
                <th>Short Description</th>
                <th>Details</th>
                <th>Image</th>
                <th>Encoded At</th>
                <th>Action</th>
            </tr>
        </tfoot>
    </table>
</div>


<div class="modal" tabindex="-1" role="dialog" id="product-modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Delete product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
  </div>
  <div class="modal-body text-center">
    <p>Are you sure you want to remove this product?</p>
</div>
<div class="modal-footer">
    <form action="lib/controllers/ProductController.php" method="POST"> 
        <input type="hidden" name="id"" id="id"> 
        <input type="hidden" name="deleteProductForm">
    </form>
    <button type="button" class="btn btn-primary" onclick="$('form').submit()">Save changes</button>
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>

<script type="text/javascript">
    function deleteProduct($id){
        $('#product-modal').modal('show');
        $('#id').val($id);
    }
</script>

<?php include ($_SERVER['DOCUMENT_ROOT'].'/techies/partials/admin_footer.php') ?>