<?php
//this class is used to connecting database


require_once 'Config.php';


class DataBase
{
    //handle
    public $db = null;

    public function __construct()
    {
        //use mysqli to connect database
        $this->db = new mysqli(config::DB_HOST , config::DB_USERNAME , config::DB_PASSWORD , config::DB_DATABASE);
        if (mysqli_connect_errno()) {
            echo '<p>Error: Could not connect to database.<br/>Please try again later.</p>';
            exit;
        }
        return $this->db;
    }

    //执行查询语句 并且返回执行后的结果
    //如果查询失败 则返回空数组
    public function queryAll($query = '')
    {
        $stmt = $this->db->prepare($query);
        if (!$stmt) {
            return [];
        }
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    //用于执行增删改 那些不用返回值的sql语句
    public function exec($query = '')
    {
        $stmt = $this->db->prepare($query);
        return $stmt->execute();
    }


}