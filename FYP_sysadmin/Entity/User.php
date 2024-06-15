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

    public function getUsers()
    {
        $sql = <<<SQL
SELECT * FROM `users`
SQL;
        return $this->db->queryAll($sql);
    }

    public function getTotalTows() {
        $sql = <<<SQL
SELECT COUNT(*) FROM `users`
SQL;
        $result = $this->db->queryAll($sql);

        //返回总数
        return $result[0]["COUNT(*)"];
    }

    public function getLimitUsers($start, $limit) {
        $sql = <<<SQL
SELECT * FROM `users` LIMIT {$start}, {$limit}
SQL;
        return $this->db->queryAll($sql);
    }

    public function findUserById($id)
    {
        $sql = <<<SQL
SELECT * FROM `users` WHERE `id` = '{$id}'
SQL;

        return $this->db->queryAll($sql);
    }

    public function updateUser($id, $simID, $instituteID, $name, $gender, $age, $institute, $phone_number)
    {
        $sql = <<<SQL
UPDATE `users` SET `simID` = '{$simID}', `instituteID` = '{$instituteID}', `name` = '{$name}', `gender` = '{$gender}', `age` = '{$age}', `institute` = '{$institute}', `phone_number` = '{$phone_number}' WHERE `id` = '{$id}'
SQL;

        return $this->db->exec($sql);
    }

    public function deleteUser($id)
    {
        $sql = <<<SQL
DELETE FROM `users` WHERE `id` = '{$id}'
SQL;

        return $this->db->exec($sql);
    }

    public function addUser($simID, $instituteID, $name, $gender, $age, $institute, $phone_number, $bitmap)
    {
        $sql = <<<SQL
INSERT INTO `users` (`simID`, `instituteID`, `name`, `gender`, `age`, `institute`, `phone_number`, `bitmap`) VALUES ('{$simID}', '{$instituteID}', '{$name}', '{$gender}', '{$age}', '{$institute}', '{$phone_number}', '{$bitmap}')
SQL;

        return $this->db->exec($sql);
    }

    public function searchUser($id)
    {
        $sql = <<<SQL
SELECT * FROM `users` WHERE `id` = '{$id}'
SQL;

        return $this->db->queryAll($sql);
    }


}