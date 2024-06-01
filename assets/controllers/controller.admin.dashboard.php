<?php

$header_name = 'Dashboard';

$total_barangay_officials   = count(queryTable('barangay_officials', null));
$total_population           = count(queryTable('v_residence', null));
$total_blotter              = count(queryTable('blotter', null));
require getAdminView('dashboard');