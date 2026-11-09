<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCategory;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(20);

        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(StoreCategory $request)
    {
        Category::create($request->all());

        return redirect()->route('categories.index')->with('success', 'Категория добавлена');
    }


    public function edit(string $id)
    {
        $category = Category::find($id);

        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
        ]);

        $category = Category::find($id);
        // $category->slug = null;
        $category->update($request->all());

        return redirect()->route('categories.index')->with('success', 'Изменения сохранены');
    }

    public function destroy(string $id)
    {
        Category::destroy($id);

        return redirect()->route('categories.index')->with('success', 'Категория удалена');
    }
}