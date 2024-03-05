<?php
include_once "../conn.php"
    ?>

<!DOCTYPE html>
<html lang="zh-Hant">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>訂單列表</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background: #f0f0f0;
        }

        .order-container {
            width: 80%;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, .1);
        }

        .order-status {
            display: flex;
            display: flex;
            justify-content: space-between;
            background: #6C6C6C;
            color: white;
            padding: 10px;
            font-size: 1.2em;
        }

        .order-header {
            padding: 10px;
            font-size: 1.2em;
        }

        .user-entry {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
            /* 或根據您的需求調整 */
        }

        .total-amount {
            margin-left: auto;
            /* 這會將總金額推到右邊 */
        }

        .order-item {
            display: flex;
            justify-content: space-between;
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        .order-item:last-child {
            border-bottom: none;
        }

        .order-label {
            flex-basis: 20%;
        }

        .order-value {
            flex-basis: 80%;
            text-align: right;
        }

        /* 這個樣式會確保每個用戶資訊獨占一行 */
        .user-info {
            background: #333;
            color: white;
            margin-bottom: 10px;
            /* 添加一些底部間距 */
            display: block;
            /* 確保這是一個塊級元素，從而獨占一行 */
            width: 100%;
            /* 如果需要，可以設置具體的寬度 */
        }
    </style>
    <!-- Start Script -->
    <script src="../assets/js/jquery-1.11.0.min.js"></script>
    <script src="../assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/templatemo.js"></script>
    <script src="../assets/js/custom.js"></script>
    <!-- End Script -->
</head>

<body>
    <!-- Header -->
    <?php
    include_once "newheader.php";
    ?>
    <!-- Close Header -->

    <div class="order-container">
        <div class="order-status">
            <!-- 下拉式選單來選擇訂單狀態 -->
            <select class="form-select" name="ordertype_name" id="ordertype_name"
                onchange="changeSelect(this.selectedIndex)" aria-label="Default select example">
                <option selected disabled> select ordertype</option>
                <option value="00"> 0.所有訂單前20筆</option>
            </select>
        </div>
        <div class="order-header" id="displayContainer">
            <!-- 總金額= 此user_Id下所有orderdetail_id 的product_price*order_num -->
        </div>
    </div>
    <script>
        // 解析當前 URL 的查詢參數
        function getQueryParam(param) {
            var searchParams = new URLSearchParams(window.location.search);
            return searchParams.get(param);
        }

        // 設置 header 標題
        function setHeaderTitle() {
            var title = getQueryParam('title');
            if (title) {
                document.querySelector('.title').textContent = title;
            }
        }

        // 當頁面加載時執行
        window.onload = setHeaderTitle;

        // 
        $(document).ready(
            function () {
                $.ajax({
                    url: "./orderlist/getordertype.php",
                    type: "post",
                    success: function (data) {
                        //append:加入選項
                        $("#ordertype_name").append(data);
                        console.log("success");
                    }
                });
            }
        )
        function changeSelect() {
            var select = $('#ordertype_name').val();
            var ordertype_id = select;
            console.log(select);
            $.ajax({
                url: "./orderlist/getUserId.php",
                type: "post",
                dataType: "json", // 告訴jQuery預期的回應類型是JSON
                data: {
                    ordertype_id: select
                },
                success: function (data) {
                    var html = '';
                    // 遍歷所有回應中的用戶數據
                    $.each(data, function (index, user) {
                        if (user.ordertype_id == select)// 檢查ordertype_id是否符合當前選擇的
                        { 
                            html += `<div class="user-info" onclick="redirectToOrderDetails(${user.user_id}, ${user.order_id}, ${user.ordertype_id}, '${user.ordertype_name}')">
                            User ID: ${user.user_id}　　Order ID: ${user.order_id}　　 總金額: ${user.total_amount}元
                            </div>`;

                        }else if(select == "00"){
                            html += `<div class="user-info" onclick="redirectToOrderDetails(${user.user_id}, ${user.order_id}, ${user.ordertype_id}, '${user.ordertype_name}')">
                            User ID: ${user.user_id}　　Order ID: ${user.order_id}　　 總金額: ${user.total_amount}元
                            </div>`;
                        }
                        console.log(html)
                    });
                    // 將生成的HTML放入顯示容器中
                    $('#displayContainer').html(html);
                },
                error: function (xhr, status, error) {
                    // 處理錯誤
                    console.error("An error occurred: " + error);
                    $('#displayContainer').html('<div>發生錯誤</div>');
                }
            })
        }
        function redirectToOrderDetails(user_id,order_id,ordertype_id,ordertype_name) {
        // 在這裡處理 userId
        console.log(`User ID:${user_id},Order ID:${order_id},Ordertype ID:${ordertype_id},Ordertype Name:${ordertype_name}`);
            $.ajax({
                url: "./orderDetails.php",
                type: "get",
                dataType: "text", // 告訴jQuery預期的回應類型是JSON
                data: {
                    user_id: user_id,
                    order_id: order_id,
                    ordertype_id: ordertype_id,
                    ordertype_name: ordertype_name
                },
                success: function() {
                var redirectUrl = "./orderDetails.php?" + 
                    "user_id=" + encodeURIComponent(user_id) + 
                    "&order_id=" + encodeURIComponent(order_id) + 
                    "&ordertype_id=" + encodeURIComponent(ordertype_id) + 
                    "&ordertype_name=" + encodeURIComponent(ordertype_name);
        
                    window.location.href = redirectUrl; 
                            }
                    })
                    }
    </script>
</body>

</html>