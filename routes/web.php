<?php

use App\Http\Controllers\Admin\AdminPageController;
use App\Http\Controllers\Exercises\ExercisesPageController;
use App\Http\Controllers\FirstPageController;
use App\Http\Controllers\Profiles\ProfilePageController;
use App\Http\Controllers\Rules\RulesPageController;
use App\Http\Controllers\StartPageController;
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


// Route::get('/', [FirstPageController::class, 'index']) ->name('/');
// Route::get('/first_task', [FirstPageController::class, 'first_task'])->name('first_task');



// Этот блок будет доступен всем ->

Route::get('/', [StartPageController::class, 'index'])->name('start');


Route::group(['prefix' => 'rules'], static function(){
    Route::get('/', [RulesPageController::class, 'index'])->name('rules');
});

// Блок регистрации/авторизации добавим, когда решим каким способом будем делать)) -><-

// <-


// Этот блок будет доступен только для зарегистрированных пользователей ->

Route::group(['prefix' => 'profiles'], static function(){
    Route::get('/', [ProfilePageController::class, 'index'])->name('profiles');
});


Route::group(['prefix' => 'exercises'], static function(){
    Route::get('/', [ExercisesPageController::class, 'index'])->name('exercises');
});

// <-


// Блок администратора ->

Route::group(['prefix' => 'admin'], static function(){
    Route::get('/', [AdminPageController::class, 'index'])->name('admin');
});
// <-