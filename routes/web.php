<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\CommentController;

/*
|--------------------------------------------------------------------------
| Web Routes  
|--------------------------------------------------------------------------
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [PostController::class, 'index']);


Route::get('/case/{id}', [PostController::class, 'show']);

Route::get('/case/{id}/edit', [PostController::class, 'edit']);

Route::put('/case/{id}/update', [PostController::class, 'update']);

Route::put('/comment/{id}/update', [CommentController::class, 'update']);

Route::post('/new/case', [PostController::class, 'store']);

Route::post('/new/{post}/comment', [CommentController::class, 'store']);


//view doctor
Route::get('/doctors/{id}', [DoctorController::class, 'show']);
Route::put('/doctors/{id}/update', [DoctorController::class, 'update']);

//view patient
Route::get('/patients/{id}', [PatientController::class, 'show']);

//edit, register and add form doctor
Route::get('doctor/register', [DoctorController::class, 'create']);

Route::get('comment/{id}/edit', [CommentController::class, 'edit']);

Route::post('store', [DoctorController::class, 'store']);
//Route::get('doctors/{id}', [DoctorController::class, 'edit'])

Route::delete('/case/{id}/delete', [PostController::class, 'destroy']);

Route::delete('/comment/delete/{id}', [CommentController::class, 'destroy']);

 Route::get('/dashboard', function () {
     return redirect('home');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
