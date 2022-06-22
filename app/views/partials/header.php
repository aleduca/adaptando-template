<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="user-menu">
                <ul>
                    <li><a href="/"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="#"><i class="fa fa-user"></i> My Account</a></li>
                    <li><a href="#"><i class="fa fa-heart"></i> Wishlist</a></li>
                    <li><a href="?inc=cart"><i class="fa fa-user"></i> My Cart</a></li>
                    <li><a href="checkout.html"><i class="fa fa-user"></i> Checkout</a></li>
                    <li><a href="?inc=login"><i class="fa fa-user"></i> Login</a></li>
                </ul>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="header-right">
                <ul class="list-unstyled list-inline">
                    <li class="dropdown dropdown-small">
                       
                    </li>

                    <li class="dropdown dropdown-small">
                        Bem vindo,
                        <?php if (isAuth()): ?> 
                            <?php echo fullname(); ?> <a href="?inc=logout">Logout</a>
                        <?php else: ?>
                            Visitante
                        <?php endif; ?>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>