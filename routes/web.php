<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ProductController;
use App\Http\Controllers\Frontend\UserProfileController;
use App\Http\Controllers\Frontend\UserDashboardController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' =>['auth', 'verified'], 'prefix' => 'user', 'as' => 'user.'], function() {
    Route::get('dashboard', [UserDashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [UserProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [UserProfileController::class, 'update'])->name('profile.update');
    Route::post('profile/update/password', [UserProfileController::class, 'updatePassword'])->name('profile.password.update');
});

require __DIR__.'/auth.php';

Route::get('/admin/login', [AdminController::class, 'login'])->name('admin.login');

/** Product route */
Route::get('products', [ProductController::class, 'productsIndex'])->name('products.index');
Route::get('product-detail/{slug}', [ProductController::class, 'showProduct'])->name('product-detail');
Route::get('change-product-list-view', [ProductController::class, 'chageListView'])->name('change-product-list-view');

/** settings routes */
Route::get('settings', [SettingController::class, 'index'])->name('settings.index');
