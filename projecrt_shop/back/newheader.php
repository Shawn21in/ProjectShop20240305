<!DOCTYPE html>
<html lang="zh-Hant">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>後台管理介面</title>
    <style>
        body {
            margin: 0;
            font-family: 'Arial', sans-serif;
        }

        .header {
            background-color: #333;
            color: white;
            padding: 20px 20px;
            display: flex;
            justify-content: space-between;
            /* 保持原樣，以保持左側和右側的內容 */
            align-items: center;
            position: relative;
            /* 父容器設定為相對定位 */
        }


        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropbtn {
            padding: 8px;
        }

        .dropdown-content a:hover {
            background-color: #f1f1f1
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .dropdown:hover .dropbtn {
            background-color: #555;
        }

        .title {
            font-size: 1.17em;
            position: absolute;
            /* 使用絕對定位 */
            left: 50%;
            /* 左側距離父容器的50% */
            top: 50%;
            /* 頂部距離父容器的50% */
            transform: translate(-50%, -50%);
            /* 使用轉換將標題向左和向上各偏移自身的50% */
        }
    </style>
</head>

<body>

    <div class="header">
        <div class="dropdown">
            <button class="dropbtn">☰ 後臺管理系統</button>
            <div class="dropdown-content">
                <a href="addedit.php?title=已上架商品修改" id="editProducts">已上架商品修改</a>
                <a href="addsingle.php?title=單項商品上架" id="addsingleProduct">單項商品上架</a>
                <a href="addMultiple.php?title=多規格商品上架" id="addMultipleProduct">多規格商品上架</a>
                <a href="addbanner.php?title=橫幅上傳" id="addbanner">橫幅上傳</a>
                <a href="neworderList.php?title=訂單列表" id="orderList">訂單列表</a>
            </div>
        </div>
        <div class="title">
        </div>
        <div></div> <!-- Placeholder for future content -->
    </div>

    <!-- Content below -->
    <!-- Here you can continue building your page structure, for example a sidebar or the main content area -->
</body>

</html>