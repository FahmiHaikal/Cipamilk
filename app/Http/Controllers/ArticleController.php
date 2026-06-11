<?php

   namespace App\Http\Controllers;

   use App\Models\Article;
   use Illuminate\View\View;

   class ArticleController extends Controller
   {
       // Menampilkan semua daftar jurnal (Paging 9 artikel per halaman)
       public function index(): View
       {
           $articles = Article::latest()->paginate(9);
           return view('articles.index', compact('articles'));
       }

       // Menampilkan halaman detail baca satu artikel
       public function show(Article $article): View
       {
           // Ambil 3 artikel terbaru untuk rekomendasi "Baca Juga"
           $recentArticles = Article::where('id', '!=', $article->id)
                                    ->latest()
                                    ->take(3)
                                    ->get();

           return view('articles.show', compact('article', 'recentArticles'));
       }
   }