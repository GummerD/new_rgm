<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FirstPageController;

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

/*
Route::get('/', function () {
    return view('welcome');
});

/* тест работы приложения
Route::get('/hello/{name}', static function (string $name): string {
    return "Hello, {$name}";
});
*/ 

Route::get('/', [FirstPageController::class, 'index']) ->name('/');
Route::get('/first_task', [FirstPageController::class, 'first_task'])->name('first_task');
