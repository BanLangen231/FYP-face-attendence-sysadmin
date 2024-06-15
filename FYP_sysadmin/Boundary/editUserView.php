<?php
include_once '../app_config.php';
include_once APP_ROOT . '/Controllers/editUserController.php';
session_start();


$id=$_GET['id'];



$EditUserController = new EditUserController();
$user = $EditUserController->getUser($id);



$id = $_GET['id'];



?>



<!DOCTYPE html>
<html>
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style type="text/css">
        * {
            margin: 0;
            padding: 0;
        }
        body {
            height: auto;

        }
        table {
            margin: 0 auto;
            width: 60%;
            text-align: center;
            border-spacing: 0;
            padding-bottom: -20px;

        }
        header {
            display: flex;
            flex-flow: row nowrap;
            justify-content: space-between;
        }
        header h1 {
            color: #9a9897;
        }
        header hr {
            margin: 20px 20px 0;
            background-color: #bc9470;
            border: 2px solid #bc9470;
            width: 30%;
            height: 0;
        }
        main #adbt {
            margin-left: 70px;
            margin-top: 20px;
        }
        main button {
            margin: 20px 5px;
            width: 38px;
            height: 35px;
            color: white;
        }
        main button.buttons {
            width: 40px;
            height: 30px;
            border: none;
            margin-left: -10px;
            margin-right: -10px;
            color: white;
            text-align: center;
            background-image: linear-gradient(to right, #c979d4,#fa719d);
            border-radius: 5px;
        }
        .nav {
            width: 1000px;
            height: 60px;
            border: #606266 1px solid;
            border-radius: 10px;
            background-color: rgba(125, 126, 127, 0.03);
            margin: 50px auto 0 auto;
        }
        .nav ul li {
            list-style: none;
            width: 90px;
            height: 60px;
            float: left;
            text-align: center;
            line-height: 60px;
        }
        .left {
            float: left;
        }
        .juzhong {
            line-height: 60px;
            margin-left: 8px;
            color: #788080;
        }
        .nav-yong {
            width: 230px;
            height: 60px;
            line-height: 60px;
            margin-left: 250px;
        }
        .nav-yong a button {
            width: 70px;
            height: 30px;
            border: none;
            margin-left: 40px;
            color: white;
            text-align: center;
            background-image: linear-gradient(to right, #c979d4,#fa719d);
            border-radius: 5px;
        }
        a{
            text-decoration: none;
            color: #606266;
        }
        a:hover {
            color: red;
        }
        .Login {
            width: 630px;
            height: 540px;
            position: fixed;
            top: 111px;
            left: 0;
            right: 0;
            bottom: 0;
            margin: auto;
            padding-top: 20px;
            box-shadow: 0 0 5px rgba(0,0,0,0.4);
        }
        label {
            display: block;
        }
        form {
            margin: 10px 140px;
        }
        h2 {
            text-align: center;
            font-size: 25px;
            color: #606266;
        }
        .put {
            width: 220px;
            height: 30px;
            background: transparent;
            margin-top: 25px;
            border: none;
            border-bottom: 1px wheat solid;
            outline: none;
            color: #606266;
            font-size: 17px;
        }
        input::-webkit-input-placeholder {
            color: #2aabd2;
        }
        .submit {
            float: left;
            width: 100px;
            height: 30px;
            border: none;
            margin-left: 20px;
            color: white;
            margin-top: 20px;
            text-align: center;
            background-image: linear-gradient(to right, #c979d4,#fa719d);
            border-radius: 20px;

        }
        .reset {
            float: right;
            width: 100px;
            height: 30px;
            border: none;
            margin-right: 100px;
            color: white;
            margin-top: 20px;
            text-align: center;
            background-image: linear-gradient(to right, #c979d4,#fa719d);
            border-radius: 20px;
        }

        span {
            font-size: 15px;
        }
        .shang {
            margin-top: 40px;
        }
        #blankCheckbox {
            width: 15px;
            margin-left: 20px;
        }
        table tr td{
            background-color: #e9e9e9;

        }


    </style>
    <title>Home Page</title>
</head>
<body>
<?php
//include_once("untils/conn.php");
//$id=$_GET['id'];
//mysqli_query($con, "set names utf8");
//$db = mysqli_select_db($con, "school");
//$data = mysqli_query($con, "select * from studentinfo where id=" . $id);
//
//$rows=mysqli_fetch_row($data);
//function console_log($data){
//    echo("<script>console.log(".json_encode($data[3]).")</script>");
//}
//
//console_log($rows)
//
//?>
<header>
    <hr/>
    <h1>Student Information Management System</h1>
    <hr/>
</header>
<main>
    <div id="adbt">
    </div>
    <table width="900" border="1" align="center">
        <tr>
            <td><a href="viewUsersView.php">Browse Student Information</a></td>
            <td><a href="addUserVIew.php">Add user</a></td>
            <td><a href="editUserPageView.php">Edit user</a></td>
            <td><a href="searchUserView.php">Search user</a></td>
            <td><a href="logOutView.php"><button class="buttons" type="button">Log Out</button></a></td>
        </tr>
    </table>
</main>

<div class="Login">
    <h2>Edit Student Information</h2>
    <form action="updateEditAction.php" method="post">
        <label>
            <span>SIM ID: </span>
            <input type="text" class="put" name="simID" placeholder="Enter SIM ID" value="<?php echo $user[0]['simID']?>">
        </label>
        <label>
            <span>Institute ID: </span>
            <input type="text" class="put" name="instituteID" placeholder="Enter Institute ID" value="<?php echo $user[0]['instituteID']?>">
        </label>
        <label>
            <span>Name: </span>
            <input type="text" class="put" name="name" placeholder="Enter Name" value="<?php echo $user[0]['name']?>">
        </label>
        <label>
            <div class="shang">
                <span>Gender: </span>
                <input type="radio" id="blankCheckbox" name="gender" value="male" <?php echo ($user[0]['gender'] == 'male') ? 'checked' : ''; ?>>Male
                <input type="radio" id="blankCheckbox" name="gender" value="female" <?php echo ($user[0]['gender'] == 'female') ? 'checked' : ''; ?>>Female
            </div>
        </label>
        <label>
            <span>Age: </span>
            <input type="text" class="put" name="age" placeholder="Age" value="<?php echo $user[0]['age']?>">
        </label>
        <label>
            <span>Institute: </span>
            <input type="text" class="put" name="institute" placeholder="Enter Institute" value="<?php echo $user[0]['institute']?>">
        </label>
        <label>
            <span>Phone Number: </span>
            <input type="text" class="put" name="phone_number" placeholder="Enter Phone Number" value="<?php echo $user[0]['phone_number']?>">
        </label>
        <label>
            <span>Bit Map Data: </span>
            <input type="text" class="put" name="time" placeholder="bitmap here update latter" value="<?php echo $user[0]['bitmap']?>">
        </label>
        <input type="hidden" name="id" value="<?php echo $id?>">
        <button class="submit" type="submit" value="Submit">Submit</button>
<!--        <button class="reset" type="reset" value="Reset">Reset</button>-->
    </form>
</div>

</body>
</html>
