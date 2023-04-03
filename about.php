<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require('include/links.php')?>
    <title><?php echo $settings_r['site_title']?> - About</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css">
    
    <style>
        .box{
            border-top-color: var(--lightBrown_hover) !important;
        }
    </style>
    

</head>
<body class="bg-light">
   
    <?php require('include/header.php') ?>
    <!-- Heading -->
    <div class="my-5 px-4">
        <h2 class="fw-bold font2 text-center">About Us</h2>
        <div class="line1 bg-dark"></div>
        <p class="text-center mt-3">
            Lorem ipsum dolor sit, amet consectetur adipisicing 
            elit. Ad veniam <br> tempora commodi ab fugit 
            molestiae amet quis nostrum totam exercitationem.
        </p>
    </div>

    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-lg-6 col-md-5 mb-4 order-lg-1 order-md-1 order-2">
                <h3 class="mb-3">Lorem ipsum dolor sit.</h3>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Laboriosam veritatis, eos iure facilis nam id soluta.
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Laboriosam veritatis, eos iure facilis nam id soluta.
                </p>
            </div>
            <div class="col-lg-5 col-md-5 mb-4 order-lg-2 order-md-2 order-1">
                <img src="Images\About\young-man.png" class = "w-100" alt="">
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                    <img src="Images\About\hotel.svg" alt="" width="70px">
                    <h4 class="mt-3">100+ Adds</h4>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                    <img src="Images\About\customers.svg" alt="" width="70px">
                    <h4 class="mt-3">200+ Customers</h4>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                    <img src="Images\About\rating.svg" alt="" width="70px">
                    <h4 class="mt-3">50+ Reviews</h4>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                    <img src="Images\About\staff.svg" alt="" width="70px">
                    <h4 class="mt-3">50+ Staff</h4>
                </div>
            </div>
        </div>
    </div>

    <h3 class="my-5 fw-bold font2 text-center">Management Team</h3>

    <div class="container px-4">
        <div class="swiper mySwiper">
            <div class="swiper-wrapper mb-5">
                <?php
                    $about_r = selectAll('team_details');
                    $path = ABOUT_IMG_PATH;

                    while($row = mysqli_fetch_assoc($about_r))
                    {
                        echo<<<data
                            <div class="swiper-slide bg-white text-center overflow-hidden rounded">
                                <img src="$path$row[picture]" alt="" class="w-100">
                                <h5 class="mt-2">$row[name]</h5>
                            </div>
                        data;
                    }
                ?>
            
            
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

    <script>
      var swiper = new Swiper(".mySwiper", {
        spaceBetween: 40,
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
                slidesPerView: 3,
            },
            1024: {
                slidesPerView: 3,
            }
        }
      });
    </script>



    <?php require('include/footer.php') ?>

</body>
</html>