<?php

class Client
{
    public $id;
    public $name;
    public $email;
    public $adress;
    public $phonenum;
    public $pincode;
    public $dob;
    public $pass;
    public $cpass;
    public $datentime;

    public static $errorMsg = "";
    public static $successMsg = "";

    public function __construct($name, $email, $adress, $phonenum, $pincode, $dob, $pass)
    {
        $this->name = $name;
        $this->email = $email;
        $this->adress = $adress;
        $this->phonenum = $phonenum;
        $this->pincode = $pincode;
        $this->dob = $dob;
        $this->pass = $pass;
    }


    public function insertClient($tableName, $conn)
    {
        $hashPass = password_hash($this->pass, PASSWORD_DEFAULT);
        $query = "INSERT INTO $tableName (`name`, `email`, `adress`, `phonenum`, `pincode`, `dob`, `password`) VALUES ('$this->name','$this->email','$this->adress','$this->phonenum','$this->pincode','$this->dob','$hashPass')";
        if (mysqli_query($conn, $query)) {
            self::$successMsg = "Client added successfully";
        } else {
            self::$errorMsg = "Error adding client: " . mysqli_error($conn);
            die(self::$errorMsg);
        }
    }

    public static function select($sql, $datatypes, $values, $conn)
    {
        if ($stmt = mysqli_prepare($conn, $sql)) { // prepare biha query
            mysqli_stmt_bind_param($stmt, $datatypes, ...$values); // kola caractere chno kay3ni "dataTypes" par exp "ss" (string string)
            if (mysqli_stmt_execute($stmt)) { // execute query
                $res = mysqli_stmt_get_result($stmt); // katrje3 row w kadiro f variable
                mysqli_stmt_close($stmt); // close statement
                return $res; // return result
            } else {
                mysqli_stmt_close($stmt);
                die("Query connot be executed !");
            }
        } else {
            die("Query connot be prepared !");
        }
    }


    public static function selectAllClients($tableName, $conn)
    {
        $query = "SELECT * FROM $tableName";
        $result = mysqli_query($conn, $query);
        $data = array();

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }
        }

        return $data;
    }



    static function selectClientById($tableName, $conn, $id)
    {
        $query = "SELECT * FROM $tableName WHERE id=$id";
        $result = mysqli_query($conn, $query);
        $data = array();

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $data = $row;
        }

        return $data;
    }

    static function updateClient($client, $tableName, $conn, $id)
    {
        $query = "UPDATE $tableName SET name='$client->name', email='$client->email', adress='$client->adress', phonenum='$client->phonenum', pincode='$client->pincode', dob='$client->dob',password='$client->pass' WHERE id=$id";
        if (mysqli_query($conn, $query)) {
            self::$successMsg = "Client updated successfully";
        } else {
            self::$errorMsg = "Error updating client: " . mysqli_error($conn);
        }
    }

    public static function deleteClient($tableName, $conn, $id)
    {
        $query = "DELETE FROM $tableName WHERE id=$id";
        if (mysqli_query($conn, $query)) {
            self::$successMsg = "Client deleted successfully";
        } else {
            self::$errorMsg = "Error deleting client: " . mysqli_error($conn);
        }
    }
}
