<?php include ($_SERVER['DOCUMENT_ROOT'].'/techies/lib/controllers/PublicController.php') ?>
<?php include ($_SERVER['DOCUMENT_ROOT'].'/techies/lib/controllers/CartController.php') ?>
<?php include ($_SERVER['DOCUMENT_ROOT'].'/techies/partials/header.php') ?>
<?php include ($_SERVER['DOCUMENT_ROOT'].'/techies/partials/top_section.php') ?>

<div class="container mb-5">
  <nav aria-label="breadcrumb" class="mb-3 d-none d-md-block d-lg-block">
    <ol class="breadcrumb bg-white d-flex justify-content-center">
      <li class="breadcrumb-item active">Home</li>
      <li class="breadcrumb-item active">Cart</li>
    </ol>
  </nav>


    <?php if(isset($_SESSION['cart'])): ?>
  <div class="mt-5" style="overflow-x:  auto;">
    <h5 class="h2 mb-3 title text-uppercase"><img src="assets/img/svg/cart.png" class="info-icon">My Cart</h5>

      <table class="table table-hover">
        <thead class="orange white-text">
          <tr>
            <th scope="col">Item</th>
            <th scope="col">Price</th>
            <th scope="col">Quantity</th>
            <th scope="col">Sub Total</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php foreach(getCart() as $product): ?>
            <tr id="cart-item-row-<?php echo $product->id; ?>">
              <th scope="row"><img src="<?php echo $product->image; ?>" class="info-icon"></th>
              <td>&#8369;<?php echo number_format($product->price, 2); ?></td>
              <td class="form-inline"><input type="number" name="quantity" value="<?php echo $_SESSION['cart'][$product->id]; ?>" class="form-control"><button class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></button></td>
              <td>&#8369; <span id="item-subtotal-<?php echo $product->id;?>"><?php echo number_format(subTotal($product->id, $product->price)); ?></span></td>
              <td><a onclick="removeItem(<?php echo $product->id; ?>)"><i class="fas fa-times"></i></a></td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
      <div class="d-flex justify-content-end">
        <span class="h3 mr-2">Total:</span>
        <span class="h3">&#8369; <span id="total"><?php echo number_format($_SESSION['total'], 2); ?></span></span>
      </div>
      <a href="" class="btn btn-sm btn-primary">Continue Shopping</a>
      <a href="" class="btn btn-sm btn-success">Checkout</a>
    </div>
    <?php else: ?>
        <img src="assets/img/emptycart.png" class="img-fluid d-block mx-auto">
    <?php endif ?>
  </div>

  <script type="text/javascript">
    function removeItem(id){

      var subTotal = $('#item-subtotal-' + id).text();
      $('#cart-item-row-' + id).remove();

      $.ajax({
        'url':'lib/controllers/CartController.php',
        'method':'POST',
        'data':{'id':id, 'removeitem':'removeitem' , 'subTotal':subTotal}
      }).done(function(data){

        console.log(data);

      });

    }
  </script>


  <?php include ($_SERVER['DOCUMENT_ROOT'].'/techies/partials/footer.php') ?>