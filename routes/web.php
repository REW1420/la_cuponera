<?php

use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\OffersController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriesController;


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

Route::get('/', [AuthController::class, 'showLoginForm']);

Route::post('/', [AuthController::class, 'login'])->name('login');
Route::post("/admin/home/categories", [CategoriesController::class, 'store'])->name('store.category');
Route::delete('/category/delete/{id}', [CategoriesController::class, 'destroy'])->name('destroy.category');
Route::put('/category/update/{id}', [CategoriesController::class, 'update'])->name('update.category');
Route::post('/admin/home/companies', [CompaniesController::class, 'store'])->name('store.company');

Route::delete('/company/delete/{id}', [CompaniesController::class, 'destroy'])->name('destroy.company');

Route::put('/company/update/{id}', [CompaniesController::class, 'update'])->name('update.company');

//Route::middleware(['auth.check'])->group(function () {
//home route for admin
Route::get('/admin/home', [CompaniesController::class, 'index']);
Route::get('/admin/home/client', function () {
    return view('admin.pages.client');
});
Route::get('/admin/home/categories', [CategoriesController::class, 'index']);
Route::get('/admin/companies/info/{id}', [OffersController::class, 'index']);
Route::put('/offer/update/{id}', [OffersController::class, 'update'])->name('update.offer');


Route::get('/offerer/home', function () {
    return view('offerer.index');
});

Route::get('/home', function () {
    return view('client.index');
});
Route::get('/clerk/home', function () {
    return view('clerk.index');
});

//});
