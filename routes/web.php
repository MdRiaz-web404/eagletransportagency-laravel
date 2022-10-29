<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\TruckController;
use App\Http\Controllers\BusinessController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    //ProfileController
    Route::get('/admin/profile', [App\Http\Controllers\ProfileController::class, 'admin_profile'])->name('admin.profile');
    Route::get('profile/setting', [App\Http\Controllers\ProfileController::class, 'admin_profile_setting'])->name('admin.profile.setting');
    Route::post('profile/setting', [App\Http\Controllers\ProfileController::class, 'admin_profile_setting_post'])->name('admin.profile.setting.post');
    Route::post('admin/password/change', [App\Http\Controllers\ProfileController::class, 'admin_password'])->name('admin.password');
    //RoleController
    Route::resource('role', RoleController::class);
    //StaffController
    Route::resource('staff', StaffController::class);
    //TruckController
    Route::resource('truck', TruckController::class);
    //BusinessController
    Route::resource('business', BusinessController::class);
});


require __DIR__.'/auth.php';
