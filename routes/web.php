<?php

use App\Http\Controllers\AssetController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudyController;
use App\Http\Controllers\WebManagementController;
use App\Models\WebManagement;
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

// Route::get('/', function () {
//     return view('landing.index');
// });
Route::get('/', [WebManagementController::class, 'landing'])->name('home');
Route::get('/aset/{asset}/view', [AssetController::class, 'show'])->name('aset.show');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // Routes for admin
    Route::prefix('admin')->group(function () {
        Route::get('/', function () {
            return view('dashboard');
        })->name('dashboard');

        Route::get('/aset', [AssetController::class, 'index'])->name('aset.index');
        Route::post('/aset}', [AssetController::class, 'store'])->name('aset.store');
        Route::delete('/aset/{aset}', [AssetController::class, 'destroy'])->name('aset.destroy');
        Route::resource('/kategori', CategoryController::class);

        Route::resource('/kajian', StudyController::class);

        Route::get('/manajemen-web', [WebManagementController::class, 'index'])->name('web.index');
        Route::post('/manajemen-web/store', [WebManagementController::class, 'store'])->name('web.store');
    });
});

require __DIR__ . '/auth.php';
