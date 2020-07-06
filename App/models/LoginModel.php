<?php
    namespace App\models;
    if ( ! defined('ROOT_APP_PATH')) {//dung de kiem tra hang so co ton tai khong
        die('Can not access this module');
    }

    use App\configs\Database;
    use \PDO;

    class LoginModel extends Database
    {//tieu chuan ngoac phai xuong dong doi voi class va function con if else thi ko can
        function __construct()
        {
            //goi den ham cua lop cha
            parent::__construct();
        }

        public function checkLoginUser($username,$password)
        {
            //Quy tac thuc hien cau lenh sql
            $data =[];
            $sql = "SELECT * FROM `admins` AS a WHERE a.`username`=:user AND a.`password`=:pass LIMIT 1";//viet theo pdo php
            $stmt = $this->db->prepare($sql);//chuan bi cho mot cau lenh thuc thi
            if($stmt){
                //kiem tra - validate tham so truyen vao cau lenh sql
                $stmt->bindParam(':user',$username,PDO::PARAM_STR);//gan gia tri thuc
                $stmt->bindParam(':pass',$password,PDO::PARAM_STR);
                //thuc thi cau lenh sql
                if($stmt->execute()){
                    //kiem tra xem co du lieu tra ve ko
                    if($stmt->rowCount() > 0){
                        //tra ve 1 dong du lieu
                        $data = $stmt->fetch(PDO::FETCH_ASSOC); //FETCH_ASSOC
                    }
                }
                $stmt->closeCursor();//thoat ket noi db
            }
            return $data;
        }
    }