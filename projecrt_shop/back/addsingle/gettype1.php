<?php
include_once "../conn.php";

$sql = "SELECT * FROM `product_type1`";
$result = mysqli_query($conn, $sql);
if ($result) {
    if (mysqli_num_rows($result) > 0) {
        echo ("<option selected disabled> Select Gender</option>");
        while ($row = mysqli_fetch_array($result)) {
            echo ("<option value='" . $row["product_type1_id"] . "'>". $row["product_type1_name"] . "</option>");
        }
    }
    mysqli_free_result($result);
}

$conn->close();

?>