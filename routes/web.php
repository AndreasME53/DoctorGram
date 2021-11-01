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

Route::get('/', function ($data) {
    return view('welcome', ['data' => $data]); // passes data to the resource file
});

Route::get('/home', function () {
    return "This is the home page";
});

Route::get('/secondPage', function () {
    return "This is the second page";
});

Route::redirect('/secondPage', '/home', 301);


Route::get('/user/{name?}', function ($id = null) {
    return "This is the user page: ".$id;
});

Route::get('/user/{name}/comment/{commentid}', function ($id = null, $commentid) {
    return "This is the user page: ".$id." comment  id ". $commentid ;
});
