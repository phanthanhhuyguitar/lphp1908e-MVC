<?php
    if(file_exists('routes/web.php')){
        define('ROOT_APP_PATH','index.php');
        require_once "vendor/autoload.php";
        require_once 'App/configs/constant.php';
        require 'routes/web.php';
    }else{
        echo 'Website dang tam dung, ban vui long quay lai sau';
    }

