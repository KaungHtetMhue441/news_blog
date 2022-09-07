<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles=Article::when(isset(request()->search),function($q){
            $request=request()->search;
            return $q->where("title","like","%".request()->search."%")->orwhere("title","like","%$request%");
            })->with('user',"category")->latest()->paginate(10);
        return view('articles.index',compact("articles",$articles));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category=new Category();
        $categories=$category
            ->where("user_id",Auth::id())
            ->get();


        return view("articles.create",compact("categories",$categories));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "title"=>"required|min:5|max:100",
            "description"=>"required|min:5",
            "category"=>"required|exists:categories,id"
        ]);
        $articles=new Article();
        $articles->title=$request->title;
        $articles->description=$request->description;
        $articles->user_id=Auth::id();
        $articles->category_id=$request->category;
        $articles->save();
        return redirect()->route("article.create")->with("message","Article create successful");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('articles.show',compact('article',$article));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $categories=Category::all();
        return view('articles.edit',compact('article','categories',$article,$categories));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $request->validate([
            "category" => "required|exists:categories,id",
            "title" => "required|min:5|max:200",
            "description" => "required|min:5"
        ]);

        $article->title = $request->title;
        $article->category_id = $request->category;
        $article->description = $request->description;
        $article->update();

        return redirect()->route('article.index')->with("message","Article Updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('article.index',['page'=>5])->with("message","Article deleted");

    }
}
