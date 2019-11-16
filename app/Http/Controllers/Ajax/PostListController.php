<?php

namespace App\Http\Controllers\Ajax;

use App\Repositories\blog\base\IBlogRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostListController extends Controller {

    public const DEFAULT_QUANTITY_ON_PAGE = 10;

    public function show(Request $request, $p = 0, $q = DEFAULT_QUANTITY_ON_PAGE){

        $container = app();
        $repository =  $container->make(IBlogRepository::class);

        $parametersOfList = [
            'page' => $p,
            'quantity' => $q,
        ];

        if($request->input('old-first') == 'true'){
            $parametersOfList['oldFirst'] = true;
        } else {
            $parametersOfList['oldFirst'] = false;
        }

        $listOfPosts = $repository->getPostList($parametersOfList);
        $postsTotal  = $repository->getCount();

        return view('pages.blogs.parts.blogList', [
            'postList' => $listOfPosts,
            'currentPage' => $p,
            'pagesQuantity' => $this->calculatePagesQuantity($q, $postsTotal),
            'pageSize' => $q
        ]);
    }

    private function calculatePagesQuantity(int $pageSize, int $postsTotal){
        $pageQuantity = intdiv($postsTotal, $pageSize);
        if(($postsTotal % $pageSize) != 0){
            $pageQuantity++;
        }

        return $pageQuantity;
    }
}
