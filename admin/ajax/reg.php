<?php

    require('../include/db_config.php');
    require('../include/essentials.php');
    

    if(isset($_POST['register']))
    {
        $data = filteration($_POST);

        // Match pass and cpass
        if($data['pass'] != $data['cpass'])
        {
            echo 'pass_missmatch';
            exit;
        }

        // If user exists
        $u_exist = select("SELECT * FROM `admin_cred` WHERE `admin_email` =? OR `admin_phonenum` =? LIMIT 1",
            [$data['email'], $data['phonenum']], "ss");
        
        if(mysqli_num_rows($u_exist) != 0)
        {
            $u_exist_fetch = mysqli_fetch_assoc($u_exist);
            echo ($u_exist_fetch['admin_email'] == $data['email']) ? 'email_already' : 'phone_already';
            exit;
        }

        // Send Confirmation link to user email

        // $token = bin2hex(random_bytes(16));

        // if(!(send_mail($data['email'], $token, "email_confirmation")))
        // {
        //     echo 'mail_failed';
        //     exit;
        // }

        // $enc_pass = password_hash($data['pass'], PASSWORD_BCRYPT);

        $query = "INSERT INTO `admin_cred`(`admin_name`, `admin_email`, `admin_phonenum`, `admin_intro`, `admin_pass`)
            VALUES (?,?,?,?,?)";
        
        $values = [$data['name'], $data['email'], $data['phonenum'], $data['intro'], $data['pass']];

        if(insert($query, $values, 'sssss'))
        {
            echo 1;
        }
        else
        {
            echo 'ins_failed';
        }

    }
?>