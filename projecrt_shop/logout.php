<?php
session_start();
if (isset($_GET['st'])) { //logout 時會給的變數
    if ($_GET['st'] == "logout") {

        session_destroy();
        header('Location: login.php');
    }
}
