<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\DoctorController;

/*
|--------------------------------------------------------------------------
| Web Routes  
|--------------------------------------------------------------------------
|A  homepage (index.posts)
|3 show  pages for posts(show), patents(show), doctors(show)
|3 forms pages for doctor(create{register}/update), patents(create/update), posts(create/edit)  
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
Route::get('home', [PostController::class, 'index'])
    ->name('posts.index');

//view post
Route::get('home/case/{id}', [PostController::class, 'show'])
    ->name('post.show');

//edit, create and send forms/posts
Route::get('post-form', [PostController::class, 'create']);
Route::post('store-form', [PostController::class, 'store']);
//Route::get('home/case/{id}', [PostController::class, 'edit'])

//view doctor
Route::get('doctors/{id}', [DoctorController::class, 'show'])
    ->name('doctor.show');

//view patient
Route::get('patients/{id}', [PatentController::class, 'show'])
    ->name('patients.show');


//edit, register and add form doctor
//Route::get('doctors/{id}', [DoctorController::class, 'edit'])

//edit, create and add form patient
Route::get('patient-form', [PatentController::class, 'create']);
Route::post('store-form', [PatentController::class, 'store']);
//Route::get('patients/{id}', [PatentController::class, 'edit'])





Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
