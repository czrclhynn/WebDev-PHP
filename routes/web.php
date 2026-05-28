<?php

use App\Http\Controllers\FallbackController;
use App\Http\Controllers\CalculateController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\Utils;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('home', [UserController::class, 'home']);

Route::get('about', [AboutController::class,'index'])->name('about');


Route::group(['prefix' => 'user'], function(){

    Route::get('delete', [UserController::class, 'index']);

    Route::get('{id}/{name}', [UserController::class, 'UserInputParam'])->name('userDisplay'); 

    Route::get('edit/{id}/{name}', [UserController::class, 'edit']);

    Route::get('{id}', [UserController::class, 'getId']);

    Route::post('addUser', [UserController::class, 'addUser'])->name('addUser');

});

Route::get('calculate/{num1}/{num2}', [CalculateController::class, 'index']);

//Route::get('calc/{num1}/{num2}', [Utils::class, 'calc']);
   
Route::fallback([FallbackController::class, 'index']);

Route::get('/pricing', [UserController::class, 'pricing']);

Route::get('/form', [UserController::class, 'showForm'])->name('form');

Route::group(['prefix' => 'post'], function () {

    Route::get('/', [PostController::class, 'index'])->name('post');
    Route::post('/', [PostController::class, 'createPost'])->name('post.createPost');
    Route::get('edit/{id}', [PostController::class, 'editForm'])->name('post.edit-form');
    Route::post('edit/{id}', [PostController::class, 'editSubmit']) ->name('post.edit-submit');

});

