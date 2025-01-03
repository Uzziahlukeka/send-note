<?php

use App\Models\Blog;
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

Route::view('/blogs', 'Blog.index')
    ->name('blogs');
Route::view('/blogs/create', 'Blog.create')
    ->name('blogs.create');
Route::get('/blogs/{blog}', function (Blog $blog) {
    return view('Blog.show',['blogId' => $blog->id]);
})->name('blogs.show');

Volt::route('/blogs/{blog}/edit', 'blog.edit')
    ->middleware(['auth', 'verified'])
    ->name('blog.edit');

Volt::route('/comments/{comment}/edit', 'comments.edit')
    ->middleware(['auth', 'verified'])
    ->name('comment.edit');


Route::view('/comments', 'Comments.index')
    ->name('comments');
Route::view('/comment/create', 'Comments.create')
    ->name('comment.create');
Route::view('/comment/{blog}', 'Comments.show')
    ->name('comment.show');


require __DIR__.'/auth.php';
