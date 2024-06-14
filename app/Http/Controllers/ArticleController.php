<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{

    public function index()
    {
        $articles = Article::all();

        return view('articles.index', compact('articles'));
    }


    public function store(Request $request)
    {


        Article::create($request->all());

        return redirect()->route('Article.index');

    }


    public function update(Request $request, $id)
    {


        $article = Article::find($id);
        $article->update($request->all());

        return redirect()->route('Article.index');

    }


    public function destroy($id)
    {

        $article = Article::find($id);
        $article->delete();

        return redirect()->route('Article.index');
        
    }


    public function create()
    {
        return view('articles.create');
    }



    public function show($id)
    {
        $article = Article::find($id);

        return view('articles.show', compact('article'));
    }


    public function edit($id)
    {
        $article = Article::find($id);

        return view('articles.edit', compact('article'));
    }
}
