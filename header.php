<div id="registerSuccess"></div>
<nav class="navbar navbar-expand-lg bg-dark py-lg-3 px-lg-3 shadow-sm sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand " href="HOMEE.php">OjB Hotel</a>
        <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <ul class="navbar-nav m-auto">
                <li class="nav-item">
                    <a class="nav-link active me-2 text-white" href="HOMEE.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2 text-white" href="HOMEE.php#rooms">Rooms</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2 text-white" href="HOMEE.php#facilities">Facilities</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2 text-white" href="HOMEE.php#contactUs">Contact us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="aboutUs.php">About us</a>
                </li>
            </ul>
            <div class="d-flex ">
                <?php
                if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
                    echo " <div class='btn-group'>
                    <button type='button' class='btn btn-outline-light dropdown-toggle shadow-none' data-bs-toggle='dropdown' data-bs-display='static' aria-expanded='false'>
                    <i class='fa-solid fa-user mx-2'></i>
                      $_SESSION[userName]
                    </button>
                    <ul class='dropdown-menu dropdown-menu-lg-end'>
                      <li><a class='dropdown-item' href='profile.php'>Profile</a></li>
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
            <form id="login-form" action="">
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
                        <input type="text" class="form-control shadow-none" placeholder="Email adress or Phone number" name="email_phone" required>
                    </div>
                    <span style="color: red;" id="emailErrorLog"></span>
                    <div class=" input-group mb-3">
                        <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                        <input type="password" id="password" class="form-control shadow-none" placeholder="Password" name="pass" required>
                        <span class="input-group-text">
                            <i class="fa fa-eye" id="togglePassword" style="cursor: pointer"></i>
                        </span>
                    </div>
                    <span style="color: red;" id="passErrorLog"></span>
                    <div class="text-center">
                        <button type="submit" class="btn btn-dark shadow-none sign-btn px-4 py-2">SIGN IN</button>
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
                                    <input type="text" class="form-control shadow-none" placeholder="Name" name="name" required>
                                </div>
                            </div>
                            <div class=" col-md-6">
                                <div class="input-group mb-3">
                                    <input type="email" class="form-control shadow-none" placeholder="Email Adress" name="email" required>
                                </div>
                                <span style="color: red;" id="emailError"></span>
                            </div>
                            <div class=" col-md-6">
                                <div class="input-group mb-3">
                                    <input type="number" class="form-control shadow-none" placeholder="Phone Number" name="phonenum" required>
                                </div>
                            </div>
                            <span style="color: red;" id="phoneError"></span>
                            <div class=" col-md-12">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control shadow-none" placeholder="Adress" name="adress" required>
                                </div>
                            </div>
                            <div class=" col-md-6">
                                <div class="input-group mb-3">
                                    <input type="number" class="form-control shadow-none" placeholder="Postal Code" name="pincode" required>
                                </div>
                            </div>
                            <div class=" col-md-6">
                                <div class="input-group mb-3">
                                    <input type="date" class="form-control shadow-none" placeholder="Date Of Birth" name="dob" required>
                                </div>
                            </div>
                            <div class=" col-md-6">
                                <div class="input-group mb-3">
                                    <input type="password" class="form-control shadow-none" placeholder="Password" name="pass" required>

                                </div>
                            </div>
                            <div class=" col-md-6">
                                <div class="input-group mb-3">
                                    <input type="password" class="form-control shadow-none" placeholder="Confirm Password" name="cpass" required>
                                </div>
                            </div>
                            <span style="color: red;" id="passError"></span>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-dark shadow-none sign-btn px-4 py-2">Register</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>