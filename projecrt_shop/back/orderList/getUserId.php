<?php
include_once "../conn.php";
$ordertype_id = isset($_POST['ordertype_id']) ? $_POST['ordertype_id'] : "";
if($ordertype_id == "00"){
    $sql = "SELECT 
    o.user_id,
    o.order_id,
    ot.ordertype_id,
    ot.ordertype_name, 
    SUM(p.product_price * od.order_num) AS total_amount
    FROM 
    `order` o
    JOIN 
    ordertype ot ON o.order_type = ot.ordertype_id
    JOIN 
    orderdetail od ON o.order_id = od.order_id
    JOIN 
    product p ON od.product_id = p.product_id
    GROUP BY 
    o.user_id, 
    o.order_id, 
    ot.ordertype_id, 
    ot.ordertype_name
    LIMIT 20";
}else{
    
$sql = "SELECT 
o.user_id,
o.order_id,
ot.ordertype_id,
ot.ordertype_name, 
SUM(p.product_price * od.order_num) AS total_amount
FROM 
`order` o
JOIN 
ordertype ot ON o.order_type = ot.ordertype_id
JOIN 
orderdetail od ON o.order_id = od.order_id
JOIN 
product p ON od.product_id = p.product_id
GROUP BY 
o.user_id, 
o.order_id, 
ot.ordertype_id, 
ot.ordertype_name";
}

$result = mysqli_query($conn, $sql);
if ($result) {
    if (mysqli_num_rows($result) > 0) {
        // 初始化一個空陣列來存儲結果
        $users = [];
        while ($row = mysqli_fetch_assoc($result)) {
            // 將每個用戶的ID和總金額存儲在陣列中
            $users[] = $row;
        }
        // 將結果轉換為JSON格式
        echo json_encode($users);
    } else {
        echo json_encode(["error" => "No users found."]);
    }
} else {
    echo json_encode(["error" => mysqli_error($conn)]);
}

$conn->close();
?>