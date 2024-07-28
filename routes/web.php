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
});
Route::get('/login', [AdminController::class, 'index'])->name('login');
Route::post('/login', [AdminController::class, 'login']);
/*Route::get('/dashboard', function () {
    return view('dashboard');
});*/
Route::get('/dashboard', [DashboardController::class, 'index']);
Route::get('/backstage/manager', [ManagerController::class, 'index']);
Route::get('/demo', function () {
    return view('demo');
});
