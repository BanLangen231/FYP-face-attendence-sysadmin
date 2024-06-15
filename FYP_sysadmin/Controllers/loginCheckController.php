<?php
include_once '../app_config.php';

require_once APP_ROOT . '/Entity/Admin.php';

class loginCheckController
{
    private $admin;

    public function __construct()
    {
        $this->admin = new Admin();
    }


    public function loginUser($userName, $userPwd)
    {
        $adminList = $this->admin->loginAdmin($userName, $userPwd);

        if (!empty($adminList)){
            return array('loginStatus' => true, 'user'=> $adminList);
        }else{
            return array('loginStatus' => false, 'user'=> $adminList);
        }
   }

}