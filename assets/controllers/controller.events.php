<?php

$events = queryEvents();   

// Remove expired events
foreach ($events as $e) 
{
    if ($e['event_when'] < date('Y-m-d h:i:sa'))
    {
        if (deletRecord($e['event_id'], 'events', 'event_id'))    
        {
            logEvent('Events', $e['event_id'], 'EXPIRED');
        }    
    }   
}

$filter = 'current';

if (isset($_GET['filter']))
{
    $filter = $_GET['filter'];
}

if (isset($_GET['details']))
{
    $event = getRecord($_GET['details'], 'events', 'event_id');

    require getPartial('event-details');
}

require getPublicView('events');