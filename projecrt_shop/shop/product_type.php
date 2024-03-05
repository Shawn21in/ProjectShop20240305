<?php
include "conn.php";

    $sql1 = "SELECT * FROM `product_type1`";
    $sql2 = "SELECT * FROM `product_type2`";
    $sql3 = "SELECT * FROM `product_type3`";




// 初始化 $products 陣列
$type1 = array();
$type2 = array();
$type3 = array();
$res1 = mysqli_query($conn, $sql1);
$res2 = mysqli_query($conn, $sql2);
$res3 = mysqli_query($conn, $sql3);
// 獲取產品資料並填充 $products 陣列
while ($row = mysqli_fetch_assoc($res1)) {
    $type1[] = array(
        'type1_id' => $row['product_type1_id'],
        'type1_name' => $row['product_type1_name']
    );
}

while ($row = mysqli_fetch_assoc($res2)) {
    $type2[] = array(
        'type2_id' => $row['product_type2_id'],
        'type1_id' => $row['product_type1_id'],
        'type2_name' => $row['product_type2_name']
    );
}

while ($row = mysqli_fetch_assoc($res3)) {
    $type3[] = array(
        'type3_id' => $row['product_type3_id'],
        'type2_id' => $row['product_type2_id'],
        'type3_name' => $row['product_type3_name']
    );
}

// 組合響應數據
$responseTypeData = array(
    'success' => true,
    'message' => '產品目錄成功',
    'type1' => $type1,
    'type2' => $type2,
    'type3' => $type3
);

// 設置 Content-Type 標頭為 application/json
header('Content-Type: application/json');

// 返回 JSON 格式的響應數據
echo json_encode($responseTypeData);
?>
