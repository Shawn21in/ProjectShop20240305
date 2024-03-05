<?php
include "conn.php";
$search = isset($_POST['search']) ? $_POST['search'] : "";
$user_id = isset($_POST['user_id']) ? $_POST['user_id'] : 0;
$product_type1 = isset($_POST['product_type1']) ? $_POST['product_type1'] : "";
$product_type2 = isset($_POST['product_type2']) ? $_POST['product_type2'] : "";
$product_type3 = isset($_POST['product_type3']) ? $_POST['product_type3'] : "";

if ($product_type3 !== "") {
    $sql = "SELECT p.product_id, p.product_name, p.product_content, p.product_type1, p.product_type2, p.product_type3,
                    CASE WHEN f.user_id IS NOT NULL THEN true ELSE false END AS 'favorite',
                    CASE WHEN c.user_id IS NOT NULL THEN true ELSE false END AS 'carts',
                    p.product_price,
                    p.product_img_1
                    FROM product p
                    LEFT JOIN favorite f ON p.product_id = f.product_id AND f.user_id = '" . $user_id . "'
                    LEFT JOIN carts c ON p.product_id = c.product_id AND c.user_id = '" . $user_id . "'
                    WHERE P.product_type3 = '" . $product_type3 . "'
                    GROUP BY p.product_id
                    ORDER BY p.product_id";
} else if($product_type2 !== "") {
    $sql = "SELECT p.product_id, p.product_name, p.product_content, p.product_type1, p.product_type2, p.product_type3,
                    CASE WHEN f.user_id IS NOT NULL THEN true ELSE false END AS 'favorite',
                    CASE WHEN c.user_id IS NOT NULL THEN true ELSE false END AS 'carts',
                    p.product_price,
                    p.product_img_1
                    FROM product p
                    LEFT JOIN favorite f ON p.product_id = f.product_id AND f.user_id = '" . $user_id . "'
                    LEFT JOIN carts c ON p.product_id = c.product_id AND c.user_id = '" . $user_id . "'
                    WHERE P.product_type2 = '" . $product_type2 . "'
                    GROUP BY p.product_id
                    ORDER BY p.product_id";
}else if($product_type1 !== ""){
    $sql = "SELECT p.product_id, p.product_name, p.product_content, p.product_type1, p.product_type2, p.product_type3,
                    CASE WHEN f.user_id IS NOT NULL THEN true ELSE false END AS 'favorite',
                    CASE WHEN c.user_id IS NOT NULL THEN true ELSE false END AS 'carts',
                    p.product_price,
                    p.product_img_1
                    FROM product p
                    LEFT JOIN favorite f ON p.product_id = f.product_id AND f.user_id = '" . $user_id . "'
                    LEFT JOIN carts c ON p.product_id = c.product_id AND c.user_id = '" . $user_id . "'
                    WHERE P.product_type1 = '" . $product_type1 . "'
                    GROUP BY p.product_id
                    ORDER BY p.product_id";
}else{
    $sql = "SELECT p.product_id, p.product_name, p.product_content, p.product_type1, p.product_type2, p.product_type3,
                    CASE WHEN f.user_id IS NOT NULL THEN true ELSE false END AS 'favorite',
                    CASE WHEN c.user_id IS NOT NULL THEN true ELSE false END AS 'carts',
                    p.product_price,
                    p.product_img_1
                    FROM product p
                    LEFT JOIN favorite f ON p.product_id = f.product_id AND f.user_id = '" . $user_id . "'
                    LEFT JOIN carts c ON p.product_id = c.product_id AND c.user_id = '" . $user_id . "'

                    GROUP BY p.product_id
                    ORDER BY p.product_id";
}
// WHERE `product_name` LIKE '%" . $search . "%' or `product_content` LIKE '%" . $search . "%'
$product_search_result = mysqli_query($conn, $sql);

// 初始化 $products 陣列
$products = array();
$productscolor = array();
$productssize = array();

// 獲取產品資料並填充 $products 陣列
while ($row = mysqli_fetch_assoc($product_search_result)) {
    $products[] = array(
        'id' => $row['product_id'],
        'name' => $row['product_name'],
        'content' => $row['product_content'],
        'type1' => $row['product_type1'],
        'type2' => $row['product_type2'],
        'type3' => $row['product_type3'],
        'favorite' => $row['favorite'],
        'carts' => $row['carts'],
        'price' => $row['product_price'],
        'img' => $row['product_img_1']
    );
}

// 組合響應數據
$responseData = array(
    'success' => true,
    'message' => '產品資料獲取成功',
    'products' => $products
);

// 設置 Content-Type 標頭為 application/json
header('Content-Type: application/json');

// 返回 JSON 格式的響應數據
echo json_encode($responseData);
?>


