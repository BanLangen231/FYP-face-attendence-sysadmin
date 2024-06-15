<?php
include_once '../app_config.php';

require_once APP_ROOT . '/Entity/User.php';



class SearchUSerController
{

    public function searchUser($id)
    {
        $user = new User();
        return $user->searchUser($id);
    }
}