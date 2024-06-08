<?php
require_once  'EntityCommon.php';

class User extends EntityCommon
{
    public function findUserByNameAndPwd($userName, $userPwd)
    {
        $sql = <<<SQL
SELECT * FROM `users` WHERE `userName` = '{$userName}'  AND `userPwd` = '{$userPwd}'
SQL;

        return $this->db->queryAll($sql);
    }
}