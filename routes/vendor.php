<?php
use App\Http\Controllers\Backend\VendorController;
use App\Http\Controllers\Backend\VendorProductController;
use App\Http\Controllers\Backend\VendorProductImageGalleryController;
use App\Http\Controllers\Backend\VendorProfileController;
use App\Http\Controllers\Backend\VendorShopProfileController;
use Illuminate\Support\Facades\Route;

/** Vendor Routes */
Route::get('/dashboard', [VendorController::class, 'dashboard'])->name('dashboard');
Route::get('profile', [VendorProfileController::class, 'edit'])->name('profile');
Route::put('profile', [VendorProfileController::class, 'updateProfile'])->name('profile.update'); // vendor.profile.update
Route::post('profile', [VendorProfileController::class, 'updatePassword'])->name('profile.update.password'); // vendor.profile.update.password

/** Vendor shop profile  */
Route::get('shop-profile', [VendorShopProfileController::class, 'edit'])->name('shop-profile.edit');
Route::put('shop-profile', [VendorShopProfileController::class, 'update'])->name('shop-profile.update');

/** Product Routes */
Route::get('product/get-subcategories', [VendorProductController::class, 'getSubCategories'])->name('product.get-subcategories');
Route::get('product/get-child-categories', [VendorProductController::class, 'getChildCategories'])->name('product.get-child-categories');
Route::put('product/change-status', [VendorProductController::class, 'changeStatus'])->name('product.change-status');
Route::resource('products', VendorProductController::class);

Route::get('products-image-gallery', [VendorProductImageGalleryController::class, 'index'])->name('products-image-gallery.index');
Route::post('products-image-gallery/upload', [VendorProductImageGalleryController::class, 'upload'])->name('products-image-gallery.upload');
Route::delete('products-image-gallery/{id}', [VendorProductImageGalleryController::class, 'destroy'])->name('products-image-gallery.destroy');
