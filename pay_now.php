<?php

    require('admin/include/db_config.php');
    require('admin/include/essentials.php');

    require('include/paytm/config_paytm.php');
    require('include/paytm/encdec_paytm.php');

    date_default_timezone_set("Asia/Kolkata");
    session_start();

    if(!(isset($_SESSION['login']) && $_SESSION['login'] == true))
    {
        redirect('rooms.php');
    }

    if(isset($_POST['pay_now']))
    {
        header("Pragma: no-cache");
        header("Cache-Control: no-cache");
        header("Expires: 0");

        $checkSum = "";

        $ORDER_ID = 'ORD'.$_SESSION['uId'].random_int(11111, 999999);
        $CUST_ID = $_SESSION['uId'];
        $INDUSTRY_TYPE_ID = INDUSTRY_TYPE_ID;
        $PAYTM_MERCHANT_MID = PAYTM_MERCHANT_MID;
        $CHANNEL_ID = CHANNEL_ID;
        $TXN_AMOUNT = $_SESSION['room']['price'];

        // Create an array having all required parameters for creating checksum.

        $paramList = array();
        $paramList["MID"] = $PAYTM_MERCHANT_MID;
        $paramList["ORDER_ID"] = $ORDER_ID;
        $paramList["CUST_ID"] = $CUST_ID;
        $paramList["INDUSTRY_TYPE_ID"] = $INDUSTRY_TYPE_ID;
        $paramList["CHANNEL_ID"] = $CHANNEL_ID;
        $paramList["TXN_AMOUNT"] = $TXN_AMOUNT;
        $paramList["WEBSITE"] = PAYTM_MERCHANT_WEBSITE;

        $paramList["CALLBACK_URL"] = CALLBACK_URL;

        //Here checksum string will return by getChecksumFromArray() function.
        $checkSum = getChecksumFromArray($paramList,PAYTM_MERCHANT_KEY);

        // Insert details into database

        $frm_data = filteration($_POST);

        $admin_id = select("SELECT `admin_id` FROM `rooms` WHERE `id` = ?", [$_SESSION['room']['id']], 'i');
        $idvar = mysqli_fetch_assoc($admin_id)['admin_id'];

        $query1 = "INSERT INTO `booking_order`(`user_id`, `room_id`, `order_id`) VALUES (?,?,?)";

        insert($query1, [$CUST_ID, $_SESSION['room']['id'], $ORDER_ID], 'iss');

        $booking_id = mysqli_insert_id($con);


        $query2 = "INSERT INTO `booking_details`(`booking_id`, `room_name`, `price`, `user_name`, `phonenum`, `admin_id`) VALUES (?,?,?,?,?,?)";

        insert($query2,[$booking_id, $_SESSION['room']['name'], $TXN_AMOUNT, $frm_data['name'], $frm_data['phonenum'],  $idvar ], 'isssii');
    }

?>

    <html>
    <head>
        <title>Processing</title>
    </head>
    <body>
        <center><h1>Please do not refresh this page...</h1></center>
            <form method="post" action="<?php echo PAYTM_TXN_URL ?>" name="f1">
                <?php
                foreach($paramList as $name => $value) {
                    echo '<input type="hidden" name="' . $name .'" value="' . $value . '">';
                }
                ?>
                <input type="hidden" name="CHECKSUMHASH" value="<?php echo $checkSum ?>">

            
        </form>
        <script type="text/javascript">
                document.f1.submit();
        </script>
    </body>
    </html>