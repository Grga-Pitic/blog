<?php


namespace App\Repositories\blog;

use Illuminate\Support\Facades\DB;
use App\Repositories\blog\base\IBlogRepository;
use App\Models\PostModel;

DEFINE('TABLE_NAME', 'post');

class MySqlBlogRepository implements IBlogRepository {
    public function getPostById(int $id){
        $result = DB::table(TABLE_NAME)->where('id', $id)->first();
        return $this->createPostByRow($result);
    }
    public function getLatestPosts() {
        $result = DB::table(TABLE_NAME)->orderBy('published_at', 'desc')->take(2)->get();

        $modelsArray = $this->getArrayByResult($result);
        return $modelsArray;
    }
    public function getPostList(array $parameters) {
        $query = DB::table(TABLE_NAME);

        $this->acceptSort($query, $parameters);
        $this->acceptLimits($query, $parameters);
        $result = $query->get();

        $modelsArray = $this->getArrayByResult($result);
        return $modelsArray;
    }

    public function getCount() {
        return DB::table(TABLE_NAME)->count();
    }

    private function acceptSort($query, $parameters) {
        if($parameters['oldFirst']){
            $query->orderBy('published_at', 'asc');
            return;
        }

        $query->orderBy('published_at', 'desc');

    }

    private function acceptLimits($query, array $parameters){
        $minIndex = $parameters['page'] * $parameters['quantity'];
        $query->skip($minIndex)->take($parameters['quantity']);
    }


    private function getArrayByResult($result){
        $modelsArray = array();
        foreach ($result as $row){
            array_push($modelsArray, $this->createPostByRow($row));
        }

        return $modelsArray;
    }

    private function createPostByRow($row){
        $data = array();
        $data['id'] = $row->id;
        $data['title'] = $row->title;
        $data['published_at'] = $row->published_at;
        $data['short'] = $row->short_content;
        $data['content'] = $row->content;
        $data['image'] = $row->image;

        $newModel = new PostModel($data);

        return $newModel;
    }


}