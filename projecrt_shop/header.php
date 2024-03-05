<nav class="navbar navbar-expand-lg navbar-light shadow">
    <div class="container d-flex justify-content-between align-items-center">

        <a class="navbar-brand text-danger logo h1 align-self-center" href="index.php">
            UNI
        </a>

        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-controls="templatemo_main_nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="align-self-center collapse navbar-collapse flex-fill justify-content-lg-between" id="templatemo_main_nav">
            <div class="flex-fill">
                <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="about.php">About</a>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link" href="shop.php">Shop</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact</a>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link" href="myfavorite.php">Myfavorite</a>
                    </li>

                </ul>
            </div>
            <div class="navbar align-self-center d-flex">
                <div class="d-lg-none flex-sm-fill mt-3 mb-4 col-7 col-sm-auto pr-3">
                    <div class="input-group">
                        <input type="text" class="form-control" id="inputMobileSearch" placeholder="Search ...">
                        <div class="input-group-text">
                            <i class="fa fa-fw fa-search"></i>
                        </div>
                    </div>
                </div>
                <a class="nav-icon d-none d-lg-inline" href="#" data-bs-toggle="modal" data-bs-target="#templatemo_search">
                    <i class="fa fa-fw fa-search text-dark mr-2"></i>
                </a>
                <div class="nav-item dropdown">
                    <?php
                    if($user_id == 0){
                        echo("<a class=\"nav-icon position-relative text-decoration-none\" href=\"signup.php\">");
                    }else{
                        echo("<a class=\"nav-icon position-relative text-decoration-none\" href=\"cart.php\">");
                    }
                    ?>
                    

                        <i class="fa fa-fw fa-cart-arrow-down text-dark mr-1"></i>
                        <span class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark">
                            <font color="red">7</font>
                        </span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <!-- Dropdown items here -->

                    </div>
                </div>
                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-fw fa-user text-dark mr-3"></i>
                        <span class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark">
                            <font color="red">+9</font>
                        </span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php
                    if($user_id == 0){
                        echo"<li><a class=\"dropdown-item\" href=\"login.php\">Login</a></li>\n";
                    }else{
                        echo"
                            <li>\n
                                <a class=\"dropdown-item\" href=\"membercenter.php\">會員中心</a>\n
                            </li>\n
                            <li class=\"nav-item\">\n
                                <a class=\"dropdown-item\" href=\"logout.php?st=logout\">Logout</a>\n
                            </li>\n";
                    }
                        ?>
                    </div>
                </div>
            </div>
        </div>

    </div>
</nav>