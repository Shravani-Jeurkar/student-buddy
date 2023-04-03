<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require('include/links.php')?>
    <title><?php echo $settings_r['site_title']?> - Owner Register</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css">
    <style>
        div.login-form{
            position: absolute;
            top: 60%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 900px;
            height: 525px;
        }
    </style>
</head>



<body class="bg-light">
    <nav id="nav-bar" class="navbar navbar-expand-lg navbar-dark bg-dark px-lg-3 py-lg-1 shadow-sm sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold me-5 ms-2" href="index.php">
                <img src="..\Images\Logo\Student Buddy_logo.png" alt="Logo" width="100" height="100" class="d-block ms-3">
                <span style="margin-left: 0px ;" class="font2"><?php echo $settings_r['site_title']?></span>
            </a>
            <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse fs-5 ms-5" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link me-2 active" aria-current="page" href="../index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link me-2" aria-current="page" href="../rooms.php">Rooms</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link me-2" aria-current="page" href="../facilities.php">Facilities</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link me-2" aria-current="page" href="../contact.php">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="../about.php">About</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="login-form text-center rounded bg-white shadow overflow-hidden">
        <form method="POST">
            <h4 class="bg-dark text-white py-3">Owner Register Panel</h4>
            <div class="row" >
                <div class="p-4 col-6">
                    <div class="mb-5">
                        <label class="form-label">Name</label>
                        <input name="name" required type="text" class="form-control shadow-none text-center" placeholder="Name">
                    </div>
                    <div class="mb-5">
                        <label class="form-label">Email</label>
                        <input name="email" required type="text" class="form-control shadow-none text-center" placeholder="Email">
                    </div>
                    <div class="mb-5">
                        <label class="form-label">Phone Number</label>
                        <input name="phonenum" required type="number" class="form-control shadow-none text-center" placeholder="Phone Number">
                    </div>
                </div>
                <div class="p-4 col-6">
                    <div class="mb-5">
                        <label class="form-label">Intro</label>
                        <textarea name="intro" class="form-control shadow-none text-center" placeholder="Owner Intro" required rows="1"></textarea>
                    </div>
                    <div class="mb-5">
                        <label class="form-label">Password</label>
                        <input name="pass" required type="password" class="form-control shadow-none text-center" placeholder="Password">
                    </div>
                    <div class="mb-5">
                        <label class="form-label">Confirm Password</label>
                        <input name="cpass" required type="password" class="form-control shadow-none text-center" placeholder="Confirm Password">
                    </div>
                </div>
                <div class="col-12">
                    <button name="reg" type="submit" class="btn custom-color shadow-none">Register</button>
                </div>
            </div>
        </form>
    </div>
    <?php
        if(isset($_POST['reg']))
        {
            $data = filteration($_POST);

            // Match pass and cpass
            if($data['pass'] != $data['cpass'])
            {
                alertmsg('error', 'Password Missmatch!');
                exit;
            }

            // If user exists
            $u_exist = select("SELECT * FROM `admin_cred` WHERE `admin_email` =? OR `admin_phonenum` =? LIMIT 1",
                [$data['email'], $data['phonenum']], "ss");
            
            if(mysqli_num_rows($u_exist) != 0)
            {
                $u_exist_fetch = mysqli_fetch_assoc($u_exist);
                if ($u_exist_fetch['admin_email'] == $data['email'])
                    alertmsg('error', 'Email is already Registered!');
                else
                    alertmsg('error', 'Phone number is already Registered!');
                
                exit;
            }


            $query = "INSERT INTO `admin_cred`(`admin_name`, `admin_email`, `admin_phonenum`, `admin_intro`, `admin_pass`)
            VALUES (?,?,?,?,?)";
        
            $values = [$data['name'], $data['email'], $data['phonenum'], $data['intro'], $data['pass']];

            if(insert($query, $values, 'sssss'))
            {
                alertmsg('success', 'Registered Successfully!');
                echo<<<data
                <div class=' p-2 m-2 row '>
                    <span class="badge rounded-pill bg-dark mt-3 text-wrap lh-base">
                        <a href ='index.php' class ='text-decoration-none text-light'>Click Here to Login as a Owner.</a>
                    </span>
                </div>
                data;
            }
            else
            {
                alertmsg('error', 'Registeration Failed!');
            }

    }


    ?>
    <?php require('include/scripts.php'); ?>
</body>
</html>
<!-- <script>


    let register_form = document.getElementById('admin-register');

    register_form.addEventListener('submit', (e)=>{
    e.preventDefault();

    let data = new FormData();

    data.append('name',register_form.elements['name'].value);
    data.append('email',register_form.elements['email'].value);
    data.append('phonenum',register_form.elements['phonenum'].value);
    data.append('intro',register_form.elements['intro'].value);
    data.append('pass',register_form.elements['pass'].value);
    data.append('cpass',register_form.elements['cpass'].value);
    data.append('register','');


    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/reg.php", true);
    xhr.onload = function()
    {
        if(this.responseText == 'pass_missmatch')
        {
            alertmsg('error', 'Password Missmatch!');
        }
        else if(this.responseText == 'email_already')
        {
            alertmsg('error', 'Email is already Registered!');
        }
        else if(this.responseText == 'phone_already')
        {
            alertmsg('error', 'Phone number is already Registered!');
        }
        else if(this.responseText == 'ins_failed')
        {
            alertmsg('error', 'Registration Failed! Server Down!');
        }
        else
        {
            alertmsg('success', 'Registeration Successful!');
        }


    }
    xhr.send(data);

});
</script> -->