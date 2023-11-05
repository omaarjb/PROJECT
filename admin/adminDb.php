<?php

$db_server = "localhost:4306";
$db_user = "root";
$db_pass = "";
$db_name = "ojbhotelwebsite";
$connection = "";


if (!$connection) {
    try {
        $connection = mysqli_connect($db_server, $db_user, $db_pass, $db_name);
    } catch (mysqli_sql_exception) {
        die("<h2> Could not connect ! </h2>");
    }
}


function filtration($data)
{
    foreach ($data as $key => $value) {
        $data[$key] = trim($value);
        $data[$key] = stripslashes($value);
        $data[$key] = htmlspecialchars($value);
        $data[$key] = strip_tags($value);
    }
    return $data;
}


function select($sql, $values, $datatypes)
{
    $connection = $GLOBALS['connection'];
    if ($stmt = mysqli_prepare($connection, $sql)) {
        mysqli_stmt_bind_param($stmt, $datatypes, ...$values);
    } else {
        die("Query connot be executed !");
    }
}
