<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;



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

Route::get('/', [AuthController::class, 'showClientLoginForm']);
Route::post('/', [AuthController::class, 'login']);

Route::get('/admin', [AuthController::class, 'showAdminLoginForm']);
Route::post('/admin', [AuthController::class, 'login'])->name('login');


Route::get('/offerer', [AuthController::class, 'showOffererLoginForm']);
Route::post('/offerer', [AuthController::class, 'login']);

//home route for admin
Route::get('/admin/home', function () {
    return view('admin.index');
});

Route::get('/offerer/home', function () {
    return view('offerer.index');
});

Route::get('/home', function () {
    return view('client.index');
});