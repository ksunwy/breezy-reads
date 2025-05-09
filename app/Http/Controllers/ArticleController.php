<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{

    public function index(Request $request)
    {
        $search = $request->input('search');
    
        $articles = Article::query();
    
        if ($search) {
            $articles = $articles->where('title', 'like', "%{$search}%")
                           ->orWhere('author', 'like', "%{$search}%");
        }
    
        $articles = $articles->get();
    
        return view('articles.index', compact('articles', 'search'));
    }

    public function create()
    {
        $topics = ['Технологии', 'Наука', 'Искусство', 'История', 'Спорт'];
        return view('articles.create', compact('topics'));
    }    

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'topic' => 'required',
            'content' => 'required',
            'image_url' => 'nullable|file|mimes:jpg,jpeg,png,webp|max:2048',
        ]);
    
        $data = $request->only(['title', 'author', 'topic', 'content']);
    
        if ($request->hasFile('image_url')) {
            $path = $request->file('image_url')->store('articles', 'public');
            $data['image_url'] = '/storage/' . $path;
        } else {
            $images = [
                '/img/articles/blog1.png',
                '/img/articles/blog2.png',
                '/img/articles/blog3.png',
            ];
            $articleCount = Article::count();
            $imageIndex = $articleCount % count($images);
            $data['image_url'] = $images[$imageIndex];
        }
    
        $data['publication_date'] = now();
    
        Article::create($data);
    
        return redirect()->route('articles.index')->with('success', 'Статья успешно создана');
    }
      
    public function edit($id)
    {
        $article = Article::findOrFail($id);
        $topics = ['Технологии', 'Наука', 'Искусство', 'История', 'Спорт'];

        return view('articles.edit', compact('article', 'topics'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'topic' => 'required',
            'content' => 'required',
            'image_url' => 'nullable|file|mimes:jpg,jpeg,png,webp|max:2048',
        ]);
    
        $article = Article::findOrFail($id);
    
        $data = $request->only(['title', 'author', 'topic', 'content']);
    
        if ($request->hasFile('image_url')) {
            $path = $request->file('image_url')->store('articles', 'public');
            $data['image_url'] = '/storage/' . $path;
        }
    
        $article->update($data);
    
        return redirect()->route('articles.index')->with('success', 'Статья успешно обновлена');
    }
    

    public function destroy($id)
    {
        Article::destroy($id);
        return redirect()->route('articles.index');
    }

    public function showForm($id)
    {
        $article = Article::find($id);
        return view('articles.article', compact('article'));
    }
}
