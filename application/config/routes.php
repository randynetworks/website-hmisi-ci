<?php
defined('BASEPATH') or exit('No direct script access allowed');

// upload
$route['Input_Proker/create'] = 'Input_Proker/create';

$route['auth'] = 'auth';

$route['anggota'] = 'anggota/view';

$route['news'] = 'news';

$route['proker/(:any)'] = 'proker/view/$1';

$route['default_controller'] = 'Welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
