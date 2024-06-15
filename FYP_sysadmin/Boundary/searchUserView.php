<?php
include_once '../app_config.php';
include_once APP_ROOT . '/Controllers/SearchUserController.php';
session_start();

$user = new SearchUSerController();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Untitled Document</title>
    <style type="text/css">
        body, html {
            height: auto;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        .content-wrapper {
            width: 900px; /* 设置容器宽度 */
            margin: 0 auto; /* 居中容器 */
            padding: 20px; /* 容器内边距 */
        }

        form {
            text-align: center; /* 中心对齐表单内容 */
        }

        .table, .form-group {
            width: 100%; /* 宽度充满容器 */
            margin: 20px 0; /* 顶部和底部间距 */
        }

        input[type="text"], .put, .btu {
            padding: 10px;
            margin-top: 5px; /* 顶部间距 */
            border: 1px solid #ccc;
        }

        .btu, .buttons {
            background-image: linear-gradient(to right, #c979d4, #fa719d);
            color: white;
            border: none;
            border-radius: 15px;
            cursor: pointer;
        }

        .buttons:hover {
            background-color: #45a049;
        }

        table.gridtable {
            width: calc(100% - 40px); /* 减去两侧的空间总和 */
            margin: 20px 20px; /* 上下保持20px，左右各20px以使表格居中且留出空间 */
            border-collapse: collapse; /* 边框合并 */
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15); /* 可选的阴影效果增加美观度 */
        }

        th, td {
            border: 1px solid #666666; /* 单元格边框 */
            padding: 8px; /* 单元格内边距 */
            text-align: center; /* 文本居中 */
        }


        table.return {
            width: 900px; /* 定义表格宽度 */
            margin: 20px auto; /* 水平居中 */
            border-collapse: collapse; /* 边框合并 */
        }

        th, td {
            border: 1px solid #666666; /* 单元格边框 */
            padding: 8px; /* 单元格内边距 */
            text-align: center; /* 文本居中 */
        }



        .edit-link {
            color: #4CAF50; /* 绿色 */
            text-decoration: none;
            padding: 5px 10px;
            background-color: #f0f0f0;
            border-radius: 5px;
            margin-right: 10px;
        }

        .delete-link {
            color: #f44336; /* 红色 */
            text-decoration: none;
            padding: 5px 10px;
            background-color: #f0f0f0;
            border-radius: 5px;
        }

        .edit-link:hover, .delete-link:hover {
            opacity: 0.8; /* 悬停时的透明度变化 */
        }


    </style>
</head>
<body>

<form method="get" action="#" class="search-form">
    <h2>Student Information Search</h2>
    <table class="return">
        <tr>
            <td><a href="viewUsersView.php">Browse users info</a></td>
            <td><a href="addUserVIew.php">Add user</a></td>
            <td><a href="editUserPageView.php">Edit user</a></td>
            <td><a href="searchUserView.php">Search user</a></td>
            <td><a href="logOutView.php"><button class="buttons" type="button">Log out</button></a></td>
        </tr>
    </table>
    <div class="form-group">
        <label for="search-id">Please enter the user id to search:</label>
        <input type="text" class="put" id="search-id" name="id" placeholder="Enter student id" required>
        <input class="btu" type="submit" name="search" value="Search">
    </div>
</form>

<table class="gridtable">
    <tr>
        <th>Id</th>
        <th>Sim ID</th>
        <th>institute ID</th>
        <th>Name</th>
        <th>Gender</th>
        <th>Age</th>
        <th>Institute</th>
        <th>Phone Number</th>
        <th>Bit Map data</th>
        <th>Action</th>

    </tr>
    <?php
    if (isset($_GET['search'])) {
        $id = $_GET['id'];
        $result = $user->searchUser($id);

        if (!empty($result)){
            echo "<tr>";
            echo "<td>{$result[0]['id']}</td>";
            echo "<td>{$result[0]['simID']}</td>";
            echo "<td>{$result[0]['instituteID']}</td>";
            echo "<td>{$result[0]['name']}</td>";
            echo "<td>{$result[0]['gender']}</td>";
            echo "<td>{$result[0]['age']}</td>";
            echo "<td>{$result[0]['institute']}</td>";
            echo "<td>{$result[0]['phone_number']}</td>";
            echo "<td>{$result[0]['bitmap']}</td>";
            echo "<td><a href='editUserView.php?id={$result[0]['id']}' class='edit-link'>Edit</a>";
            echo "<a href='deleteUserAction.php?id={$result[0]['id']}' class='delete-link'>Delete</a></td>";
            echo "</tr>";
        } else {
            echo "<script>alert('No user found with the specified ID');</script>";
        }

//        <td class="d" colspan="2">Id</td>
//                        <td>institute ID</td>
//                        <td>sim ID</td>
//                        <td>Name</td>
//                        <td>Gender</td>
//                        <td>Age</td>
//                        <td>Institute</td>
//                        <td>Phone Number</td>
//                        <td>Registration Time</td>
//                        <td>BitMap</td>
//                        <td>Action</td>


    }
    ?>
    <!--    --><?php
    //    if (isset($_GET['cha'])) {
    //        $name = $_GET['name'];
    //        // $sql = "select * from studentinfo where name='$name'";
    //        $sql = "select * from studentinfo where name like '%$name%'";
    //
    //        foreach ($con->query($sql) as $stu) {
    //            echo "<tr>";
    //            echo "<td>{$stu['id']}</td>";
    //            echo "<td>{$stu['sno']}</td>";
    //            echo "<td>{$stu['name']}</td>";
    //            echo "<td>{$stu['sex']}</td>";
    //            echo "<td>{$stu['age']}</td>";
    //            echo "<td>{$stu['institute']}</td>";
    //            echo "<td>{$stu['phone_number']}</td>";
    //            echo "<td>{$stu['time']}</td>";
    //            echo "</tr>";
    //        }
    //    }
    //    ?>
</table>
</body>
</html>
