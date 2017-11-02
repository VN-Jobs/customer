<?php

use Illuminate\Http\Request;
use App\Contracts\Services\MediaInterface;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('image/{path}', ['as' => 'image' , function (Request $request, MediaInterface $service, $path) {
    $params = $request->all();
    return $service->getReponseImage($path, $params);
}])->where('path', '(.*?)');

Route::group(['prefix' => '/', 'namespace' => 'Frontend'], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::post('lien-he', 'HomeController@contact')->name('home.contact');
    Route::get('danh-muc/{slug}', 'CategoryController@show')->name('category.show');
    Route::get('trang/{slug}', 'PageController@show')->name('page.show');
    Route::get('bai-viet/{slug}', 'PostController@show')->name('post.show');
    Route::get('san-pham/{slug}', 'ProductController@show')->name('product.show');
    Route::get('lien-he', 'HomeController@pageContact')->name('home.page.contact');
    Route::post('san-pham-tim-kiem', 'ProductController@search')->name('product.search');
});

Route::group(['namespace' => 'Backend'], function () {
    Auth::routes();
    Route::group(['prefix' => 'backend', 'as' => 'backend.', 'middleware' => ['auth']], function () {
        Route::get('/', 'HomeController@index')->name('home.index');
        Route::post('summernote/image', 'HomeController@summernoteImage')->name('summernote.image');
        Route::resource('home', 'HomeController', [
            'except' => ['index', 'create', 'store', 'update', 'edit']
        ]);

        Route::resource('user', 'UserController');
        Route::resource('category', 'CategoryController', [
            'except' => ['index', 'create', 'show']
        ]);
        Route::get('category/type/{type}', 'CategoryController@type')->name('category.type');
        Route::resource('page', 'PageController');
        Route::resource('product', 'ProductController');
        Route::post('product/image/store', 'ProductController@imageStore')->name('product.image.store');
        Route::resource('post', 'PostController');
        Route::resource('slide', 'SlideController');
        Route::resource('config', 'ConfigController', [
            'only' => ['index', 'store']
        ]);
    });
});
