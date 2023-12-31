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
use App\Http\Controllers\LevelsGroupsSectionsInOne\GroupsController;
use App\Http\Controllers\LevelsGroupsSectionsInOne\LevelsController;
use App\Http\Controllers\LevelsGroupsSectionsInOne\LevGrSecController;
use App\Http\Controllers\LevelsGroupsSectionsInOne\SectionsController;



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
  Route::any('saveprogress/{progress}', [ProfilePageController::class, 'saveprogress'])->name('profiles.saveprogress');
});



Route::group(['prefix' => 'tasks', 'middleware' => 'auth'], static function () {
  Route::get('/{level}/{section}/{group}', [TasksPageController::class, 'show'])->name('tasks')->middleware('userBlock');
});

// <-


// Блок администратора ->

Route::group(['prefix' => 'admin', 'middleware' => 'admin' ], static function () {
  Route::get('/', [AdminPageController::class, 'index'])->name('admin');

  Route::get('profiles', [ProfilePageController::class, 'index'])->name('admin.profiles');
  Route::any('update/user/status/{user}', [ProfilePageController::class, 'updateUserStatus'])->name('admin.update.user.status');

  Route::get('rules', [RulesPageController::class, 'index'])->name('admin.rules');
  Route::get('create/rule', [RulesPageController::class, 'create'])->name('admin.create.rule');
  Route::any('store/rule/{rule?}', [RulesPageController::class, 'store'])->name('admin.store.rule');
  Route::any('edit/rule/{rule}', [RulesPageController::class, 'edit'])->name('admin.edit.rule');
  Route::any('update/rule/{rule}', [RulesPageController::class, 'update'])->name('admin.update.rule');
  Route::any('delete/rule/{rule}', [RulesPageController::class, 'destroy'])->name('admin.delete.rule');

  Route::get('tasks', [TasksPageController::class, 'index'])->name('admin.tasks');
  Route::get('create/task', [TasksPageController::class, 'create'])->name('admin.create.task');
  Route::post('store/task/{task?}', [TasksPageController::class, 'store'])->name('admin.store.task');
  Route::post('store/task/{task?}', [TasksPageController::class, 'store'])->name('admin.store.task');
  Route::any('task/delete/{task}', [TasksPageController::class, 'destroy'])->name('admin.delete.task');
  Route::any('update/task/{task}', [TasksPageController::class, 'edit'])->name('admin.edit.task');
  Route::any('edit/task/{task}', [TasksPageController::class, 'update'])->name('admin.update.task');
  

  Route::get('level', [LevelsController::class, 'index'])->name('admin.level');
  Route::get('group', [GroupsController::class, 'index'])->name('admin.groups');
  Route::get('section', [SectionsController::class, 'index'])->name('admin.section');

  Route::get('create/levGrSec', [LevGrSecController::class, 'create'])->name('admin.create.levGrSec');

  Route::post('store/group/{group?}', [GroupsController::class, 'store'])->name('admin.store.group');
  Route::post('store/section/{section?}', [SectionsController::class, 'store'])->name('admin.store.section');
  Route::post('store/level/{level?}', [LevelsController::class, 'store'])->name('admin.store.level');

  Route::any('level/delete/{level}', [LevelsController::class, 'destroy'])->name('admin.delete.level');
  Route::any('group/delete/{group}', [GroupsController::class, 'destroy'])->name('admin.delete.group');
  Route::any('section/delete/{section}', [SectionsController::class, 'destroy'])->name('admin.delete.section');

  Route::get('level/edit/{level}', [LevelsController::class, 'edit'])->name('admin.edit.level');
  Route::get('group/edit/{group}', [GroupsController::class, 'edit'])->name('admin.edit.group');
  Route::get('section/edit/{section}', [SectionsController::class, 'edit'])->name('admin.edit.section');

  Route::any('level/update/{level}', [LevelsController::class, 'update'])->name('admin.update.level');
  Route::any('group/update/{group}', [GroupsController::class, 'update'])->name('admin.update.group');
  Route::any('section/update/{section}', [SectionsController::class, 'update'])->name('admin.update.section');
});
// <-

// Блок для тестирования рег выражений ->
Route::group(['prefix' => 'test_regexp'], static function () {
  Route::get('/', [FirstPageController::class, 'index'])->name('index');
  Route::get('/first_task', [FirstPageController::class, 'first_task'])->name('first_task');
});
// <-