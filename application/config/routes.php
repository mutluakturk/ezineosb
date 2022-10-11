<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'web';
//$route['default_controller'] = 'dashboard';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route["login"] = "userop/login";
$route["logout"] = "userop/logout";
$route["sifremi-unuttum"] = "userop/forget_password";
$route["reset-password"] = "userop/reset_password";
$route["reset-password"] = "userop/reset_password";


/* Kurumsal menüsü*/
$route["yonetim-kurulu"] = "web/getPage/13";
$route["organizasyon-semasi"] = "web/getPage/12";
$route["baskanin-mesaji"] = "web/getPage/11";
$route["hakkimizda"] = "web/getPage/9";
$route["firmalar"] = "web/getPage/34";
/* Hizmetlerimiz menüsü */
$route["imar-ve-altyapi"] = "web/getPage/16";
$route["guvenlik"] = "web/getPage/17";
$route["elektrik"] = "web/getPage/18";
$route["dogalgaz"] = "web/getPage/19";
$route["tahsis-ve-satisi-yapilmis-parseller"] = "web/getPage/20";
/* medya menüsü */
$route["haberler"] = "web/haberler";
$route["duyurular"] = "web/duyurular";
$route["galeri"] = "web/galeri";
$route["ihaleler"] = "web/getPage/23";

$route["haberDetay/(:any)"] = "site/web/haberDetay";
$route["duyuruDetay/(:any)"] = "site/web/duyuruDetay";
/* iletişim menüsü */
$route["iletisim"] = "web/getPage/26";
/* başvurular menüsü */
$route["lisanssiz-elektrik-uretimi"] = "web/getPage/25";
$route["is-ilanlari"] = "web/getPage/24";
/* footer alanındaki linkler */
$route["tarihte-ezine"] = "web/getPage/27";
$route["ezine-cografi-yapisi"] = "web/getPage/28";
$route["egitim"] = "web/getPage/29";
$route["turizm"] = "web/getPage/30";
$route["ekonomi"] = "web/getPage/31";
$route["fotograflarla-ezine"] = "web/getPage/32";

$route["getPage/:id"] = "web/getPage";
//$route["welcome/list/:id"] = "welcome/list";
//$route['welcome/product/:id'] = 'welcome/product';