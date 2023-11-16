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
                <h2 class="mb-4">SETTINGS</h2>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-3">General Settings</h5>
                        <h6 class="card-subtitle mb-1 text-body-secondary">Website Title</h6>
                        <p id="site_title"></p>
                        <h6 class="card-subtitle mb-1 text-body-secondary">About Us</h6>
                        <p id="site_about"></p>
                        <button type="button" class="btn btn-success shadow-none " data-bs-toggle="modal" data-bs-target="#gs">
                            EDIT
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="gs" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form>
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title fs-5">General Settings</h5>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Website Title</label>
                            <input name="site_title" type="email" id="site_title_inp" class="form-control shadow-none">
                        </div>
                        <div>
                            <label class="form-label">About Us</label>
                            <textarea name="site_about" class="form-control mb-2 shadow-none" id="site_about_inp"></textarea>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal" onclick="site_title.value=general_data.site_title ; site_about.value=general_data.site_about">Cancel</button>
                        <button type="button" class="btn btn-success btn-sm" onclick="update_general(site_title.value,site_about.value)">Submit</button>
                    </div>
                </div>
            </form>

        </div>
    </div>

    <?php
    require("scriptLinks.php");
    ?>

    <script>
        let general_data;

        function get_general() {
            let site_title = document.getElementById("site_title");
            let site_about = document.getElementById("site_about");

            let site_title_inp = document.getElementById("site_title_inp");
            let site_about_inp = document.getElementById("site_about_inp");

            let xhr = new XMLHttpRequest(); // jib data mn server - sift data-update..
            xhr.open("POST", "ajax/settings_crud.php", true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');


            xhr.send('get_general');

            xhr.onload = function() {
                general_data = JSON.parse(this.responseText); // katsavi response li wslatk men server
                site_title.innerText = general_data.site_title;
                site_about.innerText = general_data.site_about;

                site_title_inp.value = general_data.site_title;
                site_about_inp.value = general_data.site_about;
                // console.log(general_data.site_about);
            }
        }

        function update_general(site_title_val, site_about_val) {
            let xhr = new XMLHttpRequest(); // jib data mn server - sift data-update..
            xhr.open("POST", "ajax/settings_crud.php", true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');


            xhr.send('site_title=' + site_title_val + '&site_about=' + site_about_val + '&update_general');


            xhr.onload = function() {
                console.log(this.responseText);
                // general_data = JSON.parse(this.responseText); // katsavi response li wslatk men server
                // site_title.innerText = general_data.site_title;
                // site_about.innerText = general_data.site_about;

                // site_title_inp.value = general_data.site_title;
                // site_about_inp.value = general_data.site_about;
                // console.log(general_data.site_about);
            }
        }
        window.onload = function() {
            get_general();
        }
    </script>
</body>

</html>