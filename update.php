<?php

$nameValue = "";
$emailValue = "";
$adressValue = "";
$pincodeValue = "";
$phonenumValue = "";
$dobValue = "";
$errorMessage = "";
$successMessage = "";

include "connection.php";
$connection = new Connection();
$connection->selectDatabase("myhotel");
include "client.php";

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $id = $_GET['id'];
    $row = Client::selectClientById("users_info", $connection->conn, $id);
    $nameValue = $row['name'];
    $emailValue = $row['email'];
    $adressValue = $row['adress'];
    $pincodeValue = $row['pincode'];
    $phonenumValue = $row['phonenum'];
    $dobValue = $row['dob'];
} else if (isset($_POST['submit'])) {
    $emailValue = $_POST['email'];
    $nameValue = $_POST['name'];
    $adressValue = $_POST['adress'];
    $pincodeValue = $_POST['pincode'];
    $phonenumValue = $_POST['phonenum'];
    $dobValue = $_POST['dob'];
    $passwordValue = "";


    if (empty($emailValue) || empty($nameValue) || empty($adressValue) || empty($pincodeValue) || empty($phonenumValue) || empty($dobValue)) {
        $errorMessage = "Please fill all fields";
    } else {
        $client = new Client($nameValue, $emailValue, $adressValue, $pincodeValue, $phonenumValue, $dobValue, $passwordValue);
        $client->updateClient($client, "users_info", $connection->conn, $_GET['id']);
        $successMessage = "Client updated successfully";
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>
    <?php require("links.php") ?>
</head>

<body>
    <div class="bg-secondary container-fluid">
        <h2 class="p-4 text-white">UPDATE USER</h2>
    </div>
    <div class="container my-5 ">



        <?php

        if (!empty($errorMessage)) {
            echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
  <strong>$errorMessage</strong>
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
  </button>
  </div>";
        }
        ?>

        <br>
        <form method="post">
            <div class="row mb-3">
                <label class="col-form-label col-sm-2">Name:</label>
                <div class="col-sm-6">
                    <input value="<?php echo $nameValue ?>" class="form-control" type="text" name="name">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-form-label col-sm-2">Email:</label>
                <div class="col-sm-6">
                    <input value="<?php echo $emailValue ?>" class="form-control" type="email" name="email">
                </div>
            </div>
            <div class="row mb-3 ">
                <label class="col-form-label col-sm-2">Phone number:</label>
                <div class="col-sm-6">
                    <input value=" <?php echo $phonenumValue ?>" class="form-control" type="text" name="phonenum">
                </div>
            </div>
            <div class="row mb-3 ">
                <label class="col-form-label col-sm-2">Adress:</label>
                <div class="col-sm-6">
                    <input value=" <?php echo $adressValue ?>" class="form-control" type="text" name="adress">
                </div>
            </div>
            <div class="row mb-3 ">
                <label class="col-form-label col-sm-2">Pincode:</label>
                <div class="col-sm-6">
                    <input value=" <?php echo $pincodeValue ?>" class="form-control" type="text" name="pincode">
                </div>
            </div>
            <div class="row mb-3 ">
                <label class="col-form-label col-sm-2">Date of Birth:</label>
                <div class="col-sm-6">
                    <input value=" <?php echo $dobValue ?>" class="form-control" type="text" name="dob">
                </div>
            </div>


            <?php
            if (!empty($successMessage)) {
                echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
<strong>$successMessage</strong>
<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
</button>
</div>";
            }
            ?>


            <div class="row mb-3 mt-5">
                <div class="offset-sm-1 col-sm-3 d-grid">
                    <button name="submit" type="submit" class=" btn btn-success">Update</button>
                </div>
                <div class="col-sm-1 col-sm-3 d-grid">
                    <a class="btn btn-outline-danger" href="listClient.php">Cancel</a>
                </div>
            </div>
        </form>

    </div>

    <?php require("scriptLinks.php") ?>
</body>

</html>