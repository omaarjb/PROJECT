<?php
include "connection.php";
$connection = new Connection();
$connection->selectDatabase("myHotel");
$errorMessage = "";

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = "SELECT * FROM admin WHERE name = ?";
    $result = $connection->selectt($query, "s", [$username], $connection->conn);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            if (password_verify($password, $row['password'])) {
                header("Location: listClient.php");
                exit();
            } else {
                $errorMessage = "Wrong password";
            }
        } else {
            $errorMessage = "Wrong username";
        }
    } else {
        $errorMessage = "Error executing the query";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Login</title>
    <?php include "links.php" ?>
    <style>
        body {
            background-color: #f8f9fa;
        }

        .login-container {
            max-width: 400px;
            margin: auto;
            margin-top: 100px;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .login-container h2 {
            text-align: center;
            color: #007bff;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-control {
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <?php
    if (!empty($errorMessage)) {
        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
        <strong>Error !</strong> $errorMessage
        <button type='button' class='btn-close shadow-none' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
    }
    ?>

    <div class="container login-container">
        <h2>Admin Login</h2>
        <form method="post">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control shadow-none" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control shadow-none" id="password" name="password" required>
            </div>
            <button type="submit" name="login" class="btn btn-primary mx-auto d-block">Login</button>
        </form>
    </div>

    <?php include "scriptLinks.php" ?>
</body>

</html>