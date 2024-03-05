<!-- Start link -->
<?php
include_once "link.php"
?>
<link rel="stylesheet" href="cart/cart.css">
<script>
    // 開頭載入
    $(document).ready(function() {


        // 第一個事件處理方式
        $.ajax({
            url: "./cart/cartlist.php",
            type: "post",
            success: function(data) {
                $("#cart_content").append(data);

                // 測試成功
                // console.log("success");

                const checkboxes = document.querySelectorAll('input[type="checkbox"]');
                const checkedTotalSpan = document.getElementById('checkedtotal');
                const inputNumbers = document.querySelectorAll('input[type="number"]');
                const delbuttons = document.querySelectorAll('.btn-danger');
                const colorselects = document.querySelectorAll('.colorselect');
                const sizeselects = document.querySelectorAll('.sizeselect');


                checkboxes.forEach(function(checkbox) {
                    checkbox.addEventListener('change', function() {
                        // updateCheckedTotal();
                    });
                });

                delbuttons.forEach(function(button) {
                    button.addEventListener('click', function() {
                        delCart(button);
                    });
                });

                // colorselects.forEach(function(select) {
                //     select.addEventListener('change', function() {
                //         var new_colorselect = this.value;
                //         var product_id = select.parentElement.parentElement.parentElement.querySelector('input[type="checkbox"]').getAttribute('value');
                //         // 測試ok
                //         // console.log('第一次:', new_colorselect);
                //         editCartColor(new_colorselect, product_id, select);
                //     });
                // });

                // sizeselects.forEach(function(select) {
                //     select.addEventListener('change', function() {
                //         var new_sizeselect = this.value;
                //         var product_id = select.parentElement.parentElement.parentElement.querySelector('input[type="checkbox"]').getAttribute('value');
                //         // 測試ok
                //         // console.log('第一次:', new_sizeselect);
                //         editCartSize(new_sizeselect, product_id, select);
                //     });
                // });


                // inputNumbers.forEach(function(input) {
                //     input.addEventListener('change', function() {
                //         var new_cartnum = this.value;
                //         // console.log(new_cartnum);
                //         var product_id = input.parentElement.parentElement.parentElement.querySelector('input[type="checkbox"]').getAttribute('value');
                //         // console.log(product_id);
                //         var product_price = input.parentElement.parentElement.querySelector('div:nth-child(4)').textContent.trim();
                //         // console.log(product_price);

                //         editCartNum(product_id, product_price, new_cartnum, input);
                //         updateCheckedTotal();
                //     });
                // });

            }
        });


    })

    // function selectAll() {
    //     document.querySelectorAll('input[type="checkbox"]').forEach(function(checkbox) {
    //         checkbox.checked = true;
    //     });
    //     updateCheckedTotal();
    // }

    // function deselectAll() {
    //     document.querySelectorAll('input[type="checkbox"]').forEach(function(checkbox) {
    //         checkbox.checked = false;
    //     });
    //     updateCheckedTotal();
    // }

    function delCart(button) {

        // 在button這個元素節點尋找最近id開頭為cartlist的祖父元素，並將cartlist替換成空值取得carts_id

        let cartlist = button.closest('[id^="cartlist"]');
        let carts_id = cartlist.querySelector('[type="checkbox"]').getAttribute('value');
        let cartpdtname = cartlist.querySelector('.cartpdtname').textContent;

        // 檢查變數，測試ok
        console.log(cartlist);
        console.log(carts_id);
        console.log(cartpdtname);

        if (confirm("確定將 " + cartpdtname + " 移除出您的購物車嗎?")) {
            $.ajax({
                url: "./cart/cartedit.php",
                type: "POST",
                data: {
                    type: "del",
                    carts_id: carts_id,
                },
                success: function(del) {
                    console.log(del);
                    if (del === "OK") {
                        alert("移除成功");
                        cartlist.remove();
                        // updateCheckedTotal();
                    } else if (del === "NO") {
                        alert("購物車內已無商品");
                        // $("#cart_content").load("cartlist.php");
                    } else {
                        alert("購物車中無此商品");
                        // $("#cart_content").load("cartlist.php");
                    }
                }
            });
        }
    }

    // function editCartColor(new_colorselect, product_id, select) {

    //     const color_id = select.querySelector("option[selected]").value;
    //     const size_id = select.parentElement.parentElement.querySelector('.sizeselect').value;

    //     // 檢查值
    //     // console.log(product_id);
    //     // console.log(color_id);
    //     // console.log(size_id);

    //     $.ajax({
    //         url: "./cart/cartedit.php",
    //         type: "post",
    //         data: {
    //             type: "coloredit",
    //             product_id: product_id,
    //             color_id: color_id,
    //             size_id: size_id,
    //             new_colorselect: new_colorselect,
    //         },
    //         success: function(coloredit) {
    //             if (coloredit === "OK") {
    //                 // 測試後端功能
    //                 // alert("修改成功");
    //                 console.log("修改成功");
    //                 select.querySelector("option[value='" + color_id + "']").removeAttribute("selected");
    //                 select.querySelector("option[value='" + new_colorselect + "']").setAttribute("selected", "");
    //             } else {
    //                 // 測試後端功能
    //                 // alert("修改失敗");
    //                 alert("購物車中無此商品");
    //                 //刷新當前頁
    //                 window.location.assign(window.location.href);
    //             }
    //         }
    //     });

    // }

    // function editCartSize(new_sizeselect, product_id, select) {

    //     const size_id = select.querySelector("option[selected]").value;
    //     const color_id = select.parentElement.parentElement.querySelector('.colorselect').value;

    //     // 檢查值
    //     // console.log(product_id);
    //     // console.log(color_id);
    //     // console.log(size_id);

    //     $.ajax({
    //         url: "./cart/cartedit.php",
    //         type: "post",
    //         data: {
    //             type: "sizeedit",
    //             product_id: product_id,
    //             color_id: color_id,
    //             size_id: size_id,
    //             new_sizeselect: new_sizeselect,
    //         },
    //         success: function(sizeedit) {
    //             if (sizeedit === "OK") {
    //                 // 測試後端功能
    //                 // alert("修改成功");
    //                 console.log("修改成功");
    //                 select.querySelector("option[value='" + size_id + "']").removeAttribute("selected");
    //                 select.querySelector("option[value='" + new_sizeselect + "']").setAttribute("selected", "");
    //             } else {
    //                 // 測試後端功能
    //                 // alert("修改失敗");
    //                 alert("購物車中無此商品");
    //                 //刷新當前頁
    //                 window.location.assign(window.location.href);
    //             }
    //         }
    //     });

    // }

    // function editCartNum(product_id, product_price, new_cartnum, input) {

    //     const color_id = input.parentElement.parentElement.querySelector('.colorselect').value;
    //     const size_id = input.parentElement.parentElement.querySelector('.sizeselect').value;

    //     // 檢查值
    //     // console.log(product_id);
    //     // console.log(color_id);
    //     // console.log(size_id);
    //     // console.log(new_cartnum);

    //     const new_cartnumtotal = parseFloat(product_price) * parseInt(new_cartnum, 10);
    //     const totalpriceinput = input.parentElement.parentElement.parentElement.querySelector('.totalprice');
    //     totalpriceinput.textContent = parseInt(new_cartnumtotal, 10);

    //     $.ajax({
    //         url: "./cart/cartedit.php",
    //         type: "post",
    //         data: {
    //             type: "numedit",
    //             product_id: product_id,
    //             color_id: color_id,
    //             size_id: size_id,
    //             new_cartnum: new_cartnum,
    //         },
    //         success: function(numedit) {
    //             if (numedit === "OK") {
    //                 // 測試後端功能
    //                 // alert("修改成功");

    //             } else {
    //                 // 測試後端功能
    //                 // alert("修改失敗");
    //                 alert("購物車中無此商品");
    //                 //刷新當前頁
    //                 window.location.assign(window.location.href);
    //             }
    //         }


    //     });

    // }

    // function updateCheckedTotal() {
    //     let checkedTotal = 0;
    //     const checkboxes = document.querySelectorAll('input[type="checkbox"]');
    //     const checkedTotalSpan = document.getElementById('checkedtotal');
    //     checkboxes.forEach(function(checkbox) {
    //         if (checkbox.checked) {
    //             // 取得 checkbox 父級元素中的 CARTNUMTOTAL 的值，並將其轉換為數字
    //             const cartNumTotal = parseFloat(checkbox.parentElement.querySelector('div:nth-child(6)').textContent.trim());
    //             checkedTotal += cartNumTotal;
    //         }
    //     });

    //     console.log('總額計算結果：', checkedTotal);

    //     // 更新顯示總價的 div 元素的內容
    //     checkedTotalSpan.textContent = "TOTAL AMOUNT　" + parseInt(checkedTotal.toFixed(2), 10);
    // }

    // // 初始計算一次
    // // updateCheckedTotal();

    // function cartSubmit() {
    //     const checkedbox = document.querySelectorAll('input[type="checkbox"]:checked');
    //     if (checkedbox.length != 0) {
    //             const checkboxes = document.querySelectorAll('input[type="checkbox"]');
    //             console.log(checkboxes);
    //             const checkedProductId = [];
    //             const checkedColorId = [];
    //             const checkedSizeId = [];
    //             let a = 0;
    //             checkboxes.forEach(function(check) {
    //                 if (check.checked) {
    //                     checkedProductId[a] = check.value;
    //                     checkedColorId[a] = check.parentElement.querySelector('.colorselect').value;
    //                     checkedSizeId[a] = check.parentElement.querySelector('.sizeselect').value;
    //                     a++;
    //                 }
    //             });

    //             // 檢查資料
    //             // console.log(checkedProductId);
    //             // console.log(checkedColorId);
    //             // console.log(checkedSizeId);

    //             var form = document.createElement("form");
    //             form.method = "post";
    //             form.action = "process.php";

    //             for (var b = 0; b < checkedProductId.length; b++) {
    //             // 創建一個隱藏的 input 元素，將陣列中的值設定為其值
    //             var checkededProductIdInput = document.createElement("input");
    //             checkededProductIdInput.type = "hidden";
    //             checkededProductIdInput.name = "checkedProductId[]";
    //             checkededProductIdInput.value = checkedProductId[b];

    //             // 將 input 加到表單中
    //             form.appendChild(checkededProductIdInput);
    //             }

    //             for (var c = 0; c < checkedColorId.length; c++) {
    //             // 創建一個隱藏的 input 元素，將陣列中的值設定為其值
    //             var checkedColorIdInput = document.createElement("input");
    //             checkedColorIdInput.type = "hidden";
    //             checkedColorIdInput.name = "checkedColorId[]";
    //             checkedColorIdInput.value = checkedColorId[c];

    //             // 將 input 加到表單中
    //             form.appendChild(checkedColorIdInput);
    //             }

    //             for (var d = 0; d < checkedSizeId.length; d++) {
    //             // 創建一個隱藏的 input 元素，將陣列中的值設定為其值
    //             var checkedSizeIdInput = document.createElement("input");
    //             checkedSizeIdInput.type = "hidden";
    //             checkedSizeIdInput.name = "checkedSizeId[]";
    //             checkedSizeIdInput.value = checkedSizeId[d];

    //             // 將 input 加到表單中
    //             form.appendChild(checkedSizeIdInput);
    //             }

    //             // 將表單加到 body 中，然後提交表單
    //             document.body.appendChild(form);
    //             form.submit();

    //         // return true;
    //     } else {
    //         alert("請選擇要購買的商品");
    //         return false;
    //     }
    // }
</script>

</head>

<body class="goto-here">
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

    <div class="hero-wrap hero-bread">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <!-- <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Cart</span></p> -->
                    <h1 class="mt-5 mb-5 bread">My Cart</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section ftco-cart">
        <div class="container pb-4">
            <botton type="button" onclick="selectAll()" class="btn btn-outline-success">SELECT ALL</botton>
            <botton type="button" onclick="deselectAll()" class="btn btn-outline-success">DESELECT ALL</botton>
        </div>
        <div class="container">
            <div class="form-check ms-3">
                <label for="cartListTitle" class="row form-check-label">
                    <div class="col-1 cart-list-title ms-5">Images</div>
                    <div class="col-3 cart-list-title">Product</div>
                    <div class="col-2 cart-list-title">Color/Size</div>
                    <div class="col-1 cart-list-title ms-5">Price</div>
                    <div class="col-1 cart-list-title">Quantity</div>
                    <div class="col-2 cart-list-title">Total</div>
                    <div class="col-1 cart-list-title"></div>
                </label>
            </div>
            <hr>
        </div>

        <form id="cart_content">
            <!-- <form id="cart_content" method="post" action="cartpayment.php" onsubmit="return cartSubmit()"> -->

        </form>

    </section>

</body>

</html>