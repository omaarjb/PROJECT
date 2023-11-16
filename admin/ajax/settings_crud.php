<?php
require("../adminDb.php");
require("../functions.php");
loggedIN();

if (isset($_POST['get_general'])) {
    $q = "SELECT * FROM settings WHERE sr_no=?";
    $values = [1];
    $res = select($q, "i", $values);
    $data = mysqli_fetch_assoc($res);
    $json_data = json_encode($data);
    echo $json_data;
}

if (isset($_POST['update_general'])) {
    $frm_data = filtration($_POST);
    var_dump($frm_data);
    $q = "UPDATE `settings` SET site_title=? , site_about=? WHERE sr_no=?";
    $values = [$frm_data['site_title'], $frm_data['site_about'], 1];
    $res = update($q, "ssi", $values);
    echo $res;
}
