<?php

use Illuminate\Support\Facades\Route;

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

Route::view('/', 'welcome')->name('home');

Route::view('/sports/tennis', 'sports-tennis');
Route::view('/sports/karate', 'sports-karate');
Route::view('/sports/badminton', 'sports-badminton');
Route::view('/sports/chess', 'sports-chess');
Route::view('/sports/carrom', 'sports-carrom');
Route::view('/sports/rugger', 'sports-rugger');
Route::view('/sports/cricket', 'sports-cricket');
Route::view('/sports/kabadi', 'sports-kabadi');
Route::view('/sports/football', 'sports-football');

Route::view('/general', 'general')->name('general');
Route::view('/booking', 'booking')->name('booking');
Route::view('/contact', 'contact')->name('contact');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth'])
    ->name('dashboard');

Route::view('events', 'events')
    ->middleware(['auth', 'admin'])
    ->name('events');

Route::view('bookings', 'bookings')
    ->middleware(['auth', 'admin'])
    ->name('bookings');

Route::view('messages', 'messages')
    ->middleware(['auth', 'admin'])
    ->name('messages');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::view('notifications', 'notifications')
    ->middleware(['auth'])
    ->name('notifications');

require __DIR__.'/auth.php';
