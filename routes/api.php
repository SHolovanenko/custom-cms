<?php

use App\Models\Category;
use App\Models\Post;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/*
Route::bind('category', function ($slug) {
    return Category::published()->whereSlug($slug)->firstOrFail();
});

Route::bind('post', function ($slug) {
    return Post::published()->whereSlug($slug)->firstOrFail();
});
*/

Route::get('/', 'MainController@getHome');
Route::get('/{category}', 'MainController@getListPosts');
Route::get('/{category}/{post}', 'MainController@getPost');
