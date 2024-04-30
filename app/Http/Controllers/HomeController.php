<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogModel;

class HomeController extends Controller
{
    public function home(){
        return view ('home');
    }

    public function about(){
        return view ('about');
    }

    public function teams(){
        return view ('teams');
    }

    public function gallery(){
        return view ('gallery');
    }

    public function blog(){
        $data['getRecord'] = BlogModel::getRecordFront();
        return view ('blog', $data);
    }

    public function contact(){
        return view ('contact');
    }
}
