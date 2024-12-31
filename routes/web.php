<?php

use App\Models\Note;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::view('/', 'welcome');

Route::view('/dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('/notes', 'Notes.index')
    ->middleware(['auth', 'verified'])
    ->name('notes.index');

Route::view('/notes/create', 'Notes.create')
    ->middleware(['auth', 'verified'])
    ->name('notes.create');

Route::view('/profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Volt::route('/notes/{note}/edit', 'notes.edit-note')
    ->middleware(['auth', 'verified'])
    ->name('notes.edit');

Route::get('/notes/{note}',function (Note $note){
    if(!$note->is_published){
        abort(404);
    }
    $user=$note->user;

    return view('Notes.show',compact(['note','user']));
    })->name('notes.show');

//Route::view('/notes/{note}', 'notes.show');


require __DIR__.'/auth.php';
