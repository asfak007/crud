<?php

use App\Http\Controllers\DashbordController;
use App\Http\Controllers\StudentController;
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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/',[DashbordController::class,'home'])->name('dashboard');
    Route::post('/add-student',[StudentController::class,'add'])->name('new.student');
    Route::get('/manage-student',[StudentController::class,'manageStudent'])->name('student.manage');
    Route::get('/edit/{id}',[StudentController::class,'edit'])->name('student.edit');
    Route::post('/update-blog/{id}',[BlogController::class,'update'] )->name('update.blog');
    Route::get('/delete/{id}',[StudentController::class,'delete'])->name('student.delete');
});
