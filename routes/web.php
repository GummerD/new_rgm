<?php

use App\Http\Controllers\Admin\AdminPageController;
use App\Http\Controllers\Tasks\TasksPageController;
use App\Http\Controllers\FirstPageController;
use App\Http\Controllers\Profiles\ProfilePageController;
use App\Http\Controllers\Rules\RulesPageController;
use App\Http\Controllers\StartPageController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware grouen
|
*/

// Этот блок будет доступен всем ->

Route::get('/', [StartPageController::class, 'index'])->name('start');


Route::group(['prefix' => 'rules'], static function () {
  Route::get('/', [RulesPageController::class, 'index'])->name('rules');
});

// Блок регистрации/авторизации  ->
// User: vamobe@mailinator.com
// password: 12345678

Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');
//<-
// <-


// Этот блок будет доступен только для зарегистрированных пользователей ->


Route::group(['prefix' => 'profiles', 'middleware' => 'auth'], static function () {
  Route::get('/', [ProfilePageController::class, 'index'])->name('profiles');
});


Route::group(['prefix' => 'tasks', 'middleware' => 'auth'], static function () {
  Route::get('/', [TasksPageController::class, 'index'])->name('tasks');
});

// <-


// Блок администратора ->

Route::group(['prefix' => 'admin'], static function () {
  Route::get('/', [AdminPageController::class, 'index'])->name('admin');
});

//блок Дениса, для тестирования своих фич:

Route:: group(['prefix'=>'test_pages_denis'], static function (){
    Route::get('/', [FirstPageController::class, 'index']) ->name('/');
    Route::get('/first_task', [FirstPageController::class, 'first_task'])->name('first_task');}
);


