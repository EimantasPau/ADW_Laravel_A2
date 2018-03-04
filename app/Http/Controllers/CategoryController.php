<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    public function index() {
        //Get every other category other than 'Uncategorised'
        $categories = Category::where('name', '!=', 'Uncategorised')->get();
        return view('admin.category.index', compact('categories'));
    }

    public function create() {
        return view('admin.category.create');
    }
    public function store(Request $request) {
        $request->validate([
           'name' => 'required|unique:categories'
        ]);
        Category::create($request->all());
        Session::flash('successMessage', 'The category has been successfully created!');
        return redirect()->route('admin.category.index');
    }

    public function destroy($id) {
        Product::whereCategoryId($id)->update(['category_id' => 1]);
        Category::destroy($id);
        Session::flash('successMessage', 'The category has been deleted. Products that belong to this category have now become uncategorised.');
        return redirect()->route('admin.category.index');
    }

    public function edit($id) {
        $category = Category::findOrFail($id);
        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'name' => 'required|unique:categories'
        ]);

        Category::findOrFail($id)->update($request->all());
        Session::flash('successMessage', 'The category has been successfully updated');

        return redirect()->route('admin.category.index');
    }
}
