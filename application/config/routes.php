<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'hero';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Hero
$route['tentang'] = 'Hero/tentang';
$route['layanan'] = 'Hero/layanan';
$route['kontak'] = 'Hero/kontak';
$route['artikel'] = 'Hero/artikel';
$route['artikel/(:any)'] = 'Hero/artikel_details/$1';

// Login
$route['bagiyo-admin'] = 'Login';
$route['bagiyo-admin/registration'] = 'Login/registration';

// cms
$route['cms/dashboard'] = 'Cms_view/dashboard';