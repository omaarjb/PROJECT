<?php

class room
{
    public $roomId;
    public $roomType;
    public $roomPrice;
    public $availableRoom;




    static function selectRoomById($tableName, $conn, $id)
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

    static function selectAllRooms($tableName, $conn)
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

    static function selectDistinctFloors($conn)
    {
        $query = "SELECT DISTINCT etage FROM rooms";
        $result = mysqli_query($conn, $query);
        $floors = array();

        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $floors[] = $row['etage'];
            }
        }

        return $floors;
    }

    static function selectRoomIdByCategoryAndFloor($conn, $categoryId, $floor)
    {
        $query = "SELECT id FROM rooms WHERE idCategory = $categoryId AND etage = '$floor'  LIMIT 1";
        $result = mysqli_query($conn, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            return $row['id'];
        }

        return null;
    }

    static function updateRoomStatus($conn, $roomId, $status)
    {
        $query = "UPDATE rooms SET status = '$status' WHERE id = $roomId";
        $result = mysqli_query($conn, $query);

        return $result;
    }

    static function selectRoomStatus($conn, $roomId)
    {
        $query = "SELECT status FROM rooms WHERE id = $roomId";
        $result = mysqli_query($conn, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            return $row['status'];
        }

        return null;
    }
}
