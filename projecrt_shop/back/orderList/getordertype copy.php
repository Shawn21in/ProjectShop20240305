<?php
include_once "../conn.php";
$sql = "SELECT * FROM ordertype";
$result = mysqli_query($conn, $sql);

$orderTypes = []; // 用來存儲所有訂單類型資料的陣列

if ($result) {
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            // 將每一行資料添加到陣列中
            $orderTypes[] = $row;
        }
    }
    mysqli_free_result($result);
}
$conn->close();
?>