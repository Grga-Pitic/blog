<?php

namespace App\Http\Controllers\Pages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\blog\base\IBlogRepository;
use App\Http\Controllers\Ajax\PostListController;
use PDOException;

class BlogsController extends Controller {
    public function show(Request $request, $p = 0, $q = PostListController::DEFAULT_QUANTITY_ON_PAGE){

        $container = app();
        $listController = $container->make(PostListController::class);
        $isOldFirls = false;

        if($request->input('old-first') == 'true'){
            $isOldFirls = true;
        }

        try {

            $listHtmlCode = $listController->show($request, $p, $q);

            return view('pages.blogs.page', [
                'isOldFirst' => $isOldFirls,
                'listHtmlCode' => $listHtmlCode
            ]);
        } catch (PDOException $e) { // Т.к. конструктор запросов работает на основе PDO,
                                    // ожидаем соответствующее исключение.
            return view('errors.DBError');
        }
    }
}
