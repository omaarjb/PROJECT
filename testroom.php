<?php

include "connection.php";
include "roomBook.php";

$connection = new Connection();
$connection->selectDatabase("myHotel");
$room = new room();
$row1 = room::selectRoomById("rooms", $connection->conn, 1);

echo "$row1[category]  $row1[price] ";
