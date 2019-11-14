<?php


namespace App\Repositories\blog;

use App\Repositories\blog\base\IBlogRepository;

class TestBlogRepository implements IBlogRepository {
    public function getPostById(int $id){

    }
    function getLatestPosts() {

    }
    function getPostList(array $parameters) {

    }
    function getCount() {
        return 'test';
    }
}