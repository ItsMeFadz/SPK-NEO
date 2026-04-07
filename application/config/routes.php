<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'LandingController';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['referensi'] = 'LandingController/referensi';

// Admin
$route['dashboard'] = 'DashboardController';