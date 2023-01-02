<div class="containernavbar">
    <div class="boxnav" style="background-color: rgba(255, 255, 255, 0.125);">
        <nav class="navbar navbar-dark navbar-expand-lg  bg-dark bg-opacity-75 ">

            
            <button class="navbar-toggler m-2" data-toggle="collapse" data-target="#coldow"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse justify-content-center" id="coldow">
                <ul class="navbar-nav fw-bold hovef ">
                    <?php
                    if (isset($_SESSION['id'])) {
                        echo '<li class="nav-item"><a href="community.php" class="nav-link"><span><i class="fa fa-users px-2"></i></span><span>COMMUNITY</span> </a></li>';
                    }
                    ?>

                    <li class="nav-item"><a href="index.php" class="nav-link  "><span><i class="fa fa-home px-2"></i></span><span>HOME</span> </a></li>
                    <li class="nav-item"><a href="about.php" class="nav-link "><span><i class="fa fa-info-circle px-2"></i></span><span>ABOUT US</span> </a></li>
                    <li class="nav-item"><a href="services.php" class="nav-link "><span><i class="fa fa-pencil px-2"></i></span><span>SERVICES</span> </a></li>
                    <li class="nav-item"><a href="store.php" class="nav-link "><span><i class="fa fa-store px-2"></i></span><span>STORE</span> </a></li>
                    <?php
                    if (isset($_SESSION['id'])) {
                        echo '<li class="nav-item"><a href="profile.php" class="nav-link "><span><i class="fa fa-user-circle px-2"></i></span><span>ACCOUNT</span> </a></li>';
                    }
                    ?>
                    <?php
                    if (!isset($_SESSION['id'])) {
                        echo '<li class="nav-item"><a href="login.php" class="nav-link "><span><i class="fa fa-user px-2"></i></span><span>SIGN IN</span> </a></li>';
                    } else {
                        echo '<li class="nav-item"><a href="logout.php" class="nav-link "><span><i class="fa fa-user px-2"></i></span><span>SIGN OUT</span> </a></li>';
                    }

                    if (isset($_SESSION['id'])) {
                        echo '
                    <li class="nav-item"><a href="cart.php" class="nav-link "><span><i class="fa fa-cart-shopping px-2"></i></span><span>CART</span> <span class="cart-counter">1</span></a> </li>';
                    
                    }
                            ?>
                </ul>

            </div>
        </nav>
    </div>
</div>