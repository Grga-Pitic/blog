<?php

namespace App\Http\Controllers\Pages;

use App\Repositories\blog\base\IBlogRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PDOException;

class PostController extends Controller {
    public function show(Request $request, $id){
        $container = app();
        $repository = $container->make(IBlogRepository::class);

        try {
            $postModel = $repository->getPostByID($id);
            return view('pages.post.page', ['postModel' => $postModel]);
        } catch (PDOException $e) {
            return view('pages.DBError');
        } catch (\ErrorException $e) {
            abort(404);
        }
        return view('pages.post.page');
    }
}
