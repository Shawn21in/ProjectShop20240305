<?php
$localhost_url = "back/"; //預留主機路徑

$img_error = ""; //出錯警告
$product_name = isset($_POST['product_name']) ? $_POST['product_name'] : "";
$product_content = isset($_POST['product_content']) ? $_POST['product_content'] : "";
$product_type1 = isset($_POST['product_type1']) ? $_POST['product_type1'] : "";
$product_type2 = isset($_POST['product_type2']) ? $_POST['product_type2'] : "";
$product_type3 = isset($_POST['product_type3']) ? $_POST['product_type3'] : "";
$product_price = isset($_POST['product_price']) ? $_POST['product_price'] : "";
$allowtype = array("image/gif", "image/pjpeg", "image/jpeg", "image/png");
$product_img_ = array("NULL", "NULL", "NULL", "NULL", "NULL", "NULL");
$product_img_place = "images/product/" . $product_name . "/";
if (!file_exists($product_img_place)) {
    // 建立一個資料夾, 權限777, 可讀取, 寫入, 執行
    mkdir($product_img_place, 0777, true);
}
if (!file_exists("images")) {
    mkdir("images", 0777);
}
if ($product_name != "" && $product_content != "" && $product_type1 != "") {
    $i = 0;
    $product_img = "";
    $product_img_num = "";
    if (isset($product_name)) {
        foreach ($_FILES["product_img_1"]["error"] as $key => $error) {
            if (!in_array($_FILES["product_img_1"]["type"][$key], $allowtype)) {
                echo "<script language='javascript'>alert(\"文件類型錯誤!\");</script>";
                exit;
            } else {
                echo "文件類型成功<br />";
            }
            $times = explode(" ", microtime());
            $photoName = strftime("%Y_%m_%d_%H_%M_%S_", $times[1]) . substr($times[0], 2, 5) . ".jpg";
            $_FILES['product_img_1']["name"][$key] = $photoName;
            $url[$i] = $product_img_place . $_FILES['product_img_1']["name"][$key];
            move_uploaded_file($_FILES['product_img_1']["tmp_name"][$key], $url[$i]);
            $product_img_[$i] = $localhost_url . $product_img_place . $_FILES['product_img_1']["name"][$key];
            $i++;
        }
    }
    require "./conn.php";

    if ($conn->connect_error) {
        die("連接失敗: " . $conn->connect_error);
    }

    mysqli_begin_transaction($conn);

    $sql1 = "INSERT INTO product (`product_name`, `product_content`, `product_type1`, `product_type2`, `product_type3`, `product_price`, `product_img_1`, `product_img_2`, `product_img_3`, `product_img_4`, `product_img_5`, `product_img_6`) VALUES ('$product_name', '$product_content', '$product_type1', '$product_type2', '$product_type3', '$product_price', '$product_img_[0]', '$product_img_[1]', '$product_img_[2]', '$product_img_[3]', '$product_img_[4]', '$product_img_[5]')";
    mysqli_query($conn, $sql1);

    $product_id = mysqli_insert_id($conn);

    // 取得選擇的顏色
    //$selected_color = $_POST['product_color'];

    // 遍歷選擇的顏色，為每個顏色插入對應的尺寸資料
    $i = 0;
    foreach ($_POST['product_color'] as $color) {
        // Print the product color for debugging
        print_r($color);

        // Get the corresponding product number for the current color
        $product_num = $_POST['product_num'][$i];

        // Loop through sizes related to the current color
        foreach ($_POST['product_size'][$color] as $product_size) {
            // Insert each color-size combination into the database
            $sql2 = "INSERT INTO product_detail (`product_id`, `color_id`, `size_id`, `product_num`) VALUES ('$product_id', '$color', '$product_size', '$product_num')";
            mysqli_query($conn, $sql2);
        }
        $i++;
    }

    $i = 0;
    if (mysqli_error($conn)) {
        mysqli_rollback($conn);
        echo "上傳失敗。";
    } else {
        mysqli_commit($conn);
        echo "上傳成功。";
    }

    mysqli_close($conn);
    $product_name = "";
    $product_content =  "";
    $product_type1 =  "";
    $product_type2 =  "";
    $product_type3 =  "";
    $product_price =  "";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>商品上架</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <section class="container">
        <div class="row text-center pt-3">
            <div class="col-lg-10 m-auto">
                <h1 class="h1">商品上架</h1>
                <form method="post" action="test.php" enctype="multipart/form-data">
                    <!-- 您的其他表單元素 -->
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="product_name">產品名稱 :</span>
                        <input type="text" class="form-control" name="product_name" aria-label="Sizing example input" aria-describedby="product_name">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="product_content">產品內容 :</span>
                        <input type="text" class="form-control" name="product_content" aria-label="Sizing example input" aria-describedby="product_content">
                    </div>
                    <div class="input-group mb-3">
                        <button class="btn btn-secondary " type="button" data-bs-toggle="dropdown">
                            產品類型1 :
                        </button>
                        <select class="form-select" id="product_type1" onchange="dotype2(this.selectedIndex)" name="product_type1">
                            <option selected disabled> Select Gender</option>
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <button class="btn btn-secondary " type="button" data-bs-toggle="dropdown">
                            產品類型2 :
                        </button>
                        <select class="form-select" id="product_type2" onchange="dotype3(this.selectedIndex)" name="product_type2">
                            <option selected disabled> Select Clothing parts</option>
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <button class="btn btn-secondary " type="button" data-bs-toggle="dropdown">
                            產品類型3 :
                        </button>
                        <select class="form-select" id="product_type3" name="product_type3">
                            <option selected disabled> Select Type</option>
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">產品價格 :</span>
                        <input type="text" class="form-control" name="product_price" aria-label="Amount (to the nearest dollar)">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">產品圖檔 :</span>
                        <input class="form-control" name='product_img_1[]' type="file" id="formFileMultiple" multiple>
                    </div>
                    <!-- 顏色和尺寸選擇器容器 -->
                    <div id="color-size-container">

                    </div>

                    <div class="d-grid gap-2 d-md-block">
                        <button class="btn btn-primary" type="button" onclick="addColorSizeSelector()">新增產品各顏色尺寸</button>
                        <input class="btn btn-success" type="submit" value="確定">
                    </div>
                </form>
            </div>
        </div>
    </section>

    <script>
        // 添加顏色和尺寸選擇器
        function addColorSizeSelector() {
            var container = $("#color-size-container");

            var colorSizeSelector = $("<div class='color-size-selector'></div>");

            // 產品顏色選擇器
            var colorSelector = $("<select class='form-select product-color-select' name='product_color[]'></select>");
            // 在此添加顏色選項，您可以通過ajax從後端獲取顏色選項
            // 這裡為了示例，添加了一個靜態的選項
            colorSelector.append("<option value='1'>紅色</option>");
            colorSelector.append("<option value='2'>藍色</option>");
            colorSelector.append("<option value='3'>綠色</option>");

            // 產品尺寸選擇器
            var sizeSelector = $("<select class='form-select product-size-select' name='product_size[]'></select>");
            // 在此添加尺寸選項，您可以通過ajax從後端獲取尺寸選項
            // 這裡為了示例，添加了一個靜態的選項
            sizeSelector.append("<option value='1'>S</option>");
            sizeSelector.append("<option value='2'>M</option>");
            sizeSelector.append("<option value='3'>L</option>");

            // 數量輸入框
            var quantityInput = $("<input type='text' class='form-control' name='product_quantity[]' placeholder='產品數量'>");

            // 添加到容器中
            colorSizeSelector.append(colorSelector);
            colorSizeSelector.append(sizeSelector);
            colorSizeSelector.append(quantityInput);
            container.append(colorSizeSelector);
        }

        // 頁面加載完成後添加一個初始的顏色和尺寸選擇器
        $(document).ready(function() {
            addColorSizeSelector();
        });

        $(document).ready(
            function() {
                $.ajax({
                    url: "./addsingle/gettype1.php",
                    type: "post",
                    success: function(data) {
                        $("#product_type1").html(data);
                        console.log("Type1success");
                    }
                });
            }
        )


        function dotype2() {
            var type1_id = $("#product_type1").val();
            console.log(type1_id);
            $.ajax({
                url: "./addsingle/gettype2.php",
                type: "post",
                data: {
                    id: type1_id
                },
                success: function(data) {
                    $("#product_type2").html(data);
                    console.log("Type2success");
                }
            });
            $("#product_type3").html("<option selected disabled> Select Type</option>");

        }

        function dotype3() {
            var type2_id = $("#product_type2").val();
            console.log(type2_id);
            $.ajax({
                url: "./addsingle/gettype3.php",
                type: "post",
                data: {
                    id: type2_id
                },
                success: function(data) {
                    $("#product_type3").html(data);
                    console.log("Type3success");
                }
            });
        }
    </script>
</body>
Array ( [0] => Array ( 
[0] => Array ( [0] => 2 ) 
[1] => Array ( [0] => 3 ) 
[2] => Array ( [0] => 4 ) 
[3] => Array ( [0] => 5 ) 
[4] => Array ( [0] => 6 ) 
[5] => Array ( [0] => 2 ) 
[6] => Array ( [0] => 3 ) 
[7] => Array ( [0] => 4 ) 
[8] => Array ( [0] => 5 ) 
[9] => Array ( [0] => 6 ) 
) 
)

</html>