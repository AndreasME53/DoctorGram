<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\DoctorController;

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

Route::get('/', function () {
    return view('welcome');
    //need my own welcome page 
});

//homepage
Route::get('home', [PostController::class, 'index']);
//view post
Route::get('home/case/{id}', [PostController::class, 'show']);
    ->name('doctors.show');

//create and send forms
Route::get('post-form', [PostController::class, 'create']);
Route::post('store-form', [PostController::class, 'store']);


Route::get('doctors', [DoctorController::class, 'index']); // lect 12
Route::get('doctors/{id}', [DoctorController::class, 'show'])
    ->name('doctors.show');




Route::get('doctors/{id}/patents', [PatentController::class, 'index']);
Route::get('doctors/{id}/patents/{id}', [PatentController::class, 'show'])
    ->name('patents.show');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';



Route::get('/main/{doctor?}', function($doctor = null) {
    return view('main', ['doctor' => $doctor]);
});