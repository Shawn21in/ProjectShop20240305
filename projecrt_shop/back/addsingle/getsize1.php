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

// ?>
 <?php
// include_once "../conn.php";
// $mm =isset($_POST['mm'])?$_POST['mm']:"";
// //$mm = "";
// $sql = "SELECT * FROM `product_size`";
// $result = mysqli_query($conn, $sql);
// if ($result) {
//     if (mysqli_num_rows($result) > 0) {
//         echo"<div class=\"formGroup\">
//         <input type=\"checkbox\" class=\"checkAll\" />
//         <label>全選</label>
//       </div>";
//         while ($row = mysqli_fetch_array($result)) {
//             echo " <div class=\"form-check form-check-inline\">";
//             echo "<input class=\"form-check-input\" type='checkbox' name='product_size_".$mm."[]' value='" . $row["size_id"] . "' id='size_" . $row["size_id"] . "'>\n";
//             echo "<label class=\"form-check-label\" for='size_" . $row["size_id"] . "'>" . $row["size_size"] . "</label><br>\n";
//             echo "</div>";
//         }
//     }
//     mysqli_free_result($result);
// }

// $conn->close();
 ?>
<?php
include_once "../conn.php";
$mm = isset($_POST['mm']) ? $_POST['mm'] : "";
//$mm = "";
$sql = "SELECT * FROM `product_size`";
$result = mysqli_query($conn, $sql);
if ($result) {
    if (mysqli_num_rows($result) > 0) {
        echo "<div class=\"formGroup\">
        <input type=\"checkbox\" class=\"form-check-input checkAll\" /> 全選
      </div>";
        while ($row = mysqli_fetch_array($result)) {
            echo " <div class=\"form-check form-check-inline\">";
            echo "<input class=\"form-check-input product_size\" type='checkbox' name='product_size_" . $mm . "[]' value='" . $row["size_id"] . "' id='size_" . $row["size_id"] . "'>\n";
            echo "<label class=\"form-check-label\" for='size_" . $row["size_id"] . "'>" . $row["size_size"] . "</label><br>\n";
            echo "</div>";
        }
    }
    mysqli_free_result($result);
}

$conn->close();
?>
