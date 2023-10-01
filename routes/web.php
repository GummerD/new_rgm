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
| be assigned to the "web" middleware group. Make something great!
|
*/



// Этот блок будет доступен всем ->

Route::get('/', [StartPageController::class, 'index'])->name('start');


Route::group(['prefix' => 'rules'], static function () {
  Route::get('/', [RulesPageController::class, 'show'])->name('rules');
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
  Route::get('/', [ProfilePageController::class, 'show'])->name('profiles');
  Route::get('update/{user}', [ProfilePageController::class, 'update'])->name('profiles.update');
  Route::any('edit/{user}', [ProfilePageController::class, 'edit'])->name('profiles.edit');
  Route::any('saveprogress/{prog}', [ProfilePageController::class, 'saveprogress'])->name('profiles.saveprogress');
});



Route::group(['prefix' => 'tasks', 'middleware' => 'auth'], static function () {
  Route::get('/{level}/{section}/{group}', [TasksPageController::class, 'show'])->name('tasks');
});

// <-


// Блок администратора ->

Route::group(['prefix' => 'admin'], static function () {
  Route::get('/', [AdminPageController::class, 'index'])->name('admin');
  Route::get('profiles', [ProfilePageController::class, 'index'])->name('admin.profiles');

  Route::get('rules', [RulesPageController::class, 'index'])->name('admin.rules');
  Route::get('create/rule', [RulesPageController::class, 'create'])->name('admin.create.rule');

  Route::get('tasks', [TasksPageController::class, 'index'])->name('admin.tasks');
  Route::get('create/task', [TasksPageController::class, 'create'])->name('admin.create.task');
  Route::post('store/task/{task?}', [TasksPageController::class, 'store'])->name('admin.store.task');
  Route::post('store/task/{task?}', [TasksPageController::class, 'store'])->name('admin.store.task');
  Route::post('task/delete/{task}', [TasksPageController::class, 'destroy'])->name('admin.delete.task');
  
});
// <-

// Блок для тестирования рег выражений ->
Route::group(['prefix' => 'test_regexp'], static function () {
  Route::get('/', [FirstPageController::class, 'index'])->name('index');
  Route::get('/first_task', [FirstPageController::class, 'first_task'])->name('first_task');
});
// <-