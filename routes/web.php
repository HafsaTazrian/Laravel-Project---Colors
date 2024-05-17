<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PageController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

//Home page- HomeController
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('about', [HomeController::class, 'indexAbout'])->name('about');
Route::get('teams', [HomeController::class, 'indexTeams'])->name('teams');
Route::get('gallery', [HomeController::class, 'gallery']);
Route::get('blog', [HomeController::class, 'blog']);
Route::get('contact', [HomeController::class, 'contact']);

//Authentication- AuthController
Route::get('login', [AuthController::class, 'login']);
Route::post('login', [AuthController::class, 'auth_login']);

Route::get('register', [AuthController::class, 'register']);
Route::post('register', [AuthController::class, 'create_user']);
Route::get('verify/{token}', [AuthController::class, 'verify']);

Route::get('forgot', [AuthController::class, 'forgot']);
Route::post('forgot', [AuthController::class, 'forgot_password']);

Route::get('reset/{token}', [AuthController::class, 'reset']);
Route::post('reset/{token}', [AuthController::class, 'post_reset']);

Route::get('logout', [AuthController::class, 'logout']);
Route::post('/logout', [AuthController::class, 'loggedout'])->name('logout');


//Role Management- Middleware
//only admin access
Route::group(['middleware' => 'admin'], function(){


    //User panel:
    //admin panel - user: UserController
    Route::get('panel/user/list', [UserController::class, 'user']);

    //add user button- Usercontroller
    Route::get('panel/user/add', [UserController::class, 'add_user']);
    Route::post('panel/user/add', [UserController::class, 'insert_user']);

    //edit button - UserController
    Route::get('panel/user/edit/{id}', [UserController::class, 'edit_user']);
    Route::post('panel/user/edit/{id}', [UserController::class, 'update_user']);

    //delete button - UserController
    Route::get('panel/user/delete/{id}', [UserController::class, 'delete_user']);



    //Category- CategoryController
    Route::get('panel/category/list', [CategoryController::class, 'category']);
    Route::get('panel/category/add', [CategoryController::class, 'add_category']);
    Route::post('panel/category/add', [CategoryController::class, 'insert_category']);
    Route::get('panel/category/edit/{id}', [CategoryController::class, 'edit_category']);
    Route::post('panel/category/edit/{id}', [CategoryController::class, 'update_category']);
    Route::get('panel/category/delete/{id}', [CategoryController::class, 'delete_category']);

     //Page- PageController
     Route::get('panel/page/list', [PageController::class, 'page']);
     Route::get('panel/page/add', [PageController::class, 'add_page']);
     Route::post('panel/page/add', [PageController::class, 'insert_page']);
     Route::get('panel/page/edit/{id}', [PageController::class, 'edit_page']);
     Route::post('panel/page/edit/{id}', [PageController::class, 'update_page']);
    // Route::get('panel/page/delete/{id}', [PageController::class, 'delete_page']);

});


//both admin and user access
Route::group(['middleware' => 'adminuser'], function(){ //middleword : fixed word, adminuser: middleware name

    
    //admin dashboard panel - DashboardController
    Route::get('panel/dashboard', [DashboardController::class, 'dashboard']);

    //Change Password - UserController
    Route::get('panel/account-setting', [UserController::class, 'AccountSetting']);
    Route::post('panel/account-setting', [UserController::class, 'UpdateAccountSetting']);

    //Account Settings- UserController
    Route::get('panel/change-password', [UserController::class, 'ChangePassword']);
    Route::post('panel/change-password', [UserController::class, 'UpdatePassword']);

    //Help
    Route::get('panel/help', [UserController::class, 'Help']);
   


    //Blog- BlogController
    Route::get('panel/blog/list', [BlogController::class, 'blog']);
    Route::get('panel/blog/add', [BlogController::class, 'add_blog']);
    Route::post('panel/blog/add', [BlogController::class, 'insert_blog']);
    Route::get('panel/blog/edit/{id}', [BlogController::class, 'edit_blog']);
    Route::post('panel/blog/edit/{id}', [BlogController::class, 'update_blog']);
    Route::get('panel/blog/delete/{id}', [BlogController::class, 'delete_blog']);

   //Comment 
   Route::post('blog-comment-submit', [HomeController::class, 'BlogCommentSubmit']);
   //Reply
   Route::post('blog-comment-reply-submit', [HomeController::class, 'BlogCommentReplySubmit']);

   //Contact Mail
   Route::post('contact_mail', [HomeController::class, 'contact_mail_send']);
    
});


//always have to write this at the end-- for the slug: when no concatenation for the route
Route::get('{slug}', [HomeController::class, 'blogdetail']);