<?php

use App\Http\Controllers\FallbackController;
use App\Http\Controllers\CalculateController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\Utils;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\StudentExamController;
use App\Http\Controllers\StudentAuthController;

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
    Route::get('/login/{id}', [UserController::class, 'login']);

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
    Route::delete('/delete/{id}', [PostController::class, 'deletePost'])->name('post.delete');
   Route::get('/search', [PostController::class, 'searchPost'])->name('post.search');
})->middleware('check.auth');

// Student auth routes
Route::group(['prefix' => 'student-auth'], function () {

    Route::get('/register', [StudentAuthController::class, 'showRegister'])->name('studentAuth.register');
    Route::post('/register', [StudentAuthController::class, 'register'])->name('studentAuth.register.submit');
    Route::get('/login', [StudentAuthController::class, 'showLogin'])->name('studentAuth.login');
    Route::post('/login', [StudentAuthController::class, 'login'])->name('studentAuth.login.submit');
    Route::get('/forgot-password', [StudentAuthController::class, 'showForgotPassword'])->name('studentAuth.forgotPassword');
    Route::post('/forgot-password', [StudentAuthController::class, 'forgotPassword'])->name('studentAuth.forgotPassword.submit');

    Route::group(['middleware' => 'check.student.auth'], function () {
        Route::get('/dashboard', [StudentAuthController::class, 'dashboard'])->name('studentAuth.dashboard');
        Route::post('/logout', [StudentAuthController::class, 'logout'])->name('studentAuth.logout');
    });
});

// Student exam routes (login required)
Route::group(['prefix' => 'student-exam', 'middleware' => 'check.student.auth'], function () {

    Route::get('/', [StudentExamController::class, 'examList'])->name('studentExam.list');
    Route::get('/{examId}/instructions', [StudentExamController::class, 'examInstructions'])->where('examId', '[0-9]+')->name('studentExam.instructions');
    Route::get('/{examId}/start', [StudentExamController::class, 'startExam'])->where('examId', '[0-9]+')->name('studentExam.start');
    Route::post('/{examId}/submit', [StudentExamController::class, 'submitExam'])->where('examId', '[0-9]+')->name('studentExam.submit');
    Route::get('/{examId}/success', [StudentExamController::class, 'submitSuccess'])->where('examId', '[0-9]+')->name('studentExam.success');

});