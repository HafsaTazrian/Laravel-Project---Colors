<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB; 
use Auth;
use Request;
use Carbon\Carbon;

class BlogModel extends Model
{
    use HasFactory;

    protected $table = 'blog';
    
    static public function getSingle($id) {
        return self::find($id);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    static public function getRecordSlug($slug) {
        return  self::select('blog.*', 'users.name as user_name', 'category.name as category_name', 'category.slug as category_slug')
            ->join('users', 'users.id', '=', 'blog.user_id')
            ->join('category', 'category.id', '=', 'blog.category_id')
            ->where('blog.status', '=', 0)
            ->where('blog.is_publish', '=', 1)
            ->where('blog.is_delete', '=', 0)
            ->where('blog.slug', '=', $slug)
            ->first();
    }

    static public function getRecordFront() {
        $return = self::select('blog.*', 'users.name as user_name', 'category.name as category_name', 'category.slug as category_slug')      
            ->join('users', 'users.id', '=', 'blog.user_id')
            ->join('category', 'category.id', '=', 'blog.category_id');

            if(!empty(Request::get('q')))
            {
                $return =$return->where('blog.title', 'like','%'.Request::get('q').'%' );
            }

        $return= $return->where('blog.status', '=', 0)
            ->where('blog.is_publish', '=', 1)
            ->where('blog.is_delete', '=', 0)
            ->orderBy('blog.id', 'desc')
            ->paginate(6);
        return $return;
    }

    static public function getRecordFrontHome() {
        $return = self::select('blog.*', 'users.name as user_name', 'category.name as category_name', 'category.slug as category_slug')      
            ->join('users', 'users.id', '=', 'blog.user_id')
            ->join('category', 'category.id', '=', 'blog.category_id');

            if(!empty(Request::get('q')))
            {
                $return =$return->where('blog.title', 'like','%'.Request::get('q').'%' );
            }

        $return= $return->where('blog.status', '=', 0)
            ->where('blog.is_publish', '=', 1)
            ->where('blog.is_delete', '=', 0)
            ->orderBy('blog.id', 'desc')
            ->paginate(3);
        return $return;
    }

    static public function getRecordFrontCategory($category_id) {
        $return = self::select('blog.*', 'users.name as user_name', 'category.name as category_name', 'category.slug as category_slug')
            ->join('users', 'users.id', '=', 'blog.user_id')
            ->join('category', 'category.id', '=', 'blog.category_id')
            ->where('blog.category_id', '=', $category_id)
            ->where('blog.status', '=', 0)
            ->where('blog.is_publish', '=', 1)
            ->where('blog.is_delete', '=', 0)
            ->orderBy('blog.id', 'desc')
            ->paginate(6);
        return $return;
    }

    static public function getRecentPost() {
        return  self::select('blog.*', 'users.name as user_name', 'category.name as category_name', 'category.slug as category_slug')
            ->join('users', 'users.id', '=', 'blog.user_id')
            ->join('category', 'category.id', '=', 'blog.category_id')
            ->where('blog.status', '=', 0)
            ->where('blog.is_publish', '=', 1)
            ->where('blog.is_delete', '=', 0)
            ->orderBy('blog.id', 'desc')
            ->limit(3)
            ->get();
    }

    static public function getRelatedPost($category_id, $id) {
        return  self::select('blog.*', 'users.name as user_name', 'category.name as category_name', 'category.slug as category_slug')
            ->join('users', 'users.id', '=', 'blog.user_id')
            ->join('category', 'category.id', '=', 'blog.category_id')
            ->where('blog.category_id', '=', $category_id)
            ->where('blog.id', '!=', $id)
            ->where('blog.status', '=', 0)
            ->where('blog.is_publish', '=', 1)
            ->where('blog.is_delete', '=', 0)
            ->orderBy('blog.id', 'desc')
            ->limit(5)
            ->get();
    }


    static public function getRecord(){
        $return = self::select('blog.*', 'users.name as user_name', 'category.name as category_name', 'category.slug as category_slug')
                    ->join('users', 'users.id', '=', 'blog.user_id')
                    ->join('category', 'category.id', '=', 'blog.category_id')
                    ->with('user');

                    if(!empty(Auth::check()) && Auth::user()->is_admin != 1){
                        $return = $return->where('blog.user_id', '=', Auth::user()->id );
                    }

                    if(!empty(Request::get('id'))){
                        $return = $return->where('blog.id', '=', Request::get('id') );
                    }
                    
                    if(!empty(Request::get('username'))){
                        $return = $return->where('users.name', 'like', '%'.Request::get('username').'%' );
                    }

                    if(!empty(Request::get('title'))){
                        $return = $return->where('blog.title', 'like', '%'.Request::get('title').'%' );
                    }

                    if(!empty(Request::get('category'))){
                        $return = $return->where('category.name', 'like', '%'.Request::get('category').'%' );
                    }

                    if(!empty(Request::get('is_publish'))){
                        $is_publish = Request::get('is_publish');
                        if($is_publish == 100){
                            $is_publish = 0;
                        }
                        $return = $return->where('blog.is_publish', '=', $is_publish );
                    }

                    if(!empty(Request::get('status'))){
                        $status = Request::get('status');
                        if($status == 100){
                            $status = 0;
                        }
                        $return = $return->where('blog.status', '=', $status );
                    }

                    if(!empty(Request::get('start_date'))){
                        $return = $return->whereDate('blog.created_at', '>=', Request::get('start_date') );
                    }

                    if(!empty(Request::get('end_date'))){
                        $return = $return->whereDate('blog.created_at', '<=', Request::get('end_date') );
                    }

                    $return = $return->where('blog.is_delete', '=', 0)
                    ->orderBy('blog.id','desc')
                    ->paginate(5);
        return $return;
    } 

    public function getImage(){
        if (!empty($this->image_file) && file_exists('upload/blog/'.$this->image_file)){
            return url('upload/blog/'.$this->image_file);
        }
        else{
            return "";
        }
    }

    public function getTag(){
        return $this->hasMany(BlogTagsModel::class, 'blog_id');
    }

    public function getComment(){
        return $this->hasMany(BlogCommentModel::class, 'blog_id')->orderBy('blog_comment.id', 'desc');
    }

    public function getCommentCount(){
        return $this->hasMany(BlogCommentModel::class, 'blog_id')->count();
    }

    public static function getTotalBlogsCount()
    {
        return self::count();
    }

    public static function getTodayBlogsCount()
    {
        return self::whereDate('created_at', Carbon::today())->count();
    }

    public static function getThisMonthBlogsCount()
    {
        return self::whereMonth('created_at', Carbon::now()->month)
                   ->whereYear('created_at', Carbon::now()->year)
                   ->count();
    }

    public static function getThisYearBlogsCount()
    {
        return self::whereYear('created_at', Carbon::now()->year)->count();
    }
    public static function getTotalUniqueBlogWritersCount()
    {
        // Use a query to count distinct user_ids in the blog table.
        $query = DB::table('blog')
                   ->distinct('user_id')
                   ->where('blog.is_delete', '=', 0);  // Assuming 'is_delete' flags deleted blogs

        $count = $query->count('user_id');  // Count distinct user_ids
        return $count;
    }
    public static function getTotalUniqueAdminBlogWritersCount()
    {
        // Start by joining the blog table with the users table to filter by user type
        $query = DB::table('blog')
                   ->join('users', 'users.id', '=', 'blog.user_id')
                   ->where('users.is_admin', '=', 1)  // Filter to include only admins
                   ->where('blog.is_delete', '=', 0)  // Ensure the blog is not deleted
                   ->distinct('user_id');

        // Count distinct user_ids who are admins and have written at least one blog
        $count = $query->count('user_id');
        return $count;
    }
    public static function getTotalUniqueUserBlogWritersCount()
    {
        // Start by joining the blog table with the users table to filter by user type
        $query = DB::table('blog')
                   ->join('users', 'users.id', '=', 'blog.user_id')
                   ->where('users.is_admin', '=', 0)  // Filter to include only admins
                   ->where('blog.is_delete', '=', 0)  // Ensure the blog is not deleted
                   ->distinct('user_id');

        // Count distinct user_ids who are admins and have written at least one blog
        $count = $query->count('user_id');
        return $count;
    }

    public static function getTotalBlogsCountByUser($userId)
    {
        return self::where('user_id', $userId)->count();
    }

    public static function getTodayBlogsCountByUser($userId)
    {
        return self::where('user_id', $userId)
               ->whereDate('created_at', Carbon::today())
               ->count();
    }

    public static function getThisMonthBlogsCountByUser($userId)
    {
        return self::where('user_id', $userId)
               ->whereMonth('created_at', Carbon::now()->month)
               ->whereYear('created_at', Carbon::now()->year)
               ->count();
    }

    public static function getThisYearBlogsCountByUser($userId)
    {
        return self::where('user_id', $userId)
               ->whereYear('created_at', Carbon::now()->year)
               ->count();
    }



}
