<?php
$passError = "";
if (isset($_POST['register'])) {
    // $emailValue = $_POST['email'];
    $passwordValue = $_POST['pass'];
    $confirmPasswordValue = $_POST['cpass'];

    if ($passwordValue != $confirmPasswordValue) {
        $passError = "Password not match!";
    }
}
