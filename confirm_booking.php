<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require('include/links.php')?>
    <title><?php echo $settings_r['site_title']?> - Confirm Booking</title>
    

</head>
<body class="bg-light">
   
    <?php require('include/header.php') ?>

    <?php

        /* 
            Check room id from url is present or not
            Shutdown mode is active or not
            User is logged in or not
        */

        if(!isset($_GET['id']) || $settings_r['shutdown']==true)
        {
            redirect('rooms.php');
        }
        else if(!(isset($_SESSION['login']) && $_SESSION['login'] == true))
        {
            redirect('rooms.php');
        }

        // filter and get room and user data

        $data = filteration($_GET);

        $room_res = select("SELECT * FROM `rooms` WHERE `id`= ? AND `status`=? AND `removed`=?", [$data['id'], 1,0], 'iii');

        if(mysqli_num_rows($room_res) == 0)
        {
            redirect('rooms.php');
        }

        $room_data = mysqli_fetch_assoc($room_res);

        $_SESSION['room'] = [
            "id" => $room_data['id'],
            "name" => $room_data['name'],
            "price" => $room_data['price'],
            // "ownerID" => $room_data['admin_id'], 
            // "payment" => null,
            "available" => false,
        ];

        $user_res = select("SELECT * FROM `user_cred` WHERE `id` =?  LIMIT 1", [$_SESSION['uId']], "i");
        $user_data = mysqli_fetch_assoc($user_res);

    ?>

    <!-- Heading -->
    

    <div class="container">
        <div class="row">

            <div class="col-12 my-5 mb-4 px-4">
                <h2 class="fw-bold">Confirm Booking</h2>
                <div style="font-size: 14px;">
                    <a href="index.php" class="text-secondary text-decoration-none">Home</a>
                    <span class="text-secondary"> > </span>
                    <a href="rooms.php" class="text-secondary text-decoration-none">Rooms</a>
                    <span class="text-secondary"> > </span>
                    <a href="#" class="text-secondary text-decoration-none">Confirm</a>

                </div>
            </div>

            <div class="col-lg-7 col-md-12 px-4">
                <?php
                    $room_thumb = ROOMS_IMG_PATH."thumbnail.jpg";
                    $thumb_q = mysqli_query($con, "SELECT * FROM `room_images`
                        WHERE `room_id` = $room_data[id]
                        AND `thumb` = 1");

                    if(mysqli_num_rows($thumb_q)>0)
                    {
                        $thumb_res = mysqli_fetch_assoc($thumb_q);
                        $room_thumb = ROOMS_IMG_PATH.$thumb_res['image'];
                    }

                    echo<<<data
                        <div class="card p-3 shadow-sm rounded">
                            <img src="$room_thumb" class="img-fluid rounded mb-3">
                            <h5>$room_data[name]</h5>
                            <h6>₹$room_data[price]</h6>

                        </div>
                    data;
                ?>
            </div>

            <div class="col-lg-5 col-md-12 px-4">
                <div class="card mb-4 border-0 shadow-sm rounded-3">
                    <div class="card-body">
                        <form action="pay_now.php" method="POST" id="booking_form">
                            <h6 class="mb-3">Booking Details</h6>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" name="name" value="<?php echo$user_data['name']?>" class="form-control shadow-none" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Phone number</label>
                                    <input type="number" name="phonenum" value="<?php echo$user_data['phonenum']?>" class="form-control shadow-none" required>
                                </div>
                                <div class="col-md-12 mb-4">
                                    <label class="form-label">Email Id</label>
                                    <input type="text" name="email" value="<?php echo$user_data['email']?>" class="form-control shadow-none" required>
                                </div>
                                <div class="col-12">
                                    <button name="pay_now" mb-3 class="btn w-100 custom-color shadow-none mb-1" >Pay Now</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

           

           <div class=" col-12 mt-4 px-4">
                <h5 class="mb-3">Reviews & Ratings</h5>
                <div>
                    <div class="d-flex align-items-center mb-2">
                        <img src="Images/Facilities/IMG_47816.svg" alt="" width="30px">
                        <h6 class="m-0 ms-2">Random User 1</h6>
                    </div>
                    <p>
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                        Voluptates, aliquid soluta dicta ipsa
                        atque quas enim reprehenderit rem odit. Aliquid?
                    </p>
                    <div class="rating">
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                    </div>
                </div>
           </div>



        </div>
    </div>



    <?php require('include/footer.php') ?>

    <script>
           
    </script>

</body>
</html>