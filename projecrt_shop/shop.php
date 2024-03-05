<!-- Start link -->
<?php
include_once "link.php";
?>
<!-- Close link -->

<body>
    <!-- Start Top Nav -->
    <?php
    include_once "top-nav.php";
    ?>
    <!-- Close Top Nav -->


    <!-- Header -->
    <?php
    include_once "header.php";
    ?>
    <!-- Close Header -->
    <!-- loading user_id start -->
    <input type="text" id="user_id" value="<?= $user_id ?>" hidden>
    <!-- loading user_id end -->
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



    <!-- Start Content -->
    <div class="container py-5">
        <div class="row">

            <div class="col-lg-3">
                <h1 class="h2 pb-4">Categories</h1>
                <ul id="categories" class="list-unstyled templatemo-accordion">
                    <li class="pb-3">
                        <a class="collapsed d-flex justify-content-between h3 text-decoration-none" href="#">
                            Gender
                            <i class="pull-right fa fa-fw fa-chevron-circle-down mt-1"></i>
                        </a>
                        <ul class="collapse show list-unstyled pl-3">
                            <li><a class="text-decoration-none" href="#">Men</a></li>
                            <li><a class="text-decoration-none" href="#">Men</a></li>
                            <li><a class="text-decoration-none" href="#">Men</a></li>
                        </ul>
                    </li>
                    <li class="pb-3">
                        <a class="collapsed d-flex justify-content-between h3 text-decoration-none" href="#">
                            Sale
                            <i class="pull-right fa fa-fw fa-chevron-circle-down mt-1"></i>
                        </a>
                        <ul class="collapse list-unstyled pl-3">
                            <li><a class="text-decoration-none" href="#">Sport</a></li>

                        </ul>
                    </li>
                    <li class="pb-3">
                        <a class="collapsed d-flex justify-content-between h3 text-decoration-none" href="#">
                            Product
                            <i class="pull-right fa fa-fw fa-chevron-circle-down mt-1"></i>
                        </a>
                        <ul class="collapse list-unstyled pl-3">
                            <li><a class="text-decoration-none" href="#">Bag</a></li>

                        </ul>
                    </li>
                </ul>
            </div>

            <div class="col-lg-9">
                <div class="row">
                    <div class="col-md-6">
                        <ul id="genderlist" class="list-inline shop-top-menu pb-3 pt-1">
                            <!-- <li class="list-inline-item">
                                <a class="h3 text-dark text-decoration-none mr-3" href="#">All</a>
                            </li>
                            <li class="list-inline-item">
                                <a class="h3 text-dark text-decoration-none mr-3" href="#">Men's</a>
                            </li>
                            <li class="list-inline-item">
                                <a class="h3 text-dark text-decoration-none" href="#">Women's</a>
                            </li> -->
                        </ul>
                    </div>
                    <!-- <div class="col-md-6 pb-4">
                        <div class="d-flex">
                            <select class="form-control">
                                <option>Featured</option>
                                <option>A to Z</option>
                                <option>Item</option>
                            </select>
                        </div>
                    </div> -->
                </div>
                <!-- 商品區域開始 -->
                <div id="product_area" class="row">

                </div>
                <div id="pagebutton" class="row">

                </div>
                <!-- 商品區域結束 -->
            </div>

        </div>
    </div>
    <!-- End Content -->

    <!-- Start Brands -->
    <section class="bg-light py-5">
        <div class="container my-4">
            <div class="row text-center py-3">
                <div class="col-lg-6 m-auto">
                    <h1 class="h1">Our Brands</h1>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        Lorem ipsum dolor sit amet.
                    </p>
                </div>
                <div class="col-lg-9 m-auto tempaltemo-carousel">
                    <div class="row d-flex flex-row">
                        <!--Controls-->
                        <div class="col-1 align-self-center">
                            <a class="h1" href="#multi-item-example" role="button" data-bs-slide="prev">
                                <i class="text-light fas fa-chevron-left"></i>
                            </a>
                        </div>
                        <!--End Controls-->

                        <!--Carousel Wrapper-->
                        <div class="col">
                            <div class="carousel slide carousel-multi-item pt-2 pt-md-0" id="multi-item-example" data-bs-ride="carousel">
                                <!--Slides-->
                                <div class="carousel-inner product-links-wap" role="listbox">

                                    <!--First slide-->
                                    <div class="carousel-item active">
                                        <div class="row">
                                            <div class="col-3 p-md-5">
                                                <a href="#"><img class="img-fluid brand-img" src="assets/img/brand_01.png" alt="Brand Logo"></a>
                                            </div>
                                            <div class="col-3 p-md-5">
                                                <a href="#"><img class="img-fluid brand-img" src="assets/img/brand_02.png" alt="Brand Logo"></a>
                                            </div>
                                            <div class="col-3 p-md-5">
                                                <a href="#"><img class="img-fluid brand-img" src="assets/img/brand_03.png" alt="Brand Logo"></a>
                                            </div>
                                            <div class="col-3 p-md-5">
                                                <a href="#"><img class="img-fluid brand-img" src="assets/img/brand_04.png" alt="Brand Logo"></a>
                                            </div>
                                        </div>
                                    </div>
                                    <!--End First slide-->


                                </div>
                                <!--End Slides-->
                            </div>
                        </div>
                        <!--End Carousel Wrapper-->

                        <!--Controls-->
                        <div class="col-1 align-self-center">
                            <a class="h1" href="#multi-item-example" role="button" data-bs-slide="next">
                                <i class="text-light fas fa-chevron-right"></i>
                            </a>
                        </div>
                        <!--End Controls-->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--End Brands-->
    <!-- End Footer -->
    <script>
        // 監聽器放在函數外部，確保只設置一次
        var user_id = $("#user_id").val();
        document.addEventListener('DOMContentLoaded', function() {
            $(document).on('click', '[id^="favorite-btn-"]', function() {
                const btn = $(this);
                const product_id = btn.data('product-id');
                const isFavorite = btn.data('favorite') == 'true'; // 獲取 data-favorite 的值，並轉換為布林值
                //console.log(isFavorite);
                //updateFavoriteIcon(btn, isFavorite); // 初始設置按鈕圖標
                const newIsFavorite = !isFavorite; // 切換喜愛狀態
                updateFavoriteIcon(btn, newIsFavorite, user_id, product_id); // 更新圖標
                btn.data('favorite', newIsFavorite.toString()); // 更新 data-favorite 的值
                //console.log(product_id); // 輸出產品 ID

            });

            $(document).on('click', '[id^="cart-btn-"]', function() {
                const btn = $(this);
                const product_id = btn.data('product-id');
                const isCart = btn.data('carts') == 'true'; // 獲取 data-favorite 的值，並轉換為布林值
                //console.log(isCart);
                //updateCartsIcon(btn, isCart); // 初始設置按鈕圖標
                const newisCart = !isCart; // 切換喜愛狀態
                updateCartsIcon(btn, newisCart, user_id, product_id); // 更新圖標
                btn.data('carts', newisCart.toString()); // 更新 data-favorite 的值
                //console.log(product_id); // 輸出產品 ID
            });
        });

        $(document).ready(function() { //網頁載入時的動作通通放在這
            var user_id = $("#user_id").val(); //先取得隱藏的session:user_id的值備用

            $.ajax({ //網頁載入時的左側目錄categories
                url: "./shop/product_type.php",
                type: "post",
                dataType: "json",
                success: function(responseTypeData) {
                    const type1 = responseTypeData.type1;
                    const type2 = responseTypeData.type2;
                    const type3 = responseTypeData.type3;
                    // console.log(type1);
                    // console.log(type2);
                    // console.log(type3);

                    var genderlist = "";
                    var categories = "";
                    type1.forEach(function(data) {
                        genderlist +=
                            '<li class="list-inline-item">' +
                            '<a class="h3 text-dark text-decoration-none mr-3" data-type1-id="' + data.type1_id + '">' + data.type1_name + '</a>' +
                            '</li>'
                    });
                    $("#genderlist").html(genderlist);

                    // 這裡綁定第一階層的點擊事件
                    $('a[data-type1-id]').off().click(function() {
                        console.log("click");
                        var type1Id = $(this).data('type1-id');
                        console.log("type1Id".type1Id);
                        ProductLoader.init(user_id, type1Id, "", "");
                        categories = ""; // 重置第二階層內容

                        type2.forEach(function(data2) {
                            if (data2.type1_id == type1Id) { // 只包含符合條件的項目
                                categories +=
                                    '<li class="pb-3">' +
                                    '<a id="' + data2.type2_id + '" class="collapsed d-flex justify-content-between h3 text-decoration-none" data-type2-id="' + data2.type2_id + '" data-bs-toggle="collapse" href="#" data-type2-id="' + data2.type2_id + '">' + data2.type2_name +
                                    '<i class="pull-right fa fa-fw fa-chevron-circle-down mt-1"></i>' +
                                    '</a>' +
                                    '<ul id="type2_' + data2.type2_id + '" class="collapse list-unstyled pl-3">';

                                type3.forEach(function(data3) {
                                    if (data3.type2_id == data2.type2_id) {
                                        categories += '<li><a class="text-decoration-none" data-type3-id="' + data3.type3_id + '">' + data3.type3_name + '</a></li>';
                                    }
                                });
                                categories +=
                                    '</ul>' +
                                    '</li>';
                            }
                        });
                        $("#categories").off().html(categories); // 更新第二階層內容
                        var categoriesfunction = new Categories(); //以物件方式呼叫templatemo.js內的function

                        // $('a[data-type1-id]').click(function() {
                        //     var type1Id = $(this).data('type1-id');
                        //     console.log(user_id);
                        //     console.log("type1Id".type1Id);
                        //     ProductLoader.init(user_id, type1Id, "", "");

                        // });

                        $('a[data-type2-id]').click(function() {
                            var type2Id = $(this).data('type2-id');
                            console.log(user_id);
                            console.log("type2Id".type2Id);
                            ProductLoader.init(user_id, "", type2Id, "");

                        });

                        $('a[data-type3-id]').off().click(function() {
                            var type3Id = $(this).data('type3-id');
                            console.log(user_id);
                            console.log("type3Id".type3Id);
                            ProductLoader.init(user_id, "", "", type3Id);

                        });



                    });
                    $('a[data-type1-id]').first().trigger('click');
                    // var categoriesfunction = new Categories(); //以物件方式呼叫templatemo.js內的function
                    ProductLoader.init(user_id, "", "", "");
                }
            })




            //     $.ajax({ //網頁載入時的產品
            //         url: "./shop/product_list.php",
            //         type: "post",
            //         data: {
            //             user_id: user_id
            //         },
            //         dataType: "json",
            //         success: function(response) {
            //             var products = response.products; // 從響應中獲取所有產品數據
            //             console.log(products);
            //             var itemsPerPage = 12; // 每頁顯示的產品數量
            //             var totalPages = Math.ceil(products.length / itemsPerPage); // 計算總頁數
            //             console.log(totalPages);
            //             var pageButtonContainer = $('#pagebutton.row');

            //             // 生成分頁按鈕
            //             var paginationHTML = '<ul class="pagination pagination-lg justify-content-end">';

            //             for (var i = 1; i <= totalPages; i++) {
            //                 paginationHTML += '<li class="page-item">';
            //                 paginationHTML += '<a class="page-link rounded-0 shadow-sm border-top-0 border-left-0 text-dark" data-page="' + i + '">' + i + '</a>';
            //                 paginationHTML += '</li>';
            //             }
            //             paginationHTML += '</ul>';

            //             pageButtonContainer.html(paginationHTML);
            //             //預先載入
            //             //$('#pagebutton.row .page-item:first-child .page-link').addClass('active');
            //             $('a[data-page="1"]').addClass('active');
            //             $(document).ready(function() {
            //                 loadProductsByPage(1, products);
            //             });

            //             // 設置點擊事件處理程序
            //             $('#pagebutton.row').on('click', '.page-link', function() {
            //                 var page = $(this).data('page');
            //                 loadProductsByPage(page, products); // 根據頁碼加載對應的產品數據

            //                 $('.page-link').removeClass('active');
            //                 // 添加 active 屬性到被點擊的按鈕
            //                 $(this).addClass('active');
            //             });
            //         },
            //         error: function(xhr, status, error) {
            //             console.error('Error fetching products:', error);
            //         }
            //     });
            // });

            // // 根據頁碼加載對應的產品數據的函數
            // function loadProductsByPage(page, products) {
            //     var itemsPerPage = 12; // 每頁顯示的產品數量
            //     // 根據頁碼和每頁顯示的產品數量計算起始索引和結束索引
            //     var startIndex = (page - 1) * itemsPerPage;
            //     var endIndex = startIndex + itemsPerPage;
            //     var productsToShow = products.slice(startIndex, endIndex); // 截取需要顯示的產品數據

            //     // 將產品數據顯示在頁面上，例如更新產品列表區域等
            //     var productListHTML = '';
            //     productsToShow.forEach(function(single_product) {
            //         const product_id = single_product.id;
            //         const isFavorite = single_product.favorite == true;
            //         const isCarts = single_product.carts == true;
            //         console.log('Product ID:', product_id);
            //         console.log('isFavorite:', isFavorite);
            //         console.log('isCarts:', isCarts);
            //         productListHTML +=
            //             '<div class="col-md-4">' +
            //             '<div class="card mb-4 product-wap rounded-0">\n' +
            //             '<div class="card rounded-0">\n' +
            //             '<img class="card-img rounded-0 img-fluid" src="' + single_product.img + '">\n' +
            //             '<div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">' +
            //             '<ul class="list-unstyled">' +
            //             '<span id="favorite-btn-' + product_id + '" data-product-id="' + product_id + '" data-favorite="' + isFavorite + '">' +
            //             '<li><a class="btn btn-success text-white "><i class="far fa-heart"></i></a></li>' +
            //             '</span>' +
            //             '<span id="cart-btn-' + product_id + '" data-product-id="' + product_id + '" data-carts="' + isCarts + '">' +
            //             '<li><a class="btn btn-success text-white mt-2"><i class="fas fa-shopping-cart"></i></a></li>' +
            //             '</span>' +
            //             '</ul>' +
            //             '</div>' +
            //             '</div>' +
            //             '<div class="card-body">' +
            //             '<a href="shop-single.php?product_id=' + product_id + '" class="h3 text-decoration-none">' + single_product.name + '</a>' +
            //             '<ul class="w-100 list-unstyled d-flex justify-content-between mb-0">' +
            //             '<a href="shop-single.php?product_id=' + product_id + '">' +
            //             '<li>M/L/X/XL</li>' +
            //             '</a>' +
            //             '<li class="pt-2">' +
            //             '<span class="product-color-dot color-dot-red float-left rounded-circle ml-1"></span>' +
            //             '<span class="product-color-dot color-dot-blue float-left rounded-circle ml-1"></span>' +
            //             '<span class="product-color-dot color-dot-black float-left rounded-circle ml-1"></span>' +
            //             '<span class="product-color-dot color-dot-light float-left rounded-circle ml-1"></span>' +
            //             '<span class="product-color-dot color-dot-green float-left rounded-circle ml-1"></span>' +
            //             '</li>' +
            //             '</ul>' +
            //             '<ul class="list-unstyled d-flex justify-content-center mb-1">' +
            //             '<li>' +
            //             '<i class="text-warning fa fa-star"></i>' +
            //             '<i class="text-warning fa fa-star"></i>' +
            //             '<i class="text-warning fa fa-star"></i>' +
            //             '<i class="text-muted fa fa-star"></i>' +
            //             '<i class="text-muted fa fa-star"></i>' +
            //             '</li>' +
            //             '</ul>' +
            //             '<p class="text-center mb-0">$' + single_product.price + '</p>' +
            //             '</div>' +
            //             '</div>' +
            //             '</div>';
            //     });

            //     $("#product_area").html(productListHTML); // 更新產品列表區域的 HTML 內容

            //     $('[id^="favorite-btn-"]').each(function() {
            //         const btn = $(this);
            //         const isFavorite = btn.data('favorite') == true;
            //         updateFavoriteIcon(btn, isFavorite);
            //         console.log("helloFavorite");
            //         console.log(isFavorite);
            //     });

            //     $('[id^="cart-btn-"]').each(function() {
            //         const btn1 = $(this);
            //         const isCarts = btn1.data('carts') == true;
            //         updateCartsIcon(btn1, isCarts);
            //         console.log("helloCarts");
            //         console.log(isCarts);
        });
        //}

        function updateFavoriteIcon(btn, isFavorite, user_id, product_id) {
            const icon = btn.find('i'); // 獲取 "i" 元素

            // 根據喜愛狀態切換圖標
            if (isFavorite == true) {
                console.log(isFavorite);
                console.log(user_id);
                console.log(product_id);

                console.log("增加最愛");
                icon.removeClass('far').addClass('fas');
                $.ajax({
                    url: "./shop/isFavorite.php",
                    type: "post",
                    data: {
                        user_id: user_id,
                        product_id: product_id,
                        isFavorite: isFavorite,
                    },
                    success: function(response) {
                        if (response == "yes") {
                            Swal.fire({
                                position: "top-end",
                                icon: "success",
                                title: "已加入最愛",
                                showConfirmButton: false,
                                timer: 1000
                            });
                        } else if(response == "login"){
                            Swal.fire({
                                icon: "question",
                                title: "尚未登入",
                                footer: '<a href="login.php">login?</a>'
                            });
                        }
                    }
                });
            }
            if (isFavorite == false) {
                console.log(isFavorite);
                console.log(user_id);
                console.log(product_id);

                console.log("移除最愛");
                icon.removeClass('fas').addClass('far');
                $.ajax({
                    url: "./shop/isFavorite.php",
                    type: "post",
                    data: {
                        user_id: user_id,
                        product_id: product_id,
                        isFavorite: isFavorite,
                    },
                    success: function(response) {
                        if (response == "yes") {
                            Swal.fire({
                                position: "top-end",
                                icon: "success",
                                title: "已刪除最愛",
                                showConfirmButton: false,
                                timer: 1000
                            });
                        }else if(response == "login"){
                            Swal.fire({
                                icon: "question",
                                title: "尚未登入",
                                footer: '<a href="login.php">login?</a>'
                            });
                        }
                    },
                });
            }
        }

        function updateCartsIcon(btn, isCarts, user_id, product_id) {
            const icon = btn.find('i'); // 獲取 "i" 元素

            // 根據喜愛狀態切換圖標
            if (isCarts == true) {
                // console.log(isCarts);
                // console.log("增加購物車");
                icon.removeClass('fa-shopping-cart').addClass('fa-cart-plus');
            } else {
                // console.log(isCarts);
                // console.log("移除購物車");
                icon.removeClass('fa-cart-plus').addClass('fa-shopping-cart');
            }
        }
    </script>


    <!-- Start Footer -->
    <?php
    include_once "footer.php";
    // $conn->close();
    ?>

</body>