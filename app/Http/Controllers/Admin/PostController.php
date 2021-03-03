<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index()
    {
       $posts = Post::paginate(6);
       return view('admin.posts.index', compact('posts'));
    }


    public function create()
    {
        $categories = Category::pluck('title', 'id')->all();
        $tags = Tag::pluck('title', 'id')->all();
        return view('admin.posts.create', compact('categories', 'tags'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required'
        ]);

        return redirect()->route('posts.index')->with('success', 'Статья добавлена');

    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        return view('admin.posts.edit');
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required'
        ]);
        return redirect()->route('posts.index')->with('success', 'Статья обновлена');
    }


    public function destroy($id)
    {
        return redirect()->route('posts.index')->with('success', 'Статья удалена');
    }
}
