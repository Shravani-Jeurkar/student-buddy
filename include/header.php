<nav id="nav-bar" class="navbar navbar-expand-lg navbar-dark bg-dark px-lg-3 py-lg-1 shadow-sm sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold me-5 ms-2" href="index.php">
            <img src="Images\Logo\Student Buddy_logo.png" alt="Logo" width="100" height="100" class="d-block ms-3">
            <span style="margin-left: 0px ;" class="font2"><?php echo $settings_r['site_title']?></span>
        </a>
        <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse fs-5 ms-5" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link me-2" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2" aria-current="page" href="rooms.php">Rooms</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2" aria-current="page" href="facilities.php">Facilities</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2" aria-current="page" href="mess.php">Mess</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2" aria-current="page" href="contact.php">Contact Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="about.php">About</a>
                </li>
            </ul>
            <div class="d-flex text-dark">
<?php
                    if(isset($_SESSION['login']) && $_SESSION['login'] == true)
                    {
                        $path = USERS_IMG_PATH;
                        echo<<<data
                            <div class="btn-group">
                                <button type="button" class="btn btn-outline-light shadow-none dropdown-toggle" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                                    <img src="$path$_SESSION[uPic]" style="width : 25px; height : 25px;" class="me-1 text-dark bg-light"></img>
                                    $_SESSION[uName]
                                </button>
                                <ul class="dropdown-menu dropdown-menu-lg-end">
                                <!-- <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                                <li><a class="dropdown-item" href="bookings.php">Bookings</a></li> -->
                                <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                                </ul>
                            </div>
data;
                    }
                    else
                    {
                        echo<<<data
                            <button type="button" class="btn btn-outline-light shadow-none me-lg-3 me-2" data-bs-toggle="modal" data-bs-target="#loginModal">
                            Login
                            </button>
                            <button type="button" class="btn btn-outline-light shadow-none" data-bs-toggle="modal" data-bs-target="#registerModal">
                            Register
                            </button>
data;
                    }
                ?>
            </div>
        </div>
    </div>
</nav>

<div class="modal fade" id="loginModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form id="login-form">
                <div class="modal-header">
                <h5 class="modal-title d-flex align-items-center">
                    <i class="bi bi-person-fill fs-3 me-2"></i>User Login
                </h5>
                <a href="admin/index.php" class="btn custom-color shadow-none ms-5">Owner Login</a>
                <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-5">
                    <label class="form-label">Email / Mobile </label>
                    <input type="text" name="email_mob" required class="form-control shadow-none">
                </div>
                <div class="mb-5">
                    <label class="form-label">Password</label>
                    <input type="password" name="pass" required class="form-control shadow-none">
                </div>
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <button type="submit" class="btn btn-dark shadow-none">Login</button>
                    <button type="button" class="btn text-decoration-none text-secondary shadow-none p-0" data-bs-toggle="modal" data-bs-target="#forgotModal" data-bs-dismiss="modal">
                        Forgot Password?
                    </button>
                </div>
            </div> 
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="registerModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <form id="register-form">
                <div class="modal-header d-flex align-items-center justify-content-between">
                    <h5 class="modal-title d-flex align-items-center">
                        <i class="bi bi-person-plus-fill fs-3 me-2"></i>User Registeration
                    </h5>
                    <a href="./admin/home.php" class="btn custom-color shadow-none ms-5">Owner Register</a>
                    <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <span class="badge rounded-pill bg-dark mb-3 text-wrap lh-base">
                        Note: Please fill in your valid details and enter the original ID while regisreting!!
                    </span>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6 ps-0 mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" name="name" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 p-0 mb-3">
                                <label class="form-label">Email ID</label>
                                <input type="email" name="email" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 ps-0 mb-3">
                                <label class="form-label">Phone Number</label>
                                <input type="number" name="phonenum" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 p-0 mb-3">
                                <label class="form-label">Student ID</label>
                                <input type="file" name="profile" accept=".jpg, .jpeg, .png, .webp" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-12 p-0 mb-3">
                                <label class="form-label">Your intro</label>
                                <textarea name="intro" class="form-control shadow-none" required rows="1"></textarea>
                            </div>
                            <div class="col-md-6 ps-0 mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" name="pass" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 p-0 mb-3">
                                <label class="form-label">Confirm Password</label>
                                <input type="password" name="cpass" class="form-control shadow-none" required>
                            </div>
                        </div>
                    </div>
                    <div class="text-center my-1">
                        <button type="submit" class="btn btn-dark shadow-none">Register</button>
                    </div>
                
                </div> 
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="forgotModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form id="forgot-form">
                <div class="modal-header">
                <h5 class="modal-title d-flex align-items-center">
                    <i class="bi bi-person-fill fs-3 me-2"></i>Forgot Password
                </h5>
            </div>
            <div class="modal-body">
                <span class="badge rounded-pill bg-dark mb-3 text-wrap lh-base">
                    A Link will be sent to your email to reset your password.
                </span>
                <div class="mb-4">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" required class="form-control shadow-none">
                </div>
                <div class="mb-2 text-end">
                    <button type="button" class="btn shadow-none p-0 me-2" data-bs-toggle="modal" data-bs-target="#loginModal" data-bs-dismiss="modal">
                        Cancel
                    </button>
                    <button type="submit" class="btn btn-dark shadow-none">Send Link</button>

                </div>
            </div> 
            </form>
        </div>
    </div>
</div>