<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
//     return view('welcome');
// });

    Route::middleware(['web','prevent_back_logout'])->group(function(){
    Auth::routes(['register' => false]);

    // FrontendController
    Route::get('/', [App\Http\Controllers\FrontendController::class, 'root'])->name('welcome');

    // HomeController
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    // ProfileController
    Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'profile'])->name('profile');

    // ProfileSettingsController
    Route::get('/profile/settings', [App\Http\Controllers\ProfileSettingsController::class, 'settings'])->name('settings');
    Route::post('/profile/settings/update/{id}', [App\Http\Controllers\ProfileSettingsController::class, 'settings_update'])->name('settings.update');
    Route::post('/profile/password/update/{id}', [App\Http\Controllers\ProfileSettingsController::class, 'password_update'])->name('password.update');

    // EmployeesController
    Route::get('/employee', [App\Http\Controllers\EmployeeController::class, 'employee'])->name('employee');
    Route::post('/employee/db/insert', [App\Http\Controllers\EmployeeController::class, 'employee_insert'])->name('employee.insert');
    Route::post('/employee/db/update/{id}', [App\Http\Controllers\EmployeeController::class, 'employee_update'])->name('employee.update');
    Route::post('/employee/db/delete/{id}', [App\Http\Controllers\EmployeeController::class, 'employee_delete'])->name('employee.delete');

});
