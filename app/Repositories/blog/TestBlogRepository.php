<?php


namespace App\Repositories\blog;

use App\Models\PostModel;
use App\Repositories\blog\base\IBlogRepository;

/**
 * Class TestBlogRepository
 * @package App\Repositories\blog
 *
 * Тестовая реализация интерфейса IBlogRepository. Самостоятельно генерирует модели постов блога для сайта.
 * Позволяет тестировать сайт не подключая его к внешним источникам данных.
 *
 */
class TestBlogRepository implements IBlogRepository {

    private const COUNT = 10;
    private const IMAGE_PATH = 'blog-03.jpg';

    public function getPostById(int $id){
        return $this->createPostById($id);
    }
    function getLatestPosts() {
        return array(
            $this->createPostById(TestBlogRepository::COUNT - 1),
            $this->createPostById(TestBlogRepository::COUNT - 2)
        );
    }
    function getPostList(array $parameters) {

        $minIndex = $parameters['page'] * $parameters['quantity'];
        $maxIndex = ($parameters['page'] + 1) * $parameters['quantity'];
        $modelsList = array();

        if($parameters['oldFirst']){
            for($i = $minIndex; $i < $maxIndex; $i++){
                array_push($modelsList, $this->createPostById($i));
                if($i >= TestBlogRepository::COUNT){
                    break;
                }
            }
        } else {
            for($i = $minIndex; $i < $maxIndex; $i++){
                array_push($modelsList, $this->createPostById(TestBlogRepository::COUNT - $i - 1));
                if($i >= TestBlogRepository::COUNT){
                    break;
                }
            }
        }


        return $modelsList;


    }
    function getCount() {
        return TestBlogRepository::COUNT;
    }

    private function createPostById($id){
        $data = array();
        $data['id'] = $id;
        $data['title'] = 'title' . $id;
        $data['published_at'] = '0:00:00';
        $data['short'] = 'short content' . $id;
        $data['content'] = 'full content' . $id;
        $data['image'] = TestBlogRepository::IMAGE_PATH;

        $newModel = new PostModel($data);

        return $newModel;
    }
}