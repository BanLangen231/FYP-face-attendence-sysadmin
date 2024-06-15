<?php
include_once '../app_config.php';
include_once APP_ROOT . '/Controllers/EditUserController.php';
session_start();

//从表单获取数据
//Get data from form
$id = $_POST["id"];
$simID = $_POST["simID"];
$instituteID = $_POST["instituteID"];
$name = $_POST["name"];
$gender = $_POST["gender"];
$age = $_POST["age"];
$institute = $_POST["institute"];
$phone_number = $_POST["phone_number"];
//$time = $_POST["time"];


$user = new EditUserController();
$result = $user->updateUser($id, $simID, $instituteID, $name, $gender, $age, $institute, $phone_number);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Untitled Document</title>
</head>
<body>
<table width="900" border="1" align="center">
    <tr>
        <td>
<!--            --><?php
//            include_once("untils/conn.php");
//
//
//            // $con = mysqli_connect("localhost", "root", "123456");
//            if ($con) {
//                mysqli_query($con, "set names utf8");
//                $db = mysqli_select_db($con, "school");
//                $data = $con->query("UPDATE studentinfo SET name = '".$user."', sno = '".$sno."', sex = '".$xingbie."', age = '".$age."', institute = '".$in."', phone_number = '".$dianHua."', time = '".$time."' WHERE id = ".$id);
//                if ($data > 0) {
//                    echo "<script>alert('Update successful'); location.href='index.php'</script> ";
//                } else {
//                    echo("<script>alert('Update failed'); location.href='index.php'</script>");
//                }
//            }
//            $con->close();
//            ?>


            <?php
            if ($result){
                echo "<script>alert('Update successful'); location.href='viewUsersView.php'</script> ";
            }else{
                echo "<script>alert('Update failed'); location.href='viewUsersView.php'</script> ";
            }


            ?>
        </td>
    </tr>
</table>
</body>
</html>
