<?php
include_once '../app_config.php';
include_once APP_ROOT . '/Controllers/editUserPageController.php';
session_start();

$EditUserController = new EditUserPageController();

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
    $curPage = $_GET['curPage'];
    $page = min($curPage, $maxPage);
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
    <link rel="stylesheet" href="../static/css/editUser.css">
    <title>Untitled Document</title>
    <script language="javascript">
        function del() {
            return confirm("Are you sure you want to delete?");
        }
        function check() {
            var length = this.form1.chk.length;
            if (length === undefined) {
                length = 1;
                document.form1.chk.checked = !document.form1.chk.checked;
            } else {
                for (var i = 0; i &lt; length; i++) {
                    document.form1.chk[i].checked = !document.form1.chk[i].checked;
                }
            }
            return false;
        }
    </script>
</head>
<body>
<?php

if (isset($_SESSION["userName"])) {
    ?>
    <div>
        <header>
            <hr/>
            <h1>Student Information Management System</h1>
            <hr/>
        </header>
        <main>
            <div id="adbt">
            </div>
            <form name="form1" id="form1" method="post" action="deleteSelectedUserAction.php">
                <table width="900" border="1" align="center">
                    <tr>
                        <td><a href="viewUsersView.php">Browse Student Info</a></td>
                        <td><a href="addUserVIew.php">Add Info</a></td>
                        <td><a href="editUserPageView.php">Edit user</a></td>
                        <td><a href="searchUserView.php">Search user</a></td>
                        <td><a href="logOutView.php"><button class="buttons" type="button">Log Out</button></a></td>
                    </tr>
                    <tr>
                        <td colspan="7"><h2>Student Information Display</h2></td>
                    </tr>
                </table>
                <table>
<!--                    --><?php
//                    include_once("untils/conn.php");
//                    mysqli_query($con, "set names utf8");
//                    if ($con) {
//                    $db = mysqli_select_db($con, "school");
//                    if ($db) {
//                    $sql = "select * from studentinfo";
//                    $data = mysqli_query($con, $sql);
//                    $maxrows = mysqli_num_rows($data);
//                    $page_size = 13;
//                    $maxpage = ($maxrows % $page_size == 0) ? (int)($maxrows / $page_size) : (int)($maxrows / $page_size) + 1;
//                    $page = isset($_GET['curpage']) ? $_GET['curpage'] : 1;
//                    $start = $page_size * ($page - 1);
//                    $get_sql = "select * from studentinfo limit $start,$page_size";
//                    $data = mysqli_query($con, $get_sql);
//                    ?>
                    <tbody>
                    <tr id="thead">
                        <td class="d" colspan="2">Id</td>
                        <td>institute ID</td>
                        <td>sim ID</td>
                        <td>Name</td>
                        <td>Gender</td>
                        <td>Age</td>
                        <td>Institute</td>
                        <td>Phone Number</td>
                        <td>Registration Time</td>
                        <td>BitMap</td>
                        <td>Action</td>
                    </tr>
<!--                    --><?php
//                    while ($row = mysqli_fetch_array($data)) {
//                        ?>
<!--                        <tr>-->
<!--                            <td><input type="checkbox" name="chk[]" id="chk" value="--><?php //echo $row["id"]; ?><!--"/></td>-->
<!--                            <td>--><?php //echo $row["id"] ?><!--</td>-->
<!--                            <td>--><?php //echo $row["sno"] ?><!--</td>-->
<!--                            <td>--><?php //echo $row["name"] ?><!--</td>-->
<!--                            <td>--><?php //echo $row["sex"] ?><!--</td>-->
<!--                            <td>--><?php //echo $row["age"] ?><!--</td>-->
<!--                            <td>--><?php //echo $row["institute"] ?><!--</td>-->
<!--                            <td>--><?php //echo $row["phone_number"] ?><!--</td>-->
<!--                            <td>--><?php //echo $row["time"] ?><!--</td>-->
<!--                            <td><a href="update.php?id=--><?php //echo $row['id'] ?><!--" class="gre">Edit</a>-->
<!--                                <a href="delete.php?id=--><?php //echo $row['id'] ?><!--" onclick="return del()" class="red">Delete</a>-->
<!--                            </td>-->
<!--                        </tr>-->
<!--                        --><?php
//                    }
//                    ?>

                    <?php
                    foreach ($displayPage as $user){
                        ?>
                        <tr>
                            <td><input type="checkbox" name="chk[]" id="chk" value="<?php echo $user["id"]; ?>"/></td>
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
                            <td><a href="editUserView.php?id=<?php echo $user['id'] ?>" class="gre">Edit</a>
                                <a href="deleteUserAction.php?id=<?php echo $user['id'] ?>" onclick="return del()" class="red">Delete</a>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>

                    </tbody>
                </table>
        </main>
        <table align="center">
            <tr>
                <td>
<!--                    --><?php
//                    echo "<p>Total $maxpage pages&nbsp;&nbsp;Each page $page_size items&nbsp;&nbsp;";
//                    if ($page > 1) {
//                        $prepage = $page - 1;
//                        echo "<a href='?curpage=$prepage'>Previous page</a>&nbsp;&nbsp;";
//                    }
//                    if ($page < $maxpage) {
//                        $nextpage = $page + 1;
//                        echo "<a href='?curpage=$nextpage'>Next page</a>&nbsp;&nbsp;";
//                    }
//                    echo "Page $page</p>";
//                    }
//                    }
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
                </td>
            </tr>
            <tr>
                <td colspan="7"><a href="" onclick="return check()">Select/Unselect All</a> &nbsp;&nbsp;<input type="submit" onclick="return del();" value="Delete Selected" /></td>
            </tr>
        </table>
        </form>
    </div>
    <?php
} else {
    echo "<script>alert('You are not logged in and do not have access to this page');location.href='loginView.php';</script>";
}
?>
</body>
</html>
