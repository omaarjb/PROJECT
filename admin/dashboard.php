<?php
require("functions.php");
loggedIN();
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
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark ">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                        <li>
                            <a href="dashboard.php" class="nav-link px-0 align-middle text-white mb-3">
                                <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline">Dashboard</span> </a>
                        </li>
                        <li>
                            <a href="settings.php" class="nav-link align-middle px-0 text-white mb-3">
                                <i class="fs-4 bi bi-gear-fill"></i> <span class="ms-1 d-none d-sm-inline">Settings</span>
                            </a>
                        </li>

                        <li>
                            <a href="#" class="nav-link px-0 align-middle text-white mb-3">
                                <i class="fs-4 bi bi-people-fill "></i> <span class="ms-1 d-none d-sm-inline">Users</span></a>
                        </li>

                        <li>
                            <a href="#" class="nav-link px-0 align-middle text-white">
                                <i class="fs-4 fa-solid fa-person-shelter"></i> <span class="ms-1 d-none d-sm-inline">Rooms</span> </a>
                        </li>

                    </ul>
                    <hr>

                </div>
            </div>
            <div class="col py-3">

            </div>
        </div>
    </div>
    <?php
    require("scriptLinks.php");
    ?>
</body>

</html>