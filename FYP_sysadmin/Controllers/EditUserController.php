<?php
include_once '../app_config.php';

require_once APP_ROOT . '/Entity/User.php';

class EditUserController
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

    public function updateUser($id, $simID, $instituteID, $name, $gender, $age, $institute, $phone_number)
    {
        return $this->user->updateUser($id, $simID, $instituteID, $name, $gender, $age, $institute, $phone_number);
    }

    public function deleteUser($id)
    {
        return $this->user->deleteUser($id);
    }


}