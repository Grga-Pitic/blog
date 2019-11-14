<?php


namespace App\Repositories\blog\base;


interface IBlogRepository {
    function getPostById(int $id);
    function getLatestPosts();
    function getPostList(array $parameters);
    function getCount();
}