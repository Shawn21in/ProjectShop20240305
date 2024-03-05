<?php
require '../conn.php';

$selectedCity = isset($_POST['selectedCity'])?$_POST['selectedCity']:"1";
// $selectedCity=5;
$sql = "SELECT towns.towns_id, towns.towns_name
        FROM city 
        JOIN towns ON city.city_id = towns.city_id
        WHERE city.city_id = '$selectedCity'";
$result = mysqli_query($conn, $sql) or die("取出資料失敗！" . mysqli_error($conn));

$res = "";
while ($data = mysqli_fetch_assoc($result)) {
   $res .= "<option value='{$data["towns_id"]}'>{$data['towns_name']}</option>";//將對應的型號項目遞迴列出
}

echo $res; //將項目丟回給ajax

?>