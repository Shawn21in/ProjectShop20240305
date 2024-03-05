<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Product Selection</title>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
$(document).ready(function(){
    $("#productForm").submit(function(event){
        console.log("submit");
        event.preventDefault(); // 防止表單默認提交行為
        var selectedProducts = [];
        $("input[type=checkbox]:checked").each(function(){
            const product = {
                id: $(this).data("id"),
                color: $(this).data("color"),
                size: $(this).data("size")
            };
            selectedProducts.push(product);
            console.log(selectedProducts);
        });
        $.ajax({
            url: "process.php", // 更新為 process.php 文件的路徑
            type: "POST",
            data: { selectedProducts: selectedProducts },
            dataType: "json",
            success: function(response){
                // 在此處理回應
                alert("資料已送出至 PHP 檔案");
                $(".test").html(response);
            }
        });
    });
});
</script>
</head>
<body>
<h1>Product Selection</h1>
<form id="productForm">
    <div class="product-list">
        <?php
        // 假設你有10個產品
        for ($i = 1; $i <= 10; $i++) {
            // 假設產品ID、顏色和尺寸是動態生成的
            $productId = "product".$i;
            $productColor = "Color".$i;
            $productSize = "Size".$i;
            echo '<div class="product">';
            echo '<input type="checkbox" name="productCheckbox" data-id="'.$productId.'" data-color="'.$productColor.'" data-size="'.$productSize.'">';
            echo '<label for="'.$productId.'">Product ID: '.$productId.', Color: '.$productColor.', Size: '.$productSize.'</label>';
            echo '</div>';
        }
        ?>
    </div>
    <button type="submit">送出</button>
</form>
<div class="test"></div>
</body>
</html>
