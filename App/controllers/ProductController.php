<?php
    namespace App\controllers;

    if(!defined('ROOT_APP_PATH'))
    {
        die('Can not access this module');
    }

    use App\controllers\BaseController;
    use App\models\ProductModel;//de lay cai productmodel
    use App\libs\Pagination;

    class ProductController extends BaseController
    {
        private $db;
        function __construct()
        {
            $this->db = new ProductModel;
        }

        public function index()
        {
            //xu ly du lieu o day
            $data = [];
            $products = $this->db->getAllDataProduct();
//            echo "<pre>";
//            print_r($products);
//            die;
            $data['lstProduct'] = $products;
            $data['name'] = 'Danh sach san pham';
            //day ca mang data ra ngoai view
            $header = [
                    'title' => 'This is product page',
                    'content' => 'Product page'
            ];
            $this->loadHeader($header);
            //load content
            //bien $data duoc day ra ngoai view
            $this->loadView('product/index_view',$data);
            //load footer
            $this->loadFooter();
        }

        public function search()
        {
            $data = [];
            $keyword = $_GET['q'] ?? '';
            $page = $_GET['page'] ?? '';
            $page = is_numeric($page) ? $page : 1;
            $products = $this->db->getAllDataProductByKeyword($keyword);
            $arrlink = [
                'c'=> 'product',
                'm' => 'search',
                'q'=>$keyword,
                'page'=>'{page}'
            ];
            $strLink = Pagination::createLink($arrlink);
            $paginate = Pagination::paginate($strLink, $page, LIMITED_PAGE, count($products), $keyword);
            $lstProduct = $this->db->getAllDataProductByPage($paginate['start'], LIMITED_PAGE, $keyword);
            $data['paginate'] = $paginate['paginate'];
            $data['lstProduct'] = $lstProduct;

            $header = [
                'title' => 'Search product',
                'content' => 'This Search page product',
                'keyword_search' => $keyword
            ];
            $this->loadHeader($header);
            $this->loadView('product/search_view',$data);
            //load footer
            $this->loadFooter();
        }

    }
