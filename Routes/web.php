<?php
   session_start();
//day la noi tiep nhan cac request tu phia client va dinh tuyen - dieu huong cac request do
//duong link truy cap vao web : index.php?c=&m=&p
//c:ten cua controler
//m:ten cua method nam trong controler do
//p: params

//khong duoc phep truy cap truc tiep vao web.php
if(!defined('ROOT_APP_PATH')){//dung de kiem tra hang so co ton tai khong
    die('Can not access this module');
}

define('PATH_CONTROLLER', 'App/controllers/');
define('NAMESPACE_CONTROLLER',"App\\controllers\\");

//controller
$c = ucfirst($_GET['c'] ?? 'home');//cau dieu kien giong isset($_GET['c']) ? $_GET['c'] : home
//method cua controller
$m = $_GET['m'] ?? 'index';
//khai niem lazy loading : ten file trung voi ten class

//can khoi tao va truy cap dung vao controller trong thu muc app

if(file_exists(PATH_CONTROLLER . $c . 'Controller.php'))
{
    $obj = NAMESPACE_CONTROLLER . $c .'Controller';
    $instance = new $obj;
    $instance->$m();

}else{
    header('Location: upgrade.php');
}
