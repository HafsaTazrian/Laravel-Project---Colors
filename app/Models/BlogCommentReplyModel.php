<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BlogCommentReplyModel extends Model
{
    use HasFactory;
    protected $table = 'blog_comment_reply';

    public function user(){
        return $this->belongsTo(User::class, 'user_id');

    }

    public static function getTotalRepliesCountByUser($userId) {
        return DB::table('blog_comment_reply')
        ->join('blog_comment', 'blog_comment.id', '=', 'blog_comment_reply.comment_id')
        ->where('blog_comment.user_id', $userId)
        ->where('blog_comment_reply.user_id', '!=', $userId)
        ->count();
    }

    public static function getLatestRepliesByUser($userId) {
        return DB::table('blog_comment_reply')
            ->join('blog_comment', 'blog_comment.id', '=', 'blog_comment_reply.comment_id')
            ->join('users', 'users.id', '=', 'blog_comment_reply.user_id')
            ->join('blog', 'blog.id', '=', 'blog_comment.blog_id') // Assuming blog_id is the foreign key in blog_comment table
            ->where('blog_comment.user_id', $userId)
            ->where('blog_comment_reply.user_id', '!=', $userId)
            ->select(
                'users.name as reply_user_name',
                'blog_comment_reply.comment as reply_message',
                DB::raw('SUBSTRING(blog.title, 1, 20) as blog_title') // Adjust the number 20 to the desired length
            )
            ->orderBy('blog_comment_reply.created_at', 'desc')
            ->limit(3)
            ->get();
    }
}
