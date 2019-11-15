<?php

namespace App\Http\Controllers\Pages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\blog\base\IBlogRepository;

DEFINE ('DEFAULT_QUANTITY_ON_PAGE', 10);

class BlogsController extends Controller {
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

        return view('pages.blogs.page', [
            'postList' => $listOfPosts,
            'currentPage' => $p,
            'pageSize' => $q,
            'isOldFirst' => $parametersOfList['oldFirst'],
            'pagesQuantity' => $this->calculatePagesQuantity($q, $postsTotal)
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
