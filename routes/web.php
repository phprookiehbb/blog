<?php

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

Route::get('/', '\App\Http\Controllers\Home\IndexController@index')->name('home.index');
Route::get('route','\App\Http\Controllers\Admin\NavController@route');


Route::get('login','\App\Http\Controllers\Admin\LoginController@index')->name('login.index');
Route::get('logout','\App\Http\Controllers\Admin\LoginController@logout')->name('login.logout');
Route::post('login','\App\Http\Controllers\Admin\LoginController@login')->name('login.login');
Route::namespace('Admin')->middleware('admin.login')->prefix('blog')->group(function (){
    Route::get('/','IndexController@index')->name('admin.index');
    Route::get('/index','IndexController@index')->name('admin.index');
    Route::post('upload','ArticleController@upload')->name('article.upload');

    // 导航的资源路由
    Route::resource('nav', 'NavController', ['only' => [
        'index', 'create', 'store', 'edit','update', 'destroy'
    ]]);
    Route::resource('article', 'ArticleController', ['only' => [
        'index', 'create', 'store', 'edit','update', 'destroy'
    ]]);
    Route::resource('weiyu', 'WeiyuController', ['only' => [
        'index', 'create', 'store', 'edit','update', 'destroy'
    ]]);
    Route::resource('level', 'LevelController', ['only' => [
        'index', 'create', 'store', 'edit','update', 'destroy'
    ]]);
    Route::resource('admins', 'AdminController', ['only' => [
        'index', 'create', 'store', 'edit','update', 'destroy'
    ]]);
    //系统设置
    Route::get('system/basic','SystemController@basic')->name('system.basic');
    Route::get('system/sys','SystemController@sys')->name('system.sys');
    Route::get('system/email','SystemController@email')->name('system.email');
    Route::post('system/store','SystemController@store')->name('system.store');
    Route::post('system/upload','SystemController@upload')->name('system.upload');



    Route::get('comment/index','CommentController@index')->name('comment.index');
    Route::get('comment/second','CommentController@second')->name('comment.second');
    Route::post('comment/delete/{comment}','CommentController@delete')->name('comment.delete');
    Route::post('comment/deleteReply/{comment}','CommentController@reply')->name('comment.reply');
    Route::post('comment/check','CommentController@check')->name('comment.check');
});
Route::get('/article/{article}','\App\Http\Controllers\Home\ArticleController@index')->middleware('defence')->name('article');
Route::post('/comment','\App\Http\Controllers\Home\CommentController@comment')->middleware('defence')->name('comment');
Route::post('/article/zan','\App\Http\Controllers\Home\CommentController@zan')->name('article.zan');

Route::get('/tags','\App\Http\Controllers\Home\TagController@tags')->name('tags');
Route::get('/search/{tag}','\App\Http\Controllers\Home\TagController@search')->name('search');
Route::get('/search','\App\Http\Controllers\Home\TagController@Index')->name('search.index');
include_once 'home.php';
