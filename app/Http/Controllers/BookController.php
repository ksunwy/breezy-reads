<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class BookController extends Controller
{

    public function export($format)
    {
        $books = Book::with('category')->get();

        if ($format === 'excel') {
            return Excel::download(new \App\Exports\BooksExport, 'books.xlsx');
        }

        if ($format === 'pdf') {
            $pdf = PDF::loadView('books.report_pdf', compact('books'));
            return $pdf->download('books.pdf');
        }

        return redirect()->route('books.report');
    }
    public function report(Request $request)
    {
        $books = Book::with('category')->get();

        return view('books.report', compact('books'));
    }
    public function index(Request $request)
    {
        $search = $request->input('search');

        $books = Book::query();

        if ($search) {
            $books->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('author', 'like', "%{$search}%");
            });
        }

        if ($request->filled('category')) {
            $books->where('category_id', $request->category);
        }

        if ($request->filled('year_from')) {
            $books->where('publication_year', '>=', $request->year_from);
        }

        if ($request->filled('year_to')) {
            $books->where('publication_year', '<=', $request->year_to);
        }

        if ($request->filled('price_to')) {
            $books->where('price', '<=', $request->price_to);
        }

        if ($request->filled('language')) {
            $books->where('original_language', 'like', "%{$request->language}%");
        }

        $books = $books->get();

        return view('books.index', compact('books', 'search'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('books.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'publication_year' => 'required|integer',
            'price' => 'required|numeric',
            'original_language' => 'required',
            'category_id' => 'required|exists:categories,id',
            'discount' => 'nullable|numeric',
            'description' => 'nullable|string',
            'sales_count' => 'nullable|integer',
            'total_revenue' => 'nullable|numeric',
            'average_rating' => 'nullable|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $colors = ["#FFDBF5", "#FFF3B6", "#D9FFF8", "#CBE3FF", "#DED2F9", "#FFDBF5"];
        $bookCount = Book::count();
        $color = $colors[$bookCount % count($colors)];

        $imagePath = '/img/default-book.png';
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads'), $filename);
            $imagePath = '/uploads/' . $filename;
        }

        Book::create([
            'title' => $request->title,
            'author' => $request->author,
            'publication_year' => $request->publication_year,
            'price' => $request->price,
            'original_language' => $request->original_language,
            'category_id' => $request->category_id,
            'discount' => $request->discount ?? 0,
            'description' => $request->description,
            'sales_count' => $request->sales_count ?? 0,
            'total_revenue' => $request->total_revenue ?? 0,
            'image_url' => $imagePath,
            'color' => $color,
        ]);

        return redirect()->route('books.index');
    }

    public function edit($id)
    {
        $book = Book::findOrFail($id);
        $categories = Category::all();
        return view('books.edit', compact('book', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'publication_year' => 'required|integer',
            'price' => 'required|numeric',
            'original_language' => 'required',
            'category_id' => 'required|exists:categories,id',
            'discount' => 'nullable|numeric',
            'description' => 'nullable|string',
            'sales_count' => 'nullable|integer',
            'total_revenue' => 'nullable|numeric',
            'average_rating' => 'nullable|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $book = Book::findOrFail($id);

        $data = [
            'title' => $request->title,
            'author' => $request->author,
            'publication_year' => $request->publication_year,
            'price' => $request->price,
            'original_language' => $request->original_language,
            'category_id' => $request->category_id,
            'discount' => $request->discount ?? 0,
            'description' => $request->description,
            'sales_count' => $request->sales_count ?? 0,
            'total_revenue' => $request->total_revenue ?? 0,
            'average_rating' => $request->average_rating ?? 0,
        ];

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads'), $filename);
            $data['image_url'] = '/uploads/' . $filename;
        }

        $book->update($data);

        return redirect()->route('books.index');
    }

    public function destroy($id)
    {
        Book::destroy($id);
        return redirect()->route('books.index');
    }

    public function showForm($id)
    {
        $book = Book::find($id);
        return view('books.book', compact('book'));
    }
}
