<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'base';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['cp'] = 'cp/index';
$route['user'] = 'user/dashboard';
$route['user/profile'] = 'user/dashboard';
// $route['admin/:any'] = 'admin/$1';
$route['browse'] = 'books/search';
$route['books'] = 'books/search';
$route['reader/:any'] = 'books/reader/$1';

// $route['reader_html/:any'] = 'books/reader_html/$1';
$route['reader_html/:any/:any'] = 'reader/reader_html_material/$1';
$route['reader_html/:any/content/:any/:any'] = 'handler/page_html/$1';
$route['load'] = 'books/loadAds';
$route['books/:any/content/:any/:any'] = 'handler/page/$1';
$route['books/:any'] = 'books/book_detail/$1';
// $route['reader'] = 'books/reader';

$route['search'] = 'books/search';
$route['oldpaper'] = 'books/old_papers';
$route['notes'] = 'books/notes';

// $route['handler/:any'] = 'handler/$1';

$route['contact'] = 'base/contact';
$route['about'] = 'base/about';
$route['alumni'] = 'base/team';
// $route['(:any)'] = 'home/$1';


// $route['courses'] = 'courses/course/$1';
