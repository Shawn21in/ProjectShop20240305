<?php
include "./conn.php";
$product_id = $_POST['product_id'];
$user_id = $_POST['user_id'];
$isFavorite = $_POST['isFavorite'];

// 查詢是否已存在相同的記錄
$sql_search = "SELECT * FROM `favorite` WHERE `user_Id` = '$user_id' AND `product_id` = '$product_id'";

// 新增產品用
$sql_insert = "INSERT INTO `favorite` (`favorite_id`, `user_Id`, `product_id`) VALUES (NULL, '$user_id', '$product_id')";

// 刪除產品用
$sql_delete = "DELETE FROM `favorite` WHERE `user_Id` = '$user_id' AND `product_id` = '$product_id'";


// 執行查詢


if ($user_id != "0" && $product_id != "0") {
    $result = mysqli_query($conn, $sql_search);

    if ($isFavorite == "true") {
        if (mysqli_num_rows($result) > 0) {
            // 如果記錄已存在，不需要新增(開場讀取也是)
            echo "no";
        } else {
            // 如果記錄不存在，執行新增
            $insert_result = mysqli_query($conn, $sql_insert);
            if ($insert_result) {
                echo "yes";
            } else {
                echo "error";
            }
        }
    } 
    else if($isFavorite == "false"){
        if (mysqli_num_rows($result) > 0) {
            // 如果記錄已存在，才刪除(開場讀取正常不會存在)
            // 如果記錄存在，執行刪除
            $delete_result = mysqli_query($conn, $sql_delete);
            if ($delete_result) {
                echo "yes";
            } else {
                echo "error";
            }
        } else {
            echo "no";
        }
    }
}else if($user_id == "0"){
    echo "login";
}


// 關閉資料庫連接
mysqli_close($conn);
