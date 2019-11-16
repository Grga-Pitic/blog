<?php

namespace App\Http\Controllers\Ajax;

use App\Repositories\blog\base\IBlogRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


/**
 * Class PostListController
 * @package App\Http\Controllers\Ajax
 *
 * Контроллер, вызываемый с помощью Ajax для обновления списка блогов без перезагрузки страницы.
 *
 */
class PostListController extends Controller {

    public const DEFAULT_QUANTITY_ON_PAGE = 10;

    public function show(Request $request, $p = 0, $q = DEFAULT_QUANTITY_ON_PAGE){

        $container = app();
        $repository =  $container->make(IBlogRepository::class);

        // формирует параметры для выборки моделей из хранилища
        $parametersOfList = [
            'page' => $p,
            'quantity' => $q,
        ];

        if($request->input('old-first') == 'true'){
            $parametersOfList['oldFirst'] = true;
        } else {
            $parametersOfList['oldFirst'] = false;
        }

        // получает выборку с моделями постов и их общее количество.
        $listOfPosts = $repository->getPostList($parametersOfList);
        $postsTotal  = $repository->getCount();

        return view('pages.blogs.parts.blogList', [
            'postList' => $listOfPosts,
            'currentPage' => $p,
            'pagesQuantity' => $this->calculatePagesQuantity($q, $postsTotal),
            'pageSize' => $q
        ]);
    }

    // Высчитывает общее количество страниц исходя из кол-ва постов и размера страницы.
    private function calculatePagesQuantity(int $pageSize, int $postsTotal){
        $pageQuantity = intdiv($postsTotal, $pageSize);
        if(($postsTotal % $pageSize) != 0){
            $pageQuantity++;
        }

        return $pageQuantity;
    }
}
