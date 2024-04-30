<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

}
