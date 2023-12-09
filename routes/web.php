<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\ProfileController;
use App\Models\Book;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard',[
        'books'=> Book::all()
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/books', [BookController::class, 'index'])->name('book.index');
    Route::get('/books/create', [BookController::class, 'create'])->name('book.create');
    Route::post('/books', [BookController::class, 'store'])->name('book.store');
    Route::get('/books/{book}/edit', [BookController::class, 'edit'])->name('book.edit');
    Route::patch('/books/{book}', [BookController::class, 'update'])->name('book.update');
    Route::delete('/books/{book}', [BookController::class, 'destroy'])->name('book.destroy');

});

require __DIR__.'/auth.php';
