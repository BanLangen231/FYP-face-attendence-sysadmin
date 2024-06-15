<?php
include_once '../app_config.php';

require_once APP_ROOT . '/Entity/User.php';

class AddUserController
{
    private $user;

    public function __construct()
    {
        $this->user = new User();
    }

    public function getUser($id)
    {
        return $this->user->findUserById($id);
    }

    public function addUser($simID, $instituteID, $name, $gender, $age, $institute, $phone_number, $bitmap)
    {
        return $this->user->addUser($simID, $instituteID, $name, $gender, $age, $institute, $phone_number, $bitmap);
    }
}