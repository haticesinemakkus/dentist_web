<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function list()
    {
        $blogs = Blog::all();
        $items = [];
        foreach ($blogs as $blog) {
            $items[] = [
                'id' => $blog->id,
                'title' => $blog->title,
                'description' => $blog->description,
                'image' => $blog->image,
                'author' => $blog->author,
                'category' => $blog->category->name,
            ];
        }
        return response()->json($items);
    }

    public function random()
    {
        $blogs = Blog::all()->random(4);
        $items = [];
        foreach ($blogs as $blog) {
            $items[] = [
                'id' => $blog->id,
                'title' => $blog->title,
                'description' => $blog->description,
                'image' => $blog->image,
                'author' => $blog->author,
                'category' => $blog->category->name,
                'type' => 'blog',
            ];
        }
        return response()->json($items);
    }
}
