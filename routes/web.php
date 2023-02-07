<?php


use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', function () {
    return view('home', ['title' => 'Home']);
})->name('home');

Route::get('register', [UserController::class, 'register'])->name('register');
Route::post('register', [UserController::class, 'register_action'])->name('register.action');
Route::get('login', [UserController::class, 'login'])->name('login');
Route::post('login', [UserController::class, 'login_action'])->name('login.action');
Route::get('password', [UserController::class, 'password'])->name('password');
Route::post('password', [UserController::class, 'password_action'])->name('password.action');
Route::get('logout', [UserController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth']], function() {
Route::get('/todo', [App\Http\Controllers\TodoController::class, 'index'])->name('todo');
Route::post('todo/create', [App\Http\Controllers\TodoController::class, 'store'])->name('todo.store');
Route::post('todo/ajax', [App\Http\Controllers\TodoController::class, 'ajax'])->name('todo.ajax');
Route::delete('todo/{todo}',[App\Http\Controllers\TodoController::class, 'destroy'])->name('todo.destroy');
Route::get('todo/edit/{todo}', [App\Http\Controllers\TodoController::class, 'edit'])->name('todo.edit');

});
