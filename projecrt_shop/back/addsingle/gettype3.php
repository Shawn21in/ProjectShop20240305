<?php
include_once "../conn.php";
$id =isset($_POST['id'])?$_POST['id']:"";
//$id=1;
$sql = "SELECT * 
        FROM product_type3 
        WHERE product_type2_id = '".$id."'";
$result = mysqli_query($conn, $sql);
if ($result) {
    if (mysqli_num_rows($result) > 0) {
        echo ("<option selected disabled> Select Type</option>");
        while ($row = mysqli_fetch_array($result)) {
            echo ("<option value='" . $row["product_type3_id"] . "'>". $row["product_type3_name"] . "</option>");
        }
    }
    mysqli_free_result($result);
}

$conn->close();

?>