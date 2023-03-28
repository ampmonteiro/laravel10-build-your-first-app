<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $all = News::all();

        return view('news.index', compact('all'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('news.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $rq)
    {
        $rq->validate([
            'title' => 'required',
            'body'  => 'required|min:3'
        ]);

        $rs = $rq->all();

        $rs['slug'] = str_replace(' ', '-', $rs['title']);

        News::create($rs);

        return to_route('news.index')
            ->with('success', 'Post was created');
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news)
    {
        return view('news.show', compact('news'));
    }

    // public function show(string $slug)
    // {
    //     $article = Article::firstWhere('slug', $slug);

    //     return view('blog.show', compact('article'));
    // }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news)
    {
        return view('news.edit', compact('news'));
    }

    // public function  edit(string $slug)
    // {
    //     $article = News::firstWhere('slug', $slug);

    //     return view('edit.show', compact('article'));
    // }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $rq, News $news)
    {
        $rq->validate([
            'title' => 'required',
            'body'  => 'required|min:3'
        ]);

        $rs = $rq->all();


        $rs['slug'] = str_replace(' ', '-', $rs['title']);

        $news->fill($rs);
        $news->save();

        return to_route('news.index')
            ->with('success', 'Post was update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {
        $news->delete();

        return to_route('news.index')
            ->with('success', 'Post was removed');
    }
}
