<?php
    namespace App\controllers;
    if(!defined('ROOT_APP_PATH')){//dung de kiem tra hang so co ton tai khong
        die('Can not access this module');
    }
    use App\controllers\BaseController;
    use App\models\LoginModel;
    class LoginController extends BaseController
    {
        private $db;
        public function __construct()
        {
            $this->db = new LoginModel();
        }
        public function index()
        {
            $state = $_GET['state'] ?? '';
            $data = [];
            $data['message'] = $state;
            $header = [
                'title' => 'This is login page',
                'content' => 'Login page'
            ];
            $this->loadHeader($header);


            //load content
            $this->loadView('login/index_view',$data);

            //load footer
            $this->loadFooter();
        }
        public function handle()
        {
            if(isset($_POST['btnLogin'])){//kiem tra ton tai
                $user = $_POST['user'] ?? '';
                $pass = $_POST['pass'] ?? '';
                $user = trim(strip_tags($user));//xoa bo het cac the html o trong chuoi
                $pass = trim(strip_tags($pass));
                if(!empty($user) && !empty($pass)) {
                    $checkLogin = $this->db->checkLoginUser($user, $pass);

                    if ($checkLogin) {
                        $_SESSION['username'] = $checkLogin['username'];
                        $_SESSION['idUser'] = $checkLogin['id'];
                        $_SESSION['email'] = $checkLogin['email'];
                        $_SESSION['role'] = $checkLogin['role'];
                        header("Location: ?c=home");
                    } else {
                        header("Location: ?c=login&m=index&state=err");
                    }
                }else{
                    header("Location: ?c=login&m=index&state=empty");
                }
            }
        }
//        chuc nang logout
        public function logout()
        {
            if(isset($_SESSION['idUser'])){
                //xoa het cac session
                unset($_SESSION['idUser']);
                unset($_SESSION['username']);
                unset($_SESSION['email']);
                unset($_SESSION['role']);
            }
            header("Location: ?c=login");//da ra login
        }
    }
