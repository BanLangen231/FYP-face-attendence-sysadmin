<?php
include_once '../app_config.php';
include_once APP_ROOT . '/Controllers/loginCheckController.php';
session_start();

$userName = $_POST['userName'];
$userPwd = $_POST['userPwd'];


$checkController = new loginCheckController();
$result = $checkController->loginUser($userName, $userPwd);

$loginStatus = $result['loginStatus'];
$user = $result['user'];
?>


<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>info</title>
</head>



<body>
<?php
//include_once("untils/conn.php");
//session_start();
//mysqli_query($con, "set names utf8");
//$name = $_POST['username'];
//$pwd = $_POST['password'];
//$sql = "select Adminname,password from admin where Adminname='$name' AND password='$pwd';";
//$result = mysqli_query($con, $sql);
//$row = mysqli_num_rows($result);
//$_SESSION["username"] = $name;
//if($row) {
//    echo "<script>alert('Login success');location.href='index.php';</script>";
//} else {
//    echo "<script>alert('User name or password is wrong, please type in again');history.go(-1);</script>";
//}
//

if ($loginStatus){
    $_SESSION["userName"] = $user[0]['adminName'];
    //设置SESSION 变量 username 并且跳转到测试页面
//    dump($user[0]['adminName']);
//    echo "<script>alert('Login success');location.href= 'testPage.php';</script>";
    echo "<script>alert('Login success');location.href= '../Boundary/viewUsersView.php';</script>";
}else{
    //检查到用户不存在 跳转回登录界面
    echo "<script>alert('User name or password is wrong, please type in again');location.href= '../index.php';</script>";
}

?>
</body>

</html>