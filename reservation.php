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

    static function selectReservationsByUserId($tableName, $conn, $userId)
    {
        $query = "SELECT * FROM $tableName WHERE idC = $userId";
        $result = mysqli_query($conn, $query);
        $reservations = array();

        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $reservations[] = $row;
            }
        }

        return $reservations;
    }


    static function selectReservationsRoomsByUserId($conn, $userId)
    {
        $query = "SELECT ro.etage,c.description,re.dataDebut,re.dateFin,re.idR
        FROM rooms ro,category c,reservation re
        WHERE re.idR=ro.id 
        AND re.idC=$userId
        AND ro.idCategory=c.idCategory";
        $result = mysqli_query($conn, $query);
        $reservations = array();

        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $reservations[] = $row;
            }
        }

        return $reservations;
    }

    public function deleteReservationByRoom($tableName, $conn, $userId, $idRoom)
    {
        $query = "DELETE FROM $tableName where idC=$userId AND idR=$idRoom";
        if (mysqli_query($conn, $query)) {
            self::$successMsg = "Reservation deleted successfully";
        } else {
            self::$errorMsg = "Error deleting reservation: " . mysqli_error($conn);
            die(self::$errorMsg);
        }
    }
}
