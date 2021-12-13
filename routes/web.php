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
});

Route::get('/home', [PostController::class, 'index']);

Route::get('/case/{id}', [PostController::class, 'show']);

Route::get('/case/new', [PostController::class, 'create']);

Route::post('/store', [PostController::class, 'store']);


//view doctor
Route::get('/doctors/{id}', [DoctorController::class, 'show']);

//view patient
Route::get('/patients/{id}', [PatentController::class, 'show']);


//edit, register and add form doctor
Route::get('doctor/register', [DoctorController::class, 'create']);
Route::post('store', [DoctorController::class, 'store']);
//Route::get('doctors/{id}', [DoctorController::class, 'edit'])


 Route::get('/dashboard', function () {
     return redirect('home');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
