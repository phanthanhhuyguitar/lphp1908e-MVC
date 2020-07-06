<?php
    namespace App\controllers;

    //khong duoc phep truy cap truc tiep ma phai dang nhap!
    if(!defined('ROOT_APP_PATH')){//dung de kiem tra hang so co ton tai khong
        die('Can not access this module');
    }

    use App\controllers\BaseController;
    //vi ta se lam viec voi BaseController nen ta phai use vao

    class HomeController extends BaseController//ten file va tem class la mot
    {
        public function index()
        {
            $name = $_SESSION['username'] ?? '';
            $data = [];
            $data['name'] = $name;//ba du lieu ra

            //load header
            $header = [
                    'title' => 'This is home page',
                    'content' => 'Home page'
            ];//vi o BaseController ta da khai bao mot array rong nen sang day muon goi lai ta phai khoi tao cho no value
            $this->loadHeader($header);
            //load content
            $this->loadView('home/index_view',$data);

            //load footer
            $this->loadFooter();
        }

    }
