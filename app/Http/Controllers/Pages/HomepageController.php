<?php

namespace App\Http\Controllers\Pages;

use Illuminate\Http\Request;
use PDOException;
use App\Http\Controllers\Controller;
use App\Repositories\blog\base\IBlogRepository;

/**
 * Class HomepageController
 * @package App\Http\Controllers\Pages
 *
 * Контроллер главной страницы. Использует BlogRepository для получения последних блогов.
 *
 */
class HomepageController extends Controller {
    public function show(Request $request){
        $container = app();
        $repository = $container->make(IBlogRepository::class);

        try {
            $latestPostsArray = $repository->getLatestPosts();
            return view('pages.home.page', ['latestPosts' => $latestPostsArray]);
        } catch (PDOException $e) { // Т.к. конструктор запросов работает на основе PDO,
                                    // ожидаем соответствующее исключение.
            return view('errors.DBError');
        }

    }
}
