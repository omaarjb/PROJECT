<?php

include "client.php";

$nameValue = "";
$emailValue = "";
$phoneValue = "";
$adressValue = "";
$pincodeValue = "";
$dobValue = "";
$passValue = "";
$cpassValue = "";
$errorMesseage = "";
$successMesseage = "";

if (isset($_POST['register'])) {
    $nameValue = $_POST['name'];
    $emailValue = $_POST['email'];
    $phoneValue = $_POST['phonenum'];
    $adressValue = $_POST['adress'];
    $pincodeValue = $_POST['pincode'];
    $dobValue = $_POST['dob'];
    $passValue = $_POST['pass'];
    $cpassValue = $_POST['cpass'];

    if (strlen($passValue) < 6) {
        $errorMesseage = "Password must conatin at least 6 characters";
    } else if ($passValue != $cpassValue) {
        $errorMesseage = "Password and Confirm Password not match";
    } else {

        $client = new Client($_POST['name'], $_POST['email'], $_POST['adress'], $_POST['phonenum'], $_POST['pincode'], $_POST['dob'], $_POST['pass']);

        $query = "SELECT * FROM users_info WHERE email=? OR phonenum=?"; // query dyal select
        $values = [$_POST['email'], $_POST['phonenum']]; // values
        $exist = $client->select($query, "ss", $values, $connection->conn); // katjib rows li kayna f database
        if (mysqli_num_rows($exist) > 0) { // katchof wach kayn had row
            $exist_fetch = mysqli_fetch_assoc($exist);
            if ($exist_fetch['email'] == $_POST['email']) {
                $errorMesseage = "Email already exists";
            } else if ($exist_fetch['phonenum'] == $_POST['phonenum']) {
                $errorMesseage = "Phone number already exists";
            }
        } else {
            $client->insertClient("users_info", $connection->conn);
            if (Client::$errorMsg != "") {
                $errorMesseage = Client::$errorMsg;
            } else {
                $successMesseage = Client::$successMsg;
            }
        }
    }

    // $nameValue = "";
    // $emailValue = "";
    // $phoneValue = "";
    // $adressValue = "";
    // $pincodeValue = "";
    // $dobValue = "";
    // $passValue = "";
    // $cpassValue = "";
}


if (isset($_POST['login'])) {



    $query = "SELECT * FROM users_info WHERE email=? OR phonenum=?";
    $values = [$_POST['email_phone'], $_POST['email_phone']];
    $exist = $connection->selectt($query, "ss", $values, $connection->conn);

    if (mysqli_num_rows($exist) == 0) {
        $errorMesseage = "Email or Phone number doesn't exist !";
    } else {
        $exist_fetch = mysqli_fetch_assoc($exist);
        if (!password_verify($_POST['pass'], $exist_fetch['password'])) {
            $errorMesseage = "Password not correct"; // katverifier password
        } else {
            $_SESSION['login'] = true; // session variable
            $_SESSION['userId'] = $exist_fetch['id'];
            $_SESSION['userName'] = $exist_fetch['name'];
            $_SESSION['userPhone'] = $exist_fetch['phonenum'];
            $successMesseage = "Welcome " . $_SESSION['userName'] . " !";
        }
    }
}





?>




<div id="registerNotif">
    <?php
    if (!empty($errorMesseage)) {
        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
        <strong>Error !</strong> $errorMesseage
        <button type='button' class='btn-close shadow-none' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
    } else if (!empty($successMesseage)) {
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
        <strong>Success !</strong> $successMesseage
        <button type='button' class='btn-close shadow-none' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
    }
    ?>

</div>

<nav class="navbar navbar-expand-lg  py-lg-3 px-lg-3 shadow-sm sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand " href="HOMEE.php">OjB Hotel</a>
        <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <ul class="navbar-nav m-auto">
                <li class="nav-item">
                    <a class="nav-link active me-2 " href="HOMEE.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2 " href="HOMEE.php#rooms">Rooms</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2 " href="HOMEE.php#facilities">Facilities</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2 " href="HOMEE.php#contactUs">Contact us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="aboutUs.php">About us</a>
                </li>
            </ul>
            <div class="d-flex ">
                <div class="d-flex align-items-center mx-2">
                    <i class="fa-regular fa-sun"></i>
                    <div>
                        <label class="theme-switch" for="checkbox">
                            <input type="checkbox" id="checkbox" />
                            <div class="slider"></div>
                        </label>
                    </div>
                    <i class="fa-solid fa-moon"></i>

                </div>
                <?php

                if (isset($_SESSION['login']) && $_SESSION['login'] == true) { // katverifier session wach khdama
                    echo " <div class='btn-group'>
                    <button type='button' class='btn  dropdown-toggle shadow-none' data-bs-toggle='dropdown' data-bs-display='static' aria-expanded='false'>
                    <i class='fa-solid fa-user mx-2 log-drop'></i>
                     <span class='log-drop'>$_SESSION[userName]<span/> 
                    </button>
                    <ul class='dropdown-menu dropdown-menu-lg-end'>
                      <li><a class='dropdown-item' href='updateProfile.php?id=$_SESSION[userId]'>Profile</a></li>
                      <li><a class='dropdown-item' href='bookings.php'>Bookings</a></li>
                      <li><a class='dropdown-item' href='logout.php'>Logout</a></li>
                    </ul>
                  </div>";
                } else {
                    echo " <button type='button' class='btn btn-outline log-btn shadow-non me-2 px-5' data-bs-toggle='modal' data-bs-target='#loginModal'>
                    Login
                </button><button type='button' class='btn btn-outline log-btn shadow-non me-2 px-5' data-bs-toggle='modal' data-bs-target='#registerModal'>
                    Register
                </button>";
                }

                ?>

            </div>
        </div>
