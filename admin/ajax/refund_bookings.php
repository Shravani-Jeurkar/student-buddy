<?php

    require('../include/db_config.php');
    require('../include/essentials.php');
    adminLogin();

    if(isset($_POST['get_bookings']))
    {
        $frm_data = filteration($_POST);
        $search = $frm_data['search'];
        
        $owner_id = $_SESSION['adminID'];
        
        
        $query = "SELECT bo.*, bd.*, ac.* FROM `booking_order` bo 
            INNER JOIN `booking_details` bd INNER JOIN `admin_cred` ac
            ON bo.booking_id = bd.booking_id AND bd.admin_id = ac.sr_no
            WHERE (bo.order_id LIKE ? OR bd.phonenum LIKE ? OR bd.user_name LIKE ? OR ac.admin_name LIKE ? OR ac.admin_email LIKE ? OR ac.admin_phonenum LIKE ?)
            AND (bo.booking_status =? AND bo.refund =?) ORDER BY bo.booking_id ASC";

            $res = select($query, ["%$frm_data[search]%", "%$frm_data[search]%", "%$frm_data[search]%", "%$frm_data[search]%", "%$frm_data[search]%", "%$frm_data[search]%", "cancelled", 0],'sssssssi');
        
            $i =1;
            $table_data="";

            if(mysqli_num_rows($res) == 0)
            {
                echo"<b>No Data Found!</b>";
                exit;
            }

            while($data = mysqli_fetch_assoc($res))
            {
                $date = date("d-m-Y", strtotime($data['datentime']));
                
                $table_data.="
                    <tr>
                        <td>$i</td>
                        <td>
                            <span class='badge bg-primary'>
                                Order Id: $data[order_id]
                            </span>
                            <br>
                            <b>Name:</b> $data[user_name]
                            <br>
                            <b>Phone No:</b> $data[phonenum]
                            <br>
                        </td>
                        <td>
                            <b>Owner:</b> $data[admin_name]<br>
                            <b>Email:</b> $data[admin_email]<br>
                            <b>Phone:</b> $data[admin_phonenum]
                        </td>
                        <td>
                            <b>Room:</b> $data[room_name]
                            <br>
                            <b>Date:</b> $date
                            <br>
                        </td>
                        <td>
                            <b>₹$data[trans_amt]</b> 
                            <br>
                        </td>
                        <td>
                            <button type='button' onclick='refund_booking($data[booking_id])' class='btn btn-outline-success btn-sm fw-bold shadow-none'>
                                <i class='bi bi-cash-stack'></i> Refund
                            </button>
                        </td>
                    </tr>
                ";
                
                $i++;
            }
            echo $table_data;  
    }


    if(isset($_POST['refund_booking']))
    {
        $frm_data = filteration($_POST);

        $query = "UPDATE `booking_order` SET `refund` = ? WHERE `booking_id` = ?";
        $values = [1, $frm_data['booking_id']];

        $res = update($query, $values, 'ii');
        echo $res;
    }
    
?>