<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTag;
use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{

    public function index()
    {
        $tags = Tag::paginate(6);
        return view('admin.tags.index', compact('tags'));
    }


    public function create()
    {
        return view('admin.tags.create');
    }


    public function store(StoreTag $request)
    {
        Tag::create($request->all());
        return redirect()->route('tags.index')->with('success', 'Тег добавлен');
    }


    public function edit($id)
    {
        $tag = Tag::find($id);
        return view('admin.tags.edit', compact('tag'));
    }

    public function update(StoreTag $request, $id)
    {
        $tag = Tag::find($id);
        $tag->update($request->all());
        return redirect()->route('tags.index')->with('success', 'Тег обновлен');
    }

    public function destroy($id)
    {
        Tag::destroy($id);
        return redirect()->route('tags.index')->with('success', 'Тег удален');
    }
}
