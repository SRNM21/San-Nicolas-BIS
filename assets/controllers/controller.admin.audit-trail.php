<?php

$header_name = 'Audit Trail';
$logs = queryLogs();  

if (isset($_GET['export']))
{
    $export_type = $_GET['export'];
    $export_list  = $logs;
    logEvent('Logs', 'N/A', 'EXPORT');

    if ($export_type == 'excel')
    {
        require getLibrary('excel-logs');
    }
    else if ($export_type == 'pdf')
    {
        require getLibrary('fpdf-logs');
    }
}

require getAdminView('audit-trail');