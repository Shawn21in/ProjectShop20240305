<?php
include_once "../conn.php";

$sql = "SELECT * FROM `product_color`";
$result = mysqli_query($conn, $sql);
if ($result) {
    if (mysqli_num_rows($result) > 0) {
        echo ("<option selected disabled> Select color</option>");
        while ($row = mysqli_fetch_array($result)) {
            echo ("<option value='" . $row["color_id"] . "'>". $row["color_color"] . "</option>");
        }
    }
    mysqli_free_result($result);
}

$conn->close();

?>
