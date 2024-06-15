<?php
require_once  'EntityCommon.php';


class Admin extends EntityCommon
{
    public function loginAdmin($adminName, $adminPwd)
    {
        $sql = <<<SQL
SELECT * FROM `admin` WHERE adminName = '{$adminName}'  AND adminPwd = '{$adminPwd}'
SQL;

        return $this->db->queryAll($sql);
    }

}