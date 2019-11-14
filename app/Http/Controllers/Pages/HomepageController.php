<?php

namespace App\Http\Controllers\Pages;

use Illuminate\Http\Request;
use PDOException;
use App\Http\Controllers\Controller;
use App\Repositories\blog\base\IBlogRepository;

class HomepageController extends Controller {
    public function show(Request $request){
        $container = app();
        $repository = $container->make(IBlogRepository::class);

        try {
            $latestPostsArray = $repository->getLatestPosts();
            return view('pages.home.page', ['latestPosts' => $latestPostsArray]);
        } catch (PDOException $e) {
            return view('pages.DBError');
        }

    }
}
