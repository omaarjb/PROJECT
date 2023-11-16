<?php
require("admin/adminDb.php");

$pattern = "/^\+212\d{9}$/";

if (isset($_POST['register'])) {
    $data = filtration($_POST);
    // match password and confirm password field
    // if (!preg_match($pattern, $_POST['phonenum'])) {
    //     echo "invalidphone";
    //     exit;
    // }
    if (strlen($data['pass']) < 6) {
        echo "passlength";
        exit;
    } else if ($data['pass'] != $data['cpass']) {
        echo "notmatch";
        exit;
    }
    $query = "SELECT * FROM users_info WHERE email=? OR phonenum=?";
    $values = [$data['email'], $data['phonenum']];
    $exist = select($query, "ss", $values);

    if (mysqli_num_rows($exist) > 0) {
        $exist_fetch = mysqli_fetch_assoc($exist);
        if ($exist_fetch['email'] == $data['email']) {
            echo "Email already exists";
            exit;
        } else if ($exist_fetch['phonenum'] == $data['phonenum']) {
            echo "Phone number already exists";
            exit;
        }
    }

    $hashPass = password_hash($data['pass'], PASSWORD_DEFAULT);
    $q = "INSERT INTO `users_info`(`name`, `email`, `adress`, `phonenum`, `pincode`, `dob`, `password`) VALUES (?,?,?,?,?,?,?)";
    $val = [$data['name'], $data['email'], $data['phonenum'], $data['adress'], $data['pincode'], $data['dob'], $hashPass];

    if (insert($q, "sssssss", $val)) {
        echo 1;
    } else {
        echo "failed";
    }
}


if (isset($_POST['login'])) {
    $data = filtration($_POST);

    $query = "SELECT * FROM users_info WHERE email=? OR phonenum=?";
    $values = [$data['email_phone'], $data['email_phone']];
    $exist = select($query, "ss", $values);

    if (mysqli_num_rows($exist) == 0) {
        echo "not exist";
        exit;
    } else {
        $exist_fetch = mysqli_fetch_assoc($exist);

        if (!password_verify($data['pass'], $exist_fetch['password'])) {
            echo "wrong pass";
        } else {
            session_start();
            $_SESSION['login'] = true;
            $_SESSION['userId'] = $exist_fetch['id'];
            $_SESSION['userName'] = $exist_fetch['name'];
            $_SESSION['userPhone'] = $exist_fetch['phonenum'];

            echo 1;
        }
    }
}
