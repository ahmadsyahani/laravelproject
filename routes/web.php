<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MasterContactController;
use App\Http\Controllers\MasterProjectController;
use App\Http\Controllers\MasterSiswaController;
use App\Http\Controllers\ProjectController;
use App\Models\MasterContact;
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

Route::controller(AboutController::class)->group(function () {
    Route::get('/about', 'index')->name('about');
});
Route::controller(ProjectController::class)->group(function () {
    Route::get('/project', 'index')->name('project');
});
Route::controller(ContactController::class)->group(function () {
    Route::get('/contact', 'index')->name('contact');
});
Route::middleware('guest')->group(function () {
    Route::controller(LoginController::class)->group(function () {
        Route::get('/login', 'index')->name('login');
        Route::post('/login', 'authenticate')->name('login');
    });
});
Route::post('/logout', [LoginController::class,'logout'])->name('logout');


Route::middleware(['auth'])->group(function () {
    Route::controller(HomeController::class)->group(function () {
        Route::get('/', 'index')->name('home');
        Route::get('/dashboard', 'dashboard')->name('dashboard');
    });

    Route::prefix('admin')->group(function() {
        
        //siswa
        Route::get('/siswa', [MasterSiswaController::class, 'index'])->name('siswa.index');
        
    
        //Project
        Route::get('project/{id}/add', [MasterProjectController::class, 'add'])->name('project.add');
        Route::resource('/project', MasterProjectController::class);
        Route::resource('/contact', MasterContactController::class);
        
        Route::get('/delete_data', 'DataController@delete')->name('delete_data');
    });

    Route::middleware(['auth','role:admin'])->group(function () {
        Route::get('/siswa/create', [MasterSiswaController::class, 'create'])->name('siswa.create');
        Route::post('/siswa/store', [MasterSiswaController::class, 'store'])->name('siswa.store');
        Route::get('/siswa/edit/{siswa}', [MasterSiswaController::class, 'edit'])->name('siswa.edit');
        Route::put('/siswa/update/{siswa}', [MasterSiswaController::class, 'update'])->name('siswa.update');
        Route::delete('/siswa/destroy/{siswa}', [MasterSiswaController::class, 'destroy'])->name('siswa.destroy');
    });
});





