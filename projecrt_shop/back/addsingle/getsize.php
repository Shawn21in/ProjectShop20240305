<?php
// include_once "../conn.php";

// $sql = "SELECT * FROM `product_size`";
// $result = mysqli_query($conn, $sql);
// if ($result) {
//     if (mysqli_num_rows($result) > 0) {
//         echo ("<option selected disabled> Select size</option>");
//         while ($row = mysqli_fetch_array($result)) {
//             echo ("<option value='" . $row["size_id"] . "'>". $row["size_size"] . "</option>");
//         }
//     }
//     mysqli_free_result($result);
// }

// $conn->close();

?>
<?php
include_once "../conn.php";

$sql = "SELECT * FROM `product_size`";
$result = mysqli_query($conn, $sql);
if ($result) {
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            echo " <div class=\"form-check form-check-inline\">";
            echo "<input class=\"form-check-input\" type='checkbox' name='product_size[]' value='" . $row["size_id"] . "' id='size_" . $row["size_id"] . "'>\n";
            echo "<label class=\"form-check-label\" for='size_" . $row["size_id"] . "'>" . $row["size_size"] . "</label><br>\n";
            echo "</div>";
        }
    }
    mysqli_free_result($result);
}

$conn->close();
?>