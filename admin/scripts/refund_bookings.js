function get_bookings(search='')
{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/refund_bookings.php", true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onload = function()
    {
        document.getElementById('table-data').innerHTML = this.responseText;
    }
    xhr.send('get_bookings&search='+search);
}


function refund_booking(id)
{
    if(confirm("Do you want to Refund the amount?"))
    {
        let data = new FormData();
        data.append('booking_id', id);
        data.append('refund_booking', '');
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/refund_bookings.php", true);

        xhr.onload = function()
        {
            if(this.responseText == 1)
            {
                alertmsg('success', 'Amount has been refunded!');
                get_bookings();
            }
            else
            {
                alertmsg('error', 'Server Down!');
                get_bookings();
                
            }
            
        }

        xhr.send(data);
    }
}














// function search_user(username){
//     let xhr = new XMLHttpRequest();
//     xhr.open("POST", "ajax/users.php", true);
//     xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
//     xhr.onload = function()
//     {
//         document.getElementById('users-data').innerHTML = this.responseText;
//     }
//     xhr.send('search_user&name='+username);
// }

window.onload = function(){
    get_bookings();
}