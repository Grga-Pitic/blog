<?php

namespace App\Http\Controllers\Pages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\blog\base\IBlogRepository;
use App\Http\Controllers\Ajax\PostListController;

class BlogsController extends Controller {
    public function show(Request $request, $p = 0, $q = PostListController::DEFAULT_QUANTITY_ON_PAGE){

        $container = app();
        $repository =  $container->make(IBlogRepository::class);
        $listController = $container->make(PostListController::class);

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

        $listHtmlCode = $listController->show($request, $p, $q);

        return view('pages.blogs.page', [
            'isOldFirst' => $parametersOfList['oldFirst'],
            'listHtmlCode' => $listHtmlCode
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
