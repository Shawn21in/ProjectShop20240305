<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Selection</title>
    <!-- 引入 Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <!-- 引入 Bootstrap JavaScript -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
    $("#productForm").submit(function(event) {
        console.log("submit");
        event.preventDefault(); // 防止表單默認提交行為
        var selectedProducts = [];
        $(".product").each(function() {
            var checkbox = $(this).find('input[type="checkbox"]');
            if (checkbox.prop('checked')) {
                const product = {
                    id: $(this).find('input[name="Product_ID"]').val(),
                    color: $(this).find('input[name="Color"]').val(),
                    size: $(this).find('input[name="Size"]').val()
                };
                selectedProducts.push(product);
                console.log(selectedProducts);
            }
        });
        // 發送 AJAX 請求
        $.ajax({
            url: "process2.php", // 更新為 process2.php 文件的路徑
            type: "POST",
            data: {
                selectedProducts: selectedProducts
            },
            dataType: "json",
            success: function(response) {
                // 在此處理回應
                alert("資料已送出至 PHP 檔案");
                var html = '<div class="container"><h2>選擇的產品</h2><div class="row">';
                $.each(response, function(index, product) {
                    html += '<div class="col-md-4">';
                    html += '<div class="card mb-3">';
                    html += '<div class="card-body">';
                    html += '<h5 class="card-title">產品ID: ' + product.id + '</h5>';
                    html += '<p class="card-text">顏色: ' + product.color + '</p>';
                    html += '<p class="card-text">尺寸: ' + product.size + '</p>';
                    html += '</div></div></div>';
                });
                html += '</div></div>';
                $(".test").html(html);
            }
        });
    });
});

    </script>
</head>

<body>
    <div class="container">
        <h1 class="mt-5">Product Selection</h1>
        <form id="productForm">
            <div class="product-list">
                <div class="product">
                    <input type="checkbox" name="productCheckbox">
                    <label for="product1">Product ID: <input type="text" name="Product_ID">  Color: <input type="text" name="Color"> Size: <input type="text" name="Size"></label>
                </div>

                <div class="product">
                    <input type="checkbox" name="productCheckbox">
                    <label for="product2">Product ID: <input type="text" name="Product_ID">  Color: <input type="text" name="Color"> Size: <input type="text" name="Size"></label>
                </div>

                <div class="product">
                    <input type="checkbox" name="productCheckbox">
                    <label for="product3">Product ID: <input type="text" name="Product_ID">  Color: <input type="text" name="Color"> Size: <input type="text" name="Size"></label>
                </div>

                <div class="product">
                    <input type="checkbox" name="productCheckbox">
                    <label for="product4">Product ID: <input type="text" name="Product_ID">  Color: <input type="text" name="Color"> Size: <input type="text" name="Size"></label>
                </div>

                <div class="product">
                    <input type="checkbox" name="productCheckbox">
                    <label for="product5">Product ID: <input type="text" name="Product_ID">  Color: <input type="text" name="Color"> Size: <input type="text" name="Size"></label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-3">送出</button>
        </form>
    </div>
    <div class="test mt-5"></div>
</body>

</html>
