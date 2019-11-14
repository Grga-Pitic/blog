<?php

namespace App\Http\Controllers\Pages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogsController extends Controller {
    public function show(Request $request){
        return "Blogs";
    }
}
