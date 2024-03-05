<?php
session_start();

include '../conn.php';

// $_SESSION['user_id']
$user_id = $_SESSION['user_id'];

// 確認是否有以下參數(為carts主鍵)
if(isset($_POST['type']) && isset($_POST['carts_id'])){

    $carts_id=$_POST['carts_id'];
    $type=$_POST['type'];

    // 先查詢後確認購物車有資料再進行下一步
    $sql = "SELECT c.carts_id, c.user_id, c.product_id, c.carts_num, c.color_id, c.size_id 
            FROM carts c
            WHERE c.carts_id=" . $carts_id . " AND c.user_id=" . $user_id . "";
    
    // 執行查詢
    if($result = mysqli_query($conn, $sql)){

        // 查詢不等於0筆(有資料)
        if(mysqli_num_rows($result) != 0){

            switch ($type) {

                // 執行刪除
                case "del":
                    
                    // 刪除語法已測試完成
                    $sql = "DELETE FROM carts  WHERE carts_id=" . $carts_id . " AND user_id=" . $user_id . "";
                    
                    if ($result = mysqli_query($conn, $sql)) {

                        // 刪除成功，需另外判斷一次資料庫有沒有資料
                        $sql = "SELECT * FROM carts c WHERE c.user_id = " . $user_id . "";

                        $result = mysqli_query($conn, $sql);
                        if(mysqli_num_rows($result) != 0){
                            echo "OK";
                        }else{
                            // 購物車裡面沒有商品的時候
                            echo "NO";
                        }    
                    }

                break;

                // // 執行顏色修改
                // case "coloredit":
                //     // 修改語法已於資料庫中測試完成
                //     $new_colorselect = $_POST['new_colorselect'];

                //     $sql = "UPDATE `carts` SET `color_id` = " . $new_colorselect . " WHERE `carts`.`user_id` = " . $user_id . " AND `carts`.`product_id` = " . $product_id . " AND carts.color_id=" . $color_id . " AND carts.size_id=" . $size_id . "";
                //     if ($result = mysqli_query($conn, $sql)) {
                //         // 修改成功
                //         echo "OK";
                //     }
        
                // break;

                // // 執行尺寸修改
                // case "sizeedit":
                //     // 修改語法已於資料庫中測試完成
                //     $new_sizeselect = $_POST['new_sizeselect'];

                //     $sql = "UPDATE `carts` SET `size_id` = " . $new_sizeselect . " WHERE `carts`.`user_id` = " . $user_id . " AND `carts`.`product_id` = " . $product_id . " AND carts.color_id=" . $color_id . " AND carts.size_id=" . $size_id . "";
                //     if ($result = mysqli_query($conn, $sql)) {
                //         // 修改成功
                //         echo "OK";
                //     }
        
                // break;

                // // 執行數量修改
                // case "numedit":
                //     // 修改語法已於資料庫中測試完成
                //     $new_cartnum = $_POST['new_cartnum'];

                //     $sql = "UPDATE `carts` SET `carts_num` = " . $new_cartnum . " WHERE `carts`.`user_id` = " . $user_id . " AND `carts`.`product_id` = " . $product_id . " AND carts.color_id=" . $color_id . " AND carts.size_id=" . $size_id . "";
                //     if ($result = mysqli_query($conn, $sql)) {
                //         // 修改成功
                //         echo "OK";
                //     }
        
                // break;
                        
            }
            
        }

    }else{
        // 購物車中沒有此筆資料
        echo "123";
    }
}

mysqli_close($conn);

?>