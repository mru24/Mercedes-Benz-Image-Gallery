<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index() {
        $data = array(
          'title'  =>  'Home'
        );
        return view('pages.home')->with($data);
    }
}
