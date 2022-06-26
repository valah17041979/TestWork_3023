<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Category::get();
      /* $data = Category::all();
        return response()->json($data);*/
    }

     public function show($id)
    {
        return Category::findOrFail($id);
    }
 
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->update($request->all());
 
        return $category;
    }
 
    public function store(Request $request)
    {
        $category = Category::create($request->all());
        return $category;
    }
 
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return '';
    }

}