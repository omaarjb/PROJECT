<?php
session_start();
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
            <p>Go check your bookings for more details</p>
        </div>
    </div>

    <?php require "footer.php" ?>
    <?php require "scriptLinks.php" ?>
</body>

</html>