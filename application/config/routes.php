<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'hero';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['tentang'] = 'Hero/tentang';
$route['layanan'] = 'Hero/layanan';
$route['kontak'] = 'Hero/kontak';
