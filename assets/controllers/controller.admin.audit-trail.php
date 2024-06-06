<?php

$header_name = 'Audit Trail';
$logs = queryLogs();  

if (isset($_GET['export']))
{
    $export_type = $_GET['export'];

    if ($export_type == 'excel')
    {

    }
    else if ($export_type == 'pdf')
    {
        $export_list  = $logs;
        require getLibrary('fpdf-logs');
    }
}

require getAdminView('audit-trail');