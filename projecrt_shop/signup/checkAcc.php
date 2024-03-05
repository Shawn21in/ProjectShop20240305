<?php
require '../conn.php';

$userAccInput = $_POST['userAcc'];

$stmt = $conn->prepare("SELECT * FROM user WHERE user_account = ?");
$stmt->bind_param("s", $userAccInput);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows != 0) {
    echo("Nah");
} else {
    echo("OK");
}

$stmt->close();
$conn->close();

?>