<?php

use App\Http\Controllers\admin\categoryController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('category/index', [categoryController::class, 'index'])->name('category.index');
Route::get('category/create', [categoryController::class, 'create'])->name('category.create');
Route::post('category/store', [categoryController::class, 'store'])->name('category.store');
Route::get('category/edit/{id}', [categoryController::class, 'edit'])->name('category.edit');
Route::post('category/update/{id}', [categoryController::class, 'update'])->name('category.update');
Route::get('category/delete/{id}', [categoryController::class, 'destroy'])->name('category.delete');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
