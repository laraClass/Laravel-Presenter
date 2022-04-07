<?php

use Illuminate\Support\Facades\Route;

use \App\Http\Controllers\Admins\DashboardController;
use \App\Http\Controllers\Admins\UsersController;


Route::get('/', function () {

    $items = ['a', 'b', 'c', 'd'];

    // compact('items') => [ 'items' => $items ]
    return view('welcome', compact('items'));
    //return view('welcome', ['items' => $items]);

});

Route::group(['prefix' => 'admin'], function () {

    Route::get('/dashboard', [ DashboardController::class, 'index'])->name('admin.dashboard');

    Route::group(['prefix' => 'users'], function () {

        Route::get('/dashboard', [ DashboardController::class, 'index'])->name('admin.dashboard');
        Route::get('/list', [ UsersController::class, 'index'])->name('admin.users.list');
        Route::get('/create', [ UsersController::class, 'create'])->name('admin.users.create');
        Route::post('/create', [ UsersController::class, 'store'])->name('admin.users.store');
        Route::post('/storeNotification', [ UsersController::class, 'storeNotification'])->name('admin.users.store.notification');
        //Route::get('/edit/{id}', [ UsersController::class, 'edit'])->name('admin.users.edit');
        Route::get('/edit/{user}', [ UsersController::class, 'edit'])->name('admin.users.edit');
        Route::post('/update/{user}', [ UsersController::class, 'update'])->name('admin.users.update');
        Route::get('/delete/{user}', [ UsersController::class, 'delete'])->name('admin.users.delete');

    });
    Route::group(['prefix' => 'products'], function () {



    });


});
Route::resource('/test', \App\Http\Controllers\TestController::class);
