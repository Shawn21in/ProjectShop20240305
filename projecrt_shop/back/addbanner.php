<?php
$localhost_url = "back/";//預留主機路徑

$img_error = ""; //出錯警告
$banner_title = isset($_POST['banner_title']) ? $_POST['banner_title'] : "";
$banner_slogan = isset($_POST['banner_slogan']) ? $_POST['banner_slogan'] : "";
$banner_content = isset($_POST['banner_content']) ? $_POST['banner_content'] : "";
$banner_search = isset($_POST['banner_search']) ? $_POST['banner_search'] : "";
$banner_search = !empty($_POST['banner_search']) ? $_POST['banner_search'] : null;
$allowtype = array("image/gif", "image/pjpeg", "image/jpeg", "image/png");
$banner_img = null;
$banner_img_place = "back/images/banner/";
if (!file_exists($banner_img_place)) {
    // 建立一個資料夾, 權限777, 可讀取, 寫入, 執行
    mkdir($banner_img_place, 0777, true);
}
if ($banner_title != "" && $banner_slogan != "" && $banner_content != "") {
    $banner_img = "";
    if (isset($banner_title)) {
        if (!in_array($_FILES["banner_img"]["type"], $allowtype)) {
            echo "<script language='javascript'>alert(\"文件類型錯誤!\");</script>";
            exit;
        } else {
            echo "文件類型成功<br />";
        }
        $times = explode(" ", microtime());
        $photoName = strftime("%Y_%m_%d_%H_%M_%S_", $times[1]) . substr($times[0], 2, 5) . ".jpg";
        $_FILES['banner_img']["name"] = $photoName;
        $url = "images/banner/" . $_FILES['banner_img']["name"];
        move_uploaded_file($_FILES['banner_img']["tmp_name"], $url);
        $banner_img = $localhost_url . $url;
    }


    require "./conn.php";

    // 檢查連接是否成功
    if ($conn->connect_error) {
        die("連接失敗: " . $conn->connect_error);
    }


    // 新增基礎資料到product
    $sql = "INSERT INTO `banner`(`banner_title`, `banner_slogan`, `banner_content`, `banner_search`, `banner_img`) VALUES ('$banner_title', '$banner_slogan', '$banner_content', " . ($banner_search !== null ? "'$banner_search'" : "NULL") . ", '$banner_img')";



    if (mysqli_query($conn, $sql)) {
        echo "上傳成功。";
    } else {
        echo "上傳失敗。錯誤信息：" . mysqli_error($conn);
    }

    // 關閉資料庫連線
    mysqli_close($conn);
}
?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="../assets/img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/templatemo.css">
    <link rel="stylesheet" href="../assets/css/custom.css">

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="../assets/css/fontRobotocss2.css">
    <link rel="stylesheet" href="../assets/css/fontawesome.min.css">
    <title>橫幅上傳</title>
</head>

<body>
    <!-- Start Top Nav -->
    <?php
    // include_once "../top-nav.php"
    ?>
    <!-- Close Top Nav -->


    <!-- Header -->
    <?php
    include_once "newheader.php"
        ?>
    <!-- Close Header -->
    <section class="container py-5">
        <div class="row text-center pt-3">
            <div class="col-lg-10 m-auto">
                <h1 class="h1">橫幅上傳</h1>
                <form method="post" action="addbanner.php" enctype="multipart/form-data">
                    <div class="input-group mb-3">
                        <span class="input-group-text">橫幅標題 :</span>
                        <input type="text" class="form-control" id="banner_title" name="banner_title" aria-label="Sizing example input"
                            aria-describedby="banner_title">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">橫幅標語 :</span>
                        <input type="text" class="form-control" id="banner_slogan" name="banner_slogan" aria-label="Sizing example input"
                            aria-describedby="banner_slogan">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">橫幅內容 :</span>
                        <input type="text" class="form-control" id="banner_content" name="banner_content" aria-label="Sizing example input"
                            aria-describedby="banner_content">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">橫幅搜尋詞彙 :</span>
                        <input type="text" class="form-control" id="banner_search" name="banner_search" aria-label="Sizing example input"
                            aria-describedby="banner_search">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">橫幅圖檔 :</span>
                        <input class="form-control" name='banner_img' type="file" id="formFileMultiple" multiple>
                    </div>
                    <input class="btn btn-primary" type="submit" value="確定">
                </form>
            </div>
        </div>
    </section>

    <!-- Start Footer -->
    <?php
    // include_once "../footer.php"
    ?>
    <!-- End Footer -->

    <!-- Start Script -->
    <script src="../assets/js/jquery-1.11.0.min.js"></script>
    <script src="../assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/templatemo.js"></script>
    <script src="../assets/js/custom.js"></script>
    <!-- End Script -->
</body>

</html>