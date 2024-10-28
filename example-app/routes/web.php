<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\dashboard\dashboardController;
use App\Http\Controllers\RegisterStudent\RegisterStudentController;

    Route::get('/', [AuthController::class, 'loginView'])->name('loginView');
    Route::get('/register', [AuthController::class, 'registerView'])->name('registerView');

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'registerUser'])->name('registerUser');

    Route::get('/dashboardUser', [dashboardController::class, 'dashboardUser'])->name('dashboardUser');
    Route::get('/studentRegister', [RegisterStudentController::class, 'viewRegister'])->name('studentRegister');
    






    Route::get('/dashboardAdmin', [dashboardController::class, 'dashboardAdmin'])->name('dashboardAdmin');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::post('/getcity', [RegisterStudentController::class, 'getCity'])->name('getcity');
    Route::post('/store', [RegisterStudentController::class, 'store'])->name('student.store');
    Route::post('/updateUser/{id}', [dashboardController::class, 'updateUser'])->name('updateUser');
    Route::post('/deleteUser/{id}', [dashboardController::class, 'deleteUser'])->name('deleteUser');
    Route::get('/editUser/{id}', [dashboardController::class, 'editUser'])->name('editUser');
    Route::get('/editRegister/{id}', [dashboardController::class, 'editRegister'])->name('editRegister');
    Route::get('/tableRegister', [dashboardController::class, 'tableRegister'])->name('tableRegister');
    Route::get('/deleteRegister/{id}', [dashboardController::class, 'deleteRegister'])->name('deleteRegister');
    Route::post('/submitUpdateRegister/{id}', [dashboardController::class, 'submitUpdateRegister'])->name('submitUpdateRegister');