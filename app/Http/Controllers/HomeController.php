<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogModel;
use App\Models\CategoryModel;

class HomeController extends Controller
{
    public function home(){

        $data['meta_title'] = 'Colors';
        return view ('home', $data);
    }

    public function about(){
        $data['meta_title'] = 'About';
        return view ('about', $data);
    }

    public function teams(){
        $data['meta_title'] = 'Teams';
        return view ('teams', $data);
    }

    public function gallery(){
        $data['meta_title'] = 'Gallery';
        return view ('gallery', $data);
    }

    public function blog(){
        $data['getRecord'] = BlogModel::getRecordFront();
        return view ('blog', $data);
    }

    public function contact(){
        return view ('contact');
    }

    public function blogdetail($slug){

        $getCategory = CategoryModel::getSlug($slug);
        if(!empty($getCategory)){
            $data['meta_title'] = $getCategory->meta_title;
            $data['meta_description'] = $getCategory->meta_description;
            $data['meta_keywords'] = $getCategory->meta_keywords;
            $data['header_title'] = $getCategory->title;
            $data['getRecord'] = BlogModel::getRecordFrontCategory($getCategory->id);
            return view ('blog', $data);
        }
        else{
            $getRecord = BlogModel::getRecordSlug($slug);
            if(!empty($getRecord)){
                $data['getCategory'] = CategoryModel::getCategory();
                $data['getRecentPost'] = BlogModel::getRecentPost();
                $data['getRelatedPost'] = BlogModel::getRelatedPost($getRecord->category_id, $getRecord->id);
                $data['getRecord'] = $getRecord;

                $data['meta_title'] = $getRecord->title;
                $data['meta_description'] = $getRecord->meta_description;
                $data['meta_keywords'] = $getRecord->meta_keywords;
                return view ('blog_detail', $data);
            }
            else{
                abort(404);
            }
        }
        
        
    }
}
