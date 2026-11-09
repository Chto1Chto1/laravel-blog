<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;

class MainController extends Controller
{
    public function index()
    {
        $tag = new Tag();
        $tag->title = 'Привет, мир';
        $tag->save();

        dd(Tag::all()->toArray());

        return view('admin.index');
    }
}