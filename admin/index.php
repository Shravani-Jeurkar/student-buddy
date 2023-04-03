<?php
    
    require('include/links.php');

    session_start();
    if((isset($_SESSION['adminLogin']) && $_SESSION['adminLogin'] == true))
    {
       redirect('dashboard.php');
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Owner Login Panel</title>
    <style>
        div.login-form{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 400px;
        }
    </style>
</head>
<body class="bg-light">

    <div class="login-form text-center rounded bg-white shadow overflow-hidden">
        <form method="POST">
            <h4 class="bg-dark text-white py-3">Owner Login Panel</h4>
            <div class="p-4">
                <div class="mb-5">
                    <input name="admin_name" required type="text" class="form-control shadow-none text-center" placeholder="Owner Name">
                </div>
                <div class="mb-5">
                    <input name="admin_pass" required type="password" class="form-control shadow-none text-center" placeholder="Password">
                </div>
                <button name="login" type="submit" class="btn custom-color shadow-none">Login</button>
            </div>
        </form>
    </div>

    <?php 
        if(isset($_POST['login']))
        {
            $frm_data = filteration($_POST);
            
            $query = "SELECT * FROM `admin_cred` WHERE `admin_name` = ? AND `admin_pass` = ?";
            $values = [$frm_data['admin_name'], $frm_data['admin_pass']];

            $res = select($query, $values, "ss");
            if($res->num_rows==1)
            {
                $row = mysqli_fetch_assoc($res);
                $_SESSION['adminLogin'] = true;
                $_SESSION['adminID'] = $row['sr_no'];
                $_SESSION['adminName'] = $row['admin_name'];
                redirect('dashboard.php');
            }
            else
            {
                alertmsg('error', 'Login failed-Invalid Credentials!');
            }
        }
    
    ?>

    
    <?php require('include/scripts.php'); ?>
</body>
</html>