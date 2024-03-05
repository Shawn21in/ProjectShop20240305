<?php
include "./conn.php";
$user_id = $_POST['user_id'];
$product_id = $_POST['product_id'];
$product_size = isset($_POST['product_size']) ? $_POST['product_size'] : "";
$product_color = isset($_POST['product_color']) ? $_POST['product_color'] : "";
$carts_num = $_POST['carts_num'];


// 查詢是否已存在相同的記錄用
$sql_search = "SELECT * 
                FROM `carts` 
                WHERE `user_id` = '$user_id' 
                AND `product_id` = '$product_id' 
                AND `color_id` = '$product_color' 
                AND `size_id` = '$product_size'";

// 新增產品用
$sql_insert = "INSERT INTO `carts` (`carts_id`, `user_Id`, `product_id`, `color_id`, `size_id`, `carts_num`) VALUES (NULL, '$user_id', '$product_id', '$product_color', '$product_size', '$carts_num')";




if ($product_size == "" || $product_color == "") {
    echo "尚未選擇尺寸或樣式";
} else {
    if ($user_id != "0" && $product_id != "" && $product_size != "" && $product_color != "" && $carts_num != "") {//都有該有的值才執行
        $result = mysqli_query($conn, $sql_search);// 執行查詢是否已存在相同的記錄
        if (mysqli_num_rows($result) > 0) {
            // 如果記錄已存在，回傳購物車內已有該產品的顏色尺寸
            echo "購物車內已有此顏色與尺寸";
        } else {
            // 如果記錄不存在，執行新增
            $insert_result = mysqli_query($conn, $sql_insert);
            if ($insert_result) {
                echo "yes";
            } else {
                echo "error";
            }
        }
    } else if ($user_id == "0") {//防止bug
        echo "login";
    }
}


// 關閉資料庫連接
mysqli_close($conn);
