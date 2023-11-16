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
                    <a href="HOMEE.php" class="d-inline text-dark text-decoration-none">Home</a>
                </li>
                <li class="mb-2">
                    <a href="HOMEE.php#rooms" class="d-inline text-dark  text-decoration-none">Rooms</a>
                </li>
                <li class="mb-2">
                    <a href="HOMEE.php#facilities" class="d-inline text-dark  text-decoration-none">Facilities</a>
                </li>
                <li class="mb-2">
                    <a href="HOMEE.php#contactUs" class="d-inline text-dark  text-decoration-none">Contact Us</a>
                </li>
                <li>
                    <a href="aboutUs.php" class="d-inline text-dark  text-decoration-none">About Us</a>
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

<script>
    let register_form = document.getElementById("register-form");
    let passerror = document.getElementById("passError");
    let phoneerror = document.getElementById("phoneError");
    let emailerror = document.getElementById("emailError");
    let registersucces = document.getElementById("registerSuccess");
    register_form.addEventListener('submit', (e) => {
        e.preventDefault();
        let data = new FormData();
        data.append('name', register_form.elements['name'].value);
        data.append('email', register_form.elements['email'].value);
        data.append('phonenum', register_form.elements['phonenum'].value);
        data.append('adress', register_form.elements['adress'].value);
        data.append('pincode', register_form.elements['pincode'].value);
        data.append('dob', register_form.elements['dob'].value);
        data.append('pass', register_form.elements['pass'].value);
        data.append('cpass', register_form.elements['cpass'].value);
        data.append('register', '');

        var myModal = document.getElementById('registerModal');
        var modal = bootstrap.Modal.getInstance(myModal);


        let xhr = new XMLHttpRequest(); // jib data mn server - sift data-update..
        xhr.open('POST', 'login-register.php', true);
        xhr.onload = function() {
            if (this.responseText == "invalidphone") {
                phoneerror.innerHTML = "Invalid phone number";
            } else if (this.responseText == "passlength") {
                passerror.innerHTML = "Password must conatin at least 6 characters";
            } else if (this.responseText == "notmatch") {
                passerror.innerHTML = "Password and Confirm Password not match";
            } else if (this.responseText == "Email already exists") {
                emailerror.innerHTML = this.responseText;
            } else if (this.responseText == "Phone number already exists") {
                phoneerror.innerHTML = this.responseText;
            } else {
                modal.hide();
                registersucces.innerHTML = `<div class='alert alert-success alert-dismissible fade show' role='alert'>
                                            <strong>Register Success !</strong> You are registered successfully !
                                           <button type='button' class='btn-close shadow-none' data-bs-dismiss='alert' aria-label='Close'></button>
                                           </div>`;
                register_form.reset();
                phoneerror.innerHTML = "";
                passerror.innerHTML = "";
                emailerror.innerHTML = "";
            }


        }
        xhr.send(data);


    });


    let login_form = document.getElementById("login-form");
    let emailErrorLog = document.getElementById("emailErrorLog");
    let passErrorLog = document.getElementById("passErrorLog");
    login_form.addEventListener('submit', (e) => {
        e.preventDefault();
        let data = new FormData();
        data.append('email_phone', login_form.elements['email_phone'].value);
        data.append('pass', login_form.elements['pass'].value);
        data.append('login', '');

        var myModal = document.getElementById('loginModal');
        var modal = bootstrap.Modal.getInstance(myModal);


        let xhr = new XMLHttpRequest(); // jib data mn server - sift data-update..
        xhr.open('POST', 'login-register.php', true);
        xhr.onload = function() {
            if (this.responseText == "not exist") {
                emailErrorLog.innerHTML = "Email or Phone number not exist";
            } else if (this.responseText == "wrong pass") {
                passErrorLog.innerHTML = "Wrong password";
            } else {
                modal.hide();
                window.location = window.location.pathname;
                emailErrorLog.innerHTML = "";
                passErrorLog.innerHTML = "";
            }




        }
        xhr.send(data);


    });
</script>