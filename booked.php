<?php
session_start();
include "connection.php";
$connection = new Connection();
$connection->selectDatabase("myHotel");
include "reservation.php";
include "roomBook.php";

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $roomId = $_GET['roomId'];
    $userId = $_GET['userId'];
    $dateDebut = $_GET['checkInDate'];
    $dateFin = $_GET['checkOutDate'];

    room::updateRoomStatus($connection->conn, $roomId, 'booked');

    $reservation = new reservation($dateDebut, $dateFin, $userId, $roomId);
    $reservation->insertReservation("reservation", $connection->conn);
    header("Location: confirmation.php");
    exit;
}
