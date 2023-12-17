<?php
session_start();
include "roomBook.php";
include "category.php";
include "connection.php";
$connection = new Connection();
$connection->selectDatabase("myHotel");
$room = new room();
$category = new category();



if (isset($_GET['bookNow'])) {
    $checkInDate = $_GET['checkInDate'];
    $checkOutDate = $_GET['checkOutDate'];
    $categoryId = $_GET['categoryId'];
    $selectedFloor = $_GET['etage'];
    $userId = $_SESSION['userId'];
    $userName = $_SESSION['userName'];
    $roomId = room::selectRoomIdByCategoryAndFloor($connection->conn, $categoryId, $selectedFloor);

    if ($roomId) {
        $roomStatus = room::selectRoomStatus($connection->conn, $roomId);
        if ($roomStatus !== 'booked') {
            $category = Category::selectCategoryById("category", $connection->conn, $categoryId);
        } else {
            echo "<script>alert('Sorry, the selected room is already booked. Please choose another room.');</script>";
            exit;
        }
    } else {
        echo "No available room found for the selected category and floor.";
        exit;
    }
} else {
    echo "Form not submitted.";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require "links.php" ?>
    <title>Document</title>
</head>

<body>

    <?php require "header.php" ?>
    <h2 class="text-center booked_room mt-5">Booking Details</h2>

    <div class="container mt-5">
        <table class="table booked_room">
            <thead>
                <tr>
                    <th>Client Name</th>
                    <th>Room Category</th>
                    <th>Room Price</th>
                    <th>Floor</th>
                    <th>CheckInDate</th>
                    <th>CheckOutDate</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th><?php echo $userName ?></th>
                    <td><?php echo $category['description'] ?></td>
                    <td><?php echo "$category[price]$" ?></td>
                    <td><?php echo $selectedFloor ?></td>
                    <td><?php echo $checkInDate ?></td>
                    <td><?php echo $checkOutDate ?></td>
                    <td><?php echo "<a class='btn btn-success btn-sm' href='booked.php?roomId=$roomId&userId=$userId&checkInDate=$checkInDate&checkOutDate=$checkOutDate'>Accept</a>
                        <a class='btn btn-danger btn-sm' href='HOMEE.php'>Cancel</a>" ?>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>




    <?php require "footer.php" ?>
    <?php require "scriptLinks.php" ?>
</body>

</html>