<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BlogCommentModel extends Model
{
    use HasFactory;
    protected $table = 'blog_comment';

    public function user(){
        return $this->belongsTo(User::class, 'user_id');

    }

    public function getReply(){
        return $this->hasMany(BlogCommentReplyModel::class, 'comment_id');
    }

    public static function getTotalCommentsCount()
    {
        return self::count();
    }

    public static function getTodayCommentsCount()
    {
        return self::whereDate('created_at', Carbon::today())->count();
    }

    public static function getThisMonthCommentsCount()
    {
        return self::whereMonth('created_at', Carbon::now()->month)
                   ->whereYear('created_at', Carbon::now()->year)
                   ->count();
    }

    public static function getThisYearCommentsCount()
    {
        return self::whereYear('created_at', Carbon::now()->year)->count();
    }

    // User-specific comment count methods
    public static function getTotalCommentsCountByUser($userId) {
        return DB::table('blog_comment')
             ->join('blog', 'blog.id', '=', 'blog_comment.blog_id')
             ->where('blog.user_id', $userId)
             ->count();
    }

    public static function getTodayCommentsCountByUser($userId) {
        return DB::table('blog_comment')
             ->join('blog', 'blog.id', '=', 'blog_comment.blog_id')
             ->where('blog.user_id', $userId)
             ->whereDate('blog_comment.created_at', Carbon::today())
             ->count();
    }

    public static function getThisMonthCommentsCountByUser($userId) {
        return DB::table('blog_comment')
             ->join('blog', 'blog.id', '=', 'blog_comment.blog_id')
             ->where('blog.user_id', $userId)
             ->whereMonth('blog_comment.created_at', Carbon::now()->month)
             ->whereYear('blog_comment.created_at', Carbon::now()->year)
             ->count();
    }

    public static function getThisYearCommentsCountByUser($userId) {
        return DB::table('blog_comment')
             ->join('blog', 'blog.id', '=', 'blog_comment.blog_id')
             ->where('blog.user_id', $userId)
             ->whereYear('blog_comment.created_at', Carbon::now()->year)
             ->count();
    }
    
}
