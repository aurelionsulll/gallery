<?php

use Illuminate\Support\Facades\Route;

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
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/','FolderController@listFolder');

//Folder
Route::post('/createFolder','FolderController@createFolder');
Route::get('/createFolderView','FolderController@createFolderView');
Route::get('/listFolder','FolderController@listFolder');
Route::get('/listFoldervue','FolderController@listFoldervue');
Route::get('/folderImage/{id}','FolderController@folderImage');

//Image
Route::post('/createImage','ImageController@createImage');
Route::get('/createImageView','ImageController@createImageView');
Route::get('/listImage','ImageController@listImage');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
