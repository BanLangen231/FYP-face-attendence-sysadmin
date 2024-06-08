<?php
require_once '../app_config.php';
require_once APP_ROOT .'/Entity/User.php';
require_once APP_ROOT .'/Controllers/UserController.php';


//if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST') {
//    $userController = new UserRegController();
//
//    var_dump($_POST);
//
//    list($success, $msg) = $userController->reg($_POST);
//    if ($success == true) {
//        echo "<script>alert('{$msg}');window.location.href='../index.php'</script>";exit;
//    } else {
//        echo "<script>alert('{$msg}');</script>";
//    }
//}

function testLoginFunction(){
    $user = new User();
    $resul = $user->findUserByNameAndPwd('admin','admin');
    dump($resul);

//    $userController = new UserController();
//    $result = $userController->loginUser('admin','admin');
//    dump($result);
//    echo("这是测试controller");
}




?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<!--<script src="../static/js/xx.js"></script>-->

<!--<form action="" method="post">-->
<!--    <label for="">Name:</label>-->
<!--    <input type="text" name="name">-->
<!---->
<!--    <label for="">Password:</label>-->
<!--    <input type="text" name="pwd">-->
<!--    <button type="submit">submit</button>-->
<!--</form>-->


<?php

testLoginFunction();
?>

</body>
</html>

