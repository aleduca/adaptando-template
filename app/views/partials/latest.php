<div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="latest-product">
                    <h2 class="section-title">Latest Products</h2>
                    <div class="product-carousel">
                        <?php foreach ($products as $product): ?>
                        <div class="single-product">
                            <div class="product-f-image">
                                <img src="<?php echo $product->img; ?>" alt="">
                                <div class="product-hover">
                                    <a href="#" class="add-to-cart-link" data-id="<?php echo $product->id; ?>"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                    <a href="?inc=details&id=<?php echo $product->id; ?>" class="view-details-link"><i class="fa fa-link"></i> See details</a>
                                </div>
                            </div>
                            
                            <h2><a href="single-product.html">
                                <?php echo $product->name; ?>
                            </a></h2>
                            
                            <div class="product-carousel-price">
                                <ins>R$ <?php echo number_format($product->price, 2, ',', '.'); ?></ins>
                            </div> 
                        </div>

                        <?php endforeach; ?>
                 
                    </div>
                </div>
            </div>
        </div>
    </div>