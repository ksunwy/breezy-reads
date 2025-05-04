<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index() {
        $categories = Category::all();
        $topBooks = Book::orderBy('total_revenue', 'desc')
            ->take(5)
            ->get();


        $firstBook = $topBooks->first(); 
        $remainingBooks = $topBooks->slice(1);
        $discountedBooks = Book::whereNotNull('discount')
        ->where('discount','>',0)
        ->take(10)
        ->get();

        $articles = Article::orderBy('publication_date', 'desc')->take(3)->get();

        return view('welcome', compact('categories', 'firstBook', 'remainingBooks', 'discountedBooks', 'articles'));
    }
}
