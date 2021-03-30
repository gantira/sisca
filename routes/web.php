<?php

use App\Http\Livewire\Admin\Categories\{Create as CategoriesCreate, Edit as CategoriesEdit, Index as CategoriesIndex};
use App\Http\Livewire\Admin\Posts\{Create, Edit, Index};
use App\Http\Livewire\Admin\Tags\{Create as TagsCreate, Edit as TagsEdit, Index as TagsIndex};
use App\Http\Livewire\Admin\Teams\{Create as TeamsCreate, Edit as TeamsEdit, Index as TeamsIndex};
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

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/home', function () {
        return view('dashboard');
    })->name('home');

    // Admin Sites
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::prefix('tags')->name('tags.')->group(function () {
            Route::get('', TagsIndex::class)->name('index');
            Route::get('{tag}/edit', TagsEdit::class)->name('edit');
            Route::get('create', TagsCreate::class)->name('create');
        });
        Route::prefix('categories')->name('categories.')->group(function () {
            Route::get('', CategoriesIndex::class)->name('index');
            Route::get('{category}/edit', CategoriesEdit::class)->name('edit');
            Route::get('create', CategoriesCreate::class)->name('create');
        });
        Route::prefix('teams')->name('teams.')->group(function () {
            Route::get('', TeamsIndex::class)->name('index');
            Route::get('{team}/edit', TeamsEdit::class)->name('edit');
            Route::get('create', TeamsCreate::class)->name('create');
        });
        Route::prefix('posts')->name('posts.')->group(function () {
            Route::get('', Index::class)->name('index');
            Route::get('{post}/edit', Edit::class)->name('edit');
            Route::get('create', Create::class)->name('create');
        });
    });
});

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
