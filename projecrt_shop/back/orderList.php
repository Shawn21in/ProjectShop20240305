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
            display: flex;
            justify-content: space-between;
            background: #333;
            color: white;
            padding: 10px;
            font-size: 1.2em;
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
    include_once "newheader.php"
        ?>
    <!-- Close Header -->
    <div class="order-container">
        <div class="order-status">訂單成立(準備中:未付款)</div>
        <div class="order-header">
            <div>訂單號: 3筆</div>
            <div>總金額: XXXX</div>
        </div>
        <!-- Order Item -->
        <div class="order-item">
            <div class="order-label">訂單號: XXX</div>
            <div class="order-value">總金額: XXXX</div>
        </div>
        <div class="order-item">
            <div class="order-label">訂單號: XXX</div>
            <div class="order-value">總金額: XXXX</div>
        </div>
        <!-- Repeat for each order -->
    </div>
    <div class="order-container">
        <div class="order-status">訂單成立(準備中:已付款)</div>
        <div class="order-header">
            <div>訂單號: 3筆</div>
            <div>總金額: XXXX</div>
        </div>
        <!-- Order Item -->
        <div class="order-item">
            <div class="order-label">訂單號: XXX</div>
            <div class="order-value">總金額: XXXX</div>
        </div>
        <div class="order-item">
            <div class="order-label">訂單號: XXX</div>
            <div class="order-value">總金額: XXXX</div>
        </div>
        <!-- Repeat for each order -->
    </div>
    <div class="order-container">
        <div class="order-status">訂單成立(運送中:未付款)</div>
        <div class="order-header">
            <div>訂單號: 3筆</div>
            <div>總金額: XXXX</div>
        </div>
        <!-- Order Item -->
        <div class="order-item">
            <div class="order-label">訂單號: XXX</div>
            <div class="order-value">總金額: XXXX</div>
        </div>
        <div class="order-item">
            <div class="order-label">訂單號: XXX</div>
            <div class="order-value">總金額: XXXX</div>
        </div>
        <!-- Repeat for each order -->
    </div>
    <div class="order-container">
        <div class="order-status">訂單成立(運送中:已付款)</div>
        <div class="order-header">
            <div>訂單號: 3筆</div>
            <div>總金額: XXXX</div>
        </div>
        <!-- Order Item -->
        <div class="order-item">
            <div class="order-label">訂單號: XXX</div>
            <div class="order-value">總金額: XXXX</div>
        </div>
        <div class="order-item">
            <div class="order-label">訂單號: XXX</div>
            <div class="order-value">總金額: XXXX</div>
        </div>
        <!-- Repeat for each order -->
    </div>
    <div class="order-container">
        <div class="order-status">訂單成立(已到貨:未付款)</div>
        <div class="order-header">
            <div>訂單號: 3筆</div>
            <div>總金額: XXXX</div>
        </div>
        <!-- Order Item -->
        <div class="order-item">
            <div class="order-label">訂單號: XXX</div>
            <div class="order-value">總金額: XXXX</div>
        </div>
        <div class="order-item">
            <div class="order-label">訂單號: XXX</div>
            <div class="order-value">總金額: XXXX</div>
        </div>
        <!-- Repeat for each order -->
    </div>
    <div class="order-container">
        <div class="order-status">訂單成立(已到貨:已付款)</div>
        <div class="order-header">
            <div>訂單號: 3筆</div>
            <div>總金額: XXXX</div>
        </div>
        <!-- Order Item -->
        <div class="order-item">
            <div class="order-label">訂單號: XXX</div>
            <div class="order-value">總金額: XXXX</div>
        </div>
        <div class="order-item">
            <div class="order-label">訂單號: XXX</div>
            <div class="order-value">總金額: XXXX</div>
        </div>
        <!-- Repeat for each order -->
    </div>
    <div class="order-container">
        <div class="order-status">訂單取消</div>
        <div class="order-header">
            <div>訂單號: 3筆</div>
            <div>總金額: XXXX</div>
        </div>
        <!-- Order Item -->
        <div class="order-item">
            <div class="order-label">訂單號: XXX</div>
            <div class="order-value">總金額: XXXX</div>
        </div>
        <div class="order-item">
            <div class="order-label">訂單號: XXX</div>
            <div class="order-value">總金額: XXXX</div>
        </div>
        <!-- Repeat for each order -->
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
    </script>
</body>

</html>