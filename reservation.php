<?php

class Reservation
{
    public $idReservation;
    public $dataDebut;
    public $dateFin;
    public $idclient;
    public $idroom;
    public static $errorMsg = "";
    public static $successMsg = "";

    public function __construct($dataDebut, $dateFin, $idclient, $idroom)
    {
        $this->dataDebut = $dataDebut;
        $this->dateFin = $dateFin;
        $this->idclient = $idclient;
        $this->idroom = $idroom;
    }

    public function insertReservation($tableName, $conn)
    {
        $query = "INSERT INTO $tableName (`dataDebut`, `dateFin`, `idC`, `idR`) VALUES ('$this->dataDebut','$this->dateFin','$this->idclient','$this->idroom')";
        if (mysqli_query($conn, $query)) {
            self::$successMsg = "Reservation added successfully";
        } else {
            self::$errorMsg = "Error adding reservation: " . mysqli_error($conn);
            die(self::$errorMsg);
        }
    }

    public static function selectAllReservations($tableName, $conn)
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
}
