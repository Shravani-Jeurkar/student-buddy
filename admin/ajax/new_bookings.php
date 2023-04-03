<?php

    require('../include/db_config.php');
    require('../include/essentials.php');
    adminLogin();

    if(isset($_POST['get_bookings']))
    {
        $frm_data = filteration($_POST);
        $search = $frm_data['search'];
        
        $owner_id = $_SESSION['adminID'];
        

        if($owner_id != 1)
        {

            $query = "SELECT bo.*, bd.* FROM `booking_order` bo 
                INNER JOIN `booking_details` bd ON bo.booking_id = bd.booking_id
                WHERE (bo.order_id LIKE ? OR bd.phonenum LIKE ? OR bd.user_name LIKE ?)
                AND (bo.booking_status =? AND bo.arrival =? AND bd.admin_id =?) ORDER BY bo.booking_id ASC";

                $res = select($query, ["%$frm_data[search]%", "%$frm_data[search]%", "%$frm_data[search]%", "booked", 0, $owner_id],'ssssii');
        }
        else
        {
            $query = "SELECT bo.*, bd.*, ac.* FROM `booking_order` bo 
                INNER JOIN `booking_details` bd INNER JOIN `admin_cred` ac
                ON bo.booking_id = bd.booking_id AND bd.admin_id = ac.sr_no
                WHERE (bo.order_id LIKE ? OR bd.phonenum LIKE ? OR bd.user_name LIKE ? OR ac.admin_name LIKE ? OR ac.admin_email LIKE ? OR ac.admin_phonenum LIKE ?)
                AND (bo.booking_status =? AND bo.arrival =?) ORDER BY bo.booking_id ASC";

                $res = select($query, ["%$frm_data[search]%", "%$frm_data[search]%", "%$frm_data[search]%", "%$frm_data[search]%", "%$frm_data[search]%", "%$frm_data[search]%", "booked", 0],'sssssssi');
        }
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
                if($owner_id != 1)
                {
                    $action_row="
                    
                        <td>
                            <button type='button' onclick='assign_room($data[booking_id])' class='btn text-dark btn-sm fw-bold custom-color shadow-none' data-bs-toggle='modal' data-bs-target='#assign-room'>
                                <i class='bi bi-check2-square'></i> Accept Token
                            </button>
                            <br>
                            <button type='button' onclick='cancel_booking($data[booking_id])' class='btn btn-outline-danger mt-2 btn-sm fw-bold shadow-none'>
                                <i class='bi bi-trash'></i> Cancel Token
                            </button>               
                        </td>
                    
                    ";
                }
                else
                {
                    $action_row="
                        
                        <td>
                            <b>Owner:</b> $data[admin_name]<br>
                            <b>Email:</b> $data[admin_email]<br>
                            <b>Phone:</b> $data[admin_phonenum]
                            <br>
                            <button type='button' onclick='cancel_booking($data[booking_id])' class='btn btn-outline-danger btn-sm fw-bold shadow-none'>
                                <i class='bi bi-trash'></i> Cancel Token
                            </button>               
                        </td>
                        
                    ";
                }
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
                            <b>Room:</b> $data[room_name]
                            <br>
                            <b>Price:</b> ₹$data[price]
                            <br>
                        </td>
                        <td>
                            <b>Paid:</b> ₹$data[trans_amt]
                            <br>
                            <b>Date:</b> $date
                            <br>
                        </td>
                        $action_row
                    </tr>
                ";
                
                $i++;
            }
            echo $table_data;  
    }


    if(isset($_POST['assign_room']))
    {
        $frm_data = filteration($_POST);

        $query = "UPDATE `booking_order` bo INNER JOIN `booking_details` bd
            ON bo.booking_id = bd.booking_id
            SET bo.arrival = ?, bd.room_no = ?
            WHERE bo.booking_id = ?";

        $values = [1, $frm_data['room_no'], $frm_data['booking_id']];
        
        $res = update($query, $values, 'isi');

        echo ($res==2) ? 1 : 0;
    }

    if(isset($_POST['cancel_booking']))
    {
        $frm_data = filteration($_POST);

        $query = "UPDATE `booking_order` SET `booking_status` = ?, `refund` = ? WHERE `booking_id` = ?";
        $values = ['cancelled', 0, $frm_data['booking_id']];

        $res = update($query, $values, 'sii');
        echo $res;
    }
    
?>