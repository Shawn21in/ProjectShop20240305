<?php
include_once "../conn.php";
$sql = "SELECT * FROM ordertype";
$result = mysqli_query($conn, $sql);
if ($result) {
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            echo ("<option value='" . $row["ordertype_id"] . "'>" . $row["ordertype_id"] . $row["ordertype_name"] . "</option>");
        }
    }
    mysqli_free_result($result);
}

$conn->close();