 <div class="">
                <?php if(getRating($product->id) == 1): ?>
                  <span class="fas fa-star checked"></span>
                  <span class="fas fa-star"></span>
                  <span class="fas fa-star"></span>
                  <span class="fas fa-star"></span>
                  <span class="fas fa-star"></span>
                  <?php elseif(getRating($product->id) == 2): ?>
                    <span class="fas fa-star checked"></span>
                    <span class="fas fa-star checked"></span>
                    <span class="fas fa-star"></span>
                    <span class="fas fa-star"></span>
                    <span class="fas fa-star"></span>
                    <?php elseif(getRating($product->id) == 3): ?>
                      <span class="fas fa-star checked"></span>
                      <span class="fas fa-star checked"></span>
                      <span class="fas fa-star checked"></span>
                      <span class="fas fa-star"></span>
                      <span class="fas fa-star"></span>
                      <?php elseif(getRating($product->id) == 4): ?>
                        <span class="fas fa-star checked"></span>
                        <span class="fas fa-star checked"></span>
                        <span class="fas fa-star checked"></span>
                        <span class="fas fa-star checked"></span>
                        <span class="fas fa-star"></span>
                        <?php elseif(getRating($product->id) == 5): ?>
                         <span class="fas fa-star checked"></span>
                         <span class="fas fa-star checked"></span>
                         <span class="fas fa-star checked"></span>
                         <span class="fas fa-star checked"></span>
                         <span class="fas fa-star checked"></span>
                         <?php else: ?>
                          <span class="fas fa-star"></span>
                          <span class="fas fa-star"></span>
                          <span class="fas fa-star"></span>
                          <span class="fas fa-star"></span>
                          <span class="fas fa-star"></span>
                        <?php endif ?>
                      </div>

