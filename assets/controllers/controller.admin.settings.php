<?php

$header_name = 'Settings';

$logs = queryLogs();   
$events = queryEvents();   

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if (isset($_POST['otp']))
    {
        if ($_POST['otp'] == $_SESSION['OTP'])
        {
            $admin_details = $_SESSION['temp'];
            unset($_SESSION['temp']);
        
            $update = updateAdmin($admin_details);
        
            if ($update != 0)
            {
                $modal_icon     = 'success';
                $modal_title    = 'Updaeted Successfully!';
                $modal_message  = 'Admin acccount is successfullt updated.';
            }
            else 
            {
                $modal_icon     = 'error';
                $modal_title    = 'Add Failed!';
                $modal_message  = 'An Error occured while updating admin account.';
            }
            
            $modal_pos = '-';
            $path = 'settings';
            require getPartial('admin.confirm-modal');
        }
        else 
        {
            $modal_icon     = 'error';
            $modal_title    = 'Invalid OTP';
            $modal_message  = 'Your provided OTP does not match';
            $modal_pos      = '';

            require getPartial('admin.confirm-modal');
        }
    }
    else if (isset($_POST['date']))
    {
        $id = generateID('EVT');
        
        $up_file = $_FILES['event-img'];

        if (!isValidImage($up_file))
        {        
            $modal_icon = 'error';
            $modal_title    = 'Invalid File Type!';
            $modal_message  = 'Please upload \'jpg\' or \'png\' image files only.';

            $modal_pos = '-';
            $path = 'settings';
            require getPartial('admin.confirm-modal');
            exit;
        }

        $filename       = $up_file['name'];
        $tempname       = $up_file['tmp_name'];
        $filetype       = $up_file['type'];
        $filename       = $id . '.' . pathinfo($filename, PATHINFO_EXTENSION);
        $folder         = './assets/uploads/' . $filename;

        $event_details = [
            $id,
            $_POST['title'],
            $_POST['details'],
            $filename,
            $_POST['date']
        ];

        if (move_uploaded_file($tempname, $folder))
        {
            $add = addRecord($event_details, 'events');

            if ($add != 0)
            {
                logEvent('events', $id, 'CREATE');
                $modal_icon     = 'success';
                $modal_title    = 'Added Successfully!';
                $modal_message  = 'New Event is added';
            }
            else 
            {
                $modal_icon     = 'error';
                $modal_title    = 'Add Failed!';
                $modal_message  = 'An Error occured while adding new Event.';
            }

            $modal_pos = '-';
            $path = 'settings';
            require getPartial('admin.confirm-modal');
        }
    }
    else if (isset($_POST['old-user']))
    {
        $_SESSION['temp'] = [
            $_POST['old-user'],
            $_POST['acc-username'],
            $_POST['acc-email'],
        ];

        if (isset($_POST['acc-pass']) && trim($_POST['acc-pass']) != '')
        {
            $hash = password_hash($_POST['acc-pass'], PASSWORD_DEFAULT);
            $_SESSION['temp'][] = $hash;
        }

        $email = $_SESSION['EMAIL'];
        $atPos = strpos($email, '@');
        $censored_email = substr($email, 0, 3);
        $censored_email .= str_repeat('*', ($atPos - 3)); 
        $censored_email .= preg_replace('/[^@]+@([^\s]+)/', '@$1', $email);

        $otp = rand(100000, 999999); 
        $otp_message = strval($otp); 

        $_SESSION['OTP'] = $otp;
        
        $subject    = 'Edit Account Verification';
        $body       = "your OTP: <h2>$otp_message</h2>";
        $alt_body   = 'TEST OTP!';
        $action     = '/sannicolasbis/administrator/settings';

        require getLibrary('mailer');
        require getPartial('admin.otp-modal');
    }
}

if (isset($_GET['delete-event']))
{
    $id             = $_GET['delete-event'];
    $event          = getRecord($id, 'events', 'event_id');
    $event_title    = $event['title'];
    $event_details  = $event['details'];
    $event_date     = $event['date'];

    $modal_icon     = 'error';
    $modal_title    = 'Confirm Delete';
    $modal_message  = "Are you sure to delete this event? This proccess cannot be undone.<br><br> 
                        <b>Event Title:</b>
                        $event_title<br> 
                        <b>Details:</b>
                        $event_details<br> 
                        <b>Date:</b>
                        $event_date";
    $scn_href       = 'settings';
    $prm_href       = "settings?confirm-delete=$id";
    $scn_txt        = 'Cancel';
    $prm_txt        = 'Delete';

    require getPartial('admin.modal');
}

if (isset($_GET['confirm-delete']))
{
    $id             = $_GET['confirm-delete'];
    $delete         = deletRecord($id, 'events', 'event_id');

    if ($delete == 1)
    {
        if (file_exists("assets/uploads/$id.jpg")) 
        {        
            unlink("assets/uploads/$id.jpg");
        }   

        if (file_exists("assets/uploads/$id.png")) 
        {        
            unlink("assets/uploads/$id.png");
        }
        $modal_icon = 'success';
        $modal_title = 'Event Deleted Successfully!';
        $modal_message = 'Event has been deleted.';
    }
    else 
    {
        $modal_icon = 'error';
        $modal_title = 'Deleted Event Failed!';
        $modal_message = 'An error occured while deleting event.';
    }

    $modal_pos = 'settings';
    require getPartial('admin.confirm-modal');
}

require getAdminView('settings');