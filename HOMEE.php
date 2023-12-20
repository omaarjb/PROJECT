<?php
session_start();
include "connection.php";
$connection = new Connection();
$connection->selectDatabase("myHotel");
include "category.php";
$row1 = Category::selectCategoryById("category", $connection->conn, 1);
$row2 = Category::selectCategoryById("category", $connection->conn, 2);
$row3 = Category::selectCategoryById("category", $connection->conn, 3);
include "roomBook.php";
$floors = room::selectDistinctFloors($connection->conn);

include "reservation.php";

if (isset($_GET['bookNow'])) {
    $checkInDate = $_GET['checkInDate'];
    $checkOutDate = $_GET['checkOutDate'];
    $categoryId = $_GET['categoryId'];
    $idClient = $_SESSION['userId'];
    $selectedFloor = $_GET['etage'];
    $roomId = room::selectRoomIdByCategoryAndFloor($connection->conn, $categoryId, $selectedFloor);
    header("Location:book_room.php?roomId=$roomId&categoryId=$categoryId&checkInDate=$checkInDate&checkOutDate=$checkOutDate&etage=$selectedFloor&bookNow=");
    exit;
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require("links.php") ?>
    <title>Document</title>
</head>

<body>




    <?php

    require("header.php") ?>



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

    <video controls id="backgroundVideo">
        <source src="video.mp4" type="video/mp4">

    </video>

    <!-- <div class="container Avlibality">
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
    </div> -->

    <section id="rooms">
        <h1 class="text-center  fw-bold rTitle">Check Our Beautiful Rooms</h1>
        <div class="container">
            <div class="row g-3">
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 shadow checkRoom" style="max-width: 350px; margin:auto;">
                        <img src="img/Rooms/1.webp" class="card-img-top">
                        <div class="card-body">
                            <h5><?php echo $row1['description'] ?></h5>
                            <h6><?php echo $row1['price'] ?>$/Per Night</h6>
                            <div class="features mb-4 mt-4">
                                <span class=" badge rounded-pill text-bg-secondary">1 Room</span>
                                <span class=" badge rounded-pill text-bg-secondary">1 Bedroom</span>
                                <span class=" badge rounded-pill text-bg-secondary">1 Bathroom</span>
                            </div>
                            <form action="" method="get">
                                <input type="hidden" name="categoryId" value="1">
                                <label for="checkInDate">Check-in Date:</label>
                                <input type="date" id="checkInDate" name="checkInDate" required>
                                <label for="checkOutDate">Check-out Date:</label>
                                <input type="date" id="checkOutDate" name="checkOutDate" required>
                                <label for="etage">Select Floor:</label>
                                <select name="etage" id="etage" class="form-select" required>
                                    <?php
                                    foreach ($floors as $floor) {
                                        echo "<option value='$floor'>$floor</option>";
                                    }
                                    ?>
                                </select>
                                <div class="d-flex justify-content-evenly mt-3">
                                    <button type="submit" class="btn btn-success" name="bookNow">Book Now</button>
                                    <a href="rooms.php" class="btn log-btn">More Details</a>
                                </div>
                            </form>



                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 shadow checkRoom" style="max-width: 350px; margin:auto;">
                        <img src="img/Rooms/2.jpeg" class="card-img-top">
                        <div class="card-body">
                            <h5><?php echo $row2['description'] ?></h5>
                            <h6><?php echo $row2['price'] ?>$/Per Night</h6>
                            <div class="features mb-4 mt-4">
                                <span class=" badge rounded-pill text-bg-secondary">2 Room</span>
                                <span class=" badge rounded-pill text-bg-secondary">1 Bedroom</span>
                                <span class=" badge rounded-pill text-bg-secondary">1 Bathroom</span>
                            </div>
                            <form action="" method="get">
                                <input type="hidden" name="categoryId" value="2">
                                <label for="checkInDate">Check-in Date:</label>
                                <input type="date" id="checkInDate" name="checkInDate" required>
                                <label for="checkOutDate">Check-out Date:</label>
                                <input type="date" id="checkOutDate" name="checkOutDate" required>
                                <label for="etage">Select Floor:</label>
                                <select name="etage" id="etage" class="form-select" required>
                                    <?php
                                    foreach ($floors as $floor) {
                                        echo "<option value='$floor'>$floor</option>";
                                    }
                                    ?>
                                </select>
                                <div class="d-flex justify-content-evenly mt-3">
                                    <button type="submit" class="btn btn-success" name="bookNow">Book Now</button>
                                    <a href="rooms.php" class="btn log-btn">More Details</a>
                                </div>
                            </form>



                        </div>
                    </div>
                </div>


                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 shadow checkRoom" style="max-width: 350px; margin:auto;">
                        <img src="img/Rooms/3.jpg" class="card-img-top">
                        <div class="card-body">
                            <h5><?php echo $row3['description'] ?></h5>
                            <h6><?php echo $row3['price'] ?>$/Per Night</h6>
                            <div class="features mb-4 mt-4">
                                <span class=" badge rounded-pill text-bg-secondary">3 Room</span>
                                <span class=" badge rounded-pill text-bg-secondary">2 Bedroom</span>
                                <span class=" badge rounded-pill text-bg-secondary">2 Bathroom</span>
                            </div>
                            <form action="" method="get">
                                <input type="hidden" name="categoryId" value="3">
                                <label for="checkInDate">Check-in Date:</label>
                                <input type="date" id="checkInDate" name="checkInDate" required>
                                <label for="checkOutDate">Check-out Date:</label>
                                <input type="date" id="checkOutDate" name="checkOutDate" required>
                                <label for="etage">Select Floor:</label>
                                <select name="etage" id="etage" class="form-select" required>
                                    <?php
                                    foreach ($floors as $floor) {
                                        echo "<option value='$floor'>$floor</option>";
                                    }
                                    ?>
                                </select>
                                <div class="d-flex justify-content-evenly mt-3">
                                    <button type="submit" class="btn btn-success" name="bookNow">Book Now</button>
                                    <a href="rooms.php" class="btn log-btn">More Details</a>
                                </div>
                            </form>



                        </div>
                    </div>
                </div>




            </div>
        </div>
    </section>



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

    <section id="facilities">
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
    </section>



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

    <section id="contactUs">
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
    </section>


    <?php require("footer.php") ?>

    <?php require("scriptLinks.php") ?>
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