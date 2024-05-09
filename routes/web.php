<?php

use App\Http\Controllers\ClientsController;
use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\EmailVerificationController;
use App\Http\Controllers\OffersController;
use App\Http\Controllers\Rejected_reasons_Controller;
use App\Http\Controllers\UserSettingsController;
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
// Rutas de autenticación
Route::get('/', [AuthController::class, 'showLoginForm']);
Route::post('/', [AuthController::class, 'login'])->name('login');
Route::get('/system', [AuthController::class, 'showSystemLoginForm']);
Route::post('/system', [AuthController::class, 'login_system'])->name('login.system');
Route::get('/system/logout', [AuthController::class, 'SystemLogout'])->name('logout');
Route::get('/register', [AuthController::class, 'showRegisterForm']);
Route::post('/register', [AuthController::class, 'register_new_client'])->name('register');
Route::get('/forgot_password', [AuthController::class, 'showForgotPasswordForm']);
Route::post('/forgot_password', [AuthController::class, 'send_reset_password_email'])->middleware('guest')->name('password.email');
Route::post('/forgot-password', [AuthController::class, 'register_new_client'])->name('forgot_password');
Route::get('/reset-password/{token}', [AuthController::class, 'reset_password_form'])->middleware('guest')->name('password.reset');
Route::post('/reset-password', [AuthController::class, 'reset_password'])->middleware('guest')->name('password.update');

Route::middleware(['auth'])->group(function () {
    // Rutas de categorías
    Route::get('/admin/home/categories', [CategoriesController::class, 'index']);
    Route::post("/admin/home/categories", [CategoriesController::class, 'store'])->name('store.category');
    Route::delete('/category/delete/{id}', [CategoriesController::class, 'destroy'])->name('destroy.category');
    Route::put('/category/update/{id}', [CategoriesController::class, 'update'])->name('update.category');

    // Rutas de empresas
    Route::post('/admin/home/companies', [CompaniesController::class, 'store'])->name('store.company');
    Route::delete('/company/delete/{id}', [CompaniesController::class, 'destroy'])->name('destroy.company');
    Route::put('/company/update/{id}', [CompaniesController::class, 'update'])->name('update.company');
    Route::get('/admin/home', [CompaniesController::class, 'index']);

    // Otras rutas de administrador
    Route::get('/admin/companies/info/{id}', [OffersController::class, 'index']);
    Route::get('/admin/home/client', [ClientsController::class, 'index']);

    // Rutas de ofertas
    Route::put('/offer/update/{id}', [OffersController::class, 'update'])->name('update.offer');
    Route::get('/admin/home/offers', [OffersController::class, 'get_offers_by_status_waiting'])->name('offer.index');
    Route::post('/admin/offer/update/status', [OffersController::class, 'set_approved_status'])->name('approved.offer');
    Route::post('/admin/offer/create_reason', [Rejected_reasons_Controller::class, 'store'])->name('create.reason');

    //user settings
    Route::get('/settings/user', [UserSettingsController::class, 'show_setting_form'])->name('index.settings');
    Route::post('/settings/user', [UserSettingsController::class, 'update_system_user'])->name('user.settings');
    Route::post('/settings/client', [UserSettingsController::class, 'update_system_client'])->name('client.settings');
    Route::get('/settings/password', [UserSettingsController::class, 'show_setting_password_form'])->name('password.index.settings');
    Route::post('/settings/password', [UserSettingsController::class, 'update_system_password'])->name('password.settings');
});

// Rutas de verificación de correo electrónico
Route::get('/email/verify/{token}', [EmailVerificationController::class, 'verify'])->name('auth.verify');



// Rutas de roles
Route::prefix('')->group(function () {
    Route::get('/offerer/home', function () {
        return view('offerer.index');
    });
    Route::get('/home', function () {
        return view('client.index');
    });
    Route::get('/clerk/home', function () {
        return view('clerk.index');
    });
});
