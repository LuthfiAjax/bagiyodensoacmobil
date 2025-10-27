<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = 'hero';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Hero
$route['tentang'] = 'Hero/tentang';
$route['layanan'] = 'Hero/layanan';
$route['kontak'] = 'Hero/kontak';
$route['cabang'] = 'Hero/cabang';
$route['cabang/(:any)'] = 'Hero/cabang_detail/$1';
$route['artikel'] = 'Hero/artikel';
$route['artikel/(:num)'] = 'Hero/artikel';
$route['artikel/(:any)'] = 'Hero/artikel_details/$1';

// Login
$route['bagiyo-admin'] = 'Login';
// $route['bagiyo-admin/registration'] = 'Login/registration';
$route['bagiyo-admin/logout'] = 'Login/logout';

// cms
$route['cms/dashboard'] = 'Cms_view/dashboard';
$route['cms/menages-news-events'] = 'Cms_view/menages_news_events';
$route['cms/create-news-events'] = 'Cms_view/create_news_events';
$route['cms/update-post/(:num)'] = 'Cms_view/update_news_events/$1';
$route['cms/company-profile'] = 'Cms_view/company_profile';
$route['cms/subscribe'] = 'Cms_view/subscribe';
$route['cms/download-compro'] = 'Cms_view/download_compro';

// save
$route['cms/save-news-event'] = 'Cms_save/save_news_event';
$route['cms/save-company'] = 'Cms_save/save_company';

// delete
$route['cms/delete/post/(:num)'] = 'Cms_delete/delete_post/$1';
$route['cms/delete/company/(:num)'] = 'Cms_delete/delete_company/$1';
$route['cms/delete/subs/(:num)'] = 'Cms_delete/delete_subs/$1';

// update
$route['update/publish'] = 'Cms_update/publish';
$route['update/pending/(:num)'] = 'Cms_update/pending/$1';
$route['cms/update/post'] = 'Cms_update/update_post';

// API
$route['post-data-viewer'] = 'Api/viewer';
$route['view/get-data'] = 'Api/get_data';
$route['post/message_kotak'] = 'Api/save_kontak';
$route['post/data-messageklik'] = 'Api/messageklik';
$route['upload/images/body'] = 'Api/uploadImages';
$route['get-search-article'] = 'Api/get_search_article';
$route['post-subscribe'] = 'Api/post_subscribe';
$route['send-katalog'] = 'Api/catalog';
$route['post-klik-whatsapp'] = 'Api/klik_whatsapp';

// sitemap
$route['sitemap\.xml'] = 'Hero/sitemap';
