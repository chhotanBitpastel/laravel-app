<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\StudentController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/admin/login', [AuthController::class, 'getLogin'])->name('getLogin');
Route::post('/admin/login', [AuthController::class, 'postLogin'])->name('postLogin');
Route::group(['middleware'=>['admin_auth']], function(){
    Route::get('/admin/dashboard', [ProfileController::class, 'dashboard'])->name('dashboard');
    Route::get('/admin/users', [UserController::class, 'index'])->name('users.list');
    Route::get('/admin/logout', [ProfileController::class, 'logout'])->name('logout');
    Route::get('/admin/students', [StudentController::class, 'index'])->name('students.list');
    Route::get('/admin/students/add', [StudentController::class, 'add'])->name('students.add');
    Route::post('/admin/students/add', [StudentController::class, 'store'])->name('students.store');

    Route::get('/admin/students/{id}/edit', [StudentController::class, 'edit'])->name('students.edit');
    Route::put('/admin/students/{id}/update', [StudentController::class, 'update']);
    Route::delete('/admin/students/{id}/delete', [StudentController::class, 'destroy']);
});



