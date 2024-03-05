<?php
session_start();

include '../conn.php';

// $sql = "SELECT c.carts_id, p.product_img_1, c.product_id, p.product_name, c.color_id, c.size_id, p.product_price, c.carts_num 
//         FROM carts c 
//         LEFT JOIN user u ON c.user_id = u.user_id 
//         LEFT JOIN product p ON c.product_id = p.product_id 
//         WHERE c.user_id=1
//         ORDER BY c.carts_id DESC;";

$sql = "SELECT c.carts_id, p.product_img_1, c.product_id, p.product_name, c.color_id, c.size_id, p.product_price, c.carts_num 
        FROM carts c 
        LEFT JOIN user u ON c.user_id = u.user_id 
        LEFT JOIN product p ON c.product_id = p.product_id 
        WHERE c.user_id=".$_SESSION['user_id']."
        ORDER BY c.carts_id DESC;";

if ($result = mysqli_query($conn, $sql)) {
    // echo "success"; 連線測試成功
    if (mysqli_num_rows($result) != 0) {

        while ($cartlist = mysqli_fetch_assoc($result)) {

            $carts_id = $cartlist['carts_id'];
            $product_img_1 = $cartlist['product_img_1'];
            $product_id = $cartlist['product_id'];
            $product_name = $cartlist['product_name'];
            $color_id = $cartlist['color_id'];
            $size_id = $cartlist['size_id'];
            $product_price = $cartlist['product_price'];
            $carts_num = $cartlist['carts_num'];

            // 命名整個div id=商品id
            echo "<div id=\"cartlist" . $carts_id . "\" class=\"container \">\n";
            echo "<div class=\"form-check ms-3\">\n";

                // 複選框(大小無法調整，已完成)
                echo "<input type=\"checkbox\" id=\"cartlistdetail" . $carts_id . "\" name=\"cartSelectedItems[]\" class=\"form-check-input\" value=\"" . $carts_id . "\" \/>\n";
                echo "<label for=\"cartlistdetail" . $carts_id . "\" class=\"row form-check-label align-items-center\">\n";

                    // 複選框中資料--圖片
                    echo "<div class=\"col-1 cart-list-content ms-5 pic\">\n";
                    echo "<img src=\"" . $product_img_1 . "\" alt=\"\" class=\"cartpdtphoto\">\n";
                    echo "</div>\n";

                    // 複選框中資料--商品名稱
                    echo "<div id=\"" . $product_id . "\" class=\"col-3 cart-list-content cart cartpdtname\">" . $product_name . "\n";
                    echo "</div>\n";

                    // 顏色(2024/02/20)&尺寸(2024/02/20)
                    echo "<div class=\"col-2 cart-list-content selectbar ms-5\">\n";
                    echo "<select class=\"form-select colorselect\" required>\n";
                    echo "<option value=\"\" disabled>COLOR</option>\n";
                    $sqlcolor = "SELECT pc.color_id, pc.color_color  FROM product_color pc;";
                    if($result2 = mysqli_query($conn, $sqlcolor)){
                        while($row = mysqli_fetch_assoc($result2)){
                            if($color_id == $row['color_id']){
                                echo "<option value=\"".$row['color_id']."\" selected>".$row['color_color']."</option>\n";
                            }else{
                                echo "<option value=\"".$row['color_id']."\">".$row['color_color']."</option>\n";
                            }
                        }
                    }
                    echo "</select>\n";

                    echo "<select class=\"form-select sizeselect\" required>\n";
                    echo "<option value=\"\" disabled>SIZE</option>\n";
                    $sqlsize = "SELECT ps.size_id, ps.size_size  FROM product_size ps";
                    if($result3 = mysqli_query($conn, $sqlsize)){
                        while($row = mysqli_fetch_assoc($result3)){
                            if($size_id == $row['size_id']){
                                echo "<option value=\"".$row['size_id']."\" selected>".$row['size_size']."</option>\n";
                            }else{
                                echo "<option value=\"".$row['size_id']."\">".$row['size_size']."</option>\n";
                            }
                        }
                    }
                    echo "</select>\n";
                    echo "</div>\n";


                    // 複選框中資料--商品價格
                    echo "<div class=\"col-1 cart-list-content cartpdtprice\">" . $product_price . "\n";
                    echo "</div>\n";

                    // 複選框中資料--商品數量
                    echo "<div class=\"col-1 cart-list-content\">\n";
                    echo "<input type=\"number\" class=\"quantity form-control input-number cartpdtnum\" size=\"5\" value=\"" . $carts_num . "\" min=\"1\" max=\"100\" onkeyup=\"this.value=this.value.replace(/\D/g,'1');\" onafterpaste=\"this.value=this.value.replace(/\D/g,'1');\">\n";
                    echo "</div>\n";

                    // 複選框中資料--商品總價
                    $product_price_total = $product_price * $carts_num;
                    echo "<div class=\"col-2 cart-list-content align-items-center cartpdttotal\">" . $product_price_total . "\n";
                    echo "</div>\n";

                    // 複選框中按鈕--刪除icon & 刪除功能
                    echo "<div class=\"col-1 cart-list-content\">\n";
                    echo "<button type=\"button\" class=\"btn btn-danger cartpdtdel\">REMOVE</button>\n";
                    echo "</div>\n";

                    
                echo "</label>\n";
            echo "</div>\n";
            echo "<hr>\n";
            echo "</div>\n";

        }
        } else {
            echo "<div class=\"container\">";
            echo "<div class=\"row row-cols-6 align-items-center\">\n";
            echo "<div class=\"col-12 cart-list-content align-items-center\">\n";
            echo "購物車目前無任何商品";
            echo "</div>\n</div>\n";
            echo "<hr>\n</div>\n";
        }
    }

    echo "<div class=\"container\">";
    echo "<div class=\"row\">\n";
    echo "<div id=\"checkedtotal\" class=\"col-12 cart-list-title\">TOTAL AMOUNT　0\n";
    echo "</div>\n</div>\n";
    echo "<br>\n</div>\n";

    echo "<div class=\"container\">";
    echo "<div class=\"row row-cols-6 align-items-center\">\n";
    echo "<div class=\"col-12 cart-list-title align-items-center\">\n";
    echo "<button class=\"btn btn-secondary\" id=\"checkButton\" type=\"button\" onclick=\"cartSubmit()\">UPDATE CART</button>\n";
    echo "<a href=\"index.php\"><button class=\"btn btn-dark\" id=\"\">CONTINUE SHOPPING</button></a>\n";
    echo "</div>\n</div>\n";
    echo "<br>\n</div>\n";
    // $product = mysqli_fetch_assoc($result);

// print_r($product); 測試印出值

mysqli_close($conn);

?>
