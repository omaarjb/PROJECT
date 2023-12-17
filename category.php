<?php

class Category
{

    static function selectCategoryById($tableName, $conn, $id)
    {
        $query = "SELECT * FROM $tableName WHERE idCategory=$id";
        $result = mysqli_query($conn, $query);
        $data = array();

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $data = $row;
        }

        return $data;
    }

    static function selectAllCatageory($tableName, $conn)
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
