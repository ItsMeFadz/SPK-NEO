<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'LandingController';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['referensi'] = 'LandingController/referensi';

$route['auth/register'] = 'Auth/register';
$route['auth/process'] = 'Auth/process';
$route['logout'] = 'Auth/logout';

// Admin
$route['dashboard'] = 'DashboardController';
$route['pasien'] = 'PasienController';
$route['gejala'] = 'GejalaController';
$route['gejala/create'] = 'GejalaController/create';
$route['gejala/store'] = 'GejalaController/store';
$route['gejala/edit/(:num)'] = 'GejalaController/edit/$1';
$route['gejala/update/(:num)'] = 'GejalaController/update/$1';
$route['gejala/delete/(:num)'] = 'GejalaController/delete/$1';
