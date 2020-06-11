<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = 'dashboard';
$route['404_override'] = '';
$route['files/(:any)'] = 'assets/upload/surat_masuk';
$route['translate_uri_dashes'] = FALSE;
