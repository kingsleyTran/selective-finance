<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;

Route::get('/', HomeController::class)->name('home');

Route::get('/about-us', [PageController::class, 'about'])->name('about');

Route::get('/our-services', [ServiceController::class, 'index'])->name('services.index');
Route::get('/our-services/{slug}', [ServiceController::class, 'show'])->name('services.show');

Route::get('/blogs', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blogs/{slug}', [BlogController::class, 'show'])->name('blog.show');

Route::get('/contact-us', [ContactController::class, 'show'])->name('contact');
Route::post('/contact-us', [ContactController::class, 'store'])->name('contact.submit');
