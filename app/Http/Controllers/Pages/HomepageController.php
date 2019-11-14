<?php

namespace App\Http\Controllers\Pages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomepageController extends Controller {
    public function show(Request $request){
        return "Homepage";
    }
}
