 <div class="">
                <?php if(getRating($product->id) == 1): ?>
                  <span class="fas fa-star checked" onclick="rate(1, <?php echo $product->id ?>, 2)"></span>
                  <span class="fas fa-star" onclick="rate(2, <?php echo $product->id ?>, 2)"></span>
                  <span class="fas fa-star" onclick="rate(3, <?php echo $product->id ?>, 2)"></span>
                  <span class="fas fa-star" onclick="rate(4, <?php echo $product->id ?>, 2)"></span>
                  <span class="fas fa-star" onclick="rate(5, <?php echo $product->id ?>, 2)"></span>
                  <?php elseif(getRating($product->id) == 2): ?>
                    <span class="fas fa-star checked" onclick="rate(1, <?php echo $product->id ?>, 3)"></span>
                    <span class="fas fa-star checked" onclick="rate(2, <?php echo $product->id ?>, 6)"></span>
                    <span class="fas fa-star" onclick="rate(3, <?php echo $product->id ?>, 7)"></span>
                    <span class="fas fa-star" onclick="rate(4, <?php echo $product->id ?>, 3)"></span>
                    <span class="fas fa-star" onclick="rate(5, <?php echo $product->id ?>, 6)"></span>
                    <?php elseif(getRating($product->id) == 3): ?>
                      <span class="fas fa-star checked" onclick="rate(1, <?php echo $product->id ?>, 3)"></span>
                      <span class="fas fa-star checked" onclick="rate(2, <?php echo $product->id ?>, 6)"></span>
                      <span class="fas fa-star checked" onclick="rate(3, <?php echo $product->id ?>, 7)"></span>
                      <span class="fas fa-star" onclick="rate(4, <?php echo $product->id ?>, 3)"></span>
                      <span class="fas fa-star" onclick="rate(5, <?php echo $product->id ?>, 6)"></span>
                      <?php elseif(getRating($product->id) == 4): ?>
                        <span class="fas fa-star checked" onclick="rate(1, <?php echo $product->id ?>, 3)"></span>
                        <span class="fas fa-star checked" onclick="rate(2, <?php echo $product->id ?>, 6)"></span>
                        <span class="fas fa-star checked" onclick="rate(3, <?php echo $product->id ?>, 7)"></span>
                        <span class="fas fa-star checked" onclick="rate(4, <?php echo $product->id ?>, 3)"></span>
                        <span class="fas fa-star" onclick="rate(5, <?php echo $product->id ?>, 6)"></span>
                        <?php elseif(getRating($product->id) == 5): ?>
                         <span class="fas fa-star checked" onclick="rate(1, <?php echo $product->id ?>, 3)"></span>
                         <span class="fas fa-star checked" onclick="rate(2, <?php echo $product->id ?>, 6)"></span>
                         <span class="fas fa-star checked" onclick="rate(3, <?php echo $product->id ?>, 7)"></span>
                         <span class="fas fa-star checked" onclick="rate(4, <?php echo $product->id ?>, 3)"></span>
                         <span class="fas fa-star checked" onclick="rate(5, <?php echo $product->id ?>, 6)"></span>
                         <?php else: ?>
                          <span class="fas fa-star" onclick="rate(1, <?php echo $product->id ?>, 3)"></span>
                          <span class="fas fa-star" onclick="rate(2, <?php echo $product->id ?>, 6)"></span>
                          <span class="fas fa-star" onclick="rate(3, <?php echo $product->id ?>, 7)"></span>
                          <span class="fas fa-star" onclick="rate(4, <?php echo $product->id ?>, 3)"></span>
                          <span class="fas fa-star" onclick="rate(5, <?php echo $product->id ?>, 6)"></span>
                        <?php endif ?>
                      </div>

