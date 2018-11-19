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

  <div class="mt-5 table-responsive" id="cart-table">
    <?php if(isset($_SESSION['cart'])): ?>
      <h5 class="h2 mb-3 title text-uppercase"><img src="assets/img/svg/cart.png" class="info-icon">My Cart</h5>
      <div class="table-wrapper">

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
              <td class="form-inline"><input id="item-quantity-<?php echo $product->id; ?>" type="number" name="quantity" value="<?php echo $_SESSION['cart'][$product->id]; ?>" class="form-control" min="1"><button class="btn btn-sm btn-warning" onclick="editQuantity(<?php echo $product->id; ?>, <?php echo $product->price; ?>)"><i class="fas fa-edit"></i></button></td>
              <td>
                &#8369; <span id="cart-item-subtotal-<?php echo $product->id; ?>"><?php echo number_format(subTotal($product->id, $product->price), 2); ?></span>
                <input type="hidden" id="item-subtotal-<?php echo $product->id; ?>" value="<?php echo $_SESSION['subtotal'][$product->id]; ?>">
              </td>
              <td><a onclick="removeItem(<?php echo $product->id; ?>)"><i class="fas fa-times"></i></a></td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
      <div class="d-flex justify-content-end">
        <span class="h3">Total: &#8369;</span>
        <span class="h3" id="total"><?php echo number_format($_SESSION['total'], 2); ?></span>
        <input type="hidden" id="total-input" value="<?php echo $_SESSION['total']; ?>">
      </div>
      <a href="catalog.php" class="btn btn-sm btn-primary">Continue Shopping</a>
      <a href="lib/controllers/CartController.php?checkout=true&uid=<?php echo md5(1); ?>" class="btn btn-sm btn-success">Checkout</a>
      <?php else: ?>
        <img src="assets/img/emptycart.png" class="img-fluid d-block mx-auto">
      <?php endif ?>
    </div>
  </div>

  <script type="text/javascript">


    function removeItem(id){

      var subTotal = $('#item-subtotal-' + id).val();
      var total = $('#total-input').val();

      $('#cart-item-row-' + id).remove();

      $.ajax({
        'url':'lib/controllers/CartController.php',
        'method':'POST',
        'data':{'id':id, 'removeitem':'removeitem', 'subTotal':subTotal, 'total':total}
      }).done(function(data){

        var data = JSON.parse(data);
        if(data.total != 0){
         var format = new Intl.NumberFormat().format(data.total);
         $('#total').text(format);
         $('#total-input').val(data.total);
         $('#cart-count').text(data.car_count);
       }else{

        $fallback = '<img src="assets/img/emptycart.png" class="img-fluid d-block mx-auto">';
        $('#cart-table').empty().append($fallback);
        $('#cart-count').empty();
      }


    });

    }

    function editQuantity(id, price){

      var quantity = $('#item-quantity-' + id).val();

      $.ajax({
        'url':'lib/controllers/CartController.php',
        'method': 'POST',
        'data':{'id':id, 'itemqty':quantity, 'price':price, 'editquantity':'editquantity'}
      }).done(function(data){

        var data = JSON.parse(data);
        var format = new Intl.NumberFormat().format(data.total);
        var subtotal = new Intl.NumberFormat().format(data.subtotal);
        $('#total').text(format);
        $('#total-input').val(data.total);
        $('#cart-count').text(data.cart_count);
        $('#item-quantity-' + data.id).val(data.quantity);
        $('#cart-item-subtotal-' + data.id).text(subtotal);
        $('#item-subtotal-' + data.id).val(data.subtotal);
      });

    }
  </script>


  <?php include ($_SERVER['DOCUMENT_ROOT'].'/techies/partials/footer.php') ?>