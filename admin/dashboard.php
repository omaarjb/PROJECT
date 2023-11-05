<?php
session_start();
if (!(isset($_SESSION['adminLogin']) && $_SESSION['adminLogin'] == true)) {
    header("location: adminLogin.php"); //ila makantch session dyal admin-login khdama 
}
session_regenerate_id(true);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    require("links.php");
    ?>
    <title>Dashboard</title>
</head>

<body>

    <div class="conatiner-fluid bg-dark text-white p-3 d-flex justify-content-between align-items-center">
        <h3 class="mb-0">Admin Dashboard</h3>
        <a href="logout.php" class="btn btn-light btn-sm">LOG OUT</a>
    </div>
    <?php
    require("scriptLinks.php");
    ?>
</body>

</html>