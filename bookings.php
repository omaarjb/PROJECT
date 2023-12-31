<?php
session_start();
include "connection.php";
$connection = new Connection();
$connection->selectDatabase("myhotel");
include "reservation.php";
$reservation = new reservation("", "", "", "");
$userId = $_SESSION['userId'];

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    include "roomBook.php";
    $idRoom = $_POST['idRoom'];
    room::updateRoomStatus($connection->conn, $idRoom, 'available');
    $reservation->deleteReservationByRoom("reservation", $connection->conn, $userId, $idRoom);
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require "links.php" ?>
    <title>My bookings</title>
</head>

<body>
    <?php require "header.php" ?>
    <div class="container mt-5">


        <div class="row g-3">
            <?php
            $res = $reservation::selectReservationsRoomsByUserId($connection->conn, $userId);
            foreach ($res as $row) {
            ?>

                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 shadow checkRoom" style="max-width: 350px; margin:auto;">
                        <div class="card-body">
                            <form method="post">
                                <input type="hidden" name="idRoom" value=<?php echo $row['idR'] ?>>
                                <h5><?php echo $row['description'] ?></h5>
                                <h6>Room N° : <?php echo $row['idR'] ?></h6>
                                <h6>Floor : <?php echo $row['etage'] ?></h6>
                                <h6>Check in date : <?php echo $row['dataDebut'] ?></h6>
                                <h6>Check out date : <?php echo $row['dateFin'] ?></h6>
                                <div class="d-flex justify-content-center mt-3">
                                    <button type="submit" class="btn btn-danger" name="Check Out">Check Out</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            <?php } ?>
        </div>
    </div>

    <?php require "footer.php" ?>
    <?php require "scriptLinks.php" ?>
</body>

</html>