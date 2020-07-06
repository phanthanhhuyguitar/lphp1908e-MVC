<?php

    namespace App\controllers;

    //khong duoc phep truy cap truc tiep ma phai dang nhap!
    if ( ! defined('ROOT_APP_PATH')) {//dung de kiem tra hang so co ton tai khong
        die('Can not access this module');
    }

    use App\controllers\BaseController;
    use App\models\ColorModel;
    class ColorController extends BaseController
    {
        public function index()
        {
            //test query sql to table color
            //insert - update - delete - like
            echo "test color";
            echo "<br>";
            echo "<a href='?c=home'>Quay ve trang giao dien</a>";
            echo "<pre>";

            $queryDB = new ColorModel();
            //test cau lenh insert
//            $insert = $queryDB->insertDataColor('Xam u am','xam-u-am');//inser theo kieu PDO
//            if($insert){
//                echo "insert success";
//            }else{
//                echo "insert error";
//            }
//            $update = $queryDB->updateColor('Violet','violet',1);
//            if($update){
//                echo "update success";
//            }else{
//                echo "update error";
//            }
//            $delelte = $queryDB->deleteColor(3);
//            if($delelte){
//                echo "delete success";
//            }else{
//                echo "delete error";
//            }

        }
    }
