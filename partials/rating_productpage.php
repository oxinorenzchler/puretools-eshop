
<div class="">
  <?php if(getRating($_SESSION['productID']) == 1): ?>
    <span class="fas fa-star checked" onclick="rate(1, <?php echo getProduct($_SESSION['productID'])->id; ?>, 2)"></span>
    <span class="fas fa-star" onclick="rate(2, <?php echo getProduct($_SESSION['productID'])->id; ?>, 2)"></span>
    <span class="fas fa-star" onclick="rate(3, <?php echo getProduct($_SESSION['productID'])->id; ?>, 2)"></span>
    <span class="fas fa-star" onclick="rate(4, <?php echo getProduct($_SESSION['productID'])->id; ?>, 2)"></span>
    <span class="fas fa-star" onclick="rate(5, <?php echo getProduct($_SESSION['productID'])->id; ?>, 2)"></span>
    <?php elseif(getRating($_SESSION['productID']) == 2): ?>
      <span class="fas fa-star checked" onclick="rate(1, <?php echo getProduct($_SESSION['productID'])->id; ?>, 3)"></span>
      <span class="fas fa-star checked" onclick="rate(2, <?php echo getProduct($_SESSION['productID'])->id; ?>, 6)"></span>
      <span class="fas fa-star" onclick="rate(3, <?php echo getProduct($_SESSION['productID'])->id; ?>, 7)"></span>
      <span class="fas fa-star" onclick="rate(4, <?php echo getProduct($_SESSION['productID'])->id; ?>, 3)"></span>
      <span class="fas fa-star" onclick="rate(5, <?php echo getProduct($_SESSION['productID'])->id; ?>, 6)"></span>
      <?php elseif(getRating($_SESSION['productID']) == 3): ?>
        <span class="fas fa-star checked" onclick="rate(1, <?php echo getProduct($_SESSION['productID'])->id; ?>, 3)"></span>
        <span class="fas fa-star checked" onclick="rate(2, <?php echo getProduct($_SESSION['productID'])->id; ?>, 6)"></span>
        <span class="fas fa-star checked" onclick="rate(3, <?php echo getProduct($_SESSION['productID'])->id; ?>, 7)"></span>
        <span class="fas fa-star" onclick="rate(4, <?php echo getProduct($_SESSION['productID'])->id; ?>, 3)"></span>
        <span class="fas fa-star" onclick="rate(5, <?php echo getProduct($_SESSION['productID'])->id; ?>, 6)"></span>
        <?php elseif(getRating($_SESSION['productID']) == 4): ?>
          <span class="fas fa-star checked" onclick="rate(1, <?php echo getProduct($_SESSION['productID'])->id; ?>, 3)"></span>
          <span class="fas fa-star checked" onclick="rate(2, <?php echo getProduct($_SESSION['productID'])->id; ?>, 6)"></span>
          <span class="fas fa-star checked" onclick="rate(3, <?php echo getProduct($_SESSION['productID'])->id; ?>, 7)"></span>
          <span class="fas fa-star checked" onclick="rate(4, <?php echo getProduct($_SESSION['productID'])->id; ?>, 3)"></span>
          <span class="fas fa-star" onclick="rate(5, <?php echo getProduct($_SESSION['productID'])->id; ?>, 6)"></span>
          <?php elseif(getRating($_SESSION['productID']) == 5): ?>
           <span class="fas fa-star checked" onclick="rate(1, <?php echo getProduct($_SESSION['productID'])->id; ?>, 3)"></span>
           <span class="fas fa-star checked" onclick="rate(2, <?php echo getProduct($_SESSION['productID'])->id; ?>, 6)"></span>
           <span class="fas fa-star checked" onclick="rate(3, <?php echo getProduct($_SESSION['productID'])->id; ?>, 7)"></span>
           <span class="fas fa-star checked" onclick="rate(4, <?php echo getProduct($_SESSION['productID'])->id; ?>, 3)"></span>
           <span class="fas fa-star checked" onclick="rate(5, <?php echo getProduct($_SESSION['productID'])->id; ?>, 6)"></span>
           <?php else: ?>
            <span class="fas fa-star" onclick="rate(1, <?php echo getProduct($_SESSION['productID'])->id; ?>, 3)"></span>
            <span class="fas fa-star" onclick="rate(2, <?php echo getProduct($_SESSION['productID'])->id; ?>, 6)"></span>
            <span class="fas fa-star" onclick="rate(3, <?php echo getProduct($_SESSION['productID'])->id; ?>, 7)"></span>
            <span class="fas fa-star" onclick="rate(4, <?php echo getProduct($_SESSION['productID'])->id; ?>, 3)"></span>
            <span class="fas fa-star" onclick="rate(5, <?php echo getProduct($_SESSION['productID'])->id; ?>, 6)"></span>
          <?php endif ?>
        </div>