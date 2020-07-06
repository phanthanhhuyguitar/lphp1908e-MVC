<?php

    namespace App\controllers;//dinh danh mot cai tien rieng
    //controller goc de cac controller khac ke thua vao


    //day xem nhu tom gon web app bang cac ham chinh
    // va ta khai bao nhung ham can thiet cho web
   class BaseController
   {
        public function __call($name, $arguments)//se duoc goi khi ta goi toi mot phuong thuc khong ton tai
        {
            //echo "{$name} - khong ton tai";
            header("Location: upgrade.php");
        }

        protected function loadHeader($header = [])
        {
            $title = $header['title'] ?? '';
            $content = $header['content'] ?? '';
            $keywordSearch = $header['keyword_search'] ?? '';
            require 'App/views/partials/header_view.php';
        }

        protected function loadFooter()
        {
            //require file view de controller goi den
            require 'App/views/partials/footer_view.php';
        }

        protected function loadView($path,$data=[])
        {
            extract($data);
            //extract chuyen key cua mang data thanh 1 bien hien thi o ngoai view
            //vidu
            //$data=[];
            //$data['a']=10;
            //$data['b']=10;
            //luc nay muon hien thi du lieu  10-10 cho can goi
            //$a==10 || $b==10;
            //$path duong dan cua view : luon luon phai nam trong thu muc views
            require "App/views/{$path}.php";
        }

   }
