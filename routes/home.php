<?php
Route::get('archive','\App\Http\Controllers\Home\ArchiveController@index')->name('nav.archive');
Route::get('category/php','\App\Http\Controllers\Home\CategoryController@index')->name('nav.php');
Route::get('readwall','\App\Http\Controllers\Home\ReadwallController@index')->name('nav.readwall');
