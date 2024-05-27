<?php

$header_name = 'Dashboard';

$total_barangay_officials = count(queryTable('barangay_officials', null));
$total_population = count(queryTable('v_residence', null));

require getAdminView('dashboard');