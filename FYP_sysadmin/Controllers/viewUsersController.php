<?php
include_once '../app_config.php';

require_once APP_ROOT . '/Entity/User.php';

class viewUsersController
{

    private $user;

    public function __construct()
    {
        $this->user = new User();
    }

    public function getUsers()
    {
        return $this->user->getUsers();
    }

    public function getTotalRows()
    {
        return $this->user->getTotalTows();
    }

    public function getLimitUsers($start, $limit)
    {
        return $this->user->getLimitUsers($start, $limit);
    }


}