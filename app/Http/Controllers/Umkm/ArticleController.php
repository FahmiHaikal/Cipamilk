<?php

namespace App\Http\Controllers\Umkm;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::where('umkm_id', Auth::user()->umkm->id)->latest()->get();
        return view('umkm.articles.index', compact('articles'));
    }

    public function create()
    {
        return view('umkm.articles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('articles', 'public');
        }

        Article::create([
            'umkm_id' => Auth::user()->umkm->id,
            'title' => $request->title,
            'slug' => Str::slug($request->title) . '-' . time(),
            'content' => $request->content,
            'image' => $imagePath,
            'published_at' => now(), // Langsung terpublish hari ini
        ]);

        return redirect()->route('umkm.articles.index')->with('success', 'Artikel berhasil diterbitkan!');
    }

    public function destroy(Article $article)
    {
        if ($article->umkm_id === Auth::user()->umkm->id) {
            $article->delete();
        }
        return back();
    }
}