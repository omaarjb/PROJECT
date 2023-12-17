<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require("links.php") ?>
    <title>About Us</title>
</head>

<body>
    <?php require("header.php") ?>
    <div class="container aboutUs">
        <h1 class="text-center abtTitle">About Us</h1>
        <hr>
        <div class="px-5">
            <p class="text-center">Welcome to OjB Hotel, where luxury meets comfort, and every guest is treated like royalty. <br> Nestled in the heart of Marrakech, our hotel offers an unparalleled experience that combines contemporary elegance with warm hospitality.</p>
        </div>
        <div class="row abt-desc align-items-center">
            <div class="col-lg-7 mb-5 mb-lg-0  ">
                <h1>20 Years Of Experience</h1>
                <hr>
                <p>Since our establishment, we have been committed to providing our guests with an unforgettable stay, whether they are traveling for business or leisure. With our exquisitely designed rooms and suites, each boasting modern amenities and breathtaking views, we ensure a restful and rejuvenating experience for every visitor.</p>
            </div>
            <div class="col-lg-5">
                <img src="img/Reviews/abt.jpg" class="w-100 abtDescImg">
            </div>
        </div>


        <div class="row justify-content-between mt-5">
            <div class="col-lg-3">
                <div class="text-center bg-white p-4 mb-4 shadow stats">
                    <img src="img/about us/1.svg" class="abtIcons">
                    <h3 class="mt-4">+150 ROOMS</h3>
                </div>

            </div>
            <div class="col-lg-3">
                <div class="text-center bg-white p-4 mb-4 shadow stats">
                    <img src="img/about us/2.png" class="abtIcons">
                    <h3 class="mt-4">+150000 CLIENTS</h3>
                </div>

            </div>
            <div class="col-lg-3">
                <div class="text-center bg-white p-4 mb-4 shadow stats">
                    <img src="img/about us/3.png" class="abtIcons">
                    <h3 class="mt-4">+230000 REVIEWS</h3>
                </div>

            </div>
        </div>

        <h1 class="text-center managTitle">Management Team</h1>

        <div class="swiper mySwiper">
            <div class="swiper-wrapper mb-5">
                <div class="swiper-slide  ">
                    <img src="img/about us/manag/5.jpg" alt="" class="w-100 rounded">
                </div>
                <div class="swiper-slide ">
                    <img src="img/about us/manag/2.jpg" alt="" class="w-100 rounded">
                </div>
                <div class="swiper-slide ">
                    <img src="img/about us/manag/3.jpg" alt="" class="w-100 rounded">
                </div>
                <div class="swiper-slide ">
                    <img src="img/about us/manag/1.jpg" alt="" class="w-100 rounded">
                </div>
                <div class="swiper-slide ">
                    <img src="img/about us/manag/4.jpg" alt="" class="w-100 rounded">
                </div>
                <div class="swiper-slide ">
                    <img src="img/about us/manag/6.jpg" alt="" class="w-100 rounded">
                </div>

            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
    <?php require("footer.php") ?>
    <?php require("scriptLinks.php") ?>
    <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 3,
            spaceBetween: 30,
            pagination: {
                el: ".swiper-pagination",
                dynamicBullets: true,
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