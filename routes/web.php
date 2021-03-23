<?php

use App\Http\Livewire\Admin\Tags\{Index, Create, Edit};
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

Route::middleware(['auth'])->group(function () {
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::prefix('tags')->name('tags.')->group(function () {
            Route::get('', Index::class)->name('index');
            Route::get('{tag}/edit', Edit::class)->name('edit');
            Route::get('create', Create::class)->name('create');
        });
    });
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
