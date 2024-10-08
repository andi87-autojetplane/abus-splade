<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\DusunController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\SekolahController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VillageController;

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

Route::middleware('splade')->group(function () {
    // Registers routes to support the interactive components...
    Route::spladeWithVueBridge();

    // Registers routes to support password confirmation in Form and Link components...
    Route::spladePasswordConfirmation();

    // Registers routes to support Table Bulk Actions and Exports...
    Route::spladeTable();

    // Registers routes to support async File Uploads with Filepond...
    Route::spladeUploads();

    Route::get('/', function () {
        return view('welcome');
    });

    Route::middleware('auth')->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->middleware(['verified'])->name('dashboard');

        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    Route::middleware('auth')->prefix('/admin')->name('admin.')->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('admin.index');
        Route::resource('/user', UserController::class);
        Route::resource('/employees', EmployeeController::class);
        Route::resource('/countries', CountryController::class);
        Route::resource('/provinces', ProvinceController::class);
        Route::resource('/cities', CityController::class);
        Route::resource('/districts', DistrictController::class);
        Route::resource('/villages', VillageController::class);
        Route::resource('/dusun', DusunController::class);
        Route::resource('/sekolah', SekolahController::class);
    });

    require __DIR__.'/auth.php';
});
