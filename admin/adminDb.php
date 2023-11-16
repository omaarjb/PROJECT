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


function select($sql, $datatypes, $values)
{
    $connection = $GLOBALS['connection'];
    if ($stmt = mysqli_prepare($connection, $sql)) {
        mysqli_stmt_bind_param($stmt, $datatypes, ...$values);
        if (mysqli_stmt_execute($stmt)) {
            $res = mysqli_stmt_get_result($stmt);
            mysqli_stmt_close($stmt);
            return $res;
        } else {
            mysqli_stmt_close($stmt);
            die("Query connot be executed !");
        }
    } else {
        die("Query connot be prepared !");
    }
}


function update($sql, $datatypes, $values)
{
    $connection = $GLOBALS['connection'];
    if ($stmt = mysqli_prepare($connection, $sql)) {
        mysqli_stmt_bind_param($stmt, $datatypes, ...$values);
        if (mysqli_stmt_execute($stmt)) {
            $res = mysqli_stmt_affected_rows($stmt);
            mysqli_stmt_close($stmt);
            return $res;
        } else {
            mysqli_stmt_close($stmt);
            die("Query connot be executed !");
        }
    } else {
        die("Query connot be prepared !");
    }
}

function insert($sql, $datatypes, $values)
{
    $connection = $GLOBALS['connection'];
    if ($stmt = mysqli_prepare($connection, $sql)) {
        mysqli_stmt_bind_param($stmt, $datatypes, ...$values);
        if (mysqli_stmt_execute($stmt)) {
            // Return the inserted row ID
            $insertedId = mysqli_insert_id($connection);
            mysqli_stmt_close($stmt);
            return $insertedId;
        } else {
            mysqli_stmt_close($stmt);
            die("Query cannot be executed !");
        }
    } else {
        die("Query cannot be prepared !");
    }
}
