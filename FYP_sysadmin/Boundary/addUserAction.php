<?php
header("Content-type:text/html;charset=UTF-8");
include_once '../app_config.php';
include_once APP_ROOT . '/Controllers/AddUserController.php';
session_start();

// 检查是否是初次POST请求并存储数据
//check if first post request and store data
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['postData'] = $_POST;
}

// 用户确认添加后，从会话中获取数据并执行添加操作
//user confirm add
if (isset($_GET['confirm']) && $_GET['confirm'] == 'yes' && isset($_SESSION['postData'])) {
    $postData = $_SESSION['postData'];

    $simID = $postData["simID"];
    $instituteID = $postData["instituteID"];
    $name = $postData["name"];
    $gender = $postData["gender"];
    $age = $postData["age"];
    $institute = $postData["institute"];
    $phone_number = $postData["phone_number"];
    $bitmap = null;

    $AddUserController = new AddUserController();
    $result = $AddUserController->addUser($simID, $instituteID, $name, $gender, $age, $institute, $phone_number, $bitmap);

    if ($result) {
        echo "<script>alert('Information successfully added'); location.href='viewUsersView.php';</script>";
    } else {
        echo "<script>alert('Add failed'); history.back();</script>";
    }
    // 清除会话中存储的POST数据
    // clear post data in session
    unset($_SESSION['postData']);
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add User</title>
    <script>
        window.onload = function() {
            var confirmDeletion = confirm('Are you sure you want to add this user?');
            if (confirmDeletion) {
                window.location.href = "?confirm=yes";
            } else {
                history.back();
            }
        };
    </script>
</head>
<body>
</body>
</html>
