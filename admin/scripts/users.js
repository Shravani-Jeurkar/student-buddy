function get_users()
{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/users.php", true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onload = function()
    {
        document.getElementById('users-data').innerHTML = this.responseText;
    }
    xhr.send('get_users');
}


function toggle_status(id, val)
{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/users.php", true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    xhr.onload = function()
    {
        if (this.responseText == 1)
        {
            alertmsg('success', 'Status Toggled');
            get_users();
        }
        else
        {
            alertmsg('error', 'Server Down');
        }
    }

    xhr.send('toggle_status='+id+'&value='+val);
}


function remove_user(user_id)
{
    if(confirm("Are youn sure, you want to remove this user?"))
    {
        let data = new FormData();
        data.append('user_id', user_id);
        data.append('remove_user', '');
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/users.php", true);

        xhr.onload = function()
        {
            if(this.responseText == 1)
            {
                alertmsg('success', 'User Successfully Removed!');
                get_users();
            }
            else
            {
                alertmsg('error', 'User Removal Failed!');
                add_image_form.reset();
                
            }
            
        }

        xhr.send(data);
    }  
}

function search_user(username){
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/users.php", true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onload = function()
    {
        document.getElementById('users-data').innerHTML = this.responseText;
    }
    xhr.send('search_user&name='+username);
}

window.onload = function(){
    get_users()
}