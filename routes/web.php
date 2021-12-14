<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PatientController;

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

Route::post('/new/case', [PostController::class, 'store']);

Route::post('/new/{post}/comment', [CommentsController::class, 'store']);


//view doctor
Route::get('/doctors/{id}', [DoctorController::class, 'show']);

//view patient
Route::get('/patients/{id}', [PatientController::class, 'show']);

//edit, register and add form doctor
Route::get('doctor/register', [DoctorController::class, 'create']);
Route::post('store', [DoctorController::class, 'store']);
//Route::get('doctors/{id}', [DoctorController::class, 'edit'])

Route::delete('/case/delete/{id}', [PostController::class, 'destroy'])->name('posts.destroy');
Route::delete('/comment/{id}', [CommentsController::class, 'destroy'])->name('comments.destroy');

 Route::get('/dashboard', function () {
     return redirect('home');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
