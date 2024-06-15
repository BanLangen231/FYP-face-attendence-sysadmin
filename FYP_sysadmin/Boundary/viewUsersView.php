<?php
include_once '../app_config.php';
include_once APP_ROOT . '/Controllers/viewUsersController.php';
session_start();



$EditUserController = new viewUsersController();

//全部用户
$result = $EditUserController->getUsers();

//获取最大行数
$totalRows = $EditUserController->getTotalRows();

//确定每一页显示多少个用户
//Define each page shows how many rows
$pageSize = 10;

//确定总页数
//Determine total pages
if($totalRows%$pageSize == 0){
    $maxPage = (int)($totalRows/$pageSize);
}else{
    $maxPage = (int)($totalRows/$pageSize)+1;
}

//获取当前页
if(isset($_GET['curPage'])){
    $page = $_GET['curPage'];
}else{
    $page = 1;
}

//分段取出数据
$start = $pageSize*($page-1);
$displayPage = $EditUserController->getLimitUsers($start,$pageSize);



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="../static/css/viewUsers.css">
    <title>Untitled Document</title>
</head>
<body>


<?php
if(isset($_SESSION["userName"])){
    ?>
    <div>
        <header>
            <hr/>
            <h1>User Info Management System</h1>
            <hr/>
        </header>
        <main>

            <div id="adbt">
            </div>
            <table width="900" border="1" align="center">

                <tr>

                    <td><a href="viewUsersView.php">Browse users info</a></td>
                    <td><a href="addUserVIew.php">Add user</a></td>
                    <td><a href="editUserPageView.php">Edit user</a></td>
                    <td><a href="searchUserView.php">Search user</a></td>
                    <td><a href="logOutView.php"><button class="buttons" type="button">Log out</button></a></td>
                </tr>
                <tr>
                    <td colspan="7"><h2>User Info: </h2></td>
                </tr>
            </table>

            <table>
                <tbody>
                <tr id="thead">

                    <td class="d" colspan="2" align="center">User Id</td>
                    <td>institute ID</td>
                    <td>sim ID</td>
                    <td>Name</td>
                    <td>Gender</td>
                    <td>Age</td>
                    <td>Institute</td>
                    <td>Phone Number</td>
                    <td>Registration Time</td>
                    <td>BitMap</td>


                </tr>
<!--                --><?php
//                while($row = mysqli_fetch_array($data)){
//                    ?>
<!--                    <tr>-->
<!--                        <td><input type="checkbox"></td>-->
<!--                        <td>--><?php //echo $row["id"] ?><!--</td>-->
<!--                        <td>--><?php //echo $row["sno"] ?><!--</td>-->
<!--                        <td>--><?php //echo $row["name"] ?><!--</td>-->
<!--                        <td>--><?php //echo $row["sex"] ?><!--</td>-->
<!--                        <td>--><?php //echo $row["age"] ?><!--</td>-->
<!--                        <td>--><?php //echo $row["institute"] ?><!--</td>-->
<!--                        <td>--><?php //echo $row["phone_number"] ?><!--</td>-->
<!--                        <td>--><?php //echo $row["time"] ?><!--</td>-->
<!---->
<!--                    </tr>-->
<!--                    --><?php
//                }
//                ?>

                <?php
                foreach ($displayPage as $user){
                ?>
                    <tr>
                        <td><input type="checkbox"></td>
                        <td><?php echo $user["id"] ?></td>
                        <td><?php echo $user["instituteID"] ?></td>
                        <td><?php echo $user["simID"] ?></td>
                        <td><?php echo $user["name"] ?></td>
                        <td><?php echo $user["gender"] ?></td>
                        <td><?php echo $user["age"] ?></td>
                        <td><?php echo $user["institute"] ?></td>
                        <td><?php echo $user["phone_number"] ?></td>
                        <td><?php echo $user["time"] ?></td>
                        <td><?php echo $user["bitmap"] ?></td>
                    </tr>
                <?php
                }
                ?>


                </tbody>
            </table>

        </main>
        <table align="center"><tr><td>

<!--                    --><?php
//                    echo "<p>Have $maxpage Pages. &nbsp;&nbsp;";
//                    echo "Each page has $page_size users. &nbsp;&nbsp;";
//                    //Set previous page
//                    if($page>1){
//                        $prepage=$page-1;
//                        echo "<a href='?curpage=$prepage'>Previous page.</a>&nbsp;&nbsp;";
//                    }
//                    //Set next page
//                    if($page<$maxpage){
//                        $nextpage=$page+1;
//                        echo "<a href='?curpage=$nextpage'>Next page.</a>&nbsp;&nbsp;";
//                    }
//                    echo "&nbsp;&nbsp;Page $page. </p>";
//
//                    }
//                    }
//
//                    ?>

<!--                    换页功能的实现-->
                    <?php

                    echo "<p>Have $maxPage Pages. &nbsp;&nbsp;";
                    //设置上一页
                    if ($page > 1) {
                        $prePage = $page - 1;
                        echo "<a href='?curPage=$prePage'>Previous page.</a>&nbsp;&nbsp;";

                    }
                    //设置下一页
                    if ($page < $maxPage) {
                        $nextPage = $page + 1;
                        echo "<a href='?curPage=$nextPage'>Next page.</a>&nbsp;&nbsp;";
                    }

                    //显示第几页
                    echo "&nbsp;&nbsp;Page $page . </p>";



                    ?>

                </td></tr>
        </table>
    </div>
    <?php
}else{
    echo "<script>alert('You have not logged in, please log in and come back.');location.href='../index.php';</script>";
}
?>
</body>
</html>
