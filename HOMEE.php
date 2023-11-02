<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="indx.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Agbalumo&display=swap" rel="stylesheet">
    <title>Document</title>
</head>

<body>


    <nav class="navbar navbar-expand-lg bg-light py-lg-3 px-lg-3 shadow-sm sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand " href="HOMEE.php">OjB Hotel</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav m-auto">
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
                    <button type="button" class="btn btn-outline log-btn shadow-non me-2 px-5" data-bs-toggle="modal" data-bs-target="#loginModal">
                        Login
                    </button><button type="button" class="btn btn-outline log-btn shadow-non me-2 px-5" data-bs-toggle="modal" data-bs-target="#registerModal">
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

    <div class="pt-3">
        <div class="swiper mySwiper swiperSlide">
            <div class="swiper-wrapper">
                <div class="swiper-slide sw-slide">
                    <img src="img/3.jpg" />
                    <div class="slide-text">
                        <h1>Experience The Greatest For Your Holidays ...</h1>
                    </div>
                </div>
                <div class="swiper-slide sw-slide">
                    <img src="img/0.jpg" />
                    <div class="slide-text">
                        <h1>Experience The Greatest For Your Holidays ...</h1>
                    </div>
                </div>
                <div class="swiper-slide sw-slide">
                    <img src="img/4.jpg" />
                    <div class="slide-text">
                        <h1>Experience The Greatest For Your Holidays ...</h1>
                    </div>
                </div>
                <div class="swiper-slide sw-slide">
                    <img src="img/5.webp" />
                    <div class="slide-text">
                        <h1>Experience The Greatest For Your Holidays ...</h1>
                    </div>
                </div>
                <div class="swiper-slide sw-slide">
                    <img src="img/6.jpg" />
                    <div class="slide-text">
                        <h1>Experience The Greatest For Your Holidays ...</h1>
                    </div>
                </div>
                <div class="swiper-slide sw-slide">
                    <img src="img/7.jpg" />
                    <div class="slide-text">
                        <h1>Experience The Greatest For Your Holidays ...</h1>
                    </div>
                </div>
                <div class="swiper-slide sw-slide">
                    <img src="img/8.jpg" />
                    <div class="slide-text">
                        <h1>Experience The Greatest For Your Holidays ...</h1>
                    </div>
                </div>

            </div>

        </div>
    </div>

    <div class="container Avlibality">
        <div class="row">
            <div class="col-lg-12  p-4 check-av">
                <form action="">
                    <div class="row align-items-end">
                        <div class="col-lg-3 mb-3">
                            <label class="form-label fw-bold">Check-IN</label>
                            <input type="date" class="form-control shadow-none">
                        </div>
                        <div class="col-lg-3 mb-3">
                            <label class="form-label fw-bold">Check-Out</label>
                            <input type="date" class="form-control shadow-none">
                        </div>
                        <div class="col-lg-3 mb-3">
                            <label class="form-label fw-bold">Adult</label>
                            <select class="form-select shadow-none">
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="col-lg-2 mb-3">
                            <label class="form-label fw-bold">Children</label>
                            <select class="form-select shadow-none">
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="col-lg-1 mb-3">
                            <button type="submit" class="btn btn-success text-white shadow-none px-3  ">Check</button>
                        </div>


                    </div>
                </form>
            </div>

        </div>
    </div>


    <h2 class="text-center  fw-bold rTitle">Check Our Beautiful Rooms</h2>
    <div class="container">
        <div class="row g-3">
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow checkRoom" style="max-width: 350px; margin:auto;">
                    <img src="img/Rooms/1.webp" class="card-img-top">
                    <div class="card-body">
                        <h5>Single Room</h5>
                        <h6>150$/Per Night</h6>
                        <div class="features mb-4 mt-4">
                            <span class=" badge rounded-pill text-bg-secondary">1 Room</span>
                            <span class=" badge rounded-pill text-bg-secondary">1 Bedroom</span>
                            <span class=" badge rounded-pill text-bg-secondary">1 Bathroom</span>
                        </div>
                        <div class="d-flex justify-content-evenly">
                            <a href="#" class="btn btn-success">Book Now</a>
                            <a href="rooms.php" class="btn log-btn">More Details</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow checkRoom" style="max-width: 350px; margin:auto;">
                    <img src="img/Rooms/2.jpeg" class="card-img-top">
                    <div class="card-body">
                        <h5>Couple Room</h5>
                        <h6>250$/Per Night</h6>
                        <div class="features mb-4 mt-4">
                            <span class=" badge rounded-pill text-bg-secondary">2 Rooms</span>
                            <span class=" badge rounded-pill text-bg-secondary">1 Bedroom</span>
                            <span class=" badge rounded-pill text-bg-secondary">1 Bathroom</span>
                        </div>
                        <div class="d-flex justify-content-evenly">
                            <a href="#" class="btn btn-success">Book Now</a>
                            <a href="rooms.php" class="btn log-btn">More Details</a>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow checkRoom" style="max-width: 350px; margin:auto;">
                    <img src="img/Rooms/3.jpg" class="card-img-top">
                    <div class="card-body">
                        <h5>Family Room</h5>
                        <h6>300$/Per Night</h6>
                        <div class="features mb-4 mt-4">
                            <span class=" badge rounded-pill text-bg-secondary">3 Rooms</span>
                            <span class=" badge rounded-pill text-bg-secondary">2 Bedroom</span>
                            <span class=" badge rounded-pill text-bg-secondary">2 Bathroom</span>
                        </div>
                        <div class="d-flex justify-content-evenly">
                            <a href="#" class="btn btn-success">Book Now</a>
                            <a href="rooms.php" class="btn log-btn">More Details</a>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-lg-12 text-center mt-5">
                <a href="rooms.php" class="btn btn-sm btn-outline-dark rounded fw-bold shadow-none px-4">Check More Rooms</a>
            </div>
        </div>
    </div>


    <div class="container gallery">
        <h1 class="text-center">Our Gallery</h1>
        <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="2000">
                    <img src="img/Gallery/1.jpg" class=" w-100">
                </div>
                <div class="carousel-item" data-bs-interval="2000">
                    <img src="img/Gallery/4.jpg" class=" w-100">
                </div>
                <div class="carousel-item" data-bs-interval="2000">
                    <img src="img/Gallery/6.jpg" class=" w-100">
                </div>
                <div class="carousel-item" data-bs-interval="2000">
                    <img src="img/Gallery/5.jpg" class=" w-100">
                </div>
                <div class="carousel-item" data-bs-interval="2000">
                    <img src="img/Gallery/3.jpg" class=" w-100">
                </div>
                <div class="carousel-item" data-bs-interval="2000">
                    <img src="img/Gallery/7.jpg" class=" w-100">
                </div>
                <div class="carousel-item" data-bs-interval="2000">
                    <img src="img/Gallery/2.jpg" class=" w-100">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <br><br><br><br><br>
    </div>


    <div class="container facilities">
        <h1 class="text-center">Check Our Facilities</h1>
        <div class="row g-5">
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 m-auto shadow" style="max-width: 400px;">
                    <img src="img/Facilities/gym.jpg" class="card-img-top">
                    <div class="card-body">
                        <h3 class="text-center">Gym</h3>
                        <p class="card-text">Welcome to our state-of-the-art hotel gym, where fitness meets luxury. Equipped with cutting-edge exercise machines and a range of free weights, our gym offers the perfect space for guests to maintain their fitness routine while traveling.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 ">
                <div class="card border-0 m-auto shadow" style="max-width: 400px;">
                    <img src="img/Facilities/restau.jpg" class="card-img-top">
                    <div class="card-body">
                        <h3 class="text-center">Resturant</h3>
                        <p class="card-text">Indulge in a culinary journey at our hotel restaurant, where exquisite flavors and impeccable service converge to create an unforgettable dining experience. With a menu crafted by our expert chefs,showcasing a fusion of local and international cuisines. </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 ">
                <div class="card border-0 m-auto shadow" style="max-width: 400px;">
                    <img src="img/Facilities/wifi.jpg" class="card-img-top">
                    <div class="card-body">
                        <h3 class="text-center">Wifi</h3>
                        <p class="card-text">Stay connected seamlessly with our high-speed Wi-Fi service, designed to keep you in touch with the world throughout your stay. Whether you're here for business or leisure, our reliable and secure Wi-Fi network ensures uninterrupted connectivity, allowing you to effortlessly browse the web, attend virtual meetings, stream your favorite content, and stay connected with loved ones.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 ">
                <div class="card border-0 m-auto shadow" style="max-width: 400px;">
                    <img src="img/Facilities/roomService.jpg" class="card-img-top">
                    <div class="card-body">
                        <h3 class="text-center">Room Service</h3>
                        <p class="card-text">Experience unparalleled convenience with our prompt and personalized room service, bringing delectable culinary delights and amenities right to your doorstep. Whether you're craving a delicious meal, a refreshing beverage, or additional amenities to enhance your stay, our dedicated team is committed to delivering a seamless and indulgent in-room dining experience.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 ">
                <div class="card border-0 m-auto shadow" style="max-width: 400px;">
                    <img src="img/Facilities/swimPool.jpg" class="card-img-top">
                    <div class="card-body">
                        <h3 class="text-center">Swimming Pool</h3>
                        <p class="card-text">Dive into tranquility at our pristine hotel swimming pool, where serenity and relaxation blend seamlessly with invigorating aquatic leisure. Surrounded by lush landscapes and designed with your comfort in mind, our sparkling pool offers a refreshing oasis for guests seeking a rejuvenating escape.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 ">
                <div class="card border-0 m-auto shadow" style="max-width: 400px;">
                    <img src="img/Facilities/parking.jpg" class="card-img-top">
                    <div class="card-body">
                        <h3 class="text-center">Parking</h3>
                        <p class="card-text">Enjoy peace of mind with our secure and convenient hotel parking facilities, providing hassle-free access and a safe haven for your vehicle throughout your stay. With ample space and dedicated security measures, our parking area offers a reliable solution for guests traveling by car, ensuring the utmost convenience and comfort during your time with us.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container reviews">
        <h1 class="text-center">What Our Clients Say About Us</h1>
        <div class="swiper mySwiperReviews ">
            <div class="swiper-wrapper ">
                <div class="swiper-slide bg-white p-4">
                    <div class="profile d-flex flex-column align-items-center ">
                        <img src="img/Reviews/1.avif">
                        <h5>Mike</h5>
                    </div>
                    <p>Impeccable service, spotless rooms, and an overall fantastic experience. The staff was incredibly accommodating and friendly, making my stay truly memorable. The amenities provided were top-notch, especially the well-maintained swimming pool and the high-speed Wi-Fi that kept me connected effortlessly. I couldn't have asked for a better hotel experience. Will definitely be returning on my next visit to the area.</p>
                    <div class="rating text-center ">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                </div>

                <div class="swiper-slide bg-white p-4">
                    <div class="profile d-flex flex-column align-items-center ">
                        <img src="img/Reviews/2.jpg">
                        <h5>Carla</h5>
                    </div>
                    <p>Enjoyed my stay at the hotel. The staff was friendly and accommodating, and the room was clean and comfortable. The hotel's location was convenient, making it easy to access nearby attractions. The on-site amenities, particularly the restaurant and the spa, were enjoyable. Although the room service was a bit slow, the quality of the food made up for the wait. Overall, a satisfying experience.</p>
                    <div class="rating text-center p-4">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                </div>

                <div class="swiper-slide bg-white p-4">
                    <div class="profile d-flex flex-column align-items-center ">
                        <img src="img/Reviews/3.jpg">
                        <h5>John</h5>
                    </div>
                    <p>Fantastic stay! The hotel staff provided exceptional service, and the room was spacious and comfortable. The on-site facilities, such as the pool and the restaurant, were top-notch and added to the overall experience. While the breakfast options were great, a more extensive selection would have been appreciated. Nonetheless, I had a wonderful time and would recommend this hotel to others.</p>
                    <div class="rating text-center ">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star-half"></i>
                    </div>
                </div>


                <div class="swiper-slide bg-white p-4">
                    <div class="profile d-flex flex-column align-items-center ">
                        <img src="img/Reviews/5.jpg">
                        <h5>Omar</h5>
                    </div>
                    <p>Absolutely wonderful stay! The staff was incredibly friendly and accommodating, making me feel right at home. The room was impeccably clean and well-appointed, ensuring a comfortable and relaxing experience. The on-site amenities, including the restaurant and the gym, exceeded my expectations and added to the enjoyment of my stay. I couldn't have asked for a better experience and will definitely be returning in the future. Highly recommended for anyone visiting the area</p>
                    <div class="rating text-center ">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                </div>

                <div class="swiper-slide bg-white p-4">
                    <div class="profile d-flex flex-column align-items-center ">
                        <img src="img/Reviews/4.jpg">
                        <h5>Elena</h5>
                    </div>
                    <p>Exceptional experience! The hotel staff was incredibly welcoming and attentive, ensuring a memorable stay from start to finish. The room was luxurious and well-maintained, providing a perfect haven for relaxation. The on-site amenities, including the spa and the restaurant, were outstanding and contributed to the overall enjoyment of my visit. I couldn't have asked for a better stay and would highly recommend this hotel to anyone seeking a truly remarkable experience.</p>
                    <div class="rating text-center ">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                </div>

            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>


    <div class="container reachUs">
        <h1 class="text-center">How To Reach Us ?</h1>
        <div class="row">
            <div class="col-lg-8 col-md-8 mb-sm-3 mb-md-0">
                <iframe class="w-100" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3397.0898047820874!2d-8.015378924665262!3d31.63139144164902!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xdafeff9b496d9f5%3A0x551e78972fc827f4!2sEMSI%20GUELIZ!5e0!3m2!1sen!2sma!4v1698944093592!5m2!1sen!2sma" height="250" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="col-lg-4 col-md-4 d-flex ">
                <div class="bg-white d-flex flex-column justify-content-center w-100 reachUsContact" style="height: 250px;">
                    <div class="d-flex flex-column align-items-center mb-4">
                        <a href="tel:+212524623126">
                            <i class="bi bi-telephone-fill"></i></a>
                        <a href="">+212524623126</a>
                    </div>
                    <div class="d-flex flex-column align-items-center mb-4">
                        <a href="mailto: hotelOjb@gmail.com">
                            <i class="bi bi-envelope-fill"></i>
                        </a>
                        <a href="mailto: hotelOjb@gmail.com">hotelOjb@gmail.com</a>
                    </div>
                    <div class="d-flex align-items-center justify-content-evenly">
                        <a href="https://twitter.com">
                            <i class="bi bi-twitter-x"></i>
                        </a>
                        <a href="https://instagram.com">
                            <i class="bi bi-instagram"></i>
                        </a>
                        <a href="https://facebook.com">
                            <i class="bi bi-facebook"></i>
                        </a>
                    </div>


                </div>

            </div>
        </div>
    </div>


    <div class="container-fluid footer">
        <div class="row">
            <div class="col-lg-3 col-md-4 text-center mb-sm-5 mb-md-0">
                <h1>OjB Hotel</h1>
                <p class="text-start">Welcome to OjB Hotel, where luxury meets tranquility. Nestled amidst breathtaking landscapes. </p>
                <a class="socials" href="https://instagram.com">
                    <i class="bi bi-instagram px-2"></i>
                </a>
                <a class="socials" href="https://facebook.com">
                    <i class="bi bi-facebook px-2"></i>
                </a>
                <a class="socials" href="https://twitter.com">
                    <i class="bi bi-twitter-x px-2"></i>
                </a>
            </div>
            <div class="col-lg-3 col-md-4 d-flex flex-column align-items-center mb-sm-5 mb-md-0">
                <h1>Links</h1>
                <ul>
                    <li class="mb-2">
                        <a href="#" class="d-inline text-dark text-decoration-none">Home</a>
                    </li>
                    <li class="mb-2">
                        <a href="#" class="d-inline text-dark  text-decoration-none">Rooms</a>
                    </li>
                    <li class="mb-2">
                        <a href="#" class="d-inline text-dark  text-decoration-none">Facilities</a>
                    </li>
                    <li class="mb-2">
                        <a href="#" class="d-inline text-dark  text-decoration-none">Contact Us</a>
                    </li>
                    <li>
                        <a href="#" class="d-inline text-dark  text-decoration-none">About Us</a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-4 text-center mb-5 mb-md-0">
                <h1 class="mb-4">Payment</h1>
                <i class="fa-brands fa-cc-mastercard px-2 paym"></i>
                <i class="fa-brands fa-paypal px-2 paym"></i>
                <i class="fa-brands fa-cc-visa px-2 paym"></i>
                <i class="fa-brands fa-cc-apple-pay px-2 paym"></i>
            </div>

            <div class="col-lg-3 col-md-6  mb-sm-5 mb-md-0">
                <h1>Newsletter</h1>
                <form>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control w-100 shadow-none" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <button type="submit" class="btn btn-dark w-100">Submit</button>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 text-center mt-4 copyright">
                <i class="fa-solid fa-copyright"></i>
                <p class="d-inline">2023 All rights reserved / OjB</p>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="index.js"></script>
    <script>
        var swiper = new Swiper(".mySwiper", {
            spaceBetween: 30,
            effect: "fade",
            autoplay: {
                delay: 2100,
                disableOnInteraction: false,
            },
        });

        var swiper = new Swiper(".mySwiperReviews", {
            effect: "coverflow",
            grabCursor: true,
            centeredSlides: true,
            slidesPerView: "auto",
            loop: true,
            slidesPerView: 3,
            coverflowEffect: {
                rotate: 50,
                stretch: 0,
                depth: 100,
                modifier: 1,
                slideShadows: true,
            },
            breakpoints: {
                320: {
                    slidesPerView: 1,
                },
                640: {
                    slidesPerView: 1,
                },
                768: {
                    slidesPerView: 2,
                },
                1024: {
                    slidesPerView: 3,
                },
            },

        });
    </script>
</body>

</html>