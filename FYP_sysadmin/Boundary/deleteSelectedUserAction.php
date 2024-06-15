<?php
header("Content-type:text/html;charset=UTF-8");
include_once '../app_config.php';
include_once APP_ROOT . '/Controllers/EditUserController.php';

$user = new EditUserController();

if (count($_POST["chk"]) <= 0) {
    echo "<script>alert('Please select a record'); history.go(-1);</script>";
} else {
    // Loop through the checkboxes and delete records
    for ($i = 0; $i < count($_POST["chk"]); $i++) {
        $id = $_POST["chk"][$i];
        $result = $user->deleteUser($id);

        if (!$result){
            return $result;
        }
    }
    echo "<script>alert('Successfully deleted'); history.go(-1);</script>";
}
?>
