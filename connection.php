<?php

class Connection
{
    private $servername = "localhost:4306";
    private $username = "root";
    private $password = "";
    public $conn;

    public function __construct()
    {
        $this->conn = new mysqli($this->servername, $this->username, $this->password);
        if (!$this->conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
    }

    function createDatabase($dbname)
    {
        $sql = "CREATE DATABASE IF NOT EXISTS $dbname";
        if (mysqli_query($this->conn, $sql)) {
            echo "Database created successfully";
        } else {
            echo "Error creating database: " . mysqli_error($this->conn);
        }
    }

    public function selectDatabase($dbname)
    {
        mysqli_select_db($this->conn, $dbname);
    }

    function createTable($query)
    {
        if (mysqli_query($this->conn, $query)) {
            echo "Table created successfully";
        } else {
            echo "Error creating table: " . mysqli_error($this->conn);
        }
    }

    public function selectt($sql, $datatypes, $values, $conn)
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
}
