<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BlogModel;

class CategoryModel extends Model
{
    use HasFactory;

    protected $table = 'category';

    static public function getRecord(){
        return self::select('category.*')
                ->where('is_delete', '=', 0)
                ->orderBy('id', 'desc')
                ->paginate(5);
    }

    static public function getSingle($id)
    {
        return self::find($id); //created this to directly use this function to find using id; self mean class name
    }

    static public function getCategory()
    {
        return self::select('category.*')
                ->where('is_delete', '=', 0)
                ->where('status', '=', 0)
                ->get();
    
    }

    public function totalBlog(){
        return $this->hasMany(BlogModel::class, 'category_id')
                    ->where('blog.status', '=', 0)
                    ->where('blog.is_publish', '=', 1)
                    ->where('blog.is_delete', '=', 0)
                    ->count();
    }

    static public function getCategoryMenu(){
        return self::select('category.*')
                ->where('is_delete', '=', 0)
                ->where('is_menu', '=', 1)
                ->where('status', '=', 0)
                ->get();
    }

    static public function getSlug($slug){
        return self::select('category.*')
                ->where('slug', '=', $slug)
                ->where('is_delete', '=', 0)
                ->where('status', '=', 0)
                ->first();
    }

}
