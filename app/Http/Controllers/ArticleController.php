<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view articles')->only('index');
        $this->middleware('permission:edit articles')->only('edit', 'update');
        $this->middleware('permission:create articles')->only('create', 'store');
        $this->middleware('permission:destroy articles')->only('destroy');
    }

    public function index()
    {
        $articles = Article::latest()->paginate(10);
        return view('articles.list', compact('articles'));
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), $this->validationRules());

        if ($validator->passes()) {
            $article = new Article();
            $article->titulo = $request->titulo;
            $article->texto = $request->texto;
            $article->autor = $request->autor;
            $article->save();

            return redirect()->route('articles.index')->with('success','Artículo creado exitosamente.');
        } else {
            return redirect()->route('articles.create')->withInput()->withErrors($validator);
        }
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return view('articles.edit', ['article'=> $article]);
    }

    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);

        $validator = Validator::make($request->all(), $this->validationRules());

        if ($validator->passes()) {
            $article->titulo = $request->titulo;
            $article->texto = $request->texto;
            $article->autor = $request->autor;
            $article->save();

            return redirect()->route('articles.index')->with('success','Artículo editado exitosamente.');
        } else {
            return redirect()->route('articles.edit', $id)->withInput()->withErrors($validator);
        }
    }

    public function destroy($id)
    {
        $article = Article::find($id);

        if (!$article) {
            return redirect()->route('articles.index')->with('error', 'Artículo no encontrado');
        }

        $article->delete();

        return redirect()->route('articles.index')->with('success', 'Artículo eliminado correctamente.');
    }

}
