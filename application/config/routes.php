<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['proker/(:any)'] = 'proker/view/$1';

$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
