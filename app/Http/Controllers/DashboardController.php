<?php

namespace App\Http\Controllers;
use App\Models\BlogModel;
use App\Models\BlogCommentModel;
use App\Models\CategoryModel;
use App\Models\User;



use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(){
        $data = [
            'totalBlogs' => BlogModel::getTotalBlogsCount(),
            'todayBlogs' => BlogModel::getTodayBlogsCount(),
            'thisMonthBlogs' => BlogModel::getThisMonthBlogsCount(),
            'thisYearBlogs' => BlogModel::getThisYearBlogsCount(),

            // Fetch data for comments
            'totalComments' => BlogCommentModel::getTotalCommentsCount(),
            'todayComments' => BlogCommentModel::getTodayCommentsCount(),
            'thisMonthComments' => BlogCommentModel::getThisMonthCommentsCount(),
            'thisYearComments' => BlogCommentModel::getThisYearCommentsCount(),

            // Fetch data for writers
            'totalWriters' => BlogModel::getTotalUniqueBlogWritersCount(),
            'totalAdminWriters' => BlogModel::getTotalUniqueAdminBlogWritersCount(),
            'totalUserWriters' => BlogModel::getTotalUniqueUserBlogWritersCount(),

            ];

            // Fetch categories with blog count and prepare for chart display
            $categories = CategoryModel::getCategoriesWithBlogCount();
            $categoryData = $categories->map(function ($category) {
                return [
                    'value' => $category->blog_count,
                    'name' => $category->name
                ];
            })->toArray(); // Convert to array to simplify handling in the view

            $usersWithBlogCount = User::withCount('blogs')
                                  ->having('blogs_count', '>', 0)
                                  ->get()
                                  ->map(function ($user) {
                                      return [
                                          'name' => $user->name,
                                          'value' => $user->blogs_count
                                      ];
                                  });

            $data['usersWithBlogCount'] = $usersWithBlogCount;

    
            // Merge category data for pie chart into existing data array
            $data['categoryData'] = $categoryData;
    
            return view('backend.dashboard', $data);
    }

    public function dashboard_user()
    {
        $userId = auth()->user()->id;  // Get the logged-in user's ID

        $userTotalBlogs = BlogModel::getTotalBlogsCountByUser($userId);
        $userTodayBlogs = BlogModel::getTodayBlogsCountByUser($userId);
        $userThisMonthBlogs = BlogModel::getThisMonthBlogsCountByUser($userId);
        $userThisYearBlogs = BlogModel::getThisYearBlogsCountByUser($userId);

        $userTotalComments = BlogCommentModel::getTotalCommentsCountByUser($userId);
        $userTodayComments = BlogCommentModel::getTodayCommentsCountByUser($userId);
        $userThisMonthComments = BlogCommentModel::getThisMonthCommentsCountByUser($userId);
        $userThisYearComments = BlogCommentModel::getThisYearCommentsCountByUser($userId);


        return view('backend.dashboard_user', compact('userTotalBlogs', 'userTodayBlogs', 'userThisMonthBlogs', 'userThisYearBlogs',  'userTotalComments', 'userTodayComments', 'userThisMonthComments', 'userThisYearComments'));
    }



}
