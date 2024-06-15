<?php
header("Content-type:text/html;charset=UTF-8");
include_once '../app_config.php';
include_once APP_ROOT . '/Controllers/EditUserController.php';

// 检查是否有GET请求id且已确认删除
if (isset($_GET['id']) && isset($_GET['confirm']) && $_GET['confirm'] == 'yes') {
    $id = $_GET['id'];
    $EditUserController = new EditUserController();
    $result = $EditUserController->deleteUser($id);

    if ($result) {
//        echo "<script>alert('Information successfully deleted'); location.href='editUserPageView.php';</script>";
        echo "<script>alert('Information successfully deleted');  history.back();</script>";
    } else {
        echo "<script>alert('Deletion failed'); history.back();</script>";
    }
    exit();
}

$id = $_GET['id'] ?? '';  // PHP 7 null coalesce operator
if (empty($id)) {
    exit('<h1>Failed to connect to the database</h1>');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delete User</title>
    <script>
        window.onload = function() {
            var confirmDeletion = confirm('Are you sure you want to delete this user?');
            if (confirmDeletion) {
                window.location.href = "?id=<?php echo $id; ?>&confirm=yes";
            } else {
                history.back();
            }
        }
    </script>
</head>
<body>
</body>
</html>
