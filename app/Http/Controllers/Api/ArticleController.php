<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function list()
    {
        $articles = Article::all();
        $items = [];
        foreach ($articles as $article) {
            $items[] = [
                'id' => $article->id,
                'title' => $article->title,
                'description' => $article->description,
                'image' => $article->image,
                'author' => $article->author,
                'category' => $article->category->name,
            ];
        }
        return response()->json($items);
    }

    public function random()
    {
        $articles = Article::all()->random(4);
        $items = [];
        foreach ($articles as $article) {
            $items[] = [
                'id' => $article->id,
                'title' => $article->title,
                'description' => $article->description,
                'image' => $article->image,
                'author' => $article->author,
                'category' => $article->category->name,
                'type' => 'article',

            ];
        }
        return response()->json($items);
    }
}
