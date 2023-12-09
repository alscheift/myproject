<?php

namespace App\Http\Controllers;


use App\Models\Book;
use App\Models\Categories;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BookController extends Controller
{
    public function index(): View
    {
        $books = auth()->user()->books;
        return view('books.index', [
            'books' => $books,
        ]);
    }

    public function create(): View
    {
        $categories = Categories::all();

        return view('books.create', [
            'categories' => $categories
        ]);
    }

    public function store(): RedirectResponse
    {
        $attributes = request()->validate([
            'title' => 'required:max:10',
            'description' => 'required|max:255',
            'category_id' => 'required'
        ]);

        Book::create([
            ...$attributes,
            'user_id' => auth()->user()->id,
        ]);
        return redirect()->back()->with('success','Book Added Successfully');
    }
    public function edit(Book $book): View
    {
        return view('books.edit', [
            'book' => $book,
            'categories' => Categories::all()
        ]);
    }

    public function update(Book $book): RedirectResponse
    {
        $attributes = request()->validate([
            'title' => 'required:max:10',
            'description' => 'required|max:255',
            'category_id' => 'required'
        ]);

        $book->update($attributes);
        return redirect()->back()->with('success','Book updated!');
    }

    public function destroy(Book $book): RedirectResponse
    {
        $book->delete();
        return redirect()->back()->with('success', 'Successfully deleted book!');
    }
}
