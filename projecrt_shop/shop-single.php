<!-- Start link -->
<?php
include_once "link.php"
?>
<!-- Close link -->



</head>

<body>
    <!-- Start Top Nav -->
    <?php
    include_once "top-nav.php"
    ?>
    <!-- Close Top Nav -->


    <!-- Header -->
    <?php
    include_once "header.php"
    ?>
    <!-- Close Header -->

    <?php
    require "conn.php";
    $product_id = $_GET['product_id'];
    $sql = "select * from product where product_id='$product_id'";
    $product_search_result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($product_search_result);
    ?>

    <!-- Modal -->
    <div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="w-100 pt-1 mb-5 text-right">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="get" class="modal-content modal-body border-0 p-0">
                <div class="input-group mb-2">
                    <input type="text" class="form-control" id="inputModalSearch" name="q" placeholder="Search ...">
                    <button type="submit" class="input-group-text bg-success text-light">
                        <i class="fa fa-fw fa-search text-white"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>



    <!-- Open Content -->
    <input type="text" id="user_id" value="<?= $user_id ?>" hidden>
    <input type="text" id="product_id" value="<?= $product_id ?> " hidden>
    <section class="bg-light">
        <div class="container pb-5">
            <div class="row">
                <div class="col-lg-5 mt-5">
                    <div class="card mb-3">
                        <img class="card-img img-fluid" src="<?= $row['product_img_1'] ?>" alt="Card image cap" id="product-detail">
                    </div>
                    <div class="row">
                        <!--Start Controls-->
                        <div class="col-1 align-self-center">
                            <a href="#multi-item-example" role="button" data-bs-slide="prev">
                                <i class="text-dark fas fa-chevron-left"></i>
                                <span class="sr-only">Previous</span>
                            </a>
                        </div>
                        <!--End Controls-->
                        <!--Start Carousel Wrapper-->
                        <div id="multi-item-example" class="col-10 carousel slide carousel-multi-item" data-bs-ride="carousel">
                            <!--Start Slides-->
                            <div class="carousel-inner product-links-wap" role="listbox">

                                <!--First slide-->
                                <div class="carousel-item active">
                                    <div class="row">
                                        <div class="col-4">
                                            <a href="#">
                                                <img class="card-img img-fluid" src="<?= $row['product_img_1'] ?>" alt="Product Image 1">
                                            </a>
                                        </div>
                                        <div class="col-4">
                                            <a href="#">
                                                <img class="card-img img-fluid" src="<?= $row['product_img_2'] ?>" alt="Product Image 2">
                                            </a>
                                        </div>
                                        <div class="col-4">
                                            <a href="#">
                                                <img class="card-img img-fluid" src="<?= $row['product_img_3'] ?>" alt="Product Image 3">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!--/.First slide-->

                                <!--Second slide-->
                                <div class="carousel-item">
                                    <div class="row">
                                        <div class="col-4">
                                            <a href="#">
                                                <img class="card-img img-fluid" src="<?= $row['product_img_4'] ?>" alt="Product Image 4">
                                            </a>
                                        </div>
                                        <div class="col-4">
                                            <a href="#">
                                                <img class="card-img img-fluid" src="<?= $row['product_img_5'] ?>" alt="Product Image 5">
                                            </a>
                                        </div>
                                        <div class="col-4">
                                            <a href="#">
                                                <img class="card-img img-fluid" src="<?= $row['product_img_6'] ?>" alt="Product Image 6">
                                            </a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!--End Slides-->
                        </div>
                        <!--End Carousel Wrapper-->
                        <!--Start Controls-->
                        <div class="col-1 align-self-center">
                            <a href="#multi-item-example" role="button" data-bs-slide="next">
                                <i class="text-dark fas fa-chevron-right"></i>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                        <!--End Controls-->
                    </div>
                </div>
                <!-- col end -->
                <div class="col-lg-7 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="h2"><?= $row['product_name'] ?></h1>
                            <p class="h3 py-2"><?= $row['product_price'] ?></p>

                            <h6>Description:</h6>
                            <p><?= $row['product_content'] ?></p>

                            <!-- <form action="" method="GET"> -->
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <h6 id=product-color-name>Clothes style :</h6>
                                </li>
                                <li class="list-inline-item">
                                    <input type="text" name="product-color" id="product-color" value="" hidden>
                                </li>
                                <li class="list-inline-item">
                                    <?php
                                    $sql = "SELECT pd.color_id,pc.color_color,pc.color_RGB 
                                            FROM product_detail pd LEFT JOIN product_color pc ON pd.color_id=pc.color_id 
                                            WHERE product_id='$product_id' AND product_num>0 
                                            GROUP BY pd.color_id";
                                    $product_search_result = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_array($product_search_result)) {
                                        echo "<li class=\"list-inline-item\"><div class=\"btn btn-color\" style=\"box-shadow:1px 1px 1px 1px #555555; background-color:#" . $row['color_RGB'] . "\" data-color-id=\"" . $row['color_id'] . "\" data-color-name=\"" . $row['color_color'] . "\"></div></li>";
                                    }
                                    ?>
                                    </strong></p>
                                </li>
                            </ul>

                            <!-- <input type="hidden" name="product-size" value="Activewear"> -->
                            <div class="row">
                                <div class="col-auto">
                                    <ul class="list-inline pb-3">
                                        <li class="list-inline-item">Size :
                                            <input type="text" name="product-size" id="product-size" value="" hidden>
                                        </li>
                                        <?php
                                        $sql = "SELECT * 
                                                FROM product_detail LEFT JOIN product_size ON product_detail.size_id=product_size.size_id 
                                                WHERE product_id='$product_id' AND product_num > 0 
                                                GROUP BY product_detail.size_id";
                                        $product_search_result = mysqli_query($conn, $sql);

                                        while ($row = mysqli_fetch_array($product_search_result)) {
                                            echo "<li class=\"list-inline-item\"><span class=\"btn btn-success btn-size\" data-size-id=\"" . $row['size_id'] . "\">" . $row['size_size'] . "</span></li>";
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-auto">
                                    <ul class="list-inline pb-3">
                                        <li class="list-inline-item text-right">
                                            Quantity
                                            <input type="text" name="product-quanity" id="product-quanity" value="1" hidden>
                                        </li>
                                        <li class="list-inline-item"><span class="btn btn-success" id="btn-minus">-</span></li>
                                        <li class="list-inline-item"><span class="badge bg-secondary" id="var-value">1</span></li>
                                        <li class="list-inline-item"><span class="btn btn-success" id="btn-plus">+</span></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="row pb-3">
                                <div class="col d-grid">
                                    <button type="submit" id="buybtn" class="btn btn-success btn-lg" name="submit" value="buy">Buy</button>
                                </div>
                                <div class="col d-grid">
                                    <button type="button" id="addtocart" class="btn btn-success btn-lg" name="submit" value="addtocard">Add To Cart</button>
                                </div>
                            </div>

                            <!-- </form> -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Close Content -->

    <!-- Start Article -->
    <section class="py-5">
        <div class="container">
            <div class="row text-left p-2 pb-3">
                <h4>Related Products</h4>
            </div>

            <!--Start Carousel Wrapper-->
            <div id="carousel-related-product">

                <div class="p-2 pb-3">
                    <div class="product-wap card rounded-0">
                        <div class="card rounded-0">
                            <img class="card-img rounded-0 img-fluid" src="assets/img/shop_08.jpg">
                            <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                <ul class="list-unstyled">
                                    <li><a class="btn btn-success text-white" href="shop-single.php"><i class="far fa-heart"></i></a></li>
                                    <li><a class="btn btn-success text-white mt-2" href="shop-single.php"><i class="far fa-eye"></i></a></li>
                                    <li><a class="btn btn-success text-white mt-2" href="shop-single.php"><i class="fas fa-cart-plus"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <a href="shop-single.php" class="h3 text-decoration-none">Red Clothing</a>
                            <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                                <li>M/L/X/XL</li>
                                <li class="pt-2">
                                    <span class="product-color-dot color-dot-red float-left rounded-circle ml-1"></span>
                                    <span class="product-color-dot color-dot-blue float-left rounded-circle ml-1"></span>
                                    <span class="product-color-dot color-dot-black float-left rounded-circle ml-1"></span>
                                    <span class="product-color-dot color-dot-light float-left rounded-circle ml-1"></span>
                                    <span class="product-color-dot color-dot-green float-left rounded-circle ml-1"></span>
                                </li>
                            </ul>
                            <ul class="list-unstyled d-flex justify-content-center mb-1">
                                <li>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-muted fa fa-star"></i>
                                </li>
                            </ul>
                            <p class="text-center mb-0">$20.00</p>
                        </div>
                    </div>
                </div>

                <div class="p-2 pb-3">
                    <div class="product-wap card rounded-0">
                        <div class="card rounded-0">
                            <img class="card-img rounded-0 img-fluid" src="assets/img/shop_09.jpg">
                            <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                <ul class="list-unstyled">
                                    <li><a class="btn btn-success text-white" href="shop-single.php"><i class="far fa-heart"></i></a></li>
                                    <li><a class="btn btn-success text-white mt-2" href="shop-single.php"><i class="far fa-eye"></i></a></li>
                                    <li><a class="btn btn-success text-white mt-2" href="shop-single.php"><i class="fas fa-cart-plus"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <a href="shop-single.php" class="h3 text-decoration-none">White Shirt</a>
                            <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                                <li>M/L/X/XL</li>
                                <li class="pt-2">
                                    <span class="product-color-dot color-dot-red float-left rounded-circle ml-1"></span>
                                    <span class="product-color-dot color-dot-blue float-left rounded-circle ml-1"></span>
                                    <span class="product-color-dot color-dot-black float-left rounded-circle ml-1"></span>
                                    <span class="product-color-dot color-dot-light float-left rounded-circle ml-1"></span>
                                    <span class="product-color-dot color-dot-green float-left rounded-circle ml-1"></span>
                                </li>
                            </ul>
                            <ul class="list-unstyled d-flex justify-content-center mb-1">
                                <li>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-muted fa fa-star"></i>
                                    <i class="text-muted fa fa-star"></i>
                                </li>
                            </ul>
                            <p class="text-center mb-0">$25.00</p>
                        </div>
                    </div>
                </div>

                <div class="p-2 pb-3">
                    <div class="product-wap card rounded-0">
                        <div class="card rounded-0">
                            <img class="card-img rounded-0 img-fluid" src="assets/img/shop_10.jpg">
                            <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                <ul class="list-unstyled">
                                    <li><a class="btn btn-success text-white" href="shop-single.php"><i class="far fa-heart"></i></a></li>
                                    <li><a class="btn btn-success text-white mt-2" href="shop-single.php"><i class="far fa-eye"></i></a></li>
                                    <li><a class="btn btn-success text-white mt-2" href="shop-single.php"><i class="fas fa-cart-plus"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <a href="shop-single.php" class="h3 text-decoration-none">Oupidatat non</a>
                            <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                                <li>M/L/X/XL</li>
                                <li class="pt-2">
                                    <span class="product-color-dot color-dot-red float-left rounded-circle ml-1"></span>
                                    <span class="product-color-dot color-dot-blue float-left rounded-circle ml-1"></span>
                                    <span class="product-color-dot color-dot-black float-left rounded-circle ml-1"></span>
                                    <span class="product-color-dot color-dot-light float-left rounded-circle ml-1"></span>
                                    <span class="product-color-dot color-dot-green float-left rounded-circle ml-1"></span>
                                </li>
                            </ul>
                            <ul class="list-unstyled d-flex justify-content-center mb-1">
                                <li>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                </li>
                            </ul>
                            <p class="text-center mb-0">$45.00</p>
                        </div>
                    </div>
                </div>

             

              

            </div>


        </div>
    </section>
    <!-- End Article -->


    <!-- Start Footer -->
    <?php
    include_once "footer.php";
    $conn->close();
    ?>
    <!-- End Footer -->

    <!-- Start Slider Script -->
    <script src="assets/js/slick.min.js"></script>
    <script>
        $('#carousel-related-product').slick({
            infinite: true,
            arrows: false,
            slidesToShow: 4,
            slidesToScroll: 3,
            dots: true,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 3
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 3
                    }
                }
            ]
        });
        $(document).ready(function() {
            $('#buybtn').click(function(event) {
                event.preventDefault(); // 防止表單直接提交
                // 在這裡執行購買的相應功能
                console.log('Buy button clicked');
            });

            $('#addtocart').click(function(event) {
                event.preventDefault(); // 防止表單直接提交
                // 在這裡執行加入購物車的相應功能
                console.log('Add to cart button clicked');
                var product_id = $('#product_id').val();
                var product_size = $('#product-size').val();
                var product_color = $('#product-color').val();
                var carts_num = $('#product-quanity').val();
                var user_id = $("#user_id").val();
                $.ajax({
                    url: "./shop/addCarts.php",
                    type: "post",
                    data: {
                        user_id: user_id,
                        product_id: product_id,
                        product_size: product_size,
                        product_color: product_color,
                        carts_num: carts_num,

                    },
                    success: function(response) {
                        if (response == "yes") {
                            Swal.fire({
                                position: "top-end",
                                icon: "success",
                                title: "已加入購物車",
                                showConfirmButton: false,
                                timer: 1000
                            });
                        } else if (response == "login") {
                            Swal.fire({
                                icon: "question",
                                title: "尚未登入",
                                footer: '<a href="login.php">login?</a>'
                            });
                        } else {
                            Swal.fire(response);
                        }
                    },
                });
            });
        });
    </script>
    <!-- End Slider Script -->

</body>

</html>