<?php

namespace App\Http\Controllers\Pages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutController extends Controller {
    public function show(){
        return view('pages.about.page');
    }
}
