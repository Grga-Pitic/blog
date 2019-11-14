<?php


namespace App\Repositories\blog;

use Illuminate\Support\Facades\DB;
use App\Repositories\blog\base\IBlogRepository;
use App\Models\PostModel;

DEFINE('TABLE_NAME', 'post');

class MySqlBlogRepository implements IBlogRepository {
    public function getPostById(int $id){
        return DB::table(TABLE_NAME)->where('id', $id)->first();
    }
    public function getLatestPosts() {
        $result = DB::table(TABLE_NAME)->orderBy('published_at', 'desc')->take(2)->get();

        $modelsArray = array();
        foreach ($result as $row){
            array_push($modelsArray, $this->createPostByRow($row));
        }

        return $modelsArray;
    }
    public function getPostList(array $parameters) {

    }

    public function getCount() {
        return DB::table(TABLE_NAME)->count();
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