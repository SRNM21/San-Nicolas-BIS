<?php

$header_name = 'Settings';

$events = queryEvents();   
$hotlines = queryTable('hotlines', null);  
$fb = queryFeedback(); 

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
                $modal_icon     = DIALOG_ICON_SUCCESS;
                $modal_title    = 'Updaeted Successfully!';
                $modal_message  = 'Admin acccount is successfullt updated.';
                logEvent('Admin', $update, 'UPDATE');
            }
            else 
            {
                $modal_icon     = DIALOG_ICON_ERROR;
                $modal_title    = 'Add Failed!';
                $modal_message  = 'An Error occured while updating admin account.';
            }
            
            $modal_pos = '-';
            $path = 'settings';
            require getPartial('admin.confirm-modal');
        }
        else 
        {
            $modal_icon     = DIALOG_ICON_ERROR;
            $modal_title    = 'Invalid OTP';
            $modal_message  = 'Your provided OTP does not match';
            $modal_pos      = '';

            require getPartial('admin.confirm-modal');
        }
    }
    else if (isset($_POST['what']))
    {
        $id = generateID('EVT');
        
        $up_file = $_FILES['event-img'];

        $filename = 'default-event.png';
        $tempname = null;
        $folder = './assets/uploads/' . $filename;
    
        if (!($up_file['error'] == 4 || ($up_file['size'] == 0 && $up_file['error'] == 0)))
        {
            if (!isValidImage($up_file))
            {        
                $modal_icon     = DIALOG_ICON_ERROR;
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
        }

        $event_details = [
            $id,
            $filename,
            $_POST['what'],
            $_POST['date'] . ' ' . $_POST['time'],
            $_POST['where'],
            $_POST['who'],
            $_POST['details']
        ];

        $add = addRecord($event_details, 'events');
        
        if ($add == $id)
        {
            $modal_icon     = DIALOG_ICON_SUCCESS;
            $modal_title    = 'Added Successfully!';
            $modal_message  = 'New Event is added';
            logEvent('Events', $add, 'CREATE');
            move_uploaded_file($tempname, $folder);
        }
        else 
        {
            $modal_icon     = DIALOG_ICON_ERROR;
            $modal_title    = 'Add Failed!';
            $modal_message  = 'An Error occured while adding new Event.';
        }

        $modal_pos = '-';
        $path = 'settings';
        require getPartial('admin.confirm-modal');
    }
    else if (isset($_POST['h-name']))
    {
        $id = generateID('HTL');
        
        $up_file = $_FILES['h-image'];

        $filename = 'default-hotline.png';
        $tempname = null;
        $folder = './assets/uploads/' . $filename;
    
        if (!($up_file['error'] == 4 || ($up_file['size'] == 0 && $up_file['error'] == 0)))
        {
            if (!isValidImage($up_file))
            {        
                $modal_icon     = DIALOG_ICON_ERROR;
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
        }

        $event_details = [
            $id,
            $_POST['h-name'],
            $_POST['h-num'],
            $filename
        ];

        $add = addRecord($event_details, 'hotlines');
        
        if ($add == $id)
        {
            $modal_icon     = DIALOG_ICON_SUCCESS;
            $modal_title    = 'Added Successfully!';
            $modal_message  = 'New Hotline is added';
            logEvent('Hotlines', $add, 'CREATE');
            move_uploaded_file($tempname, $folder);
        }
        else 
        {
            $modal_icon     = DIALOG_ICON_ERROR;
            $modal_title    = 'Add Failed!';
            $modal_message  = 'An Error occured while adding new Hotline.';
        }

        $modal_pos = '-';
        $path = 'settings';
        require getPartial('admin.confirm-modal');
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
    $event_title    = $event['event_what'];
    $event_date     = $event['event_when'];
    $event_where    = $event['event_where'];
    $event_who      = $event['event_who'];
    $event_details  = $event['event_details'];

    $modal_icon     = DIALOG_ICON_ERROR;
    $modal_title    = 'Confirm Delete';
    $modal_message  = "Are you sure to delete this event? This proccess cannot be undone.<br><br>  
                        <b>What:</b>
                        $event_title<br> 
                        <b>When:</b>
                        $event_date<br> 
                        <b>Where:</b>
                        $event_title<br> 
                        <b>Who:</b>
                        $event_title<br> 
                        <b>Details:</b>
                        $event_details<br>";
    $scn_href       = 'settings';
    $prm_href       = "settings?confirm-delete-event=$id";
    $scn_txt        = 'Cancel';
    $prm_txt        = 'Delete';

    require getPartial('admin.modal');
}

if (isset($_GET['confirm-delete-event']))
{
    $id             = $_GET['confirm-delete-event'];
    $delete         = deletRecord($id, 'events', 'event_id');

    if ($delete != 0)
    {
        if (file_exists("assets/uploads/$id.jpg")) 
        {        
            unlink("assets/uploads/$id.jpg");
        }   

        if (file_exists("assets/uploads/$id.png")) 
        {        
            unlink("assets/uploads/$id.png");
        }
        
        $modal_icon = DIALOG_ICON_SUCCESS;
        $modal_title = 'Event Deleted Successfully!';
        $modal_message = 'Event has been deleted.';
        logEvent('Events', $id, 'DELETE');
    }
    else 
    {
        $modal_icon = DIALOG_ICON_ERROR;
        $modal_title = 'Delete Event Failed!';
        $modal_message = 'An error occured while deleting event.';
    }

    $modal_pos = 'settings';
    require getPartial('admin.confirm-modal');
}

if (isset($_GET['delete-hotline']))
{
    $id             = $_GET['delete-hotline'];
    $hotline        = getRecord($id, 'hotlines', 'hotline_id');
    $name           = $hotline['hotline_name'];
    $num            = $hotline['hotline_num'];

    $modal_icon     = DIALOG_ICON_ERROR;
    $modal_title    = 'Confirm Delete';
    $modal_message  = "Are you sure to delete this hotline? This proccess cannot be undone.<br><br>
                        <b>Hotline Name:</b>
                        $name<br>
                        <b>Hotline Number:</b>
                        $num <br>"; 
    $scn_href       = 'settings';
    $prm_href       = "settings?confirm-delete-hotline=$id";
    $scn_txt        = 'Cancel';
    $prm_txt        = 'Delete';

    require getPartial('admin.modal');
}

if (isset($_GET['confirm-delete-hotline']))
{
    $id             = $_GET['confirm-delete-hotline'];
    $delete        = deletRecord($id, 'hotlines', 'hotline_id');

    if ($delete == $id)
    {
        if (file_exists("assets/uploads/$id.jpg")) 
        {        
            unlink("assets/uploads/$id.jpg");
        }   

        if (file_exists("assets/uploads/$id.png")) 
        {        
            unlink("assets/uploads/$id.png");
        }
        
        $modal_icon = DIALOG_ICON_SUCCESS;
        $modal_title = 'Hotline Deleted Successfully!';
        $modal_message = 'Hotline has been deleted.';
        logEvent('Events', $id, 'DELETE');
    }
    else 
    {
        $modal_icon = DIALOG_ICON_ERROR;
        $modal_title = 'Delete Hotline Failed!';
        $modal_message = 'An error occured while deleting hotline.';
    }

    $modal_pos = 'settings';
    require getPartial('admin.confirm-modal');
}

require getAdminView('settings');