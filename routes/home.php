<?php
Route::get('archive','\App\Http\Controllers\Home\ArchiveController@index')->name('nav.archive');
Route::get('category/php','\App\Http\Controllers\Home\CategoryController@index')->name('nav.php');
Route::get('link','\App\Http\Controllers\Home\SingleController@index')->name('nav.link');
