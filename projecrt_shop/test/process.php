<?php
if(isset($_POST['selectedProducts'])) {
    $selectedProducts = $_POST['selectedProducts'];
    $responseData = [];
    foreach($selectedProducts as $product) {
        // 模擬將產品資訊印出，原樣顯示在網頁上
        $productInfo = "Product ID: " . $product['id'] . ", Color: " . $product['color'] . ", Size: " . $product['size'] . "<br>";
        $responseData[] = $productInfo;
    }
    // 將數據轉換為JSON格式並返回
    echo json_encode($responseData);
}
?>
