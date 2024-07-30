<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\backstage\ManagerController;


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
 //   return view('welcome');
//});
Route::get('/', function () {
    return view('Login');
})->name('homelogin');
Route::get('/login', [AdminController::class, 'index'])->name('login');
Route::post('/login', [AdminController::class, 'login']);
Route::get('/logout', [AdminController::class, 'logout']);
Route::get('/dashboard', [DashboardController::class, 'index']);
Route::get('/backstage/manager', [ManagerController::class, 'index']);
Route::get('/backstage/manager/view/{id}', [ManagerController::class, 'View']);
Route::post('/backstage/manager/create', [ManagerController::class, 'Create']);
Route::post('/backstage/manager/edit', [ManagerController::class, 'Edit']);
Route::get('/backstage/manager/add', [ManagerController::class, 'Add']);
Route::get('/backstage/manager/mod/{id}', [ManagerController::class, 'Mod']);
Route::get('/backstage/manager/del/{id}', [ManagerController::class, 'Del']);
Route::get('/demo', function () {
    return view('demo');
});
