<?php
if(isset($_POST['selectedProducts'])) {
    $selectedProducts = $_POST['selectedProducts'];
    $responseData = [];
    foreach($selectedProducts as $product) {
        // 模擬將產品資訊印出，原樣顯示在網頁上
        $productInfo = array(
            "id" => $product['id'],
            "color" => $product['color'],
            "size" => $product['size']
        );
        $responseData[] = $productInfo;
    }
    // 將數據轉換為 JSON 格式並返回
    echo json_encode($responseData);
}
?>
