<?php

use App\Livewire\AppliedJobs;
use App\Livewire\AdminPanel;
use App\Livewire\ChangePassword;
use App\Livewire\CreateJob;
use App\Livewire\DeleteAccount;
use App\Livewire\JobView;
use App\Livewire\Apply;
use App\Livewire\UpdateInformation;
use App\Livewire\UpdateJob;
use App\Livewire\Vacancy;
use App\Livewire\UserProfile;
use App\Livewire\EditUserProfile;
use Illuminate\Support\Facades\Route;


Route::view('/', 'index')->name('home');

Route::view('/register','auth.register')->name('register');
Route::view('/login', 'auth.login')->name('login');

Route::get('/job/{id}',JobView::class)->name('jobs.view');

Route::get('/vacancy', Vacancy::class)->name('vacancy');

Route::get('/user/{id?}', UserProfile::class)->name('user.profile')->middleware(['auth', 'role:user,admin']);
Route::get('/uedit', EditUserProfile::class)->name('user.edit')->middleware(['auth', 'role:user,admin']);

Route::get('/apply/{id}', Apply::class)->name('jobs-apply')->middleware(['auth', 'role:admin,user,agent']);



Route::get('/changepass', ChangePassword::class)->name('profile.changepass')->middleware('auth','role:user,agent');
Route::get('/delete', DeleteAccount::class)->name('profile.delete')->middleware('auth','role:user,agent');

Route::middleware(['auth', 'role:agent'])->group(function () {

    Route::view('/myjobs', 'jobs.index')->name('myjobs.index');
    Route::get('/edit', UpdateInformation::class)->name('profile.edit');
    
});

Route::view('/profile', 'profile.index')->name('profile')->middleware(['auth', 'role:admin,agent']);
Route::get('/add', CreateJob::class)->name('jobs.create')->middleware(['auth', 'role:admin,agent']);
Route::get('/job/{id}/edit', UpdateJob::class)->name('jobs.update')->middleware(['auth', 'role:admin,agent']);

Route::get('/admin-2003-december/{tab?}', AdminPanel::class)->name('admin')->middleware(['auth', 'role:admin']);

Route::get('/applications/{id?}', AppliedJobs::class)->name('applications')->middleware(['auth','role:agent']);