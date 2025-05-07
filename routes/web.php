<?php

use App\Livewire\JobView;
use App\Livewire\UpdateJob;
use Illuminate\Support\Facades\Route;

Route::view('/', 'index')->name('home');
Route::view('/register','auth.register')->name('register');
Route::view('/login', 'auth.login')->name('login');
Route::get('/job/{id}',JobView::class)->name('jobs.view');

Route::middleware(['auth'])->group(function () {
    Route::view('/myjobs', 'jobs.index')->name('myjobs.index');
    // Route::get('/profile', function(){
    //     return view('profile.index');
    // })->name('profile');

    // Route::get('/profile', function(){
    //     return view('profile.edit');
    // })->name('profile.edit');

    // ROute::post('/profile', function(){
    //     return view('profile.changepass');
    // })->name('profile.changepass');
    Route::view('/profile', 'profile.index')->name('profile');
    Route::view('/edit', 'profile.edit')->name('profile.edit');
    Route::view('/changepass', 'profile.changepass')->name('profile.changepass');
    Route::view('/delete', 'profile.delete')->name('profile.delete');


    Route::view('/job/add', 'jobs.add')->name('jobs.create');
    
    Route::get('/job/{id}/edit', UpdateJob::class)->name('jobs.update');
});