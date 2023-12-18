<?php
include "connection.php";
$conn = new Connection();
$conn->selectDatabase("myhotel");
$name = "omar";
$password = "123456";
$admin = new Admin($name, $password);
$admin->insertAdmin("admin", $conn->conn);
if (Admin::$errorMsg != "") {
    echo Admin::$errorMsg;
} else {
    echo Admin::$successMsg;
}
class Admin
{

    public $username;
    public $password;
    public static $errorMsg = "";
    public static $successMsg = "";


    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    public function insertAdmin($tableName, $conn)
    {
        $hashPass = password_hash($this->password, PASSWORD_DEFAULT);
        $query = "INSERT INTO $tableName (name, password) VALUES ('$this->username','$hashPass')";
        if (mysqli_query($conn, $query)) {
            self::$successMsg = "Admin added successfully";
        } else {
            self::$errorMsg = "Error adding admin: " . mysqli_error($conn);
            die(self::$errorMsg);
        }
    }
}
