<?php
include_once '../app_config.php';

require_once APP_ROOT . '/Entity/User.php';


class UserController
{
    private $user;

    public function __construct()
    {
        $this->user = new User();
    }


    public function loginUser($userName, $userPwd)
    {
        $user = $this->user->findUserByNameAndPwd($userName, $userPwd);

        if ($user && $user[0]['userPwd']){
            if ($user[0]['code'] === 0){
                $_SESSION['loginStatus'] = true;
                $_SESSION['id'] = $user[0]['id'];
                $_SESSION['userName'] = $user[0]['userName'];

                header("location: ../Boundary/testPage.php");
            }else{
                echo("Access Denied");
            }

//            return $user;

        }

//        //判断是否为登录成功
//        if ($user && $user['userPwd']){
//            if ($user['code'] === 0){
//                $_SESSION['loginStatus'] = true;
//                $_SESSION['id'] = $user['id'];
//                $_SESSION['userName'] = $user['userName'];
//
////                header("location: ../Boundary/testPage.php");
//            }else{
//                echo("Access Denied");
//            }
//
//
//        }

    }




}