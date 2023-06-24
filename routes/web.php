<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController as ProfileOfAdminController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::prefix('admin')->name('admin.')->group(function(){
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->middleware(['auth:admin', 'verified'])->name('dashboard');

    Route::middleware('auth:admin')->group(function () {
        Route::get('/profile', [ProfileOfAdminController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileOfAdminController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileOfAdminController::class, 'destroy'])->name('profile.destroy');
    });

    require __DIR__.'/admin.php';
});

Route::get('/items', 'App\Http\Controllers\ItemController@index')->name('item.index');

Route::get('/items/create', 'App\Http\Controllers\ItemController@create')->name('item.create')->middleware('auth');;
Route::post('/items/store', 'App\Http\Controllers\ItemController@store')->name('item.store')->middleware('auth');;

Route::get('/items/edit/{item}', 'App\Http\Controllers\ItemController@edit')->name('item.edit')->middleware('auth');;
Route::put('/items/edit/{item}', 'App\Http\Controllers\ItemController@update')->name('item.update')->middleware('auth');;

Route::get('/items/show/{item}', 'App\Http\Controllers\ItemController@show')->name('item.show');

Route::middleware('auth:admin')->group(function () {
    Route::delete('/items/{item}', 'App\Http\Controllers\ItemController@destroy')->name('item.destroy');
});

    

Route::get('/juchus', 'App\Http\Controllers\JuchuController@index')->name('juchu.index');  

Route::get('/juchus/create', 'App\Http\Controllers\JuchuController@create')->name('juchu.create')->middleware('auth');;
Route::post('/juchus/store', 'App\Http\Controllers\JuchuController@store')->name('juchu.store')->middleware('auth');;

Route::get('/juchus/edit/{juchu}', 'App\Http\Controllers\JuchuController@edit')->name('juchu.edit')->middleware('auth');;
Route::put('/juchus/edit/{juchu}', 'App\Http\Controllers\JuchuController@update')->name('juchu.update')->middleware('auth');;

Route::get('/juchus/show/{juchu}', 'App\Http\Controllers\JuchuController@show')->name('juchu.show');

Route::delete('/juchus/{juchu}', 'App\Http\Controllers\JuchuController@destroy')->name('juchu.destroy')->middleware('auth');;

//admin用

Route::get('/admin/items', 'App\Http\Controllers\ItemController@index')->name('admin.item.index');

Route::get('/admin/items/create', 'App\Http\Controllers\ItemController@create')->name('admin.item.create');
Route::post('/admin/items/store', 'App\Http\Controllers\ItemController@store')->name('admin.item.store');

Route::get('/admin/items/edit/{item}', 'App\Http\Controllers\ItemController@edit')->name('admin.item.edit');
Route::put('/admin/items/edit/{item}', 'App\Http\Controllers\ItemController@update')->name('admin.item.update');

Route::get('/admin/items/show/{item}', 'App\Http\Controllers\ItemController@show')->name('admin.item.show');

Route::delete('/admin/juchus/{juchu}', 'App\Http\Controllers\JuchuController@destroy')->name('admin.juchu.destroy');
    

Route::get('/admin/juchus', 'App\Http\Controllers\JuchuController@index')->name('admin.juchu.index');  

Route::get('/admin/juchus/create', 'App\Http\Controllers\JuchuController@create')->name('admin.juchu.create');
Route::post('/admin/juchus/store', 'App\Http\Controllers\JuchuController@store')->name('admin.juchu.store');

Route::get('/admin/juchus/edit/{juchu}', 'App\Http\Controllers\JuchuController@edit')->name('admin.juchu.edit');
Route::put('/admin/juchus/edit/{juchu}', 'App\Http\Controllers\JuchuController@update')->name('admin.juchu.update');

Route::get('admin/juchus/show/{juchu}', 'App\Http\Controllers\JuchuController@show')->name('admin.juchu.show');

Route::delete('/admin/juchus/{juchu}', 'App\Http\Controllers\JuchuController@destroy')->name('admin.juchu.destroy');

