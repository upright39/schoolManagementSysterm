<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\UserProfileController;

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

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.index');
})->name('dashboard');

//logout route
Route::get('logout/user', [AdminController::class, 'Logout'])->name('logout_user');

//MANAGE USER ROUTE

Route::prefix('users')->group(function () {
    Route::get('/veiw', [UserController::class, 'userVeiw'])->name('view_users');
    Route::get('/add', [UserController::class, 'addUser'])->name('add_user');
    Route::post('/store', [UserController::class, 'storeUser'])->name('store.user');
    Route::get('/edith/{id}', [UserController::class, 'edithUser'])->name('edith.user');
    Route::post('/update/{id}', [UserController::class, 'updateUser'])->name('update.user');
    Route::get('/delete/{id}', [UserController::class, 'deleteUser'])->name('user.delete');
});

Route::prefix('profile')->group(function () {

    Route::get('/veiw', [UserProfileController::class, 'veiwProfile'])->name('view.profile');
    Route::get('/edith', [UserProfileController::class, 'edithProfile'])->name('edith.profile');
    Route::post('/update', [UserProfileController::class, 'updateProfile'])->name('update.profile');

    Route::get('/password/edith', [UserProfileController::class, 'edithPassword'])->name('edithPassword');
    Route::post('/password/update', [UserProfileController::class, 'updatePassword'])->name('update.password');
});