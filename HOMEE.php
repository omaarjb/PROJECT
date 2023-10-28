<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="home.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Agbalumo&display=swap" rel="stylesheet">
    <title>Document</title>
</head>

<body>


    <nav class="navbar navbar-expand-lg bg-body-tertiary py-lg-3 px-lg-3 shadow-sm sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand " href="home.php">OjB Hotel</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active me-2" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link me-2" href="#">Rooms</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link me-2" href="#">Facilities</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link me-2" href="#">Contact us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="#">About us</a>
                    </li>
                </ul>
                <div class="d-flex ">
                    <button type="button" class="btn btn-outline log-btn shadow-non me-2 px-4" data-bs-toggle="modal" data-bs-target="#loginModal">
                        Login
                    </button><button type="button" class="btn btn-outline log-btn shadow-non me-2 px-4" data-bs-toggle="modal" data-bs-target="#registerModal">
                        Register
                    </button>
                </div>
            </div>
    </nav>


    <div class="modal fade" id="loginModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="">
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
                            <input type="email" class="form-control shadow-none" placeholder="Email adress" ">
                        </div>
                        <div class=" input-group mb-3">
                            <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                            <input type="password" class="form-control shadow-none" placeholder="Password" id="password">
                            <span class="input-group-text">
                                <i class="fa fa-eye" id="togglePassword" style="cursor: pointer"></i>
                            </span>
                        </div>
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
                <form action="">
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
                                        <input type="text" class="form-control shadow-none" placeholder="Name">
                                    </div>
                                </div>
                                <div class=" col-md-6">
                                    <div class="input-group mb-3">
                                        <input type="email" class="form-control shadow-none" placeholder="Email Adress">
                                    </div>
                                </div>
                                <div class=" col-md-6">
                                    <div class="input-group mb-3">
                                        <input type="number" class="form-control shadow-none" placeholder="Phone Number">
                                    </div>
                                </div>
                                <div class=" col-md-6">
                                    <div class="input-group mb-3">
                                        <input type="file" class="form-control shadow-none">
                                    </div>
                                </div>
                                <div class=" col-md-12">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control shadow-none" placeholder="Adress">
                                    </div>
                                </div>
                                <div class=" col-md-6">
                                    <div class="input-group mb-3">
                                        <input type="number" class="form-control shadow-none" placeholder="Postal Code">
                                    </div>
                                </div>
                                <div class=" col-md-6">
                                    <div class="input-group mb-3">
                                        <input type="date" class="form-control shadow-none" placeholder="Date Of Birth">
                                    </div>
                                </div>
                                <div class=" col-md-6">
                                    <div class="input-group mb-3">
                                        <input type="password" class="form-control shadow-none" placeholder="Password">
                                    </div>
                                </div>
                                <div class=" col-md-6">
                                    <div class="input-group mb-3">
                                        <input type="password" class="form-control shadow-none" placeholder="Confirm Password">
                                    </div>
                                </div>

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

    <div class="">
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img src="img/3.jpg" />
                </div>
                <div class="swiper-slide">
                    <img src="img/0.jpg" />
                </div>
                <div class="swiper-slide">
                    <img src="img/4.jpg" />
                </div>
                <div class="swiper-slide">
                    <img src="img/5.webp" />
                </div>
                <div class="swiper-slide">
                    <img src="img/6.jpg" />
                </div>
                <div class="swiper-slide">
                    <img src="img/7.jpg" />
                </div>
                <div class="swiper-slide">
                    <img src="img/8.jpg" />
                </div>

            </div>

        </div>
    </div>


    <script src="index.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script>
        var swiper = new Swiper(".mySwiper", {
            spaceBetween: 30,
            effect: "fade",
            autoplay: {
                delay: 2100,
                disableOnInteraction: false,
            },

        });
    </script>
</body>

</html>