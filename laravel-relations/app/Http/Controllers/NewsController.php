<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Author;
use App\Tag;
use App\Mail\NewArticleCreate;
use Illuminate\Support\Facades\Mail;
class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::orderby('id', 'desc')->simplePaginate(5); 
        return view('index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authors = Author::all();
        $tags = Tag::all();
        return view('create', compact('authors', 'tags'));
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
            'picture' => 'url'
        ]);

        $data = $request->all();

        $article = new Article();
        $this->saveAndFill($article, $data);

        //dopo che ho salvato invio mail
        Mail::to('info@test.it')->send(new NewArticleCreate());

        return redirect()->route('articles.show', $article->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::find($id);
        return view('show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $authors = Author::all();
        $tags = Tag::all();
        return view('edit', compact('article', 'authors', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $this->saveAndFill($article, $request);
        return redirect()->route('articles.show', $article);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    //MY FUNCTIONS
    private function saveAndFill($article, $data){

        $article->title = $data['title'];
        $article->body = $data['body'];
        $article->picture = $data['picture'];

        $article->author_id = $data['author_id'];
        $article->save();

        foreach($data['tags'] as $tagId){
            
            $article->tags()->attach($tagId);
        }
    }
}
