<header id="header">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                    <a href="index.php" class="navbar-brand">
                        <h3 class="px-5">
                            <i class="fas fa-shopping-basket"></i> Shopping Cart
                        </h3>
                    </a>
                    <button class="navbar-toggler"
                        type="button"
                            data-toggle="collapse"
                            data-target = "#navbarNavAltMarkup"
                            aria-controls="navbarNavAltMarkup"
                            aria-expanded="false"
                            aria-label="Toggle navigation"
                    >
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="mr-auto">

                        <button class ="btn btn-success" data-toggle="modal" data-target="#loginModal"><a id="loginButton"  >
                <span class="fa fa-sign-in"></span>Login as Admin
            </a></button>
                        </div>
                        <div class="navbar-nav">
                            <a href="cart.php" class="nav-item nav-link active">
                                <h5 class="px-5 cart">
                                    <i class="fas fa-shopping-cart"></i> Cart
                                    <?php

                                    if (isset($_SESSION['cart'])){
                                        $count = count($_SESSION['cart']);
                                        echo "<span id=\"cart_count\" class=\"text-warning bg-light\">$count</span>";
                                    }else{
                                        echo "<span id=\"cart_count\" class=\"text-warning bg-light\">0</span>";
                                    }

                                    ?>
                                </h5>
                            </a>
                        </div>
                    </div>

                </nav>


         <div class="row row-header" id="intro">
                <div class="col-12 col-sm-6">
                    <h1> Ecommerce Application</h1>
                    <p>We have Collaborated with Worlds most Trusted Brands,Here We give u full Satisfaction and Quality assurance with Fast delivery all Over world</p>
                </div>
                <div class="col-12 col-sm-3 align-self-center">
                    <img class="rounded" src="./upload/logo.jpg"/>
                </div>
                <div class="col-12 col-sm-2 offset-1 align-self-center">
                    
                    <button type="button"  class="btn btn-block btn-warning"><a href="./cart.php"> My Cart</a></button> 
                </div> 
            </div>
</header>

