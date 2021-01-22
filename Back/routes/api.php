<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AdminController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout',]);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);
    Route::post('signup', [AuthController::class, 'signup']);
    Route::post('add-blogs', [BlogController::class, 'addBlogs']);
    Route::post('my-profile', [BlogController::class, 'myProfile']);
    Route::post('blogs', [BlogController::class, 'blogs']);
    Route::post('my-blogs', [BlogController::class, 'blogs']);
    Route::post('getDB', [BlogController::class, 'getDB']);
    Route::post('users', [AdminController::class, 'users']);
    Route::post('getUsers', [AdminController::class, 'getUsers']);
    Route::post('delete-blog', [BlogController::class, 'deleteBlog']);
    Route::post('blockUser', [AdminController::class, 'blockUser']);
    Route::post('unBlockUser', [AdminController::class, 'unBlockUser']);
    Route::post('createPost', [BlogController::class, 'createPost']);


});
