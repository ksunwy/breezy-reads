<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/signup', [LoginController::class, 'signup'])->name('signup');
Route::post('/signup', [LoginController::class, 'register'])->name('register');

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('authenticate');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::resource('/users', UserController::class)->except(['show']);
Route::get('/user/{id}', [UserController::class, 'showForm'])->name('users.user');

Route::resource('/articles', controller: ArticleController::class)->except(['show']);;
Route::get('/article/{id}', [ArticleController::class, 'showForm'])->name('articles.article');

Route::resource('/books', controller: BookController::class)->except(['show']);
Route::get('/book/{id}', [BookController::class, 'showForm'])->name('books.book');
Route::get('/books/report', [BookController::class, 'report'])->name('books.report');
Route::get('/books/export/{format}', [BookController::class, 'export'])->name('books.export');

