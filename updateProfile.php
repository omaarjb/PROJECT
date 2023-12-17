<?php

$nameValue = "";
$emailValue = "";
$adressValue = "";
$pincodeValue = "";
$phonenumValue = "";
$dobValue = "";
$newPassValue = "";
$confirmNewPassValue = "";
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
    $newPassValue = $_POST['newpass'];
    $confirmNewPassValue = $_POST['cnewpass'];
    $emailValue = $_POST['email'];
    $nameValue = $_POST['name'];
    $adressValue = $_POST['adress'];
    $pincodeValue = $_POST['pincode'];
    $phonenumValue = $_POST['phonenum'];
    $dobValue = $_POST['dob'];

    $passwordValue = "";

    if (empty($emailValue) || empty($nameValue) || empty($adressValue) || empty($pincodeValue) || empty($phonenumValue) || empty($dobValue) || empty($newPassValue) || empty($confirmNewPassValue)) {
        $errorMessage = "Please fill all fields";
    } else if ($newPassValue != $confirmNewPassValue) {
        $errorMessage = "Passwords do not match";
    } else {
        $passwordValue = password_hash($newPassValue, PASSWORD_DEFAULT);
        $client = new Client($nameValue, $emailValue, $adressValue, $pincodeValue, $phonenumValue, $dobValue, $passwordValue);
        $client->updateClient($client, "users_info", $connection->conn, $_GET['id']);
        $successMessage = "Informations are updated successfully";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <?php require("links.php") ?>
    <style>
        .alert {
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <div class="container-fluid bg-dark">
        <h2 class="p-5 text-center text-white myProfile">My Profile</h2>
    </div>

    <div class="container mt-5">
        <div class="col-12 mb-5 px-4">
            <div class="bg-white p3 p-md-4 rounded shadow">
                <?php
                if (!empty($errorMessage)) {
                    echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                    <strong>$errorMessage</strong>
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                  </div>";
                }
                ?>
                <form action="" method="post">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="firstName">First name</label>
                            <input type="text" class="form-control shadow-none" value="<?php echo $nameValue ?>" name="name">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="lastName">Email</label>
                            <input type="text" class="form-control shadow-none" value="<?php echo $emailValue ?>" name="email">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="lastName">Phone number</label>
                            <input type="text" class="form-control shadow-none" value="<?php echo $phonenumValue ?>" name="phonenum">

                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="lastName">Address</label>
                            <input type="text" class="form-control shadow-none" value="<?php echo $adressValue ?>" name="adress">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="lastName">Postal Code</label>
                            <input type="text" class="form-control shadow-none" value="<?php echo $pincodeValue ?>" name="pincode">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="lastName">Date of birth</label>
                            <input type="text" class="form-control shadow-none" value="<?php echo $dobValue ?>" name="dob">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="lastName">New password</label>
                            <input type="text" class="form-control shadow-none" value="" name="newpass">

                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="lastName">Confirm new password</label>
                            <input type="text" class="form-control shadow-none" value="" name="cnewpass">
                        </div>
                    </div>
                    <?php
                    if (!empty($successMessage)) {
                        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                        <strong>$successMessage</strong>
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
                    }
                    ?>
                    <div class="row mb-3 mt-5">
                        <div class="offset-sm-1 col-sm-3 d-grid">
                            <button name="submit" type="submit" class="btn btn-success">Update Profile</button>
                        </div>
                        <div class="col-sm-1 col-sm-3 d-grid">
                            <a class="btn btn-danger" href="HOMEE.php">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>




    <!-- <div class="container my-5">
        <?php
        if (!empty($errorMessage)) {
            echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                    <strong>$errorMessage</strong>
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                  </div>";
        }
        ?>
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
                    <input value="<?php echo $phonenumValue ?>" class="form-control" type="text" name="phonenum">
                </div>
            </div>
            <div class="row mb-3 ">
                <label class="col-form-label col-sm-2">Address:</label>
                <div class="col-sm-6">
                    <input value="<?php echo $adressValue ?>" class="form-control" type="text" name="adress">
                </div>
            </div>
            <div class="row mb-3 ">
                <label class="col-form-label col-sm-2">Pincode:</label>
                <div class="col-sm-6">
                    <input value="<?php echo $pincodeValue ?>" class="form-control" type="text" name="pincode">
                </div>
            </div>
            <div class="row mb-3 ">
                <label class="col-form-label col-sm-2">Date of Birth:</label>
                <div class="col-sm-6">
                    <input value="<?php echo $dobValue ?>" class="form-control" type="text" name="dob">
                </div>
            </div>
            <div class="row mb-3 ">
                <label class="col-form-label col-sm-2">New password:</label>
                <div class="col-sm-6">
                    <input value="" class="form-control" type="text" name="newpass">
                </div>
            </div>
            <div class="row mb-3 ">
                <label class="col-form-label col-sm-2">Confirm new password:</label>
                <div class="col-sm-6">
                    <input value="" class="form-control" type="text" name="cnewpass">
                </div>
            </div>

            <?php
            if (!empty($successMessage)) {
                echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                        <strong>$successMessage</strong>
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
            }
            ?>
            <div class="row mb-3 mt-5">
                <div class="offset-sm-1 col-sm-3 d-grid">
                    <button name="submit" type="submit" class="btn btn-success">Update Profile</button>
                </div>
                <div class="col-sm-1 col-sm-3 d-grid">
                    <a class="btn btn-danger" href="HOMEE.php">Cancel</a>
                </div>
            </div>
        </form>
    </div> -->
    <?php require("footer.php") ?>
    <?php require("scriptLinks.php") ?>
</body>

</html>