<?php
    namespace App\libs;
    class Pagination
    {
        //viet 1 ham bo tro tao duong link phan trang
        public static function createLink($data)
        {
            $link = '';

            foreach ($data as $key => $item){
               $link .= ($link =='') ? "?{$key}={$item}" : "&{$key}={$item}";
            }
            return ROOT_PATH .$link;
        }
        public static function paginate($link, $page, $limit, $totalRecord, $keyword="")
        {
            //tinh tong so trang : total
            $totalPage = ceil($totalRecord/$limit);
            //hieu chinh lai page
            if($page<1){
                $page = 1;
            }elseif($page>$totalPage){
                $page = $totalPage;
            }
            // tinh start//vi limit quy uoc bat dau tu 0 nen ta phai tru di mot cho o bang nhau
            $start = ($page-1)*$limit;
            //tao template bootstrap phan trang
            $html = '';
            //viet html trong php
            $html .= '<nav>';//the mo
            $html .= '<ul class="pagination">';
            //bieu dien nut prev
            if($page >1 && $page <= $totalPage) {
                $html .= '<li class="page-item"><a class="page-link" href="'.str_replace('{page}', ($page-1), $link).'">Previous</a> </li>';
            }
            //nhung trang o giua
            for($i = 1; $i<=$totalPage;$i++){
                if($i==$page){
                    //nguoi dung o trang hien tai - active no len
                        $html .= '<li class="page-item active" aria-current="page">
                        <a class="page-link">'.$page.'</a>
                     </li>';

                }else{
                    $html .= '<li class = "page-item"><a class="page-link" href="'.str_replace('{page}', $i, $link).'">'.$i.'</a>';
                }
            }
            //buil button next
            if($page < $totalPage && $page >= 1){
                $html .= '<li class="page-item"><a class="page-link" href="'.str_replace('{page}', ($page+1), $link).'">Next</a></li>';

            }
            $html .= '<ul>';
            $html .= '</nav>';//the dong
            return [
                'start' => $start,
                'page' => $page,
                'paginate' => $html
            ];
        }
    }
