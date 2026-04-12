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

// Gejala
$route['gejala'] = 'GejalaController';
$route['gejala/create'] = 'GejalaController/create';
$route['gejala/store'] = 'GejalaController/store';
$route['gejala/edit/(:num)'] = 'GejalaController/edit/$1';
$route['gejala/update/(:num)'] = 'GejalaController/update/$1';
$route['gejala/delete/(:num)'] = 'GejalaController/delete/$1';

// Risiko
$route['risiko'] = 'RisikoController';
$route['risiko/create'] = 'RisikoController/create';
$route['risiko/store'] = 'RisikoController/store';
$route['risiko/edit/(:num)'] = 'RisikoController/edit/$1';
$route['risiko/update/(:num)'] = 'RisikoController/update/$1';
$route['risiko/delete/(:num)'] = 'RisikoController/delete/$1';
