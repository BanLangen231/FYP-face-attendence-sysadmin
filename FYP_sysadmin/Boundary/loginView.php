<?php
require_once '../app_config.php';
require_once APP_ROOT . '/Controllers/UserController.php';
session_start();



function loginCheck($userName,$userPwd){
    $userController = new UserController();
    return $userController->loginUser($userName,$userPwd);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userName = isset($_POST['username']) ? $_POST['username'] : '';
    $userPwd = isset($_POST['password']) ? $_POST['password'] : '';

//    dump($userName);
//    dump($userPwd);

    $result = loginCheck($userName,$userPwd);

//    var_dump($result);
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>System Admin Login Page</title>
    <link rel="stylesheet" href="../static/css/styles.css">
</head>
<body>
<div class="login-container">
    <h2>System Admin Login</h2>
    <div class="error-message" id="error-message"></div>
<!--    <form id="login-form" onsubmit="return validateLogin()">-->
    <form id="login-form" onsubmit="return validateForm()" method="post">
        <input type="text" id="username" name="username" placeholder="User Name" required oninput="this.setCustomValidity('')" >
        <input type="password" id="password" name="password" placeholder="Password" required oninput="this.setCustomValidity('')">
        <button type="submit" value="Login">Login</button>
    </form>
</div>

<script>
    function validateForm() {
        var username = document.getElementById('username');
        var password = document.getElementById('password');
        var valid = true;

        if (username.value.trim() === '') {
            username.setCustomValidity('Username cannot be empty.');
            valid = false;
        } else {
            username.setCustomValidity('');
        }

        if (password.value.trim() === '') {
            password.setCustomValidity('Password cannot be empty.');
            valid = false;
        } else {
            password.setCustomValidity('');
        }

        return valid;
    }
</script>
</body>
</html>

