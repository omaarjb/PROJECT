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
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require "links.php" ?>
    <title>Thank You for Your Reservation</title>
</head>

<body>
    <?php require "header.php" ?>
    <div class="container mt-5">
        <div class="alert alert-success text-center" role="alert">
            <h2>Thank You for Your Reservation!</h2>
            <p>Your booking details are as follows:</p>
        </div>


        <table class="table">
            <thead>
                <tr>
                    <th>Reservation ID</th>
                    <th>Check In Date</th>
                    <th>Check Out Date</th>
                    <th>Client Id</th>
                    <th>Room Id</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $res = $reservation::selectAllReservations("reservation", $connection->conn);

                foreach ($res as $row) {
                    echo " <tr>
                        <td>$row[idReservation]</td>
                        <td>$row[dataDebut]</td>
                        <td>$row[dateFin]</td>
                        <td>$row[idC]</td>
                        <td>$row[idR]</td>
                    </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <?php require "footer.php" ?>
    <?php require "scriptLinks.php" ?>
</body>

</html>