</nav>


<div class="modal fade" id="loginModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="login-form" action="" method="post">
                <div class="modal-header">
                    <h4 class="modal-title ">
                        <i class="bi bi-person-circle"></i>
                        User Login
                    </h4>
                    <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="bi bi-envelope-open-fill"></i></span>
                        <input type="text" class="form-control shadow-none" placeholder="Email adress or Phone number" name="email_phone" value="<?php echo (isset($_POST['email_phone']) ? $_POST['email_phone'] : '')  ?>" required>
                    </div>
                    <span style="color: red;" id="emailErrorLog"></span>
                    <div class=" input-group mb-3">
                        <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                        <input type="password" id="password" class="form-control shadow-none" placeholder="Password" name="pass" value="<?php echo (isset($_POST['pass']) ? $_POST['pass'] : '') ?>" required>
                        <span class="input-group-text">
                            <i class="fa fa-eye" id="togglePassword" style="cursor: pointer"></i>
                        </span>
                    </div>
                    <span style="color: red;" id="passErrorLog"></span>
                    <div class="text-center">
                        <button type="submit" name="login" class="btn btn-dark shadow-none sign-btn px-4 py-2">SIGN IN</button>
                    </div>
                    <div class="d-flex justify-content-end ">
                        <a class="text-decoration-none text-secondary" href="javascript: void(0)">Forgot Password ?</a>
                    </div>

                </div>

            </form>

        </div>
    </div>
</div>

<div class="modal fade" id="registerModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="register-form" method="post">
                <div class="modal-header">
                    <h4 class="modal-title ">
                        <i class="bi bi-person-vcard"></i>
                        User Registration
                    </h4>
                    <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <span class="badge rounded-pill text-bg-light px-5 py-3 text-wrap">Please complete all fields carefully ! your picture must match your Id card.</span>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control shadow-none" placeholder="Name" name="name" value="<?php echo (isset($_POST['name']) ? $_POST['name'] : '')  ?>" required>
                                </div>
                            </div>
                            <div class=" col-md-6">
                                <div class="input-group mb-3">
                                    <input type="email" class="form-control shadow-none" placeholder="Email Adress" name="email" value="<?php echo (isset($_POST['email']) ? $_POST['email'] : '')  ?>" required>
                                </div>

                            </div>
                            <div class=" col-md-6">
                                <div class="input-group mb-3">
                                    <input type="number" class="form-control shadow-none" placeholder="Phone Number" name="phonenum" value="<?php echo (isset($_POST['phonenum']) ? $_POST['phonenum'] : '')  ?>" required>
                                </div>
                            </div>
                            <span style="color: red;" id="phoneError"></span>
                            <div class=" col-md-12">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control shadow-none" placeholder="Adress" name="adress" value="<?php echo (isset($_POST['adress']) ? $_POST['adress'] : '')  ?>" required>
                                </div>
                            </div>
                            <div class=" col-md-6">
                                <div class="input-group mb-3">
                                    <input type="number" class="form-control shadow-none" placeholder="Postal Code" name="pincode" value="<?php echo (isset($_POST['pincode']) ? $_POST['pincode'] : '')  ?>" required>
                                </div>
                            </div>
                            <div class=" col-md-6">
                                <div class="input-group mb-3">
                                    <input type="date" class="form-control shadow-none" placeholder="Date Of Birth" name="dob" value="<?php echo (isset($_POST['dob']) ? $_POST['dob'] : '')  ?>" required>
                                </div>
                            </div>
                            <div class=" col-md-6">
                                <div class="input-group mb-3">
                                    <input type="password" class="form-control shadow-none" placeholder="Password" name="pass" value="<?php echo (isset($_POST['pass']) ? $_POST['pass'] : '')  ?>" required>

                                </div>
                            </div>
                            <div class=" col-md-6">
                                <div class="input-group mb-3">
                                    <input type="password" class="form-control shadow-none" placeholder="Confirm Password" name="cpass" value="<?php echo (isset($_POST['cpass']) ? $_POST['cpass'] : '')  ?>" required>

                                </div>
                            </div>
                            <span style="color: red;" id="passError"></span>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" id="reg" name="register" class="btn btn-dark shadow-none sign-btn px-4 py-2">Register</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>